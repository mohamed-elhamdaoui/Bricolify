<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\DTOs\SubmitApplicationDTO;

class StoreApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard()->check();
    }

    public function rules(): array
    {
        return [
            'proposed_price' => ['required', 'numeric', 'min:0', 'max:999999'],
            'cover_message'  => ['nullable', 'string', 'max:1000'],
        ];
    }

    // We pass the IDs from the route/auth to keep the form clean
    public function toDTO(int $serviceRequestId, int $workerProfileId): SubmitApplicationDTO
    {
        return new SubmitApplicationDTO(
            serviceRequestId: $serviceRequestId,
            workerProfileId: $workerProfileId,
            proposedPrice: (float) $this->validated('proposed_price'),
            coverMessage: $this->validated('cover_message'),
        );
    }
}
