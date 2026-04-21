<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\DTOs\CreateReviewDTO;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard()->check();
    }

    public function rules(): array
    {
        return [
            'rating'  => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function toDTO(int $serviceRequestId, int $clientId, int $workerProfileId): CreateReviewDTO
    {
        return new CreateReviewDTO(
            serviceRequestId: $serviceRequestId,
            clientId: $clientId,
            workerProfileId: $workerProfileId,
            rating: $this->validated('rating'),
            comment: $this->validated('comment'),
        );
    }
}
