<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dash = new Dashboard();

        return view('admin.pages.dashboard', ['stats' => $dash->getStats()]);
    }
}
