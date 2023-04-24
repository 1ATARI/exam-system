@extends('includes.admin.dashboard')

@section('title')
    my Exams
@endsection


@section('styles')

@endsection

@section('content')



    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href="{{route('student.exams.index')}}"><h3>Exams </h3></a>
            </div>
            <form action="{{route('student.exams.index')}}" method="get">

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

                                @foreach($results as $result)

                                    <option
                                        value="{{$result->exam->course->id}}" {{Request()->course ==$result->exam->course->id ? 'selected' :   ''}}>{{$result->exam->course->name}}</option>

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
                    <h2>exams count<small>{{$results->total()}}</small></h2><br>


                    <div class="clearfix"></div>
                </div>



                <div class="x_content">
                    @if($results->count() >0)

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Exam Name</th>
                                <th class="text-center">Course name</th>
                                <th class="text-center">Duration</th>
                                <th class="text-center">Percentage</th>
                                <th class="text-center">Score</th>
                                <th class="text-center">Questions</th>
                                <th class="text-center">Applied at</th>
                                <th class="text-center">See exam</th>


                            </thead>
                            <tbody>

                            @foreach($results as $index=>$result)
                                <tr>

                                    <th scope="row" class="text-center">{{$index+1}}</th>
                                    <td class="text-center" >{{$result->exam->name}}</td>
                                    <td class="text-center" >{{$result->exam->course->name}} </td>
                                    <td class="text-center" >{{$result->exam->duration}} </td>
                                    <td class="text-center" >{{$result->percentage}} %</td>
                                    <td class="text-center" >{{$result->result}} </td>
                                    <td class="text-center" >{{$result->questions}} </td>
                                    <td class="text-center" >{{$result->created_at->format('Y-m-d H:i')}} </td>
                                    <td class="text-center" >

                                    <a class="btn btn-info btn-sm btn-round"
                                       href="{{route('student.exams.show' , $result->exam)}}">
                                        <i class="fa fa-table"></i> Show</a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        {!! $results->appends(request()->query())->links() !!}

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
