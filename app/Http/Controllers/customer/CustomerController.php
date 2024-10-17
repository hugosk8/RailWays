<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index() {
        $user = Auth::user();
        $appointments = $user->appointments;
        return view('pages/customer/dashboard', compact('user', 'appointments'));
    }
}
