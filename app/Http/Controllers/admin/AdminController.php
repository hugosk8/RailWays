<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('pages.admin.dashboard', compact('user'));
    }

    public function create(){
        return view('pages.admin.users.create');
    }

    public function store(Request $request){
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|in:customer,employee,admin'
            ]);

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role']
            ]);
            return redirect()->route('admin.users_list')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(string $id){
        $user = User::findOrFail($id);
        return view('pages.admin.users.show', compact('user'));
    }

    public function edit(string $id){
        $user = User::findOrFail($id);
        return view('pages.admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id){
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'sometimes|nullable|string|max:100',
            'email' => 'sometimes|nullable|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'role' => 'sometimes|in:customer,employee,admin'
        ]);

        $user->update([
            'name' => $validated['name'] ?? $user->name,
            'email' => $validated['email'] ?? $user->email,
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $user->password,
            'role' => $validated['role'] ?? $user->role
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès.');
    }

    public function destroy(string $id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur ' . $user->name . ' supprimé avec succès.');
    }

    public function show_users_list() {
        $users = User::all();
        return view('pages.admin.users_list', compact('users'));
    }
}


