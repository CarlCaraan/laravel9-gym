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
        $bookings = Booking::with('user')->get();

        foreach ($bookings as $booking) {
            if ($booking->price == "60") {
                $price = "4hrs - ₱60";
            } else if ($booking->price == "50") {
                $price = "3hrs - ₱50";
            } else {
                $price = "2hrs - ₱40";
            }

            $events[] = [
                'title' => $booking['user']['first_name'] . ' ' . $booking['user']['last_name'] . ' (' . $price . ')',
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'url' => $booking->url,
                'backgroundColor' => $booking->background_color,
            ];
        }
        return view('admin.booking.view_booking', ['events' => $events]);
    }
}
