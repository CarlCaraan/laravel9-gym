@extends('customer.customer_master')

@section('title') Add Appointment @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <!-- Start Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Appointment</li>
        </ol>
    </nav>
    <!-- End Breadcrumb -->

    <h4 class="mt-4">My Appointments</h4>
    <div class="card mb-5">
        <div class="card-header bg-white pt-4">
            <a href="{{ route('customer.profile.edit') }}" class="btn btn-primary mb-3">
                Add Appointment
            </a>
        </div>
        <div class="card-body py-5">
            <div class="table-responsive">
                <table class="table table-striped" id="appointmentTable">
                    <thead>
                        <tr>
                            <th width="5%">No. of Appointments</th>
                            <th>Appointment Date</th>
                            <th>Start Time</th>
                            <th>Price</th>
                            <th>Paid Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $user)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ date('l - F / d / Y', strtotime($user->start_date)) }}</td>
                            <td>{{ date('h:i A', strtotime($user->start_date)) }}</td>
                            <td>{{ $user->price }}</td>
                            <td><span class="w-100 btn btn-{{($user->status == 'Paid' ? 'success' : 'warning' )}}"> {{ $user->status  }}</span></td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary text-white">Edit</a>
                                <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger text-white" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#appointmentTable').DataTable();
    });
</script>
@endsection