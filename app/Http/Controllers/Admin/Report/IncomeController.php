<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Redis;
use PDF;

class IncomeController extends Controller
{
    public function IncomeReportView()
    {
        return view('admin.report.view_income_report');
    }

    public function IncomeReportDatawiseGet(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $sdate = $request->start_date;
        $edate = $request->end_date;

        $total_income = Booking::whereBetween('start_date', [$start_date, $end_date])->sum('price');
        $user_data = Booking::whereBetween('start_date', [$start_date, $end_date])->where('status', 'Paid')->get();

        $html['thsource']  = '<th>SL No</th>';
        $html['thsource'] .= '<th>Customer Name</th>';
        $html['thsource'] .= '<th>Appointment Date</th>';
        $html['thsource'] .= '<th>No of Hours</th>';
        $html['thsource'] .= '<th>Price</th>';

        $color = 'success';
        $html['trsource']  = '';
        foreach ($user_data as $key => $data) {
            if ($data->price == 60) {
                $no_hrs = '4 hours';
            } else if ($data->price == 40) {
                $no_hrs = '3 hours';
            } else {
                $no_hrs = '2 hours';
            }
            $html['trsource'] .= '<tr>';
            $html['trsource'] .= '<td>' . ($key + 1) . '</td>';
            $html['trsource'] .=  '<td>' . $data['user']['first_name'] . ' ' . $data['user']['last_name'] . '</td>';
            $html['trsource'] .= '<td>' . date('l - F / d / Y', strtotime($data->start_date)) . '</td>';
            $html['trsource'] .= '<td>' . $no_hrs . '</td>';
            $html['trsource'] .= '<td>₱' . $data->price . '</td>';
            $html['trsource'] .= '</td>';
        }
        $html['trsource'] .= '<tr>';
        $html['trsource'] .= '<td>';
        $html['trsource'] .= '<strong>Print</strong>: <a class="btn btn-sm btn-' . $color . '" title="PDF" target="_blanks" href="' . route("income.report.get.pdf") . '?start_date=' . $sdate . '&end_date=' . $edate . '">Pay Slip</a>';
        $html['trsource'] .= '</td>';
        $html['trsource'] .= '<td colspan="3"></td>';
        $html['trsource'] .= '<td><strong>Total Income: ₱' . $total_income . '</strong></td>';
        $html['trsource'] .= '</tr>';

        return response()->json(@$html);
    } // End Method

    public function IncomeReportGetPdf(Request $request)
    {
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['sdate'] = $request->start_date;
        $data['edate'] = $request->end_date;

        // ========= Start Niklas Laravel PDF =========
        $pdf = PDF::loadView('admin.report.income_report_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('payslip.pdf');
        // ========= End Niklas Laravel PDF =========
    }
}
