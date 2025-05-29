<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaymentLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentLinks = PaymentLink::latest()->paginate(10);
        return view('admin.payment-links.index', compact('paymentLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_provider' => 'required|max:255',
            'url_prefix' => 'required|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['payment_provider', 'url_prefix']);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('payment-links', $filename, 'public');
            $data['logo'] = $path;
        }

        PaymentLink::create($data);

        return redirect()->route('payment-links.index')
            ->with('success', 'Payment Link created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentLink $paymentLink)
    {
        return view('admin.payment-links.edit', compact('paymentLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentLink $paymentLink)
    {
        $validator = Validator::make($request->all(), [
            'payment_provider' => 'required|max:255',
            'url_prefix' => 'required|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['payment_provider', 'url_prefix']);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($paymentLink->logo) {
                Storage::disk('public')->delete($paymentLink->logo);
            }

            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('payment-links', $filename, 'public');
            $data['logo'] = $path;
        }

        $paymentLink->update($data);

        return redirect()->route('payment-links.index')
            ->with('success', 'Payment Link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentLink $paymentLink)
    {
        if ($paymentLink->logo) {
            Storage::disk('public')->delete($paymentLink->logo);
        }

        $paymentLink->delete();

        return redirect()->route('payment-links.index')
            ->with('success', 'Payment Link deleted successfully.');
    }
} 