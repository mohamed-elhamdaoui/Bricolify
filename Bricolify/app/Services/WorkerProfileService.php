<?php

namespace App\Services;

use App\DTOs\CreateWorkerProfileDTO;
use App\Models\User;
use App\Models\WorkerProfile;
use Illuminate\Support\Facades\DB;

class WorkerProfileService
{
    public function createProfile(CreateWorkerProfileDTO $dto): WorkerProfile
    {
        return DB::transaction(function () use ($dto) {
            // Upgrade user role to worker
            User::where('id', $dto->userId)->update(['role' => 'worker']);

            $profile = WorkerProfile::create([
                'user_id'          => $dto->userId,
                'experience_years' => $dto->experienceYears,
                'bio'              => $dto->bio,
                'status'           => 'pending',
            ]);

            if (!empty($dto->skillIds)) {
                $profile->skills()->attach($dto->skillIds);
            }

            return $profile;
        });
    }

    public function validateProfile(WorkerProfile $profile): void
    {
        $profile->update([
            'status'       => 'active',
            'is_validated' => true,
            'validated_at' => now(),
        ]);
    }

    public function suspendProfile(WorkerProfile $profile): void
    {
        $profile->update([
            'status' => 'suspended',
        ]);
    }
}
