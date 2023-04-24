@extends('includes.admin.dashboard')

@section('title')
Questions
@endsection


@section('styles')

@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href=""><h3 class="d-inline">{{$exam->name}} </h3></a>

                <a href="{{route('admin.exams.questions.index' ,$exam)}}"><h3 class="d-inline">Questions </h3></a>
            </div>
            <form action="{{route('admin.exams.questions.index' ,$exam)}}" method="get">

                <div class="title_right">

                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{Request()->search}}"
                                   placeholder="Search for question...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Go!</button>
                    </span>
                        </div>
                    </div>


                </div>
            </form>


        </div>

        <div class="clearfix"></div>
        <div class="row" style="display: block;">


            <div class="x_panel">
                <div class="x_title">
                    <h2>Questions count<small>{{$questions->total()}}</small></h2><br>


                    <div class="clearfix"></div>
                </div>

                <a href="{{route('admin.exams.questions.create' , $exam)}}" class="btn btn-round btn-success">Create question</a>



                <button class="btn btn-round btn-success" data-toggle="modal"
                        data-target="#create">
                     Quick Create
                </button>

                <div class="modal fade" id="create">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i
                                        class="fa fa-save"></i>
                                    Create Question</h4>
                                <button type="button" class="close"
                                        data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.exams.questions.store' , $exam)}}" method="post" id="demo-form2" data-parsley-validate=""
                                      class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('post')}}


                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name" name="name" required="required" class="form-control"
                                                   value="{{old('name')}}">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="option_a">Option A <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="option_a" name="option_a" required="required" class="form-control"
                                                   value="{{old('option_a')}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="option_b">Option B <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="option_b" name="option_b" required="required" class="form-control"
                                                   value="{{old('option_b')}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="option_c">Option C <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="option_c" name="option_c" required="required" class="form-control"
                                                   value="{{old('option_c')}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="option_d">Option D <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="option_d" name="option_d" required="required" class="form-control"
                                                   value="{{old('option_d')}}">
                                        </div>
                                    </div>




                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="correct">Correct Answer<span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select id="correct" class="form-control" name="correct_answer" required>
                                                <option value="" selected disabled> Select Answers</option>



                                                <option value="option_a" {{Request()->option_a =='option_a' ? 'selected' :   ''}}>A</option>
                                                <option value="option_b" {{Request()->option_b =='option_b' ? 'selected' :   ''}}>B</option>
                                                <option value="option_c" {{Request()->option_c =='option_c' ? 'selected' :   ''}}>C</option>
                                                <option value="option_d" {{Request()->option_d =='option_d' ? 'selected' :   ''}}>D</option>

                                            </select>

                                        </div>
                                    </div>


                                    <div class="modal-footer justify-content-between">

                                        <button type="button" class="btn btn-success"
                                                data-dismiss="modal">Close
                                        </button>


                                        <button type="submit" class="btn btn-success">
                                            Create
                                        </button>

                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                <div class="x_content">
                    @if($questions->count() >0)

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Option a</th>
                                <th class="text-center">Option b</th>
                                <th class="text-center">Option c</th>
                                <th class="text-center">Option d</th>
                                <th class="text-center">Correct Answer</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center">Action</th>


                            </thead>
                            <tbody>

                            @foreach($questions as $index=>$question)
                                <tr>
                                    <th scope="row" class="text-center">{{$index+1}}</th>
                                    <td class="text-center" >{{ Str::limit($question->name, 20) }}</td>
                                    <td class="text-center " >{{$question->option_a  }}</td>
                                    <td class="text-center" >{{$question->option_b  }}</td>
                                    <td class="text-center" >{{$question->option_c  }}</td>
                                    <td class="text-center" >{{$question->option_d  }}</td>
                                    <td class="text-center text-success" >{{$question->correct  }}</td>
                                    <td class="text-center">{{$question->created_at->format('d M Y')}} <small
                                            class="text-success">({{now()->diffInDays($question->created_at)}}D)</small></td>

                                    <td class="text-center" style="width: 20%;" >


                                        <button class="btn btn-primary btn-sm btn-round" data-toggle="modal"
                                                data-target="#view">
                                                <i class="fa fa-book"></i>
                                            View
                                        </button>
                                        <div class="modal fade" id="view">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><i
                                                                class="fa fa-save"></i>
                                                            Create Question</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-horizontal form-label-left" >



                                                            <div class="item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="view-name">Name <span
                                                                        class="required">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 ">
                                                                    <input type="text" id="view-name" name="name" disabled required="required" class="form-control"
                                                                           value="{{$question->name}}">
                                                                </div>
                                                            </div>

                                                            <div class="item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="view-option_a">Option A
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 ">
                                                                    <input type="text" id="view-option_a" disabled name="option_a" required="required" class="form-control"
                                                                           value="{{$question->option_a}}">
                                                                </div>
                                                            </div>
                                                            <div class="item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="view-option_b">Option B
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 ">
                                                                    <input type="text" id="view-option_b" disabled name="option_b" required="required" class="form-control"
                                                                           value="{{$question->option_b}}">
                                                                </div>
                                                            </div>
                                                            <div class="item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="view-option_c">Option C
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 ">
                                                                    <input type="text" id="view-option_c" disabled name="option_c" required="required" class="form-control"
                                                                           value="{{$question->option_c}}">
                                                                </div>
                                                            </div>
                                                            <div class="item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="view-option_d">Option D</label>
                                                                <div class="col-md-6 col-sm-6 ">
                                                                    <input type="text" id="view-option_d" disabled name="option_d" required="required" class="form-control"
                                                                           value="{{$question->option_d}}">
                                                                </div>
                                                            </div>




                                                            <div class="item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="view-correct">Correct Answer</label>
                                                                <div class="col-md-6 col-sm-6 ">

                                                                    <input type="text" id="view-option_d" disabled name="view-correct" required="required" class="form-control"
                                                                           value="{{$question->correct_answer}}">

                                                                </div>
                                                            </div>


                                                            <div class="modal-footer justify-content-right ">

                                                                <button type="button" class="btn btn-success"
                                                                        data-dismiss="modal">Close
                                                                </button>




                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>



                                        <a class="btn btn-warning btn-sm btn-round"
                                               href="{{route('admin.exams.questions.edit' , [$exam , $question])}}">
                                                <i class="fa fa-edit"></i> Edit</a>



                                            <button class="btn btn-danger btn-sm btn-round" data-toggle="modal"
                                                    data-target="#delete{{$question->id}}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>



                                            <form action="{{ route('admin.exams.questions.destroy', [$exam , $question]) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}


                                                <div class="modal fade" id="delete{{$question->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><i
                                                                        class="fa fa-warning"></i>
                                                                    Confirm Delete</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this question
                                                                    <b>"{{$question->name}}"</b></p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">

                                                                <button type="button" class="btn btn-success"
                                                                        data-dismiss="modal">Close
                                                                </button>


                                                                <button type="submit" class="btn delete btn-danger">
                                                                    Confirm
                                                                </button>

                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </form>





                                    </td>



                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        {!! $questions->appends(request()->query())->links() !!}

                    @else
                        <br>
                        <h3 class="text-center border border-secondary p-3"> No data found</h3>
                    @endif

                </div>
            </div>


        </div>
    </div>

@endsection


@section('js')
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
