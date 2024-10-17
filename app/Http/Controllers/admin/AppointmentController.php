<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentCancelConfirmation;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Mail;

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

        Mail::to(auth()->user()->email)->send(new AppointmentCancelConfirmation($appointment));

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.appointments.list')->with('success', "Rendez-vous supprimé avec succès.");
        } else {
            return redirect()->route('dashboard')->with('success', "Rendez-vous supprimé avec succès.");
        }
    }

    public function list() {
        $appointments = Appointment::with(['user', 'service'])->get();
        return view('pages.admin.appointments.list', compact('appointments'));
    }

    public function getReservedSlots() {
        $reservedSlots = Appointment::where('status', 'scheduled')
            ->select('date')
            ->distinct()
            ->get();
    
        $reservedSlots = $reservedSlots->map(function($slot) {
            return \Carbon\Carbon::parse($slot->date)->format('Y-m-d');
        });
    
        return response()->json($reservedSlots);
    }

    public function store_from_customer(Request $request){
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date',
        ]);
    
        $appointment = Appointment::create([
            'user_id' => auth()->user()->id,
            'service_id' => $validated['service_id'],
            'date' => $validated['appointment_date'],
            'status' => "scheduled"
        ]);
    
        Mail::to(auth()->user()->email)->send(new AppointmentConfirmation($appointment));
    
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.appointments.list')->with('success', 'Rendez-vous créé avec succès.');
        } else {
            return redirect()->route('dashboard')->with('success', 'Rendez-vous créé avec succès.');
        }
    }
}
