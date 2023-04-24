@extends('includes.front.dashboard')


@section('styles')

@endsection
@section('content')

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="display-1">{{$exam->course->name}} Course</h1>
                    <h1 class="mb-4">Confirm taking {{$exam->name}} Exam</h1>
                    <p class="mb-4">Are tou sure you want to take this exam </p>
                    <p class="mb-4">By processing the time will start, and you will not able to stop it </p>
                    @if ($session)
                        <a class="btn btn-primary rounded-pill py-3 px-5"
                           href="{{route('exams.questions', ['id' => $exam->id])}}">Continue
                            Your Exam</a>
                    @elseif($passed)
                        <a class="btn btn-primary rounded-pill py-3 px-5  disabled"> You have attempted this exam</a>
                    @else
                        <a class="btn btn-primary rounded-pill py-3 px-5  " href="{{route('exams.start' , $exam)}}">
                            Confirm</a>

                    @endif


                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
