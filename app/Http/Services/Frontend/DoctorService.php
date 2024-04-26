<?php

namespace App\Http\Services\Frontend;

use App\Models\Day;
use App\Models\User;
use App\Models\Doctor;
use App\Models\DayTimes;
use App\Models\Department;
use App\Traits\ImageUpload;
use App\Exceptions\CustomException;
use App\Contracts\Frontend\DoctorContract;

/**
 * @var DoctorService
 */
class DoctorService implements DoctorContract
{

    // use ImageUpload;
    protected User $userModel;
    protected Doctor $doctorModel;
    protected DayTimes $dayTimeModel;
    protected Department $departmentModel;
    protected Day $dayModel;


    public function __construct()
    {
        $this->userModel = new User();
        $this->doctorModel = new Doctor();
        $this->dayTimeModel = new DayTimes();
        $this->departmentModel = new Department();
        $this->dayModel = new Day();

    }

    public function index()
    {
        return $this->userModel->with('doctor')->whereHas('doctor')->simplePaginate(12);
    }

    public function viewDoctorProfile(string $slug)
    {

        $doctor = $this->doctorModel->with('user')->where('slug', $slug)->firstOrFail();
        $doctor->most_views++;
        $doctor->save();
        $relatedDoctors = $this->doctorModel->with('user')->where('specialist', $doctor->specialist)
        ->where('id', '!=',$doctor->id)
        ->orderBy('most_views', 'desc')
        ->take(4)
        ->get();
        $appointments =  $this->dayTimeModel->with('doctor')->where('doc_id',$doctor->id)->get();
        return [
            'doctor' => $doctor,
            'appointments'=> $appointments,
            'relatedDoctors'=>$relatedDoctors
        ];

    }

    public function create()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->withErrors(['message' => 'Please login first!']);
        }

        $departs = $this->departmentModel->all();

        return [
            'departs'=>$departs,
            'user'=>$user,
        ];
    }

    public function store($request)
    {
        return $this->prepareData($this->doctorModel,$request);
    }

    public function show($id)
    {

    }

    public function edit($first_name)
    {
        $user = auth()->user();
        $doctor = $this->doctorModel->with(['dayTime', 'user'])
            ->where('user_id', $user->id)
            ->first();
        $departs = $this->departmentModel->all();

        return [
            'doctor' => $doctor,
            'departs' => $departs,
            'user'=>$user,
        ];
    }

    public function update($request, $id)
    {
        $doctor = $this->doctorModel->find($id);
        if(!$doctor){
            throw new CustomException('Doctor id Not Found!');
        }

        $doctor->user_id = $request['user_id'];
        $doctor->experience = $request['experience'];
        $doctor->depart_id = $request['depart_id'];
        $doctor->specialist = $request['specialist'];
        $doctor->fee = $request['fee'];
        $doctor->clinic_address = $request['clinic_address'];
        $doctor->about = $request['about'];
        $doctor->slug = $request['slug'];

        $doctor->save();

    }

    public function destroy($id)
    {

    }

    private function prepareData($model, $data, $newRecord = false)
    {
$keysToSet = ['user_id', 'depart_id', 'specialist', 'fee', 'clinic_address', 'about', 'experience', 'slug'];
        foreach ($keysToSet as $key) {
            if (isset($data[$key]) && $data[$key]) {
                $model->$key = $data[$key];
            }
        }
        $model->save();

        //save doctor appointment schedule
        $days = $data['day.*'];
        $start_time = $data['start_time.*'];
        $end_time = $data['end_time.*'];
        foreach($days as $key=> $day){
            $dayTimeModel = new DayTimes();

            // Assign schedule details
            $dayTimeModel->doc_id = $model->id;
            $dayTimeModel->day = $day;
            $dayTimeModel->start_time = $start_time[$key];
            $dayTimeModel->end_time = $end_time[$key];
            $dayTimeModel->duration = '15';

            // Save each schedule entry separately
            $dayTimeModel->save();
        }

        return $model;
    }


}
