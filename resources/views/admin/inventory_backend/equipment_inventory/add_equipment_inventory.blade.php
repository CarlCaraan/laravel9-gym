@extends('admin.admin_master')

@section('title') Add Gym Equipment | Respond Fitness @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add Gym Equipment</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Gym Equipment</li>
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
                        <form class="form-horizontal" method="POST" action="{{ route('equipment.inventory.store') }}">
                            @csrf
                            <div class="add_item">
                                <div class="form-group row">
                                    <div class="form-group col-4">
                                        <label for="facility_id" class="control-label">Facility Location</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="facility_id">
                                            <option disabled value="" selected>Select</option>
                                            <optgroup label="Choose Facility Location">
                                                @foreach ($facilityCategories as $facilityCategory)
                                                <option value="{{ $facilityCategory->id }}">{{ $facilityCategory->name }}</option>
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
                                        <input type="text" class="form-control" name="name[]" placeholder="Name" required>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="dop" class="control-label">Date of Purchase</label>
                                        <input type="date" class="form-control" name="dop[]" placeholder="mm/dd/yyyy" required>
                                        @error('dop')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="equipment_id" class="control-label">Equipment Type</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="equipment_id[]">
                                            <option disabled value="" selected>Select</option>
                                            <optgroup label="Choose Equipment Type">
                                                @foreach ($equipmentCategories as $equipmentCategory)
                                                <option value="{{ $equipmentCategory->id }}">{{ $equipmentCategory->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        @error('equipment_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group-3" style="padding-top: 29px;">
                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Add Equipment</button>
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


<!-- Start Hidden Row Javascript -->
<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

            <div class="form-group row">
                <div class="form-group col-3">
                    <label for="name" class="control-label">Equipment Name</label>
                    <input type="text" class="form-control" name="name[]" placeholder="Name" required>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="dop" class="control-label">Date of Purchase</label>
                    <input type="date" class="form-control" name="dop[]" placeholder="mm/dd/yyyy" required>
                    @error('dop')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="equipment_id" class="control-label">Equipment Type</label>
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="equipment_id[]">
                        <option disabled value="" selected>Select</option>
                        <optgroup label="Choose Equipment Type">
                            @foreach ($equipmentCategories as $equipmentCategory)
                            <option value="{{ $equipmentCategory->id }}">{{ $equipmentCategory->name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @error('equipment_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group-3" style="padding-top: 29px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>
@endsection