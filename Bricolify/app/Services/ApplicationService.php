<?php

namespace App\Services;

use App\DTOs\SubmitApplicationDTO;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Exception;

class ApplicationService
{
    public function submitApplication(SubmitApplicationDTO $dto): Application
    {
        $exists = Application::where('service_request_id', $dto->serviceRequestId)
            ->where('worker_profile_id', $dto->workerProfileId)
            ->exists();

        if ($exists) {
            throw new Exception('لقد قمت بتقديم عرض لهذا الطلب مسبقاً.');
        }

        return Application::create([
            'service_request_id' => $dto->serviceRequestId,
            'worker_profile_id'  => $dto->workerProfileId,
            'proposed_price'     => $dto->proposedPrice,
            'cover_message'      => $dto->coverMessage,
            'status'             => 'pending',
        ]);
    }

    public function acceptApplication(Application $application): void
    {
        DB::transaction(function () use ($application) {
            $serviceRequest = $application->serviceRequest;

            if (!$serviceRequest->isPending()) {
                throw new Exception('هذا الطلب لم يعد متاحاً.');
            }

            $application->update(['status' => 'accepted']);

            Application::where('service_request_id', $serviceRequest->id)
                ->where('id', '!=', $application->id)
                ->update(['status' => 'rejected']);

            $serviceRequest->update([
                'assigned_worker_profile_id' => $application->worker_profile_id,
                'status'                     => 'accepted',
            ]);
        });
    }

    public function cancelApplication(Application $application): void
    {
        if (!$application->isPending()) {
            throw new Exception('يمكنك فقط إلغاء العروض التي لا تزال قيد الانتظار.');
        }

        $application->update(['status' => 'cancelled']);
    }
}
