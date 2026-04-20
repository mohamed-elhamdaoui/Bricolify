<?php

namespace App\DTOs;

readonly class CreateWorkerProfileDTO
{
    public function __construct(
        public int $userId,
        public int $experienceYears,
        public array $skillIds = [],
        public ?string $bio = null,
    ) {}
}
