<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;


class PatientController extends Controller
{
    //code for patient profile page
    public function patientDetail(String $id)
    {
        $user = Auth::user();

        $patient = Patient::where('user_id',$user->id)->first();

        $appointments = Appointment::with('doctor')
                    ->where('patient_id',$patient->id)
                    ->get();          

        return view('frontend/patient/patient-detail',[
            'user' => $user,
            'appointments' => $appointments
        ]);
    }

    //reject patient appointment
    public function destory(Request $request)
    {
        $destroy = Appointment::where('id', $request->input('appoint_id'))
                                ->where('doc_id', $request->input('doc_id'))
                                ->where('patient_id', $request->input('patient_id'))
                                ->delete();
        
        // Complete the response with appropriate data
        return response()->json(['success' => true, 'message' => 'Appointment deleted successfully']);
    }

}
