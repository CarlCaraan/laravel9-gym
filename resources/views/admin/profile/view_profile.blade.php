@extends('admin.admin_master')

@section('title') {{ Auth::user()->first_name . " " . Auth::user()->last_name }} | Profile @endsection

@section('content')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">My Profile</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->

<!-- Container fluid  -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <small class="text-muted float-right">Last Updated: {{ date('d-m-Y', strtotime($user->updated_at)) }}</small>
            <a href="{{ route('profile.edit') }}" class="btn btn-info mb-3">
                Edit Profile
            </a>
            <div class="row">
                <div class="col-md-3">
                    <img class="img-thumbnail mb-3" style="width: 300px; height: 300px;" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : asset('admin/assets/images/users/default_photo.jpg') }}" alt="User Avatar">
                </div>
                <div class="col-md-9">
                    <h4 class="mb-4">Basic Information</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name" class="form-label">First Name</label>
                                <input class="form-control" type="text" disabled value="{{ $user->first_name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input class="form-control" type="text" disabled value="{{ $user->last_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input class="form-control" type="text" disabled value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender</label>
                                <input class="form-control" type="text" disabled value="{{ $user->gender }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_type" class="form-label">Role</label>
                                <input class="form-control" type="text" disabled value="{{ $user->user_type }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="created_at" class="form-label">Joined</label>
                                <input class="form-control" type="text" disabled value="{{ date('d-m-Y', strtotime($user->created_at)) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<br />
@endsection