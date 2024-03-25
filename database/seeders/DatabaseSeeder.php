<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProfileClinic;
use App\Models\Doctors;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Bryan Hanggara',
            'email' => 'bryan@admin.com',
            'password'=> Hash::make('12345678'),
            'phone_num'=>'08323233',
            'role'=>'ADMIN'
        ]);

        //seeeder profile_clinic
        ProfileClinic::factory()->create([
            'name_clinic'=> 'Klinik Bryan',
            'email'=> 'clinic@bryan.com',
            'doctor' => 'Bryan Hanggara',
            'address' => 'Palembang',
            'unique_code' => '123321'

        ]);
        
        $this->call(DoctorsSeeder::class);
    }
}
