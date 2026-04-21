<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\DTOs\CreateServiceRequestDTO;
use Carbon\Carbon;

class StoreServiceRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard()->check();
    }

    public function rules(): array
    {
        return [
            'category_id'    => ['required', 'exists:categories,id'],
            'title'          => ['required', 'string', 'max:255'],
            'description'    => ['required', 'string', 'max:2000'],
            'location'       => ['required', 'string', 'max:255'],
            'scheduled_date' => ['required', 'date', 'after_or_equal:today'],
            'image'          => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ];
    }

    public function toDTO(int $clientId): CreateServiceRequestDTO
    {
        return new CreateServiceRequestDTO(
            clientId: $clientId,
            categoryId: $this->validated('category_id'),
            title: $this->validated('title'),
            description: $this->validated('description'),
            location: $this->validated('location'),
            scheduledDate: Carbon::parse($this->validated('scheduled_date')),
            image: $this->file('image'),
        );
    }
}
