<?php

namespace App\Services;

use App\Models\User;
use App\Models\WorkerProfile;
use App\Models\Notification;

class WorkerProfileService
{
    public function createProfile($userId, $experienceYears, $bio, $skillIds)
    {
        User::where('id', $userId)->update(['role' => 'worker']);

        $profile = WorkerProfile::create([
            'user_id'          => $userId,
            'experience_years' => $experienceYears,
            'bio'              => $bio,
            'status'           => 'pending',
        ]);

        if (!empty($skillIds)) {
            $profile->skills()->attach($skillIds);
        }

        Notification::create([
            'user_id'         => $userId,
            'type'            => 'Profile Submitted',
            'message'         => 'Your worker profile has been submitted and is currently under review.',
            'notifiable_type' => WorkerProfile::class,
            'notifiable_id'   => $profile->id,
        ]);

        return $profile;
    }

    public function validateProfile(WorkerProfile $profile)
    {
        $profile->update([
            'status'       => 'active',
            'is_validated' => true,
            'validated_at' => now(),
        ]);

        Notification::create([
            'user_id'         => $profile->user_id,
            'type'            => 'Profile Approved',
            'message'         => 'Congratulations! Your worker profile has been approved. You can now apply for missions.',
            'notifiable_type' => WorkerProfile::class,
            'notifiable_id'   => $profile->id,
        ]);
    }

    public function suspendProfile(WorkerProfile $profile)
    {
        $profile->update([
            'status' => 'suspended',
        ]);

        Notification::create([
            'user_id'         => $profile->user_id,
            'type'            => 'Account Suspended',
            'message'         => 'Your account has been suspended. Please contact support if you believe this is a mistake.',
            'notifiable_type' => WorkerProfile::class,
            'notifiable_id'   => $profile->id,
        ]);
    }

    public function reinstateProfile(WorkerProfile $profile)
    {
        $profile->update([
            'status' => 'active',
        ]);

        Notification::create([
            'user_id'         => $profile->user_id,
            'type'            => 'Account Reinstated',
            'message'         => 'Your account has been reinstated. Welcome back!',
            'notifiable_type' => WorkerProfile::class,
            'notifiable_id'   => $profile->id,
        ]);
    }
}
