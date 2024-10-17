<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(){
        $appointments = Appointment::all();
        return view('pages.admin.payments.create', compact('appointments'));
    }

    public function store(Request $request){
            $validated = $request->validate([
                'appointment_id' => 'required|exists:appointments,id',
                'amount' => 'required|numeric|min:0',
                'status' => 'required|in:paid,pending',
                'date' => 'required|date',
            ]);

            Payment::create([
                'appointment_id' => $validated['appointment_id'],
                'amount' => $validated['amount'],
                'status' => $validated['status'],
                'date' => $validated['date']
            ]);
            return redirect()->route('admin.payments.list')->with('success', 'Paiement créé avec succès.');
    }

    public function show(string $id){
        $payment = Payment::findOrFail($id);
        return view('pages.admin.payments.show', compact('payment'));
    }

    public function edit(string $id){
        $payment = Payment::findOrFail($id);
        $appointments = Appointment::all();
        return view('pages.admin.payments.edit', compact('payment', 'appointments'));
    }

    public function update(Request $request, string $id) {
        $payment = Payment::findOrFail($id);
    
        $validated = $request->validate([
            'appointment_id' => 'sometimes|nullable|integer|exists:appointments,id',
            'amount' => 'sometimes|nullable|numeric|min:0',
            'status' => 'sometimes|nullable|string|in:pending,paid',
            'date' => 'sometimes|nullable|date'
        ]);
    
        $payment->update([
            'appointment_id' => $validated['appointment_id'] ?? $payment->appointment_id,
            'amount' => $validated['amount'] ?? $payment->amount,
            'status' => $validated['status'] ?? $payment->status,
            'date' => $validated['date'] ?? $payment->date
        ]);

        return redirect()->route('admin.payments.list')->with('success', "Paiement modifié avec succès.");
    }

    public function destroy(string $id){
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payments.list')->with('success', "Paiement supprimé avec succès.");
    }

    public function list() {
        $payments = Payment::with('appointment.user')->get();
        return view('pages.admin.payments.list', compact('payments'));
    }
}
