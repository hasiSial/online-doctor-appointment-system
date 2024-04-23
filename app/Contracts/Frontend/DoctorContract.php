<?php

namespace App\Contracts\Frontend;

/**
 * @var DoctorContract
 */
interface DoctorContract
{
    public function index();
    public function viewDoctorProfile(string $slug);
    public function create();
    public function store($request);
    public function show($id);
    public function edit($first_name);
    public function update($request, $id);
    public function destroy($id);
}
