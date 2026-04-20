<?php

namespace App\DTOs;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

readonly class CreateServiceRequestDTO
{
    public function __construct(
        public int $clientId,
        public int $categoryId,
        public string $title,
        public string $description,
        public string $location,
        public Carbon $scheduledDate,
        public ?UploadedFile $image = null,
    ) {}
}
