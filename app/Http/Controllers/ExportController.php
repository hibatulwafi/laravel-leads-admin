<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Exports\LeadExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        $date = Carbon::now()->format('Ymdh');
        $csvFileName = 'export-mission-'.$date.'.csv';
        return Excel::download(new LeadExport, $csvFileName);
    }
}
