@extends('customer.customer_master')

@section('title') Add Appointment @endsection

@section('content')
<div class="container">
    <h4 class="mt-4">My Appointments</h4>
    <div class="card mb-5">
        <div class="card-header bg-white pt-4">
            <a href="{{ route('customer.profile.edit') }}" class="btn btn-primary mb-3">
                Add Appointment
            </a>
        </div>
        <div class="card-body py-5">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
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
@endsection