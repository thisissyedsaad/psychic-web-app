<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\PsychicService;
use Illuminate\Http\Request;

class PsychicServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = PsychicService::latest()->paginate(10);
        return view('admin.psychic-services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.psychic-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keywords' => 'required|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('psychic_services_logos', 'public');
        }

        PsychicService::create($validated);

        return redirect()->route('psychic-services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PsychicService $psychicService)
    {
        return view('admin.psychic-services.edit', compact('psychicService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PsychicService $psychicService)
    {
        $validated = $request->validate([
            'service' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'meta_keywords' => 'required|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('psychic_services_logos', 'public');
        }

        $psychicService->update($validated);

        return redirect()->route('psychic-services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PsychicService $psychicService)
    {
        $psychicService->delete();

        return redirect()->route('psychic-services.index')
            ->with('success', 'Service deleted successfully.');
    }
} 