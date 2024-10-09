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
}
