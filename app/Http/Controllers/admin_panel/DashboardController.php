<?php

namespace App\Http\Controllers\admin_panel;

use auth;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class DashboardController extends Controller
{
    // visit dashboard page
    public function viewDasboard()
    {
        $user = auth()->user();
        $doctor = $user->doctor;
        $appointments = $doctor->appointment()->with('patient')->where('status', 'pending')->simplePaginate(10);

        return view('admin-panel.pages.doctor-dashboard',[
            'appointments' => $appointments,
            'user' => $user
        ]);

    }

    //confirm and change status of appointment
    public function updateStatus(String $id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'confirm';
        $appointment->save();

        // Redirect back or do whatever is necessary after the update
        return redirect()->back()->with('success', 'Appointment status updated successfully.');
    }

    //delete appointment
    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->delete();
            return redirect()->back()->with('success', 'Appointment deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
    }

}
