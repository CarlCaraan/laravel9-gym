<?php

namespace App\Http\Controllers\Customer\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class CustomerAppointmentController extends Controller
{
    public function CustomerAppointmentView()
    {
        $data['allData'] = Booking::where('user_id', Auth()->user()->id)->get();
        return view('customer.booking.view_appointment', $data);
    }
}
