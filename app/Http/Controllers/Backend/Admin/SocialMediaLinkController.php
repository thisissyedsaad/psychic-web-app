<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SocialMediaLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialMediaLinks = SocialMediaLink::latest()->paginate(10);
        return view('admin.social-media-links.index', compact('socialMediaLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-media-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'social_site' => 'required|max:255',
            'url_prefix' => 'required|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['social_site', 'url_prefix']);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('social-media-links', $filename, 'public');
            $data['logo'] = $path;
        }

        SocialMediaLink::create($data);

        return redirect()->route('social-media-links.index')
            ->with('success', 'Social Media Link created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMediaLink $socialMediaLink)
    {
        return view('admin.social-media-links.edit', compact('socialMediaLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMediaLink $socialMediaLink)
    {
        $validator = Validator::make($request->all(), [
            'social_site' => 'required|max:255',
            'url_prefix' => 'required|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['social_site', 'url_prefix']);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($socialMediaLink->logo) {
                Storage::disk('public')->delete($socialMediaLink->logo);
            }

            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('social-media-links', $filename, 'public');
            $data['logo'] = $path;
        }

        $socialMediaLink->update($data);

        return redirect()->route('social-media-links.index')
            ->with('success', 'Social Media Link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMediaLink $socialMediaLink)
    {
        if ($socialMediaLink->logo) {
            Storage::disk('public')->delete($socialMediaLink->logo);
        }

        $socialMediaLink->delete();

        return redirect()->route('social-media-links.index')
            ->with('success', 'Social Media Link deleted successfully.');
    }
} 