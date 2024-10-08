<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
}
