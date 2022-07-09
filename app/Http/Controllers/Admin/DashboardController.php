<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function DashboardView()
    {
        $data['user_count'] = User::all()->count();
        $data['customer_count'] = User::where('user_type', 'Customer')->get()->count();
        $data['pending_count'] = Booking::where('status', 'Not Paid')->get()->count();
        $data['moderator_count'] = User::where('user_type', 'Admin')->get()->count();
        $data['total_appointment_count'] = Booking::all()->count();
        $data['total_income'] = Booking::sum('price');
        return view('admin.index', $data);
    }
}
