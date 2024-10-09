<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Service;

class PaymentController extends Controller
{
    public function create(){
        $appointments = Appointment::all();
        return view('pages.admin.payments.create', compact('appointments'));
    }

}
