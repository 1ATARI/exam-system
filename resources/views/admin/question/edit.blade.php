@extends('includes.admin.dashboard')

@section('title')
    Edit {{$question->name}} Question
@endsection


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="page-title">
            <div class="">
                <a href="{{route('admin.dashboard')}}"><h6 class="d-inline">Dashboard /</h6></a>
                <a href="{{route('admin.exams.questions.index' , $exam)}}"><h6 class="d-inline">Questions /</h6></a>
                <h6 class="d-inline">Edit {{$question->name}}</h6>
            </div>

        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit "{{$question->name}}" Question </h2>
                    @include('includes.errors')

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="{{route('admin.exams.questions.update' , [$exam , $question])}}" method="post" id="demo-form2" data-parsley-validate=""
                          class="form-horizontal form-label-left" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="name" required="required" class="form-control"
                                       value="{{$question->name}}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="option_a">Option A <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="option_a" name="option_a" required="required" class="form-control"
                                       value="{{$question->option_a}}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="option_b">Option B <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="option_b" name="option_b" required="required" class="form-control"
                                       value="{{$question->option_b}}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="option_c">Option C <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="option_c" name="option_c" required="required" class="form-control"
                                       value="{{$question->option_c}}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="option_d">Option D <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="option_d" name="option_d" required="required" class="form-control"
                                       value="{{$question->option_d}}">
                            </div>
                        </div>




                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="correct">Correct Answer <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="correct" class="form-control" name="correct_answer" required>
                                    <option value="" selected disabled> Select Answers</option>
                                    @php
                                    $options = ['option_a' ,'option_b' ,'option_c' ,'option_d'];


                                    @endphp
                                        @foreach($options as $option)
                                        <option value="{{$option}}" {{$question->correct_answer ==$option ? 'selected' : ''}}>
                                            {{ucfirst(str_replace("option_", "", $option))}}</option>
                                    @endforeach


                                </select>

                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">

                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('assets/custom/ckeditor/ckeditor.js')}}"></script>
    <script>

        // Get the input and select elements
        const optionA = document.getElementById('option_a');
        const optionB = document.getElementById('option_b');
        const optionC = document.getElementById('option_c');
        const optionD = document.getElementById('option_d');
        const select = document.getElementById('correct');

        // Add an event listener to the input elements to listen for changes
        optionA.addEventListener('input', updateOptions);
        optionB.addEventListener('input', updateOptions);
        optionC.addEventListener('input', updateOptions);
        optionD.addEventListener('input', updateOptions);

        function updateOptions() {
            // Get the values of the input fields
            const optionAValue = optionA.value;
            const optionBValue = optionB.value;
            const optionCValue = optionC.value;
            const optionDValue = optionD.value;

            // Update the text of the options
            const optionAElement = select.querySelector('[value="option_a"]');
            optionAElement.textContent = `A- ${optionAValue}`;
            const optionBElement = select.querySelector('[value="option_b"]');
            optionBElement.textContent = `B- ${optionBValue}`;
            const optionCElement = select.querySelector('[value="option_c"]');
            optionCElement.textContent = `C- ${optionCValue}`;
            const optionDElement = select.querySelector('[value="option_d"]');
            optionDElement.textContent = `D- ${optionDValue}`;
        }

    </script>




@endsection
