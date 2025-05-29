<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AppLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appLinks = AppLink::latest()->paginate(10);
        return view('admin.app-links.index', compact('appLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.app-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_name' => 'required|max:255',
            'url_prefix' => 'required|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['app_name', 'url_prefix']);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('app-links', $filename, 'public');
            $data['logo'] = $path;
        }

        AppLink::create($data);

        return redirect()->route('app-links.index')
            ->with('success', 'App Link created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppLink $appLink)
    {
        return view('admin.app-links.edit', compact('appLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppLink $appLink)
    {
        $validator = Validator::make($request->all(), [
            'app_name' => 'required|max:255',
            'url_prefix' => 'required|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['app_name', 'url_prefix']);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($appLink->logo) {
                Storage::disk('public')->delete($appLink->logo);
            }

            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('app-links', $filename, 'public');
            $data['logo'] = $path;
        }

        $appLink->update($data);

        return redirect()->route('app-links.index')
            ->with('success', 'App Link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppLink $appLink)
    {
        if ($appLink->logo) {
            Storage::disk('public')->delete($appLink->logo);
        }

        $appLink->delete();

        return redirect()->route('app-links.index')
            ->with('success', 'App Link deleted successfully.');
    }
}
