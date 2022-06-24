@extends('admin.admin_master')

@section('title') View Herosection | Respond Fitness @endsection

@section('content')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Herosection</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Herosection</li>
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
                    <a class="btn btn-primary" href="{{ route('user.herosection.add') }}">Add Herosection</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID No.</th>
                                    <th>Main Title</th>
                                    <th width="30%">Body</th>
                                    <th>Background Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key => $herosection)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $herosection->title }}</td>
                                    <td>{{ $herosection->body }}</td>
                                    <td>
                                        <img src="{{ (!empty($herosection->image)) ? url('upload/user_siteinfo/herosection/'.$herosection->image) : url('upload/user_siteinfo/herosection/default_photo.jpg') }}" alt="image" class="img-fluid" width="60px">
                                    </td>
                                    <td>
                                        <a href="{{ route('user.herosection.edit', $herosection->id) }}" class="btn btn-primary text-white">Edit</a>
                                        <a href="{{ route('user.herosection.delete', $herosection->id) }}" class="btn btn-danger text-white" id="delete">Delete</a>
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