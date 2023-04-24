@extends('includes.admin.dashboard')

@section('title')
Exams
@endsection


@section('styles')

@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href="{{route('admin.exams.index')}}"><h3>Exams </h3></a>
            </div>
            <form action="{{route('admin.exams.index')}}" method="get">

                <div class="title_right">

                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{Request()->search}}"
                                   placeholder="Search for exam...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Go!</button>
                    </span>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">

                        <div class="input-group">


                                <select class="form-control" name="course">
                                    <option value="" selected> All Courses</option>

                                    @foreach($courses as $course)

                                        <option
                                            value="{{$course->id}}" {{Request()->course ==$course->id ? 'selected' :   ''}}>{{$course->name}}</option>

                                    @endforeach


                                </select>

                        </div>
                    </div>

                </div>
            </form>


        </div>

        <div class="clearfix"></div>
        <div class="row" style="display: block;">


            <div class="x_panel">
                <div class="x_title">
                    <h2>exams count<small>{{$exams->total()}}</small></h2><br>


                    <div class="clearfix"></div>
                </div>

                <a href="{{route('admin.exams.create')}}" class="btn btn-round btn-success">Create exam</a>


                <div class="x_content">
                    @if($exams->count() >0)

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Course name</th>
                                <th class="text-center">Duration</th>
                                <th class="text-center">Questions</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center">Action</th>


                            </thead>
                            <tbody>

                            @foreach($exams as $index=>$exam)
                                <tr>
                                    <th scope="row" class="text-center">{{$index+1}}</th>
                                    <td class="text-center" >{{$exam->name}}</td>
                                    <td class="text-center" ><a class="text-primary" href="{{route('admin.courses.index',['search'=>$exam->course->name] )}}">{{ Str::limit($exam->course->name, 15) }}</a> </td>

                                    <td class="text-center">{{$exam->duration}} min</td>
                                    <td class="text-center">{{$exam->questions->count()}}</td>

                                    <td class="text-center">{{$exam->created_at->format('d M Y')}} <small
                                            class="text-success">({{now()->diffInDays($exam->created_at)}}D)</small></td>

                                    <td class="text-center" >


                                        <a class="btn btn-info btn-sm btn-round"
                                           href="{{route('admin.exams.questions.index' , $exam)}}">
                                            <i class="fa fa-table"></i> Questions</a>




                                            <a class="btn btn-warning btn-sm btn-round"
                                               href="{{route('admin.exams.edit' , $exam)}}">
                                                <i class="fa fa-edit"></i> Edit</a>



                                            <button class="btn btn-danger btn-sm btn-round" data-toggle="modal"
                                                    data-target="#delete{{$exam->id}}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>


                                            <form action="{{ route('admin.exams.destroy', $exam) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}


                                                <div class="modal fade" id="delete{{$exam->id}}">
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
                                                                <p>Are you sure you want to delete this exam
                                                                    <b>"{{$exam->name}}"</b></p>
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
                        {!! $exams->appends(request()->query())->links() !!}

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


@endsection
