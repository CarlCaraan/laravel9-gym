@extends('admin.admin_master')

@section('title') View Facilities | Respond Fitness @endsection

@section('content')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Facilities</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Facilities</li>
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
                    <a class="btn btn-primary" href="{{ route('user.facilities.add') }}">Add Facilities</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID No.</th>
                                    <th>Facility Name</th>
                                    <th>Facility Title</th>
                                    <th width="30%">Facility Body</th>
                                    <th>Facility Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $facilities)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $facilities->name }}</td>
                                    <td>{{ $facilities->title }}</td>
                                    <td>{{ $facilities->body }}</td>
                                    <td>
                                        <img src="{{ (!empty($facilities->image)) ? url('upload/user_siteinfo/facilities/'.$facilities->image) : url('upload/user_siteinfo/facilities/default_photo.png') }}" alt="image" class="img-fluid" width="60px">
                                    </td>
                                    <td>
                                        <a href="{{ route('user.facilities.edit', $facilities->id) }}" class="btn btn-primary text-white">Edit</a>
                                        <a href="{{ route('user.facilities.delete', $facilities->id) }}" class="btn btn-danger text-white" id="delete">Delete</a>
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