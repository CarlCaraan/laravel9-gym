@extends('admin.admin_master')

@section('title') View Appointments | Respond Fitness @endsection

@section('content')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Appointments</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Appointments</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{ route('all.appointment.add') }}">Add Appointment</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID No.</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Appointment Date</th>
                                    <th>Start Time</th>
                                    <th>Pricing</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value['all_user']['first_name'] }} {{ $value['all_user']['last_name'] }}</td>
                                    <td>
                                        <img src="{{ (!empty($value['all_user']['profile_photo_path'])) ? url('upload/user_images/'.$value['all_user']['profile_photo_path']) : asset('admin/assets/images/users/default_photo.jpg') }}" alt="user" class="img-fluid" width="40px">
                                    </td>
                                    <td><span class="w-100 badge badge-{{($value->status == 'Paid' ? 'success' : 'warning' )}}"> {{ $value->status  }}</span></td>
                                    <td>{{ date('l - F / d / Y', strtotime($value->start_date)) }}</td>
                                    <td>{{ date('h:i A', strtotime($value->start_date)) }}</td>
                                    <td>{{ $value->price }}</td>
                                    <td>
                                        <a href="{{ route('user.trainers.edit', $value->id) }}" class="btn btn-primary text-white">Edit</a>
                                        <a href="{{ route('user.trainers.delete', $value->id) }}" class="btn btn-danger text-white" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- End Card -->
        </div>
    </div>
</div>
<br />
@endsection