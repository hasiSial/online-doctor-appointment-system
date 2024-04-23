<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserPassword;
use App\Http\Requests\Frontend\UserInfoRequest;
use App\Contracts\Frontend\DoctorDashboardContract;


class DoctorDashboardController extends Controller
{
    protected DoctorDashboardContract $doctorDashboard;
    /**
     * Display a listing of the resource.
     */
    public function __construct(DoctorDashboardContract $doctorDashboard)
    {
        $this->doctorDashboard = $doctorDashboard;
    }

    /**
     * Display a DoctorDashboard Index Page in Frontend.
    */
    public function index()
    {
        try{
            $data = $this->doctorDashboard->index();
            return view('frontend.Doctor.dashboard-index',compact('data'));
        }catch (CustomException $th) {
            return redirect()->back()->with('message', $th->getMessage());
        } catch (\Throwable $th) {
            Helper::logMessage('DoctorDashboardController-index()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }
    }

    public function viewDoctorProfile(string $slug)
    {

    }
    /**
     * Display a Doctor Index Page in Frontend.
    */
    public function create()
    {

    }
    public function store($request)
    {

    }
    /**
     * Display a Doctor Index Page in Frontend.
    */
    public function show($id)
    {

    }
    /**
     * Display a Doctor Index Page in Frontend.
    */
    public function edit($id)
    {

    }
    /**
     * Display a Doctor Index Page in Frontend.
    */
    public function update($request, $id)
    {

    }
    /**
     * Display a Doctor Index Page in Frontend.
    */
    public function destroy($id)
    {

    }

    /**
     * Display a Doctor user info Page.
    */

    public function userInfo()
    {
        try{
            $data = $this->doctorDashboard->userInfo();
            return view('frontend.Doctor.Dashboard.user-info',compact('data'));
        }catch(CustomException $th){
            return redirect()->back()->with('message', $th->getMessage());
        }catch(\Throwable $th){
            Helper::logMessage('DoctorDashboardController-userInfo()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }
    }

    /**
     * update a Doctor user info data.
    */

    public function updateUserInfo(UserInfoRequest $request)
    {
        try{
            $data = $this->doctorDashboard->updateUserInfo($request->prepareRequest());
            return redirect()->back()->with('message','User info update successfully!');
        }catch(CustomException $th){
            return redirect()->back()->with('message', $th->getMessage());
        }catch(\Throwable $th){
            Helper::logMessage('DoctorDashboardController-updateUserInfo()', null, $th->getMessage());
            return redirect()->back()->with('message','something went wrong!');
        }
    }
    /**
     * Display a Doctor user password Page.
    */
    public function editPassword()
    {
        try{
            $data = $this->doctorDashboard->editPassword();
            return view('frontend.Doctor.Dashboard.user-password',compact('data'));
        }catch(CustomException $th){
            return redirect()->back()->with('message', $th->getMessage());
        }catch(\Throwable $th){
            Helper::logMessage('DoctorDashboardController-editPassword()', null, $th->getMessage());
            return redirect()->back()->with('message','something went wrong!');
        }

    }

    /**
     * update a Doctor user password update.
    */
    public function updatePassword(UserPassword $request)
    {
        try{
            $data = $this->doctorDashboard->updatePassword($request->prepareRequest());
            return redirect()->back()->with('message','User password update successfully!');
        }catch(CustomException $th){
            return redirect()->back()->with('message', $th->getMessage());
        }catch(\Throwable $th){
            Helper::logMessage('DoctorDashboardController-updatePassword()', null, $th->getMessage());
            return redirect()->back()->with('message','something went wrong!');
        }
    }


    /**
     * Display a Doctor dashboard appointment page.
    */
    public function appointment()
    {
        try{
            $data = $this->doctorDashboard->appointment();
            return view('frontend.Doctor.Dashboard.appointment',compact('data'));

        }catch(CustomException $th){
            return redirect()->back()->with('message', $th->getMessage());
        }catch(\Throwable $th){
            Helper::logMessage('DoctorDashboardController-appointment()', null, $th->getMessage());
            return redirect()->back()->with('message','something went wrong!');
        }
    }
    /**
     * Display a Doctor dashboard appointment status update.
    */
    public function appointmentStatusUpdate(Request $request)
    {
        try{
            $data = $this->doctorDashboard->appointmentStatusUpdate($request);
            $html = view('frontend.Doctor.Dashboard.appointment', compact('data'))->render();
            return response()->json($html);
            // $html = view('frontend.Doctor.Dashboard.appointment')->render('data');
            // return response()->json($html,['success' => 'Appointment Stauts Update Successfully!']);
        }catch(CustomException $th){
            return redirect()->back()->with('message', $th->getMessage());
        }catch(\Throwable $th){
            Helper::logMessage('DoctorDashboardController-appointmentStatusUpdate()', null, $th->getMessage());
            return redirect()->back()->with('message','something went wrong!');
        }
    }

    /**
     * Display a Doctor dashboard delete-appointment.
    */
    public function appointmentDelete($id)
    {
        try{
            $data = $this->doctorDashboard->appointmentDelete($id);
            return redirect()->back()->with('message','Appointment Delete successfully!');
        }catch(CustomException $th){
            return redirect()->back()->with('message', $th->getMessage());
        }catch(\Throwable $th){
            Helper::logMessage('DoctorDashboardController-appointmentDelete()', null, $th->getMessage());
            return redirect()->back()->with('message','something went wrong!');
        }
    }

    /**
     * Display a Doctor dashboard my-patient page.
    */
    public function myPatient()
    {
        // $data = $request->all();
        
        try{
            $data = $this->doctorDashboard->myPatient();
            return view('frontend.Doctor.Dashboard.Patient.my-patient',compact('data'));
        }catch(CustomException $th){
            return redirect()->back()->with('message', $th->getMessage());
        }catch(\Throwable $th){
            Helper::logMessage('DoctorDashboardController-myPatient()', null, $th->getMessage());
            return redirect()->back()->with('message','something went wrong!');
        }

    }


}
