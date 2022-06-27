@extends('admin.admin_master')

@section('title') Edit Gym Equipment | Respond Fitness @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Gym Equipment</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Gym Equipment</li>
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
                <div class="card-body">
                    <div class="col-12">
                        <form class="form-horizontal" method="POST" action="{{ route('equipment.inventory.update', $editData->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="form-group col-4">
                                    <img class="img-thumbnail mb-3" style="width: 200; height: 200;" src="{{ (!empty($editData->image)) ? url('upload/inventory/'.$editData->image) : url('upload/inventory/default_photo.png') }}" id="show_image" alt="image">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <a href="{{ route('equipment.inventory.remove_image', $editData->id) }}" class="btn btn-secondary mt-2">Remove</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-4">
                                    <label for="facility_id" class="control-label">Facility Location</label>
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="facility_id">
                                        <option disabled value="" selected>Select</option>
                                        <optgroup label="Choose Facility Location">
                                            @foreach ($facilityCategories as $facilityCategory)
                                            <option value="{{ $facilityCategory->id }}" {{ ($editData->facility_id == $facilityCategory->id) ? 'selected' : ''}}>{{ $facilityCategory->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('facility_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-3">
                                    <label for="name" class="control-label">Equipment Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $editData->name }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="dop" class="control-label">Date of Purchase</label>
                                    <input type="date" class="form-control" name="dop" placeholder="mm/dd/yyyy" value="{{ $editData->dop }}">
                                    @error('dop')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="equipment_id" class="control-label">Equipment Type</label>
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="equipment_id">
                                        <option disabled value="" selected>Select</option>
                                        <optgroup label="Choose Equipment Type">
                                            @foreach ($equipmentCategories as $equipmentCategory)
                                            <option value="{{ $equipmentCategory->id }}" {{ ($editData->equipment_id == $equipmentCategory->id) ? 'selected' : ''}}> {{ $equipmentCategory->name  }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('equipment_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Update Equipment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- End Card -->
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