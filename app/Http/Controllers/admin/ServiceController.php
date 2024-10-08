<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function create(){
        return view('pages.admin.services.create');
    }

    public function store(Request $request){
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:500',
                'price' => 'required|numeric|min:0',
                'duration' => 'required|integer|min:1'
            ]);

            Service::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'duration' => $validated['duration'],
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'Service créé avec succès.');
    }

    public function show(string $id){
        $service = Service::findOrFail($id);
        return view('pages.admin.services.show', compact('service'));
    }

    // public function edit(string $id){
    //     $user = User::findOrFail($id);
    //     return view('pages.admin.users.edit', compact('user'));
    // }

    // public function update(Request $request, string $id){
    //     $user = User::findOrFail($id);
        
    //     $validated = $request->validate([
    //         'name' => 'sometimes|nullable|string|max:100',
    //         'email' => 'sometimes|nullable|email|unique:users,email,' . $user->id,
    //         'password' => 'sometimes|nullable|string|min:8|confirmed',
    //         'role' => 'sometimes|in:customer,employee,admin'
    //     ]);

    //     $user->update([
    //         'name' => $validated['name'] ?? $user->name,
    //         'email' => $validated['email'] ?? $user->email,
    //         // 'password' => isset($validated['password']) ? Hash::make($validated['password']) : $user->password,
    //         'role' => $validated['role'] ?? $user->role
    //     ]);

    //     return redirect()->route('admin.users_list')->with('success', "Utilisateur $user->name modifié avec succès.");
    // }

    // public function destroy(string $id){
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('admin.users_list')->with('success', "Utilisateur $user->email supprimé avec succès.");
    // }
}
