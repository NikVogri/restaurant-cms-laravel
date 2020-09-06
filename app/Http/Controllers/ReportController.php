<?php

namespace App\Http\Controllers;

use App\Reports;

class ReportController extends Controller
{
    public function index(Reports $reports)
    {
        return view('reports.index', get_object_vars($reports));
    }
}