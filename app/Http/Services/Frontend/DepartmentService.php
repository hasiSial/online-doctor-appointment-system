<?php

namespace App\Http\Services\Frontend;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Log;
use App\Contracts\Frontend\DepartmentContract;

/**
 * @var DepartmentService
*/
class DepartmentService implements DepartmentContract
{
    protected Doctor $doctorModel;
    // protected DayTimes $dayTimeModel;

    public function __construct()
    {
        $this->departmentModel = new Department();
        $this->doctorModel = new Doctor();

    }

    public function cardiology()
    {
        $doctors = $this->doctorModel->with('user')->where('depart_id','1')->get();
        $depart = 'Cardiology';
        return [
            'doctors' => $doctors,
            'depart' => $depart
        ];
    }

    public function eyeCare()
    {
        $doctors = $this->doctorModel->with('user')->where('depart_id','2')->get();
        $depart = 'Eye Care';
        return [
            'doctors' => $doctors,
            'depart' => $depart
        ];
    }

    public function Pulmonary()
    {
        $doctors = $this->doctorModel->with('user')->where('depart_id','3')->get();
        $depart = 'Pulmonary';
        return [
            'doctors' => $doctors,
            'depart' => $depart
        ];
    }

    public function dentalCare()
    {
        $doctors = $this->doctorModel->with('user')->where('depart_id','4')->get();
        $depart = 'DentalCare';
        return [
            'doctors' => $doctors,
            'depart' => $depart
        ];
    }

    public function diagnostics()
    {
        $doctors = $this->doctorModel->with('user')->where('depart_id','5')->get();
        $depart = 'Diagnostics';
        return [
            'doctors' => $doctors,
            'depart' => $depart
        ];
    }

    public function disabled()
    {
        $doctors = $this->doctorModel->with('user')->where('depart_id','6')->get();
        $depart = 'Disabled';
        return [
            'doctors' => $doctors,
            'depart' => $depart
        ];
    }

    public function traumotoligy()
    {
        $doctors = $this->doctorModel->with('user')->where('depart_id','7')->get();
        $depart = 'Traumotoligy';
        return [
            'doctors' => $doctors,
            'depart' => $depart
        ];
    }

    public function neurology()
    {
        $doctors = $this->doctorModel->with('user')->where('depart_id','8')->get();
        $depart = 'Neurology';
        return [
            'doctors' => $doctors,
            'depart' => $depart
        ];
    }

}