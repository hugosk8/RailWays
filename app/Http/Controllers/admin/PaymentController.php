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
                'payment_status' => 'required|in:paid,pending',
                'payment_date' => 'required|date',
            ]);

            Payment::create([
                'appointment_id' => $validated['appointment_id'],
                'amount' => $validated['amount'],
                'payment_status' => $validated['payment_status'],
                'payment_date' => $validated['payment_date']
            ]);
            return redirect()->route('admin.payments_list')->with('success', 'Paiement créé avec succès.');
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
            'payment_status' => 'sometimes|nullable|string|in:pending,paid',
            'payment_date' => 'sometimes|nullable|date'
        ]);
    
        $payment->update([
            'appointment_id' => $validated['appointment_id'] ?? $payment->appointment_id,
            'amount' => $validated['amount'] ?? $payment->amount,
            'payment_status' => $validated['payment_status'] ?? $payment->payment_status,
            'payment_date' => $validated['payment_date'] ?? $payment->payment_date
        ]);

        return redirect()->route('admin.payments_list')->with('success', "Paiement modifié avec succès.");
    }

    public function destroy(string $id){
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payments_list')->with('success', "Paiement supprimé avec succès.");
    }
}
