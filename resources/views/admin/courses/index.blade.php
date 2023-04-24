@extends('includes.admin.dashboard')

@section('title')
Courses
@endsection


@section('styles')
    <style>
        .preview-image {
            max-width: 100%;
            max-height: 100%;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .preview-image:hover {
            transform: scale(1.05);
        }

    </style>

@endsection

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href="{{route('admin.courses.index')}}"><h3>Courses </h3></a>
            </div>
            <form action="{{route('admin.courses.index')}}" method="get">

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{Request()->search}}"
                                   placeholder="Search for course...">
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
                    <h2>courses count<small>{{$courses->total()}}</small></h2><br>


                    <div class="clearfix"></div>
                </div>

                <a href="{{route('admin.courses.create')}}" class="btn btn-round btn-success">Create course</a>


                <div class="x_content">
                    @if($courses->count() >0)

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">image</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Exams</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Action</th>


                            </thead>
                            <tbody>

                            @foreach($courses as $index=>$course)
                                <tr>
                                    <th scope="row" class="text-center">{{$index+1}}</th>
                                    <td class="text-center" >{{ Str::limit($course->name, 15) }}</td>
                                    <td class="text-center "><img  onclick="openModal(this.src)" src="{{$course->image_path}}"
                                                                  style="width: 50px; height: 50px" class="preview-image img-thumbnail">
                                    </td>
                                    <td class="pl-5 pr-5 " style="width: 30%">
                                        <div class="text-center" style="height: 10%;  overflow:hidden;"> {!! Str::limit($course->description, 40) !!} </div>
                                    </td>
                                    <td class="text-center" ><a href="{{route('admin.exams.index' , ['course'=>$course->id])}}">{{$course->exams->count()}}</a></td>
                                    <td class="text-center">{{$course->created_at->format('d M Y')}}</td>
                                    <td class="text-center"style="width: 20%" >


                                            <a class="btn btn-primary btn-sm btn-round"
                                               href="{{route('admin.courses.show' , $course)}}">
                                                <i class="fa fa-book"></i> View</a>


                                            <a class="btn btn-warning btn-sm btn-round"
                                               href="{{route('admin.courses.edit' , $course)}}">
                                                <i class="fa fa-edit"></i> Edit</a>



                                            <button class="btn btn-danger btn-sm btn-round" data-toggle="modal"
                                                    data-target="#delete{{$course->id}}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>


                                            <form action="{{ route('admin.courses.destroy', $course) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}


                                                <div class="modal fade" id="delete{{$course->id}}">
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
                                                                <p>Are you sure you want to delete this course
                                                                    <b>"{{$course->name}}"</b></p>
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
                        {!! $courses->appends(request()->query())->links() !!}

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
        function openModal(src) {
            var modal = document.createElement("div");
            modal.style.position = "fixed";
            modal.style.top = "0";
            modal.style.bottom = "0";
            modal.style.left = "0";
            modal.style.right = "0";
            modal.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
            modal.style.zIndex = "9999";
            modal.onclick = function() {
                closeModal(modal);
            };

            var img = document.createElement("img");
            img.style.position = "fixed";
            img.style.top = "50%";
            img.style.left = "50%";
            img.style.transform = "translate(-50%, -50%)";
            img.style.maxWidth = "80%";
            img.style.maxHeight = "80%";
            img.style.display = "block";
            img.style.margin = "auto";
            img.src = src;

            modal.appendChild(img);
            document.body.appendChild(modal);
        }

        function closeModal(modal) {
            modal.parentElement.removeChild(modal);
        }
    </script>


@endsection
