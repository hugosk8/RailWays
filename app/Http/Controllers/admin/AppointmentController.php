<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;

class AppointmentController extends Controller
{
    public function create(){
        $users = User::all();
        $services = Service::all();
        return view('pages.admin.appointments.create', compact('users','services'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'status' => 'required|in:scheduled,canceled,completed'
        ]);

        Appointment::create([
            'user_id' => $validated['user_id'],
            'service_id' => $validated['service_id'],
            'date' => $validated['date'],
            'status' => $validated['status']
        ]);
        return redirect()->route('admin.appointments.list')->with('success', 'Rendez-vous créé avec succès.');
    }

    public function show(string $id){
        $appointment = Appointment::findOrFail($id);
        return view('pages.admin.appointments.show', compact('appointment'));
    }

    public function edit(string $id){
        $appointment = Appointment::findOrFail($id);
        return view('pages.admin.appointments.edit', compact('appointment'));
    }

    public function update(Request $request, string $id){
        $appointment = Appointment::findOrFail($id);
        
        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'service_id' => 'sometimes|exists:services,id',
            'date' => 'sometimes|nullable|date',
            'status' => 'sometimes|in:scheduled,canceled,completed'
        ]);

        $appointment->update([
            'user_id' => $validated['user_id'] ?? $appointment->user_id,
            'service_id' => $validated['service_id'] ?? $appointment->service_id,
            'date' => $validated['date'] ?? $appointment->date,
            'status' => $validated['status'] ?? $appointment->status
        ]);

        return redirect()->route('admin.appointments.list')->with('success', "Rendez-vous modifié avec succès.");
    }

    public function destroy(string $id){
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.list')->with('success', "Rendez-vous supprimé avec succès.");
    }

    public function list() {
        $appointments = Appointment::with(['user', 'service'])->get();
        return view('pages.admin.appointments.list', compact('appointments'));
    }
}
