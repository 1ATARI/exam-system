<?php

namespace App\Services\admin;


use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseServices
{
    public function store(StoreCourseRequest $request)
    {

        $request_data = $request->except(['image']);

        if ($request->image) {
            $request_data['image'] = $request->file('image')->store('courses_image', 'public_uploads');
        }
        $request_data['user_id'] = Auth::id();

        Course::create($request_data);
        Flasher::addSuccess('Course created successfully.');

    }

    public function update( $request , $course)
    {
        $request_data = $request->except(['image']);

        if ($request->image) {
            if($course->image != 'courses_image/course.png'){

                Storage::disk('public_uploads')->delete($course->image);


            }
            $request_data['image'] = $request->file('image')->store('courses_image', 'public_uploads');

        }

         $course->update($request_data);
        Flasher::addSuccess('Course updated successfully.');

    }

    public function destroy($course)
    {
        if($course->image != 'courses_image/course.png'){

            Storage::disk('public_uploads')->delete( $course->image);
        }
        $course->delete();
        Flasher::addSuccess($course->name.' Course deleted successfully.');

    }


}
