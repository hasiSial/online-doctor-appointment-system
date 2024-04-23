<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Helper;
// use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Contracts\Frontend\DoctorContract;
use App\Http\Requests\Frontend\DoctorRequest;


class DoctorsController extends Controller
{
    protected DoctorContract $doctor;
    /**
     * Display a listing of the resource.
     */
    public function __construct(DoctorContract $doctor)
    {
        $this->doctor = $doctor;
    }

    /**
     * Display a Doctor Index Page in Frontend.
    */
    public function index()
    {
        try {
            $users = $this->doctor->index();
            return view('frontend.Doctor.index',compact('users'));
        } catch (CustomException $th) {
            return redirect()->back()->with('message', $th->getMessage());
        } catch (\Throwable $th) {
            Helper::logMessage('DoctorsController-index()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }
    }

    /**
     * Display a Doctor View Profile Page in Frontend.
    */
    public function viewDoctorProfile(string $slug)
    {
        try {
           $data = $this->doctor->viewDoctorProfile($slug);
           return view('frontend.Doctor.view-profile',compact('data'));
        } catch(CustomException $th) {
            return redirect()->back()->with('message', $th->getMessage());
        } catch(\Throwable $th) {
            Helper::logMessage('DoctorsController-viewDoctorProfile()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }
    }

     /**
     * Display a Doctor create Profile Page in Frontend.
    */
    public function create()
    {
        try {
            $data = $this->doctor->create();
            return view('frontend.Doctor.create-profile',compact('data'));
        } catch(CustomException $th) {
            return redirect()->back()->with('message', $th->getMessage());
        } catch(\Throwable $th) {
            Helper::logMessage('DoctorsController-create()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }
    }
    /**
     * Display a Doctor Profile store.
    */
    public function store(DoctorRequest $request)
    {
       try {
        $data = $this->doctor->store($request->prepareRequest());
        return redirect()->route('dashboard')->with('message','Profile has been created successfully!');
       } catch(CustomException $th) {
        return redirect()->back()->with('message', $th->getMessage());
       } catch(\Throwable $th) {
            Helper::logMessage('DoctorsController-store()',null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
       }
    }

    public function show($id)
    {

    }

    /**
     * Display a Doctor Profile edit.
    */
    public function edit($first_name)
    {
        try {
            $data = $this->doctor->edit($first_name);
            return view('frontend.Doctor.edit-profile', compact('data'));
        } catch (CustomException $th) {
            return redirect()->back()->with('error', $th->getMessage());
        } catch (\Throwable $th) {
            Log::error('Error in DoctorsController@edit(): ' . $th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display a Doctor Profile update.
    */
    public function update(DoctorRequest $request, $id)
    {
        try {
            $data = $this->doctor->update($request->prepareRequest(), $id);
            return redirect()->route('doctor-dashboard.index')->with('message','Profile has been updated successfully!');
        } catch (CustomException $th) {
            return redirect()->back()->with('error', $th->getMessage());
        } catch (\Throwable $th) {
            Log::error('Error in DoctorsController@update(): ' . $th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }



}
