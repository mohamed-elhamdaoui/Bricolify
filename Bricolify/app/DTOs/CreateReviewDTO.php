<?php

namespace App\DTOs;

readonly class CreateReviewDTO
{
    public function __construct(
        public int $serviceRequestId,
        public int $clientId,
        public int $workerProfileId,
        public int $rating,
        public ?string $comment = null,
    ) {}
}
