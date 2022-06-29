@extends('customer.customer_master')

@section('title') View Appointment @endsection

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
            <a href="{{ route('customer.appointment.add') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus-circle"></i> Add
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
                            <th></th>
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
                                @if ($user->status == "Paid")
                                <a href="{{ route('customer.appointment.receipt', $user->id) }}" class="btn btn-secondary text-white w-100">Receipt</a>
                                @else
                                <a href="{{ route('customer.appointment.edit', $user->id) }}" class="btn btn-primary text-white w-100">Change</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('customer.appointment.delete', $user->id) }}" class="btn btn-secondary rounded-circle text-white" id="delete">X</a>
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