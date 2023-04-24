@extends('includes.admin.dashboard')

@section('title' , 'Create User')



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


    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create User </h2>
                    @include('includes.errors')

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="{{route('admin.users.store')}}" method="post"  data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('POST')}}


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="name" required="required" class="form-control " value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="email" id="Email" name="email" required="required" class="form-control " value="{{old('email')}}">
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

                                <img src="{{asset('uploads/users_image/user.png')}}" width="100px" height="100px" class="image img-thumbnail image-preview" >
                            </div>
                        </div>




                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" id="password" name="password" required="required" class="form-control ">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password_confirmation">Password Confirmation <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" id="password_confirmation" name="password_confirmation" required="required" class="form-control ">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align ">Role</label>
                            <div class="col-md-6 col-sm-6 ">

                                <select class="form-control" name="role">



                                    <option selected disabled> Select Role</option>


                                    @foreach($roles as $role)


                                        <option value="{{$role->id}}" {{request()->role}}>{{$role->name}}</option>

                                    @endforeach




                                </select>
                            </div>
                        </div>



                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">

                                <button type="submit" class="btn btn-success">Submit</button>
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
