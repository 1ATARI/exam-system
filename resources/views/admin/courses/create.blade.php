@extends('includes.admin.dashboard')

@section('title')
Create Course
@endsection


@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Course </h2>
                    @include('includes.errors')

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="{{route('admin.courses.store')}}" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('post')}}


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="name" required="required" class="form-control" value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Email">Image <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" name="image" accept="image/*" class=" image" >
                            </div>
                        </div>

                        <div class="item form-group text-center">

                            <div class="col-md-6 col-sm-6 ml-5">

                                <img src="{{asset('uploads/courses_image/course.png')}}" width="100px" height="100px" class="image img-thumbnail image-preview" >
                            </div>
                        </div>




                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea type="text" id="body" name="description" required="required" class="form-control ckeditor" >{{old('description')}}</textarea>
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


    <script>
        $(".image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });
    </script>
@endsection
