<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email'                 => 'adam.pm77@gmail.com',
            'password'              => 'password',
            'nama_lengkap'          => 'Admin',
            'kelas'                 => null,
            'role'                  => 'admin',
            'nisn'                  => null,
            'no_hp'                 => '082114578976',
            'no_ktp_orang_tua_wali' => null,
            'nama_orang_tua_wali'   => null,
            'no_hp_orang_tua_wali'  => null,
            'created_by'            => 1,
        ]);
    }
}
