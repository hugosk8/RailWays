<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('pages.admin.dashboard', compact('user'));
    }

    public function show_users_list() {
        $users = User::all();
        return view('pages.admin.users_list', compact('users'));
    }

    public function show_services_list() {
        $services = Service::all();
        return view('pages.admin.services_list', compact('services'));
    }

    public function show_appointments_list() {
        $appointments = Appointment::with(['user', 'service'])->get();
        return view('pages.admin.appointments_list', compact('appointments'));
    }
}
