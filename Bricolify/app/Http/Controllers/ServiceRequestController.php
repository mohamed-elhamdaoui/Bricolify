<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\Category;
use App\Services\ServiceRequestService;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreServiceRequestRequest;
use App\Http\Requests\UpdateServiceRequestRequest;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $status = request('status', 'all');
        
        $query = Auth::user()->serviceRequests();
        
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        
        $requests = $query->latest()->get();
        return view('client.requests.index', compact('requests', 'status'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('client.requests.create', compact('categories'));
    }

    public function edit(ServiceRequest $serviceRequest)
    {
        if ($serviceRequest->client_id !== Auth::id()) {
            abort(403);
        }

        if (!$serviceRequest->isPending()) {
            return back()->with('error', 'You can only edit pending requests.');
        }

        $categories = Category::all();
        return view('client.requests.edit', compact('serviceRequest', 'categories'));
    }

    public function show(ServiceRequest $serviceRequest)
    {
        if ($serviceRequest->client_id !== Auth::id()) {
            abort(403);
        }
        
        $serviceRequest->load(['category', 'applications.workerProfile.user', 'applications.workerProfile.skills', 'applications.workerProfile.reviews', 'assignedWorker.user']);
        
        return view('client.requests.show', compact('serviceRequest'));
    }

    public function store(StoreServiceRequestRequest $request, ServiceRequestService $service)
    {
        $validated = $request->validated();

        $service->createRequest(
            Auth::id(),
            $validated['category_id'],
            $validated['title'],
            $validated['description'],
            $validated['location'],
            $validated['scheduled_date'],
            $request->file('image')
        );

        return redirect()->route('dashboard')->with('success', 'Service request published successfully.');
    }

    public function update(ServiceRequest $serviceRequest, UpdateServiceRequestRequest $request, ServiceRequestService $service)
    {
        if ($serviceRequest->client_id !== Auth::id()) {
            abort(403);
        }

        if (!$serviceRequest->isPending()) {
            return back()->with('error', 'You can only edit pending requests.');
        }

        $validated = $request->validated();

        $service->updateRequest(
            $serviceRequest,
            $validated['category_id'],
            $validated['title'],
            $validated['description'],
            $validated['location'],
            $validated['scheduled_date'],
            $request->file('image')
        );

        return redirect()->route('client.requests.show', $serviceRequest)->with('success', 'Service request updated successfully.');
    }

    public function cancel(ServiceRequest $serviceRequest, ServiceRequestService $service)
    {
        $service->cancelRequest($serviceRequest, request('role'), request('reason'));
        return back()->with('success', 'Service request cancelled successfully.');
    }

    public function updateStatus(ServiceRequest $serviceRequest, ServiceRequestService $service)
    {
        $user = Auth::user();
        $isClient = $serviceRequest->client_id === $user->id;
        $isAssignedWorker = $serviceRequest->assigned_worker_profile_id && $user->workerProfile && $serviceRequest->assigned_worker_profile_id === $user->workerProfile->id;

        if (!$isClient && !$isAssignedWorker) {
            abort(403, 'Only the client or assigned worker can update the job status.');
        }

        $service->updateStatus($serviceRequest, request('status'));
        return back()->with('success', 'Service request status updated successfully.');
    }

    public function destroy(ServiceRequest $serviceRequest, ServiceRequestService $service)
    {
        if ($serviceRequest->client_id !== Auth::id()) {
            abort(403);
        }

        if (!$serviceRequest->isPending()) {
            return back()->with('error', 'You can only delete pending requests.');
        }

        $service->deleteRequest($serviceRequest);
        return redirect()->route('client.requests.index')->with('success', 'Service request deleted successfully.');
    }
}
