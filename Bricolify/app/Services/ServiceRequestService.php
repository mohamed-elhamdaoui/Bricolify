<?php

namespace App\Services;

use App\DTOs\CreateServiceRequestDTO;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class ServiceRequestService
{
    public function createRequest(CreateServiceRequestDTO $dto): ServiceRequest
    {
        return DB::transaction(function () use ($dto) {
            return ServiceRequest::create([
                'client_id'      => $dto->clientId,
                'category_id'    => $dto->categoryId,
                'title'          => $dto->title,
                'description'    => $dto->description,
                'location'       => $dto->location,
                'scheduled_date' => $dto->scheduledDate,
                'status'         => 'pending',
            ]);
        });
    }

    public function cancelRequest(ServiceRequest $serviceRequest, string $role, string $reason): void
    {
        $serviceRequest->update([
            'status'            => 'cancelled',
            'cancelled_by_role' => $role,
            'cancel_reason'     => $reason,
            'cancelled_at'      => now(),
        ]);
    }

    public function updateStatus(ServiceRequest $serviceRequest, string $newStatus): void
    {
        $allowedTransitions = [
            'accepted'    => 'in_progress',
            'in_progress' => 'completed'
        ];

        if (!isset($allowedTransitions[$serviceRequest->status]) || $allowedTransitions[$serviceRequest->status] !== $newStatus) {
            throw new Exception("لا يمكن تغيير حالة الطلب من {$serviceRequest->status} إلى {$newStatus}.");
        }

        $serviceRequest->update(['status' => $newStatus]);
    }
}
