<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerProfileRequest;
use App\Services\WorkerProfileService;
use App\Models\WorkerProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Exception;

class WorkerProfileController extends Controller
{
    public function store(StoreWorkerProfileRequest $request, WorkerProfileService $profileService): RedirectResponse
    {
        try {
            $dto = $request->toDTO(Auth::id());
            $profileService->createProfile($dto);

            return redirect()->route('dashboard')->with('success', 'Profile created successfully. Waiting for admin validation.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    // Admin action
    public function validateProfile(WorkerProfile $workerProfile, WorkerProfileService $profileService): RedirectResponse
    {
        // Manual role check replacing Policies
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $profileService->validateProfile($workerProfile);
            return back()->with('success', 'Worker profile validated successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
