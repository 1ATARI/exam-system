<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name'=>'Doctor',
            'description'=>'This is Doctor will be able to see admin dashboard'
        ]);
        Role::create([
            'name'=>'Student',
            'description'=>'This is student will be assign automatically to register users'
        ]);

    }
}
