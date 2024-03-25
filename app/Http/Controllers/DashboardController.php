<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $adminTotal = User::where('role','ADMIN')->count();
        $stafTotal = User::where('role','STAFF')->count();
        return view('pages.dashboard', compact('stafTotal', 'adminTotal'));
    }
}
