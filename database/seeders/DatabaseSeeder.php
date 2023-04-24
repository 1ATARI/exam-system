<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            CourseSeeder::class,
            ExamSeeder::class,
        ]);
        $users = User::all();
        foreach ($users as $user){
            $user->roles()->attach(rand(1,2));

        }


    }
}
