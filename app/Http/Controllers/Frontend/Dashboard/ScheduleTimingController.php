<?php

namespace App\Http\Controllers\Frontend\Dashboard;


use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Frontend\Dashboard\ScheduleTimingContract;

class ScheduleTimingController extends Controller
{
    protected ScheduleTimingContract $scheduleTimingAppointment;
    /**
     * Display a listing of the resource.
     */
    public function __construct(ScheduleTimingContract $scheduleTimingAppointment)
    {
        $this->scheduleTimingAppointment = $scheduleTimingAppointment;
    }

    /**
     * Display a Schedule-Timing Index Page in Doctor Dashboard Frontend.
    */
    public function index()
    {

    }

    /**
     * Display a Schedule-Timing create Page in Doctor Dashboard Frontend.
    */
    public function create()
    {
        try{
            $data = $this->scheduleTimingAppointment->create();
            return view('frontend.Doctor.Dashboard.Schedule-Timings.create',compact('data'));
        }catch (CustomException $th) {
            return redirect()->back()->with('message', $th->getMessage());
        } catch (\Throwable $th) {
            Helper::logMessage('ScheduleTimingController-create()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }


    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit($id)
    {
        dd($id);
        try{
            $data = $this->scheduleTimingAppointment->edit($id);
            return view('frontend.Doctor.Dashboard.Schedule-Timings.edit',compact('data'));
        }catch (CustomException $th) {
            return redirect()->back()->with('message', $th->getMessage());
        } catch (\Throwable $th) {
            Helper::logMessage('ScheduleTimingController-edit()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }
    }

    public function update()
    {

    }

    public function destroy($id)
    {
        dd($id);
        try{
            $data = $this->scheduleTimingAppointment->destroy($id);
            return redirect()->back()->with('message','Appointment Schedule Time Delete Succesfully!');
        }catch (CustomException $th) {
            return redirect()->back()->with('message', $th->getMessage());
        } catch (\Throwable $th) {
            Helper::logMessage('ScheduleTimingController-edit()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }
    }

}
