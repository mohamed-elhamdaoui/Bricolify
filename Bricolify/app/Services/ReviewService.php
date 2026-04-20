<?php

namespace App\Services;

use App\DTOs\CreateReviewDTO;
use App\Models\Review;
use App\Models\ServiceRequest;
use App\Models\WorkerProfile;
use Illuminate\Support\Facades\DB;
use Exception;

class ReviewService
{
    public function createReview(CreateReviewDTO $dto): Review
    {
        return DB::transaction(function () use ($dto) {
            $serviceRequest = ServiceRequest::findOrFail($dto->serviceRequestId);

            if (!$serviceRequest->isCompleted()) {
                throw new Exception('يمكنك فقط تقييم الخدمات المكتملة.');
            }

            $review = Review::create([
                'service_request_id' => $dto->serviceRequestId,
                'client_id'          => $dto->clientId,
                'worker_profile_id'  => $dto->workerProfileId,
                'rating'             => $dto->rating,
                'comment'            => $dto->comment,
            ]);

            $this->recalculateWorkerRating($dto->workerProfileId);

            return $review;
        });
    }

    private function recalculateWorkerRating(int $workerProfileId): void
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
