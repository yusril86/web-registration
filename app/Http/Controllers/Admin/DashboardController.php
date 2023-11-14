<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $registrations = Registration::get()->count();
        return view('pages.backend.dashboard.index',compact('registrations'));
    }
}
