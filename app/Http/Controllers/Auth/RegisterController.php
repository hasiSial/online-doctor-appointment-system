<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function redirectTo()
    {
        if (auth()->user()->role_id == 1) {
            return '/doctors/create';
        } elseif (auth()->user()->role_id == 2) {
            return '/home';
        }

        return '/';
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            // Validation rules for registration fields
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function create(array $data)
    {
        $newUser = User::create($data);

        if ($newUser->role_id == '2')
        {
            $patient = Patient::create([
                'user_id' => $newUser->id,
                'patient_name' => $newUser->first_name . ' ' . $newUser->last_name,
                'patient_age' => $newUser->age,
            ]);

        }

        // Check if an image is uploaded
        if(isset($data['image'])) {
            $file = $data['image'];
            $filename = hexdec(uniqid()) . '.' . $file->extension();
            dd($filename );

            $file->storeAs('users/', $filename, 'public');

            $newUser->update([
                'image' => $filename
            ]);
        }


        return $newUser;
    }

    //code for getting role
    public function showRegistrationForm()
    {
        $roles = DB::table('roles')->get();
        return view('auth.register',['data'=>$roles]);
    }
}
