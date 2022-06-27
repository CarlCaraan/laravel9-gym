@extends('admin.admin_master')

@section('title') Edit Stocks Inventory | Respond Fitness @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Stocks Inventory</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Stocks Inventory</li>
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('stock.inventory.update') }}">
                        @csrf
                        <!-- Start Filter Search -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Facility</h5>
                                    <div class="controls">
                                        <select name="facility_id" id="facility_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Facility</option>
                                            @foreach ($facilityCategories as $facilityCategory)
                                            <option value="{{ $facilityCategory->id }}">{{ $facilityCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- End Col -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Equipment Category</h5>
                                    <div class="controls">
                                        <select name="equipment_id" id="equipment_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Type</option>

                                        </select>
                                    </div>
                                </div>
                            </div> <!-- End Col -->

                            <div class="col-md-3">
                                <a id="search" class="btn btn-primary text-white" name="search">Search</a>
                            </div> <!-- End Col -->

                        </div> <!-- End Row -->
                        <!-- End Filter Search -->

                        <!-- Start Table -->
                        <div class="row mt-5 d-none" id="generate">
                            <div class="col-md-12">
                                <h4>Filtered Items</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped" id="zero_config" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID No</th>
                                                <th>Equipment Item</th>
                                                <th>Date of Purchase</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody id="generate-tr">

                                        </tbody>
                                    </table>
                                </div>
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>
                        <!-- End Table -->

                    </form>
                </div>
            </div> <!-- End Card -->
        </div> <!-- End Col -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>All Equipment Stocks</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-stripped" id="myTable" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID No</th>
                                    <th>Equipment Item</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipmentInventories as $key => $equipmentInventory)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    <th>{{ $equipmentInventory->name }}</th>
                                    <th>{{ $equipmentInventory->quantity }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br />

<!-- Start Json Show Data Table -->
<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var equipment_id = $('#equipment_id').val();
        var facility_id = $('#facility_id').val();
        $.ajax({
            url: "{{ route('stock.inventory.gettable') }}",
            type: "GET",
            data: {
                'equipment_id': equipment_id,
                'facility_id': facility_id,
            },
            success: function(data) {
                $('#generate').removeClass('d-none');
                var html = '';
                var i = 1;
                $.each(data, function(key, v) {
                    html +=
                        '<tr>' +
                        '<td>' + (i++) + '<input type="hidden" name="id[]" value="' + v.id + '"><input type="hidden" name="facility_id[]" value="' + v.facility_id + '"><input type="hidden" name="equipment_id[]" value="' + v.equipment_id + '"></td>' +
                        '<td>' + v.name + '<input type="hidden" name="name[]" value="' + v.name + '"></td>' +
                        '<td>' + v.dop + '<input type="hidden" name="dop[]" value="' + v.dop + '"></td>' +
                        '<td><input type="number" class="form-control form-control-sm" name="quantity[]" value="' + v.quantity + '" placeholder="0"></td>' +
                        '</tr>';
                });
                html = $('#generate-tr').html(html);
            }
        });
    });
</script>
<!-- End Json Show Data Table -->

<!-- Start Json Get Equipment Type Select Options -->
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#facility_id', function() {
            var facility_id = $('#facility_id').val();
            $.ajax({
                url: "{{ route('stock.inventory.getequipment') }}",
                type: "GET",
                data: {
                    facility_id: facility_id
                },
                success: function(data) {
                    var html = '<option value="" disabled selected>Select Type</option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.equipment_category.id + '">' + v.equipment_category.name + ' (' + v.name + ')' + '</option>';
                    });
                    $('#equipment_id').html(html);
                }
            });
        });
    });
</script>
<!-- End Json Get Equipment Type Select Options -->

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection