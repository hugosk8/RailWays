<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        return view('pages/index');
    }

    public function contact() {
        return view('pages/contact');
    }
}
