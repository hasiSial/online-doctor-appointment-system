<?php

namespace App\Contracts\Frontend;

/**
 * @var DoctorDashboardContract
 */
interface DoctorDashboardContract
{
    public function index();
    public function viewDoctorProfile(string $slug);
    public function create();
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request, $id);
    public function destroy($id);
    public function userInfo();
    public function updateUserInfo($request);
    public function editPassword();
    public function updatePassword($request);
    public function appointment();
    public function appointmentStatusUpdate($request);
    public function appointmentDelete($id);
    public function myPatient();
}
