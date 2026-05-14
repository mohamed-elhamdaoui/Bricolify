<?php

namespace App\Services;

use App\Models\Review;
use App\Models\ServiceRequest;
use App\Models\WorkerProfile;

class ReviewService
{
    public function createReview($serviceRequestId, $clientId, $workerProfileId, $rating, $comment)
    {
        $serviceRequest = ServiceRequest::findOrFail($serviceRequestId);

        if (!$serviceRequest->isCompleted()) {
            return back()->with('error', 'You can only review completed services.');
        }

        $review = Review::create([
            'service_request_id' => $serviceRequestId,
            'client_id'          => $clientId,
            'worker_profile_id'  => $workerProfileId,
            'rating'             => $rating,
            'comment'            => $comment,
        ]);

        $this->recalculateWorkerRating($workerProfileId);

        return $review;
    }

    private function recalculateWorkerRating($workerProfileId)
    {
        $worker = WorkerProfile::findOrFail($workerProfileId);

        $stats = Review::where('worker_profile_id', $workerProfileId)
            ->selectRaw('AVG(rating) as average, COUNT(id) as count')
            ->first();

        $worker->update([
            'rating_average' => $stats->average ?? 0,
            'rating_count'   => $stats->count ?? 0,
        ]);
    }
}
