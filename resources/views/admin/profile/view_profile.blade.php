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
            <h4>Basic Information</h4>

            <img class="rounded-circle mb-3" style="width: 90px; height: 90px;" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : asset('admin/assets/images/users/1.jpg') }}" alt="User Avatar">
            <p>First Name: {{ $user->first_name }}</p>
            <p>Last Name: {{ $user->last_name }}</p>
            <p>Email Address: {{ $user->email }}</p>
            <p>Gender: {{ $user->gender }}</p>
            <p>Role: {{ $user->user_type }}</p>
            <p>Joined: {{ date('d-m-Y', strtotime($user->created_at)) }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-info">
                Edit Profile
            </a>
        </div>
    </div>
</div>
<br />
@endsection