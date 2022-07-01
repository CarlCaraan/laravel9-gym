@extends('admin.admin_master')

@section('title') View Booking Schedule | Respond Fitness @endsection

@section('content')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Booking Schedule</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Booking Schedule</li>
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
            <div class="mb-2"><strong>LEGENDS</strong> - Paid: <span class="badge badge-pill badge-success">@</span>
                Not Paid: <span class="badge badge-pill badge-danger">@</span>
            </div>
            <div id="calendar">

            </div>
        </div>
    </div>
</div>
<br />

<!-- <script>
    $(document).ready(function() {
        var booking = @json($events);
        console.log(booking);
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay',
                },
            events: booking
        })
    });
</script> -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var booking = @json($events);

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
                right: 'today prev,next',
                center: 'title',
            }, // buttons for switching between views
            events: booking,
            // eventDidMount: function(info) {
            //     console.log(info.event.extendedProps); {
            //         status: booking
            //     }
            // }
        });
        calendar.render();
    });
</script>
@endsection