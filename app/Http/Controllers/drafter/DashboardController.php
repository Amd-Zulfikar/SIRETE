<?php

namespace App\Http\Controllers\Drafter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
         if (Auth::check()) {
            return view('drafter.dashboard.index');
        }
        return redirect()->route('drafter.dashboard');
       
    }
}
