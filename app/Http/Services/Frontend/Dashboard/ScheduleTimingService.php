<?php

namespace App\Http\Services\Frontend\Dashboard;

use App\Models\User;
use App\Models\Doctor;
use App\Models\DayTimes;
use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Log;
use App\Contracts\Frontend\Dashboard\ScheduleTimingContract;

/**
 * @var DepartmentService
*/
class ScheduleTimingService implements ScheduleTimingContract
{
    protected Doctor $doctorModel;
    protected User $userModel;
    protected DayTimes $dayTimeModel;

    public function __construct()
    {
        $this->doctorModel = new Doctor();
        $this->userModel = new User();
        $this->dayTimeModel = new DayTimes();

    }

    public function index()
    {

    }
    public function create()
    {
        $user = $this->userModel->with('doctor')->find(auth()->user()->id);

        return [
            'user' => $user
        ];

    }
    public function store($request)
    {

    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $user = $this->userModel->with(['doctor.dayTime'])->find(auth()->user()->id);

        return [
            'user' => $user
        ];
    }
    public function update($request)
    {

    }
    public function destroy($id)
    {
        dd($id);

    }


}
