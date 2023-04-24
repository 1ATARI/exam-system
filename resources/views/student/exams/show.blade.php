@extends('includes.admin.dashboard')

@section('title' , $exam->name)

@section('styles')

@endsection

@section('content')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$exam->name}}  Exam</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Your Score {{$exam->results->result . '/' . $exam->results->questions}}     Percentage {{$exam->results->percentage}}% </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                            @forelse($exam->questions as $index=>$question)
                                <div class="card my-3">
                                    <div class="card-body">


                                        <p class="font-weight-bold"> Correct Answer is {{ ucwords( str_replace('_' , ' ' ,$question->correct_answer)) }}</p>

                                        <h5 class="card-title">{{$index+1}}- {{ $question->name }}</h5>
                                        <div class="form-group">
                                            <div class="form-check">
                                               <input class="form-check-input" disabled type="radio"  id="option_a_{{ $question->id }}" @if($question->userAnswer && $question->userAnswer->user_answer === 'option_a') checked @endif value="option_a" >
                                                <label class="form-check-label" for="option_a_{{ $question->id }}">
                                                    {{ $question->option_a }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" disabled type="radio" id="option_b_{{ $question->id }}" {{$question->userAnswer && $question->userAnswer->user_answer === 'option_b'? 'checked':''}} value="option_b">
                                                <label class="form-check-label" for="option_b_{{ $question->id }}">
                                                    {{ $question->option_b }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" disabled type="radio" id="option_c_{{ $question->id }}" {{$question->userAnswer && $question->userAnswer->user_answer === 'option_c'? 'checked':''}} value="option_c">
                                                <label class="form-check-label" for="option_c_{{ $question->id }}">
                                                    {{ $question->option_c }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" disabled type="radio"  id="option_d_{{ $question->id }}" {{$question->userAnswer && $question->userAnswer->user_answer === 'option_d'? 'checked':''}} value="option_d">
                                                <label class="form-check-label" for="option_d_{{ $question->id }}">
                                                    {{ $question->option_d }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h5 class="card-title m-5 text-center ">There are no questions yet</h5>

                            @endforelse

                        </div>


                    </div>
                </div>
            </div>
        </div>



@endsection


@section('js')


@endsection
