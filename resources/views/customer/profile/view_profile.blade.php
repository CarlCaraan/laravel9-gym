@extends('customer.customer_master')

@section('title') {{ Auth::user()->first_name . " " . Auth::user()->last_name }} | Profile @endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-5">
        <div class="card-header bg-white pt-4">
            <small class="text-muted float-end">Last Updated: {{ date('d-m-Y', strtotime($user->updated_at)) }}</small>
            <a href="{{ route('customer.profile.edit') }}" class="btn btn-primary mb-3">
                Edit Profile
            </a>
        </div>
        <div class="card-body py-5">
            <div class="row py-5">
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
@endsection