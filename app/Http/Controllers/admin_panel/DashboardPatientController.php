<?php

namespace App\Http\Controllers\admin_panel;

use App\Models\DayTimes;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DashboardPatientController extends Controller
{
    //patient page view
    public function viewPatients()
    {
        $user = Auth::user();
        $doctor = $user->doctor;
        $appointments = $doctor->appointment()->with('patient')->simplePaginate(12);
        return view('admin-panel.pages.patients.my-patients',[
            'appointments' => $appointments
        ]);
    }

    //view appointment page
    public function viewAppointment()
    {
        $user = Auth::user();
        $doctor = $user->doctor;
        $appointments = $doctor->appointment()->with('patient')->simplePaginate(12);
        return view('admin-panel.pages.appointment.appointments',[
            'appointments' => $appointments
        ]);
    }

    //view profile setting page
    public function profileSetting()
    {
        if (Auth::check()) {
            $departments = Department::all();
            $user = Auth::user();
            $doctor = $user->doctor;
            return view('admin-panel.pages.profile-setting.profile-setting', [
                'doctor' => $doctor,
                'departments'=> $departments
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    //update profile setting
    public function updateProfileSetting(Request $request, $id)
    {
        $user = Auth::user();
        if ($user) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            // $user->save();

            $user->doctor->depart_id = $request->depart_id;
            $user->doctor->specialist = $request->specialist;
            $user->doctor->fee = $request->fee;
            $user->doctor->clinic_address = $request->clinic_address;
            $user->doctor->about = $request->about;
            $user->doctor->experience = $request->experience;
            $user->doctor->save();

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Please login first!');
        }
    }

    //view create dashboard doctor schedule timing page
    public function createScheduleTiming()
    {
        return view('admin-panel.pages.schedule-timing.create-schedule-time');
    }

    //store dashboard doctor schedule timing page
    public function storeScheduleTiming(Request $request)
    {
        $user = Auth::user();
        $doctor = $user->doctor;

        // Define validation rules
        $rules = [
            'day' => 'required|array',
            'start_time' => 'required|array',
            'end_time' => 'required|array',
            'duration' => 'required|string',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, throw a ValidationException
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->all());
        }

        // Extract validated data
        $validatedData = $validator->validated();
        $duration = $validatedData['duration'];
        $days = $validatedData['day'];
        $start_times = $validatedData['start_time'];
        $end_times = $validatedData['end_time'];

        // Create schedule for each day
        foreach ($days as $key => $day) {
            DayTimes::create([
                'doc_id' => $doctor->id,
                'day' => $day,
                'start_time' => $start_times[$key],
                'end_time' => $end_times[$key],
                'duration' => $duration,
            ]);
        }

        return redirect()->route('edit.schedule.timing');
    }

    //view edit dashboard doctor schedule timing page
    public function editScheduleTiming()
    {
        $user = Auth::user();
        $availableDays = $user->doctor->dayTime;
        $dayTime = $user->doctor->dayTime->first();

        return view('admin-panel.pages.schedule-timing.edit-schedule-time',[
            'availableDays' => $availableDays,
            'dayTime' => $dayTime
        ]);
    }

    //update dashboard doctor schedule timing
    public function updateScheduleTiming(Request $request)
    {
        $rules = [
            'id'=> 'exists:day_times,id',
            'day'=> 'required | string',
            'start_time' => 'date_format:H:i:s|required',
            'end_time' => 'date_format:H:i:s|required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->all());
        }

        $dayTime = DayTimes::find($request->id);

        if ($dayTime) {
            $dayTime->update($request->only(['day', 'start_time', 'end_time']));
            return response()->json(['message' => 'DayTime updated successfully'], 200);
        }

        return response()->json(['error' => 'DayTime not found'], 404);
    }

    //delete doctor schedule timing
    public function deleteScheduleTiming(Request $request)
    {
        $dayTime = DayTimes::find($request->id);

        if ($dayTime) {
            $dayTime->delete();
            return response()->json(['message' => 'DayTime delete successfully'], 200);
        }

        return response()->json(['error' => 'DayTime not found'], 404);
    }

    //update doctor schedule duration
    public function updateScheduleDuration(Request $request)
    {
        $duration = $request->input('duration');
        $user = Auth::user();
        $dayTime = $user->doctor->dayTime;

        if ($dayTime) {
            // Update duration for each DayTime record
            foreach ($dayTime as $time) {
                $time->update(['duration' => $duration]);
            }

            return response()->json(['message' => 'Duration updated successfully'], 200);
        } else {
            return response()->json(['error' => 'DayTime not found'], 404);
        }
    }

}
