<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('includes.admin.sidebar', function ($view){
                $view->with('courses' , Course::limit(5)->get());
                $view->with('exams' , Exam::limit(5)->get());


        });

    }
}
