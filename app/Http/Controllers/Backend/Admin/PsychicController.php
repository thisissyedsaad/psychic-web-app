<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Psychic;
use App\Models\AppLink;
use App\Models\PaymentLink;
use App\Models\PsychicAppLink;
use App\Models\SocialMediaLink;
use App\Models\PsychicService;
use App\Models\PsychicPaymentLink;
use App\Models\PsychicSocialLink;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PsychicController extends Controller
{
    public function index()
    {
        $psychics = Psychic::with(['appLinks.appLink', 'paymentLinks.paymentLink', 'socialLinks.socialMediaLink'])->latest()->paginate(10);
        return view('admin.psychics.index', compact('psychics'));
    }

    public function create()
    {
        $appLinks = AppLink::get();
        $paymentLinks = PaymentLink::get();
        $socialMediaLinks = SocialMediaLink::get();
        $psychicServices = PsychicService::get();
        $countries = Country::get();

        return view('admin.psychics.create', compact('appLinks', 'paymentLinks', 'socialMediaLinks', 'psychicServices', 'countries'));
    }

    public function store(Request $request)
    {
        // Get dynamic keys for validation
        $appLinks = AppLink::pluck('app_name');
        $paymentLinks = PaymentLink::pluck('payment_provider');
        $socialLinks = SocialMediaLink::pluck('social_site');

        $appLinksRules = [];
        foreach ($appLinks as $name) {
            $key = strtolower(str_replace(' ', '_', $name));
            $appLinksRules["app_links.$key"] = 'nullable|string|max:255';
        }
        $paymentLinksRules = [];
        $paymentQrRules = [];
        foreach ($paymentLinks as $name) {
            $key = strtolower(str_replace(' ', '_', $name));
            $paymentLinksRules["payment_links.$key"] = 'nullable|string|max:255';
            $paymentQrRules["payment_qr.$key"] = 'nullable|image|max:2048';
        }
        $socialLinksRules = [];
        foreach ($socialLinks as $name) {
            $key = strtolower(str_replace(' ', '_', $name));
            $socialLinksRules["social_links.$key"] = 'nullable|string|max:255';
        }

        $validated = $request->validate(array_merge([
            'full_name' => 'required|string|max:255',
            'profile_name' => 'required|string|max:255|unique:psychics',
            'email' => 'required|email|unique:psychics',
            'profile_photo' => 'nullable|image|max:2048',
            'tagline' => 'nullable|string|max:50',
            'mobile_number' => 'nullable|string|max:20',
            'whatsapp_number' => 'nullable|string|max:20',
            'profile_description' => 'nullable|string|max:10000',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'services.*' => 'exists:psychic_services,id',
            'app_links' => 'nullable|array',
            'payment_links' => 'nullable|array',
            'payment_qr' => 'nullable|array',
            'social_links' => 'nullable|array',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country_id' => 'nullable|string|max:100',
            'show_city' => 'nullable|boolean',
            'show_country' => 'nullable|boolean',
            'website' => 'nullable|url|max:255',
            'website_title' => 'nullable|string|max:255',
        ], $appLinksRules, $paymentLinksRules, $paymentQrRules, $socialLinksRules));

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo'] = $request->file('profile_photo')->store('psychics', 'public');
        }

        // Extract address data
        $addressData = [
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'country_id' => $request->country_id,
            'show_city' => $request->has('show_city') ? true : false,
            'show_country' => $request->has('show_country') ? true : false,
        ];

        $psychic = Psychic::create($validated);

        $psychic->address()->create($addressData);

        // Sync services
        if ($request->has('services')) {
            $psychic->services()->sync($request->services);
        }

        // Store App Links
        if ($request->has('app_links')) {
            foreach ($request->app_links as $provider => $value) {
                if (!empty($value)) {
                    $appLink = AppLink::where('app_name', str_replace('_', ' ', $provider))->first();
                    if ($appLink) {
                        $psychic->appLinks()->create([
                            'app_link_id' => $appLink->id,
                            'value' => $value
                        ]);
                    }
                }
            }
        }

        // Store Payment Links
        if ($request->has('payment_links')) {
            foreach ($request->payment_links as $provider => $value) {
                if (!empty($value)) {
                    $paymentLink = PaymentLink::where('payment_provider', str_replace('_', ' ', $provider))->first();
                    if ($paymentLink) {
                        $qrPath = null;
                        if ($request->hasFile("payment_qr.$provider")) {
                            $qrPath = $request->file("payment_qr.$provider")->store('qr-codes', 'public');
                        }

                        $psychic->paymentLinks()->create([
                            'payment_link_id' => $paymentLink->id,
                            'value' => $value,
                            'qr_code' => $qrPath
                        ]);
                    }
                }
            }
        }

        // Store Social Links
        if ($request->has('social_links')) {
            foreach ($request->social_links as $provider => $value) {
                if (!empty($value)) {
                    $socialLink = SocialMediaLink::where('social_site', str_replace('_', ' ', $provider))->first();
                    if ($socialLink) {
                        $psychic->socialLinks()->create([
                            'social_media_link_id' => $socialLink->id,
                            'value' => $value
                        ]);
                    }
                }
            }
        }

        return redirect()->route('psychics.index', $psychic)
            ->with('success', 'Psychic created successfully.');
    }

    public function edit(Psychic $psychic)
    {
        $psychic->load(['appLinks.appLink', 'paymentLinks.paymentLink', 'socialLinks.socialMediaLink', 'address']);

        // Get all links, not just those with logos
        $appLinks = AppLink::get();
        $paymentLinks = PaymentLink::get();
        $socialMediaLinks = SocialMediaLink::get();
        $psychicServices = PsychicService::get();
        $countries = Country::get();

        // Prepare existing values for the form
        $existingLinks = [
            'app_links' => $psychic->appLinks->mapWithKeys(function ($link) {
                $providerName = strtolower(str_replace(' ', '_', $link->appLink->app_name));
                return [$providerName => $link->value];
            })->toArray(),

            'payment_links' => $psychic->paymentLinks->mapWithKeys(function ($link) {
                $providerName = strtolower(str_replace(' ', '_', $link->paymentLink->payment_provider));
                return [$providerName => $link->value];
            })->toArray(),

            'payment_qr' => $psychic->paymentLinks->mapWithKeys(function ($link) {
                $providerName = strtolower(str_replace(' ', '_', $link->paymentLink->payment_provider));
                return [$providerName => $link->qr_code];
            })->toArray(),

            'social_links' => $psychic->socialLinks->mapWithKeys(function ($link) {
                $providerName = strtolower(str_replace(' ', '_', $link->socialMediaLink->social_site));
                return [$providerName => $link->value];
            })->toArray()
        ];

        return view('admin.psychics.edit', compact('psychic', 'appLinks', 'paymentLinks', 'socialMediaLinks', 'existingLinks', 'psychicServices', 'countries'));
    }

    public function update(Request $request, Psychic $psychic)
    {
        // Get dynamic keys for validation
        $appLinks     = AppLink::pluck('app_name');
        $paymentLinks = PaymentLink::pluck('payment_provider');
        $socialLinks  = SocialMediaLink::pluck('social_site');

        $appLinksRules = [];
        foreach ($appLinks as $name) {
            $key = strtolower(str_replace(' ', '_', $name));
            $appLinksRules["app_links.$key"] = 'nullable|string|max:255';
        }
        $paymentLinksRules = [];
        $paymentQrRules = [];
        foreach ($paymentLinks as $name) {
            $key = strtolower(str_replace(' ', '_', $name));
            $paymentLinksRules["payment_links.$key"] = 'nullable|string|max:255';
            $paymentQrRules["payment_qr.$key"] = 'nullable|image|max:2048';
        }
        $socialLinksRules = [];
        foreach ($socialLinks as $name) {
            $key = strtolower(str_replace(' ', '_', $name));
            $socialLinksRules["social_links.$key"] = 'nullable|string|max:255';
        }

        $validated = $request->validate(array_merge([
            'full_name' => 'required|string|max:255',
            'profile_name' => 'required|string|max:255|unique:psychics,profile_name,' . $psychic->id,
            'email' => 'required|email|unique:psychics,email,' . $psychic->id,
            'profile_photo' => 'nullable|image|max:2048',
            'tagline' => 'nullable|string|max:50',
            'mobile_number' => 'nullable|string|max:20',
            'whatsapp_number' => 'nullable|string|max:20',
            'profile_description' => 'nullable|string|max:10000',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'services.*' => 'exists:psychic_services,id',
            'app_links' => 'nullable|array',
            'payment_links' => 'nullable|array',
            'payment_qr' => 'nullable|array',
            'social_links' => 'nullable|array',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country_id' => 'nullable|string|max:100',
            'show_city' => 'nullable|boolean',
            'show_country' => 'nullable|boolean',
            'website' => 'nullable|url|max:255',
            'website_title' => 'nullable|string|max:255',
        ], $appLinksRules, $paymentLinksRules, $paymentQrRules, $socialLinksRules));

        if ($request->hasFile('profile_photo')) {
            if ($psychic->profile_photo) {
                Storage::disk('public')->delete($psychic->profile_photo);
            }
            $validated['profile_photo'] = $request->file('profile_photo')->store('psychics', 'public');
        }

        $psychic->update($validated);

        // Update or create address
        $addressData = [
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'country_id' => $request->country_id,
            'show_city' => $request->has('show_city') ? true : false,
            'show_country' => $request->has('show_country') ? true : false,
        ];

        if ($psychic->address) {
            $psychic->address->update($addressData);
        } else {
            $psychic->address()->create($addressData);
        }

        // Sync services
        if ($request->has('services')) {
            $psychic->services()->sync($request->services);
        }

        // Update App Links
        if ($request->has('app_links')) {
            // Remove existing app links
            $psychic->appLinks()->delete();

            foreach ($request->app_links as $provider => $value) {
                if (!empty($value)) {
                    $appLink = AppLink::where('app_name', str_replace('_', ' ', $provider))->first();
                    if ($appLink) {
                        $psychic->appLinks()->create([
                            'app_link_id' => $appLink->id,
                            'value' => $value
                        ]);
                    }
                }
            }
        }

        // Update Payment Links
        if ($request->has('payment_links')) {
            // Remove existing payment links and their QR codes
            foreach ($psychic->paymentLinks as $link) {
                if ($link->qr_code) {
                    Storage::disk('public')->delete($link->qr_code);
                }
            }
            $psychic->paymentLinks()->delete();

            foreach ($request->payment_links as $provider => $value) {
                if (!empty($value)) {
                    $paymentLink = PaymentLink::where('payment_provider', str_replace('_', ' ', $provider))->first();
                    if ($paymentLink) {
                        $qrPath = null;
                        if ($request->hasFile("payment_qr.$provider")) {
                            $qrPath = $request->file("payment_qr.$provider")->store('qr-codes', 'public');
                        }

                        $psychic->paymentLinks()->create([
                            'payment_link_id' => $paymentLink->id,
                            'value' => $value,
                            'qr_code' => $qrPath
                        ]);
                    }
                }
            }
        }

        // Update Social Links
        if ($request->has('social_links')) {
            // Remove existing social links
            $psychic->socialLinks()->delete();

            foreach ($request->social_links as $provider => $value) {
                if (!empty($value)) {
                    $socialLink = SocialMediaLink::where('social_site', str_replace('_', ' ', $provider))->first();
                    if ($socialLink) {
                        $psychic->socialLinks()->create([
                            'social_media_link_id' => $socialLink->id,
                            'value' => $value
                        ]);
                    }
                }
            }
        }

        return redirect()->route('psychics.index', $psychic)
            ->with('success', 'Psychic updated successfully.');
    }

    public function destroy(Psychic $psychic)
    {
        try {
            // Begin transaction
            DB::beginTransaction();

            // Delete profile photo if exists
            if ($psychic->profile_photo) {
                Storage::disk('public')->delete($psychic->profile_photo);
            }

            // Delete QR codes from payment links if any
            foreach ($psychic->paymentLinks as $link) {
                if ($link->qr_code) {
                    Storage::disk('public')->delete($link->qr_code);
                }
            }

            // Delete the psychic (related records will be deleted due to cascade)
            $psychic->delete();

            // Commit transaction
            DB::commit();

            return redirect()->route('psychics.index', $psychic)
                ->with('success', 'Psychic deleted successfully.');
        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to delete psychic. Please try again.');
        }
    }

    public function storeAppLink(Request $request, Psychic $psychic)
    {
        $validated = $request->validate([
            'app_link_id' => 'required|exists:app_links,id',
            'value' => 'required|string|max:255',
        ]);

        $psychic->appLinks()->create($validated);

        return back()->with('success', 'App link added successfully.');
    }

    public function storePaymentLink(Request $request, Psychic $psychic)
    {
        $validated = $request->validate([
            'payment_link_id' => 'required|exists:payment_links,id',
            'value' => 'required|string|max:255',
            'qr_code' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('qr_code')) {
            $validated['qr_code'] = $request->file('qr_code')->store('qr-codes', 'public');
        }

        $psychic->paymentLinks()->create($validated);

        return back()->with('success', 'Payment link added successfully.');
    }

    public function storeSocialLink(Request $request, Psychic $psychic)
    {
        $validated = $request->validate([
            'social_media_link_id' => 'required|exists:social_media_links,id',
            'value' => 'required|string|max:255',
        ]);

        $psychic->socialLinks()->create($validated);

        return back()->with('success', 'Social link added successfully.');
    }

    public function deleteAppLink(Psychic $psychic, PsychicAppLink $link)
    {
        $link->delete();
        return back()->with('success', 'App link deleted successfully.');
    }

    public function deletePaymentLink(Psychic $psychic, PsychicPaymentLink $link)
    {
        if ($link->qr_code) {
            Storage::disk('public')->delete($link->qr_code);
        }
        $link->delete();
        return back()->with('success', 'Payment link deleted successfully.');
    }

    public function deleteSocialLink(Psychic $psychic, PsychicSocialLink $link)
    {
        $link->delete();
        return back()->with('success', 'Social link deleted successfully.');
    }
}
