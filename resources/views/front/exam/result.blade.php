@extends('includes.front.dashboard')


@section('styles')

@endsection
@section('content')



    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="display-1">{{ $exam->name }} Result</h1>
                    <h1 class="mb-4">Your score: {{ $score }} out of {{ $exam->questions->count() }}</h1>
                    <h2 class="mb-4">Percentage: {{ $percentage }}% </h2>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('courses.show' , $exam->course )}}"> Back to Course</a>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
