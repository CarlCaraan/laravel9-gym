<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function ScheduleAppointmentView()
    {
        $events = array();
        $bookings = Booking::with('all_user')->get();

        foreach ($bookings as $booking) {
            $events[] = [
                'title' => $booking['all_user']['first_name'] . ' ' . $booking['all_user']['last_name'] . ' (' . $booking->price . ')',
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'url' => $booking->url,
                'backgroundColor' => $booking->background_color,
            ];
        }
        return view('admin.booking.view_booking', ['events' => $events]);
    }
}
