<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctor = Role::where('name' , 'Doctor')->first();
        $user = User::create([
            'name'=>'super admin',
            'email'=>'ysr757979@gmail.com',
            'password'=>bcrypt('11111111')
        ]);
        $user->roles()->attach($doctor);
    }
}
