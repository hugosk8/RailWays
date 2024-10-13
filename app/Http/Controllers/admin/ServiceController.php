<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

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
                'duration' => $validated['duration']
            ]);
            return redirect()->route('admin.services.list')->with('success', 'Service créé avec succès.');
    }

    public function show(string $id){
        $service = Service::findOrFail($id);
        return view('pages.admin.services.show', compact('service'));
    }

    public function edit(string $id){
        $service = Service::findOrFail($id);
        return view('pages.admin.services.edit', compact('service'));
    }

    public function update(Request $request, string $id){
        $service = Service::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'sometimes|nullable|string|max:100',
            'description' => 'sometimes|nullable|string',
            'price' => 'sometimes|nullable|numeric|min:0',
            'duration' => 'sometimes|nullable|integer|min:0'
        ]);

        $service->update([
            'name' => $validated['name'] ?? $service->name,
            'description' => $validated['description'] ?? $service->description,
            'price' => $validated['price'] ?? $service->price,
            'duration' => $validated['duration'] ?? $service->duration
        ]);

        return redirect()->route('admin.services.list')->with('success', "Service $service->name modifié avec succès.");
    }

    public function destroy(string $id){
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.list')->with('success', "Service $service->name supprimé avec succès.");
    }

    public function list() {
        $services = Service::all();
        return view('pages.admin.services.list', compact('services'));
    }
}
