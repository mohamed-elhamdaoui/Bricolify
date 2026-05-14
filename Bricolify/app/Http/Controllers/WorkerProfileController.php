<?php

namespace App\Http\Controllers;

use App\Services\WorkerProfileService;
use App\Models\WorkerProfile;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreWorkerProfileRequest;

class WorkerProfileController extends Controller
{
    public function store(StoreWorkerProfileRequest $request, WorkerProfileService $profileService)
    {
        $validated = $request->validated();

        $profileService->createProfile(
            Auth::id(),
            $validated['experience_years'],
            $validated['bio'],
            $validated['skill_ids'] ?? []
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
