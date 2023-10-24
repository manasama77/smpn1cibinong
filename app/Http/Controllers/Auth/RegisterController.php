<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lengkap'          => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'kelas'                 => ['required'],
            'nisn'                  => ['required'],
            'no_hp'                 => ['required'],
            'nama_orang_tua_wali'   => ['required', 'string', 'max:255'],
            'no_ktp_orang_tua_wali' => ['required'],
            'no_hp_orang_tua_wali'  => ['required'],
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
        return User::create([
            'nama_lengkap'          => $data['nama_lengkap'],
            'email'                 => $data['email'],
            'password'              => Hash::make($data['password']),
            'kelas'                 => $data['kelas'],
            'no_hp'                 => $data['no_hp'],
            'nisn'                  => $data['nisn'],
            'no_hp_orang_tua_wali'  => $data['no_hp_orang_tua_wali'],
            'no_ktp_orang_tua_wali' => $data['no_ktp_orang_tua_wali'],
            'nama_orang_tua_wali'   => $data['nama_orang_tua_wali'],
            'role'                  => 'siswa',
        ]);
    }
}
