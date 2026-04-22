<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Services\ReviewService;
use App\Models\ServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Exception;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request, ReviewService $service, ServiceRequest $serviceRequest): RedirectResponse
    {
        try {
            $clientId = Auth::id();
            $workerProfileId = $serviceRequest->assigned_worker_profile_id;

            $dto = $request->toDTO($serviceRequest->id, $clientId, $workerProfileId);
            $service->createReview($dto);

            return back()->with('success', 'Thank you! Review added successfully.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
