<?php

namespace App\DTOs;

readonly class SubmitApplicationDTO
{
    public function __construct(
        public int $serviceRequestId,
        public int $workerProfileId,
        public float $proposedPrice,
        public ?string $coverMessage = null,
    ) {}
}
