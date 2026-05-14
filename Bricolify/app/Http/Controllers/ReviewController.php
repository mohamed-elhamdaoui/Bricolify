<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request, ReviewService $service, ServiceRequest $serviceRequest)
    {
        $validated = $request->validated();
        $clientId = Auth::id();
        $workerProfileId = $serviceRequest->assigned_worker_profile_id;

        $service->createReview(
            $serviceRequest->id,
            $clientId,
            $workerProfileId,
            $validated['rating'],
            $validated['comment']
        );

        return back()->with('success', 'Thank you! Review added successfully.');
    }
}
