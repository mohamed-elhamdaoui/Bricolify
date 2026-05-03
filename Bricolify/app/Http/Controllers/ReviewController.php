<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(ReviewService $service, ServiceRequest $serviceRequest)
    {
        $clientId = Auth::id();
        $workerProfileId = $serviceRequest->assigned_worker_profile_id;

        $service->createReview(
            $serviceRequest->id,
            $clientId,
            $workerProfileId,
            request('rating'),
            request('comment')
        );

        return back()->with('success', 'Thank you! Review added successfully.');
    }
}
