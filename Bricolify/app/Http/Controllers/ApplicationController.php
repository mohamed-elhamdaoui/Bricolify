<?php

namespace App\Http\Controllers;

use App\Services\ApplicationService;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    public function index()
    {
        $workerProfile = Auth::user()->workerProfile;

        if (!$workerProfile) {
            return redirect()->route('onboarding.worker.create')->with('error', 'Please complete your worker profile to view your applications.');
        }

        $applications = $workerProfile->applications()->with('serviceRequest.client')->latest()->get();
        return view('worker.applications.index', compact('applications'));
    }

    public function store(StoreApplicationRequest $request, ApplicationService $service, $serviceRequestId)
    {
        $workerProfile = Auth::user()->workerProfile;

        if (!$workerProfile) {
            return redirect()->route('onboarding.worker.create')->with('error', 'Please complete your worker profile before applying for jobs.');
        }

        $validated = $request->validated();

        $service->submitApplication(
            $serviceRequestId,
            $workerProfile->id
        );

        return back()->with('success', 'Application submitted successfully!');
    }

    public function accept(Application $application, ApplicationService $service)
    {
        $service->acceptApplication($application);
        return back()->with('success', 'Application accepted! Worker assigned.');
    }

    public function cancel(Application $application, ApplicationService $service)
    {
        $service->cancelApplication($application);
        return back()->with('success', 'Application cancelled successfully.');
    }

    public function refuse(Application $application, ApplicationService $service)
    {
        $service->refuseApplication($application);
        return back()->with('success', 'Application refused successfully.');
    }

    public function edit(Application $application)
    {
        if ($application->workerProfile->user_id !== Auth::id()) {
            abort(403);
        }

        if (!$application->isPending()) {
            return back()->with('error', 'You can only edit pending applications.');
        }

        return view('worker.applications.edit', compact('application'));
    }

    public function update(Application $application, UpdateApplicationRequest $request, ApplicationService $service)
    {
        if ($application->workerProfile->user_id !== Auth::id()) {
            abort(403);
        }

        if (!$application->isPending()) {
            return back()->with('error', 'You can only edit pending applications.');
        }

        $validated = $request->validated();

        $service->updateApplication(
            $application
        );

        return back()->with('success', 'Application updated successfully.');
    }
}
