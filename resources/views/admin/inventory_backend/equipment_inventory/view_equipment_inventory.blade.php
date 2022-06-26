@extends('admin.admin_master')

@section('title') View Gym Equipments | Respond Fitness @endsection

@section('content')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Gym Equipments</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Gym Equipments</li>
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
                    <a class="btn btn-primary" href="{{ route('equipment.inventory.add') }}">Add Equipment</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID No.</th>
                                    <th>Equipment Name</th>
                                    <th>Equipment Type</th>
                                    <th>Facility</th>
                                    <th>Date of Purchase</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allInventories as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value['equipment_category']['name'] }}</td>
                                    <td>{{ $value['facility_category']['name'] }}</td>
                                    <td>{{ date('m-d-Y', strtotime($value->dop)) }}</td>
                                    <td>
                                        <a href="{{ route('equipment.category.edit', $value->id) }}" class="btn btn-primary text-white">Edit</a>
                                        <a href="{{ route('equipment.category.delete', $value->id) }}" class="btn btn-danger text-white" id="delete">Delete</a>
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