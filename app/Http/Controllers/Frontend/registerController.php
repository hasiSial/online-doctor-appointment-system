<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class registerController extends Controller
{
    //code for register new user
    // protected function create(array $data)
    // {

    // $newUser = User::create($data);
    
    // // Check if an image is uploaded
    // if(isset($data['image'])) {
    //     $file = $data['image'];
    //     $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

    //     $file->storeAs('users/', $filename, 'public');
        
    //     $newUser->update([
    //         'image' => $filename
    //     ]);
    // }
    //     return redirect()->route('doctor');
    // }

    //code for getting role
    public function showRegistrationForm()
    {
        $roles = DB::table('roles')->get();
        return view('auth.register',['data'=>$roles]);
    }
}
