<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function redirectTo()
    {
        if (Auth::user()->hasRole('admin'))
        {
            return route('dashboard_admin');
        }
        else if (Auth::user()->hasRole('pencari kerja'))
        {
            return route('dashboard_pencari_kerja');
        }
        else if (Auth::user()->hasRole('pemberi kerja'))
        {
            return route('dashboard_pemberi_kerja');
        }
        
        return route('home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        // dd($data);
        $image = $data['profile_picture'];
        $imgName = time() . '.' . $request->file('imgPhotoProfile')->getClientOriginalExtension();
        Storage::disk('local')->put("public/$imgName", \file_get_contents($image));
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'url_foto_profile' => $imgName,
            'password' => Hash::make($data['password']),
            'telepon' => $data['telepon'],
        ]);

        if ($data['roles'] == 1){
            $user->assignRole('admin');
        }
        else if($data['roles'] == 2){
            $user->assignRole('pencari kerja');
        }
        else if($data['roles'] == 3){
            $user->assignRole('pemberi kerja');
        }
        return $user;
    }
}
