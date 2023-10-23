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
            'email'                 => 'admin@test.test',
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

        User::create([
            'email'                 => 'guru@test.test',
            'password'              => 'password',
            'nama_lengkap'          => 'Guru',
            'kelas'                 => null,
            'role'                  => 'guru',
            'nisn'                  => null,
            'no_hp'                 => '082114578976',
            'no_ktp_orang_tua_wali' => null,
            'nama_orang_tua_wali'   => null,
            'no_hp_orang_tua_wali'  => null,
            'created_by'            => 1,
        ]);

        User::create([
            'email'                 => 'siswa@test.test',
            'password'              => 'password',
            'nama_lengkap'          => 'Siswa',
            'kelas'                 => '7',
            'role'                  => 'siswa',
            'nisn'                  => 123456789,
            'no_hp'                 => '082114578976',
            'no_ktp_orang_tua_wali' => 123456789,
            'nama_orang_tua_wali'   => 'Orang Tua Siswa',
            'no_hp_orang_tua_wali'  => '085603355799',
            'created_by'            => 1,
        ]);
    }
}
