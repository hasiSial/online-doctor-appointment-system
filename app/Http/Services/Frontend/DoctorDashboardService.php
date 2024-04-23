<?php

namespace App\Http\Services\Frontend;

use App\Models\User;
use App\Helper\Helper;
use App\Models\Doctor;
use App\Models\DayTimes;
use App\Models\Appointment;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Frontend\DoctorDashboardContract;

/**
 * @var DoctorDashboardService
*/
class DoctorDashboardService implements DoctorDashboardContract
{
    protected Doctor $doctorModel;
    protected User $userModel;
    protected Appointment $appointmentModel;

    public function __construct()
    {
        $this->doctorModel = new Doctor();
        $this->userModel = new User();
        $this->appointmentModel = new Appointment();

    }

    /**
     * code for view doctor dashboard index page.
    */
    public function index()
    {
        $user = auth()->user();
        $doctor = $user->doctor;
        $appointments = $doctor->appointment()->with('patient')->where('status', 'pending')->get();

        return [
            'appointments' => $appointments,
            'user' => $user,
            'doctor'=> $doctor
        ];
    }

    public function viewDoctorProfile(string $slug)
    {

    }
    public function create()
    {

    }
    public function store($request)
    {

    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update($request, $id)
    {

    }
    public function destroy($id)
    {

    }

    /**
     * code for view user-info page.
    */
    public function userInfo()
    {
        $user = Auth::user();
        return ['user' => $user];
    }

    /**
     * code for update user-info page data.
    */
    public function updateUserInfo($request)
    {
        $user = $this->userModel->find(auth()->user()->id);
        if(!$user){
            throw new CustomException('Record Not Found!');
        }

        return $this->prepareUserData($user, $request, true);
    }

    /**
     * code for view change-password page.
    */
    public function editPassword()
    {
        $user = Auth::user();
        return ['user' => $user];
    }
    /**
     * code for view update-password.
    */
    public function updatePassword($request)
    {
        $user = $this->userModel->find(auth()->user()->id);

        if (!Hash::check($request['old_password'], $user->password)) {
            return redirect()->back()->with('error', 'The old password does not match.');
        }

        $user->password = Hash::make($request['new_password']);
        $user->save();
        return $user;
    }

    /**
     * code for view appointment page.
    */
    public function appointment()
    {
        $user = Auth::user();
        $doctor = $user->doctor;
        $appointments = $doctor->appointment()->with('patient')->get();
        return [
            'doctor' => $doctor,
            'user' => $user,
            'appointments' => $appointments
        ];

    }
    /**
     * code for view appointment-status-update.
    */
    public function appointmentStatusUpdate($request)
    {
        $appointment = $this->appointmentModel->find($request->appointId);
        $appointment->status = $request['status'];
        if (!$appointment) {
            throw new CustomException('Appointment not found.');
        }
        $appointment->save();
        return $appointment;
    }

    /**
     * code for view delete-appointment.
    */
    public function appointmentDelete($id)
    {
        $appointment = $this->appointmentModel->find($id);
        $appointment->delete($id);
        return $appointment;
    }

    /**
     * Display a Doctor dashboard my-patient page.
    */
    public function myPatient()
    {
        $user = $this->userModel->with(['doctor'])->find(auth()->user()->id);
        $appointments = $this->appointmentModel->with(['patient'])->where('doc_id',$user->doctor->id)->get();

        return [
            'user' => $user,
            'appointments' => $appointments
        ];
    }









    private function prepareUserData($model, $data)
    {
        $keysToSet = ['first_name', 'last_name', 'email', 'phone', 'age', 'country', 'state', 'city'];

        foreach ($keysToSet as $key) {
            if (isset($data[$key]) && $data[$key] !== '') {
                $model->{$key} = $data[$key];
            }
        }

        if (isset($data['image'])) {
            $file = $data['image'];

            if (is_uploaded_file($file)) {
                $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/users', $filename);

                if ($model->image) {
                    $this->deleteImage($model->image);
                }

                $model->image = $filename;
            } else {
                throw new CustomException('Invalid image file provided.');
            }
        }

        $model->save();
        return $model;
    }

    private function deleteImage($filename)
    {
        $directory = storage_path('app/public/users');
        if (file_exists($directory . '/' . $filename)) {
            unlink($directory . '/' . $filename);
        }
    }












}
