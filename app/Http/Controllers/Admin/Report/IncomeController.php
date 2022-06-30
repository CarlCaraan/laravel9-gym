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

        $html['thsource']  = '<th>Total Income</th>';
        $html['thsource'] .= '<th>Action</th>';

        $color = 'success';
        $html['tdsource']  = '<td>' . '₱' . $total_income . '</td>';
        $html['tdsource'] .= '<td>';
        $html['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="PDF" target="_blanks" href="' . route("income.report.get.pdf") . '?start_date=' . $sdate . '&end_date=' . $edate . '">Pay Slip</a>';
        $html['tdsource'] .= '</td>';

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
