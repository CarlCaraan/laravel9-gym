@extends('admin.admin_master')

@section('title') View Services | Respond Fitness @endsection

@section('content')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Services</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Services</li>
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
                    <a class="btn btn-primary" href="{{ route('user.services.add') }}">Add Services</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID No.</th>
                                    <th>Main Title</th>
                                    <th width="30%">Body</th>
                                    <th>Service Image Logo</th>
                                    <th>Background Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $services)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $services->title }}</td>
                                    <td>{{ $services->body }}</td>
                                    <td>
                                        <img src="{{ (!empty($services->image)) ? url('upload/user_siteinfo/services/'.$services->image) : url('upload/user_siteinfo/services/default_photo.png') }}" alt="image" class="img-fluid" width="60px">
                                    </td>
                                    <td>
                                        <img src="{{ (!empty($services->background)) ? url('upload/user_siteinfo/services/'.$services->background) : url('upload/user_siteinfo/services/default_photo.png') }}" alt="image" class="img-fluid" width="60px">
                                    </td>
                                    <td>
                                        <a href="{{ route('user.services.edit', $services->id) }}" class="btn btn-primary text-white">Edit</a>
                                        <a href="{{ route('user.services.delete', $services->id) }}" class="btn btn-danger text-white" id="delete">Delete</a>
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