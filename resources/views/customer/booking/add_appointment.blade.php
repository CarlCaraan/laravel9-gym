@extends('customer.customer_master')

@section('title') Add Appointment @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <!-- Start Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('customer.appointment.view') }}">My Appointments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Appointment</li>
        </ol>
    </nav>
    <!-- End Breadcrumb -->

    <h4 class="mt-4">Add Appointment</h4>
    <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-header">
                <span class="fw-bold">Fill up Information</span><br />
                <small>Note: Payment (Walk in)</small>
            </div>
            <div class="card-body py-5">
                <form class="form-horizontal" method="POST" action="{{ route('customer.appointment.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="start_date" class="col-sm-3 text-right control-label col-form-label">Start Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="start_date" id="flatpickr" placeholder="YYYY-mm-dd H:m:s">
                            @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <br />
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 text-right control-label col-form-label">Pricing</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select" style="width: 100%; height:36px;" name="price">
                                <option disabled value="" selected>Select No. Hours</option>
                                <optgroup label="Choose price">
                                    <option value="2hrs - ₱40">2 hrs (₱40)</option>
                                    <option value="3hrs - ₱50">3 hrs (₱50)</option>
                                    <option value="4hrs - ₱60">4 hrs (₱60)</option>
                                </optgroup>
                            </select>
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="border-top mt-5">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Start Map -->
    <h4 class="mt-4">Our Location</h4>
    <div class="card">
        <div class="card-body">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1624.297720341757!2d121.4233351783334!3d14.470167290867632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ede770f44977%3A0x433639bed3b68662!2sSeven%20Eleven!5e0!3m2!1sen!2sph!4v1656480536182!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- End Map -->
</div>
<script>
    $(document).ready(function() {
        $('#appointmentTable').DataTable();
    });
</script>
<script>
    flatpickr('#flatpickr', {
        enableTime: true,
        enableSeconds: true
    })
</script>
@endsection