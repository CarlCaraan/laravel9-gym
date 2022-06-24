@extends('admin.admin_master')

@section('title') View Trainers | Respond Fitness @endsection

@section('content')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Trainers</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Trainers</li>
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
                    <a class="btn btn-primary" href="{{ route('user.trainers.add') }}">Add Trainers</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID No.</th>
                                    <th>Trainer Avatar</th>
                                    <th>Trainer Name</th>
                                    <th>Trainer Specialization</th>
                                    <th>Facebook Link</th>
                                    <th>Twitter Link</th>
                                    <th>Instagram Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $trainers)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ (!empty($trainers->image)) ? url('upload/user_siteinfo/trainers/'.$trainers->image) : url('upload/user_siteinfo/trainers/default_photo.png') }}" alt="image" class="img-fluid" width="60px">
                                    </td>
                                    <td>{{ $trainers->name }}</td>
                                    <td>{{ $trainers->position }}</td>
                                    <td>{{ $trainers->facebook_link }}</td>
                                    <td>{{ $trainers->twitter_link }}</td>
                                    <td>{{ $trainers->instagram_link }}</td>

                                    <td>
                                        <a href="{{ route('user.trainers.edit', $trainers->id) }}" class="btn btn-primary text-white">Edit</a>
                                        <a href="{{ route('user.trainers.delete', $trainers->id) }}" class="btn btn-danger text-white" id="delete">Delete</a>
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