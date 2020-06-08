<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexDashboardController extends Controller
{
    public function index() {
        return view('dashboard.index');
    }

    public function doLogout() {
        Auth::logout();
        return redirect('/');
    }
}
