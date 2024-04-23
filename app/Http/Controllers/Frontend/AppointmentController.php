<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\DayTimes;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    //view appointment page with detail
    public function appointmentDetail(String $slug)
    {
        $user = Auth::user();
        $doctorInfo = Doctor::with('user')
            ->where('slug',$slug)
            ->first();


        return view('frontend.appointment.booking-appointment',compact([
            'doctorInfo',
            'user',

        ]));    
    }

    public function getAppointmentDays(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'date' => 'required|date',
            'day' => 'required|string',
            'docID' => 'required|exists:day_times,doc_id', 
        ]);

        $date = $validatedData['date'];
        $day = $validatedData['day'];
        $docID = $validatedData['docID'];

        // Retrieve the appointment details
        $appointment = DayTimes::where('doc_id', $docID)
                    ->where('day', $day)
                    ->first();

        if (!$appointment) {
            // Handle case where no appointment is found
            return response()->json(['error' => 'No appointment found for the specified doctor and day'], 404);
        }

        $startTime = strtotime($appointment->start_time);
        $endTime = strtotime($appointment->end_time); 
        $duration = $appointment->duration;

        // Set the interval to duration minutes
        if($duration){
            $interval = $duration * 60; 
        } else {
            $interval = 20 * 60; 
        }

        $timeSlots = [];

        while ($startTime < $endTime) {
            $start = date('g:iA', $startTime);
            $end = date('g:iA', $startTime + $interval);

            // Check if there is an existing appointment for the current time slot
            $appointmentCheck = Appointment::where('doc_id', $docID)
                ->where('appointment_date', $date)
                ->where(function ($query) use ($start, $end) {
                    $query->where('appointment_time', '>', $start)
                        ->where('appointment_time', '<=', $end);
                })
                ->exists();

            if (!$appointmentCheck) {
                $timeSlots[] = [
                    'start_time' => $start,
                    'end_time' => $end
                ];
            }

            $startTime += $interval;
        }

        return response()->json(['time_slots' => $timeSlots,'date'=>$date]);
    }

    public function makeAppointment(Request $request)
    {
        // Get the authenticated user's ID
        $userID = auth()->id();

        // Get the patient ID associated with the user ID
        $patientID = Patient::where('user_id', $userID)->value('id');

        // Retrieve appointment details from the request
        $date = $request->input('date');
        $time = $request->input('time');
        $docID = $request->input('docID');
        $docName = $request->input('docName');

        // Create the appointment record
        $appointment = Appointment::create([
            'doc_id' => $docID,
            'patient_id' => $patientID,
            'appointment_date' => $date,
            'appointment_time' => $time,
            'reason'=> 'null'
        ]);

        session()->flash('appointment', [
            'date' => $date,
            'time' => $time,
            'docName' => $docName
        ]);

        // Return a JSON response indicating success
        return response()->json(['message' => 'Appointment created successfully'], 200);
    }

    public function showInvoice()
    {
        $appointmentData = session()->get('appointment');
        if($appointmentData){
            return view('frontend.appointment.invoice',[
                'appointmentData' => $appointmentData
            ]);
        } else {
            return redirect()->route('home');
        }
        
    }



}

