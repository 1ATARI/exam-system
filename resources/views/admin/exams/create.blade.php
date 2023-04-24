@extends('includes.admin.dashboard')

@section('title')
    Create Exam
@endsection


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="page-title">
            <div class="">
                <a href="{{route('admin.dashboard')}}"><h6 class="d-inline">Dashboard /</h6></a>
                <a href="{{route('admin.exams.index')}}"><h6 class="d-inline">Exams /</h6></a>
                <h6 class="d-inline">Create </h6>
            </div>

        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Exam </h2>
                    @include('includes.errors')

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="{{route('admin.exams.store')}}" method="post" id="demo-form2" data-parsley-validate=""
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="course">Course <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="course_id" class="form-control" name="course_id" required>
                                    <option value="" selected> All Courses</option>

                                    @foreach($courses as $course)

                                        <option
                                            value="{{$course->id}}" {{Request()->course_id ==$course->id ? 'selected' :   ''}}>{{$course->name}}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="duration">Duration <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="duration" step="1" min="1" max="600" name="duration"
                                       required="required" class="form-control" value="{{old('duration')}}">
                                <small> In Minute</small>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">

                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')

@endsection
