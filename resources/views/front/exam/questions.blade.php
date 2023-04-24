
@extends('includes.front.dashboard')


@section('styles')

    <style>
        .timer {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            color: #fff;
            background-color: #333;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .timer span {
            display: inline-block;
            margin: 0 1rem;
            text-align: center;
            font-weight: bold;
            position: relative;
        }

        .timer span:before {
            content: '';
            display: block;
            height: 2px;
            width: 100%;
            background-color: #fff;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .timer {
                font-size: 1rem;
            }
        }
    </style>
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container mb-5 mt-5">



        <h1 class="m-5">{{$exam->name}} Exam Questions</h1>
    <form class="exam-form" action="{{ route('exams.submit', ['exam'=>$exam ,'session'=>$session ]) }}" method="post">

        <div class="timer">
            Time remaining
            <span class="hours"></span>
            <span>:</span>
            <span class="minutes"></span>
            <span>:</span>
            <span class="seconds"></span>
        </div>
        @csrf
        <input type="hidden" name="session" value="{{ $session }}">
        @forelse($questions as $index=>$question)
            <div class="card my-3">
                <div class="card-body">


                    <h5 class="card-title">{{$index+1}}- {{ $question->name }}</h5>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" id="option_a_{{ $question->id }}" value="option_a" >
                            <label class="form-check-label" for="option_a_{{ $question->id }}">
                                {{ $question->option_a }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" id="option_b_{{ $question->id }}" value="option_b">
                            <label class="form-check-label" for="option_b_{{ $question->id }}">
                                {{ $question->option_b }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" id="option_c_{{ $question->id }}" value="option_c">
                            <label class="form-check-label" for="option_c_{{ $question->id }}">
                                {{ $question->option_c }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" id="option_d_{{ $question->id }}" value="option_d">
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
        <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5">Submit</button>
        </div>
    </form>
</div>



@endsection
@section('js')



    <script>
        var examDuration = {{ $exam->duration }}; // duration of the exam in minutes
        var endTime = new Date();
        endTime.setMinutes(endTime.getMinutes() + examDuration); // set the end time of the exam

        setTimeout(function() {
            document.querySelector('.exam-form').submit(); // submit the exam answers form
        }, endTime - new Date());
    </script>

    <script>
        // Get the timestamp of the end time
        var myTime = new Date("{{ $session->end_time }}".replace(' ', 'T') + "Z").getTime();

        // Update the count down every 1 second
        var countdownInterval = setInterval(function() {

            // Get the current time
            var now = new Date().getTime();

            // Calculate the time remaining
            var distance = myTime - now;

            // Check if the countdown is over
            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById("timer").innerHTML = "Time's up!";
            } else {
                // Calculate the remaining days, hours, minutes and seconds
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the remaining time
                document.querySelector(".hours").innerHTML = hours + "h ";
                document.querySelector(".minutes").innerHTML = minutes + "m ";
                document.querySelector(".seconds").innerHTML = seconds + "s ";
            }
        }, 1000);

    </script>
@endsection

