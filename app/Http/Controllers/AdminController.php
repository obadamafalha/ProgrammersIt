<?php

namespace App\Http\Controllers;

use App\Exports\ActivityExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Activitylog\Models\Activity;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $activity =  Activity::all();

        return view('admin.dashboard', ['activity' => $activity]);
    }

    public function export_excel()
    {
        return Excel::download(new ActivityExport, 'activity.xlsx');
    }

    public function export_pdf()
    {
        $data = Activity::all();
        $pdf = Pdf::loadView('pdf.activity', ['activity' => $data])->setPaper('a4', 'landscape');
        return $pdf->download('activity.pdf');
    }
}
