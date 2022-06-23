@extends('admin.admin_master')

@section('title') Account Settings | Profile @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Profile</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->

<!-- Container fluid  -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <form class="form-horizontal" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">Basic Information</h4>
                            <br />
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label">Profile Avatar</label>
                                <div class="col-md-9 text-left">
                                    <img class="rounded-circle mb-3" style="width: 90px; height: 90px;" id="show_image" src="{{ (!empty($editData->profile_photo_path)) ? url('upload/user_images/'.$editData->profile_photo_path) : asset('admin/assets/images/users/default_photo.jpg') }}" alt="User Avatar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <a href="{{ route('remove.avatar') }}" class="btn btn-secondary">Remove</a>
                                </div>
                            </div>
                            <br />
                            <br />
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $editData->first_name }}">
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $editData->last_name }}">
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ $editData->email }}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="gender">
                                        <option disabled value="">Select</option>
                                        <optgroup label="Choose your gender">
                                            <option value="Male" {{ ($editData->gender == "Male") ? "selected" : ""}}>Male</option>
                                            <option value="Female" {{ ($editData->gender == "Female") ? "selected" : ""}}>Female</option>
                                        </optgroup>
                                    </select>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_type" class="col-sm-3 text-right control-label col-form-label">User Role</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="user_type">
                                        <option disabled value="">Select</option>
                                        <optgroup label="Choose your role">
                                            <option value="Admin" {{ ($editData->user_type == "Admin") ? "selected" : ""}}>Admin</option>
                                            <option value="Customer" {{ ($editData->user_type == "Customer") ? "selected" : ""}}>Customer</option>
                                        </optgroup>
                                    </select>
                                    @error('user_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-6">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.password.update') }}">
                            @csrf
                            <h4 class="card-title">Change Password</h4>
                            <br />
                            <div class="form-group row">
                                <label for="current_password" class="col-sm-3 text-right control-label col-form-label">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="old_password" id="current_password" placeholder="Current Password">
                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password">
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br />

<script>
    // Show Chosen Image Ajax
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection