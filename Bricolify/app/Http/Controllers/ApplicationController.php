<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Services\ApplicationService;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Exception;

class ApplicationController extends Controller
{
    public function store(StoreApplicationRequest $request, ApplicationService $service, $serviceRequestId): RedirectResponse
    {
        try {
            $workerProfileId = Auth::user()->workerProfile->id;
            $dto = $request->toDTO($serviceRequestId, $workerProfileId);

            $service->submitApplication($dto);

            return back()->with('success', 'Application submitted successfully!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    // No FormRequest needed here as there is no user input besides the route parameter
    public function accept(Application $application, ApplicationService $service): RedirectResponse
    {
        try {
            $service->acceptApplication($application);
            return back()->with('success', 'Application accepted! Worker assigned.');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    // No FormRequest needed here as there is no user input besides the route parameter
    public function cancel(Application $application, ApplicationService $service): RedirectResponse
    {
        try {
            $service->cancelApplication($application);
            return back()->with('success', 'Application cancelled successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
