<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class AppointmentController extends Controller
{
    public function AllAppointmentView()
    {
        $data['allData'] = Booking::all();
        return view('admin.booking.view_appointment', $data);
    }

    public function AllAppointmentAdd()
    {
        $data['allUser'] = User::all();
        return view('admin.booking.add_appointment', $data);
    }

    public function AllAppointmentStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'price' => 'required',
        ]);

        $data = new Booking();

        $data->user_id = $request->user_id;
        $data->price = $request->price;

        $data->status = $request->status;
        $data->start_date = $request->start_date;
        // $data->end_date = $request->end_date;
        $data->save();

        // Adding Url and Color
        $data->url = "http://127.0.0.1:8000/booking/all/appointment/view/edit/" . $data->id;
        if ($request->status == "Paid") {
            $data->background_color = "#42ba96";
        } else {
            $data->background_color = "#ff0000";
        }

        $data->save();

        $notification = array(
            'message' => 'User Appointment Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.appointment.view')->with($notification);
    } // End Method
}
