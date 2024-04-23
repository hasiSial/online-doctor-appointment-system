<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Helper;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Frontend\DepartmentContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DepartmentController extends Controller
{
    protected DepartmentContract $department;
    /**
     * Display a listing of the resource.
     */
    public function __construct(DepartmentContract $department)
    {
        $this->department = $department;
    }

    /**
     * Display a Doctor cardiology Page in Frontend.
    */

    public function cardiology()
    {
        try {
           $data = $this->department->cardiology();
           return view('frontend.Department.index', compact('data'));
        } catch (CustomException $th) {
            return redirect()->back()->with('messgae', $th->getMessage());
        } catch (\Throwable $th) {
            Helper::logMessage('DepartmentController-cardiology()', null, $th->getMessage());
            return redirect()->back()->with('message', 'Something went wrong!');
        }

    }

    public function eyeCare()
    {
        try {
            $data = $this->department->eyeCare();
            return view('frontend.Department.index', compact('data'));
         } catch (CustomException $th) {
             return redirect()->back()->with('messgae', $th->getMessage());
         } catch (\Throwable $th) {
             Helper::logMessage('DepartmentController-cardiology()', null, $th->getMessage());
             return redirect()->back()->with('message', 'Something went wrong!');
         }
    }

    public function Pulmonary()
    {
        try {
            $data = $this->department->Pulmonary();
            return view('frontend.Department.index', compact('data'));
         } catch (CustomException $th) {
             return redirect()->back()->with('messgae', $th->getMessage());
         } catch (\Throwable $th) {
             Helper::logMessage('DepartmentController-cardiology()', null, $th->getMessage());
             return redirect()->back()->with('message', 'Something went wrong!');
         }
    }

    public function dentalCare()
    {
        try {
            $data = $this->department->dentalCare();
            return view('frontend.Department.index', compact('data'));
         } catch (CustomException $th) {
             return redirect()->back()->with('messgae', $th->getMessage());
         } catch (\Throwable $th) {
             Helper::logMessage('DepartmentController-cardiology()', null, $th->getMessage());
             return redirect()->back()->with('message', 'Something went wrong!');
         }
    }

    public function diagnostics()
    {
        try {
            $data = $this->department->diagnostics();
            return view('frontend.Department.index', compact('data'));
         } catch (CustomException $th) {
             return redirect()->back()->with('messgae', $th->getMessage());
         } catch (\Throwable $th) {
             Helper::logMessage('DepartmentController-cardiology()', null, $th->getMessage());
             return redirect()->back()->with('message', 'Something went wrong!');
         }
    }

    public function disabled()
    {
        try {
            $data = $this->department->disabled();
            return view('frontend.Department.index', compact('data'));
         } catch (CustomException $th) {
             return redirect()->back()->with('messgae', $th->getMessage());
         } catch (\Throwable $th) {
             Helper::logMessage('DepartmentController-cardiology()', null, $th->getMessage());
             return redirect()->back()->with('message', 'Something went wrong!');
         }
    }

    public function traumotoligy()
    {
        try {
            $data = $this->department->traumotoligy();
            return view('frontend.Department.index', compact('data'));
         } catch (CustomException $th) {
             return redirect()->back()->with('messgae', $th->getMessage());
         } catch (\Throwable $th) {
             Helper::logMessage('DepartmentController-cardiology()', null, $th->getMessage());
             return redirect()->back()->with('message', 'Something went wrong!');
         }
    }

    public function neurology()
    {
        try {
            $data = $this->department->neurology();
            return view('frontend.Department.index', compact('data'));
         } catch (CustomException $th) {
             return redirect()->back()->with('messgae', $th->getMessage());
         } catch (\Throwable $th) {
             Helper::logMessage('DepartmentController-cardiology()', null, $th->getMessage());
             return redirect()->back()->with('message', 'Something went wrong!');
         }
    }
}
