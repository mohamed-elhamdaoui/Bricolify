<?php

namespace App\Http\Controllers;

use App\Services\WorkerProfileService;
use App\Models\WorkerProfile;
use Illuminate\Support\Facades\Auth;

class WorkerProfileController extends Controller
{
    public function store(WorkerProfileService $profileService)
    {
        $profileService->createProfile(
            Auth::id(),
            request('experience_years'),
            request('bio'),
            request('skill_ids')
        );

        return redirect()->route('dashboard')->with('success', 'Profile created successfully. Waiting for admin validation.');
    }

    public function validateProfile(WorkerProfile $workerProfile, WorkerProfileService $profileService)
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $profileService->validateProfile($workerProfile);
        return back()->with('success', 'Worker profile validated successfully.');
    }
}
