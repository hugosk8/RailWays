<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class PaymentController extends Controller
{
    public function create(){
        return view('pages.admin.payments.create');
    }

}
