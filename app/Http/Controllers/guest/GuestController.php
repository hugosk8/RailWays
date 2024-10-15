<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        return view('pages/index');
    }

    public function contact() {
        return view('pages/contact');
    }

    public function prestations() {
        $services = Service::all();
        return view('pages/services', compact('services'));
    }

    public function reservation() {
        $services = Service::all();
        return view('pages/reservation', compact('services'));
    }
}
