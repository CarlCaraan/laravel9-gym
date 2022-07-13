<?php

namespace App\Http\Controllers\Customer\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Auth;
use PDF;

class CustomerAppointmentController extends Controller
{
    public function CustomerAppointmentView()
    {
        $data['allData'] = Booking::where('user_id', Auth()->user()->id)->get();
        return view('customer.booking.view_appointment', $data);
    }

    public function CustomerAppointmentAdd()
    {
        return view('customer.booking.add_appointment');
    }

    public function CustomerAppointmentStore(Request $request)
    {
        $validatedData = $request->validate(
            [
                'start_date' => 'required',
                'price' => 'required',
            ]
        );

        $data = new Booking();
        $data->user_id = Auth::user()->id;
        $data->status = "Not Paid";
        $data->start_date = $request->start_date;
        $data->price = $request->price;
        $data->save();

        // Adding Url and Color
        $data->url = "http://127.0.0.1:8000/booking/all/appointment/edit/" . $data->id;
        $data->background_color = "#ff0000";
        $data->save();

        $notification = array(
            'message' => 'Appointment Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('customer.appointment.view')->with($notification);
    } // End Method

    public function CustomerAppointmentEdit($id)
    {
        $data['editData'] = Booking::find($id);
        return view('customer.booking.edit_appointment', $data);
    }

    public function CustomerAppointmentUpdate(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'start_date' => 'required',
                'price' => 'required',
            ]
        );

        $data = Booking::find($id);
        $data->start_date = $request->start_date;
        $data->price = $request->price;
        $data->save();

        $notification = array(
            'message' => 'Appointment Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('customer.appointment.view')->with($notification);
    } // End Method

    public function CustomerAppointmentDelete($id)
    {
        $data = Booking::find($id)->delete();
        $notification = array(
            'message' => 'Appointment Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('customer.appointment.view')->with($notification);
    }

    // ========= Niklas PDF GENERATE =========
    public function CustomerAppointmentReceipt($id)
    {
        $data['details'] = Booking::with(['user'])->find($id);

        $pdf = PDF::loadView('customer.booking.details_appointment_pdf', $data); // View of the Pdf
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('receipt' . now() . '.pdf'); // Name of the Pdf File
    }
}
