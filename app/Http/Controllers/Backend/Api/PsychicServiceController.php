<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use App\Models\PsychicService;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class PsychicServiceController extends Controller
{
    /**
     * Get all psychic services
     *
     * @return JsonResponse
     */
    public function getPsychicsServices(): JsonResponse
    {
        try {
            $services = PsychicService::orderBy('created_at', 'desc')->get();

            $services = $services->map(function ($services) {
                $services->logo = Storage::url($services->logo);
                return $services;
            });
            return ResponseHelper::successResponse(
                $services,
                'Psychic services retrieved successfully'
            );
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse(
                'Failed to retrieve psychic services',
                500,
                $e
            );
        }
    }

    /**
     * Get a specific psychic service
     *
     * @param string $slug
     * @return JsonResponse
     */
    public function showPsychicsService(string $slug): JsonResponse
    {
        try {
            $service = PsychicService::where('slug', $slug)->firstOrFail();
            $service->logo = Storage::url($service->logo);

            return ResponseHelper::successResponse(
                $service,
                'Psychic service retrieved successfully'
            );
        } catch (\Exception $e) {
            return ResponseHelper::notFoundResponse(
                'Psychic service not found'
            );
        }
    }

    public function topPsychics($slug)
    {
        $service = PsychicService::where('slug', $slug)->firstOrFail();
        $psychics = $service->psychics()
            ->orderByDesc('created_at')
            ->take(3)
            ->get()
            ->map(function ($psychic) {
                return [
                    'slug' => $psychic->slug,
                    'profile_name' => $psychic->profile_name,
                    'profile_photo' => $psychic->profile_photo ? asset('storage/' . $psychic->profile_photo) : null,
                    'tagline' => $psychic->tagline,
                    'reviews_count' => $psychic->reviews_count ?? 0,
                ];
            });
        return response()->json(['data' => $psychics]);
    }
}