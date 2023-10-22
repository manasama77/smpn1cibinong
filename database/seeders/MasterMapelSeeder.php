<?php

namespace Database\Seeders;

use App\Models\MasterMapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterMapel::create([
            'name'       => 'Bahasa Indonesia',
            'created_by' => 1,
        ]);

        MasterMapel::create([
            'name'       => 'Bahasa Inggris',
            'created_by' => 1,
        ]);

        MasterMapel::create([
            'name'       => 'Matematika',
            'created_by' => 1,
        ]);
    }
}
