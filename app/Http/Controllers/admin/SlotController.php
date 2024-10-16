<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slot;
use App\Models\Service;

class SlotController extends Controller
{
    // Affiche le formulaire de création de slots
    public function create()
    {
        $services = Service::all();
        return view('pages.admin.slots.create', compact('services'));
    }

    // Stocke les slots dans la base de données
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'slot_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'available' => 'required|boolean'
        ]);

        Slot::create([
            'service_id' => $validated['service_id'],
            'slot_date' => $validated['slot_date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'available' => $validated['available']
        ]);

        return redirect()->route('admin.slots.list')->with('success', 'Créneau créé avec succès.');
    }

    // Liste les créneaux existants
    public function list()
    {
        $slots = Slot::with('service')->get();
        return view('pages.admin.slots.list', compact('slots'));
    }

    // Affiche un créneau spécifique
    public function show($id)
    {
        $slot = Slot::findOrFail($id);
        return view('pages.admin.slots.show', compact('slot'));
    }

    // Affiche le formulaire d'édition d'un créneau
    public function edit($id)
    {
        $slot = Slot::findOrFail($id);
        $services = Service::all();
        return view('pages.admin.slots.edit', compact('slot', 'services'));
    }

    // Met à jour un créneau
    public function update(Request $request, $id)
    {
        $slot = Slot::findOrFail($id);

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'slot_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'available' => 'required|boolean'
        ]);

        $slot->update([
            'service_id' => $validated['service_id'],
            'slot_date' => $validated['slot_date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'available' => $validated['available']
        ]);

        return redirect()->route('admin.slots.list')->with('success', 'Créneau mis à jour avec succès.');
    }

    // Supprime un créneau
    public function destroy($id)
    {
        $slot = Slot::findOrFail($id);
        $slot->delete();

        return redirect()->route('admin.slots.list')->with('success', 'Créneau supprimé avec succès.');
    }
}
