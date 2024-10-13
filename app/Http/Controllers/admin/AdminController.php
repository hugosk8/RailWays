<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('pages.admin.dashboard', compact('user'));
    }
}
