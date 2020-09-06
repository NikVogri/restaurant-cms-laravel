<?php

namespace App\Http\Controllers;

use App\Order;
use App\Reports;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Reports $reports)
    {
        return view('reports.index', get_object_vars($reports));
    }
}