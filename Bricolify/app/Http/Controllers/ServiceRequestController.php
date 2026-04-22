<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequestRequest;
use App\Http\Requests\CancelServiceRequestRequest;
use App\Http\Requests\UpdateServiceRequestStatusRequest;
use App\Services\ServiceRequestService;
use App\Models\ServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Exception;

class ServiceRequestController extends Controller
{
    public function store(StoreServiceRequestRequest $request, ServiceRequestService $service): RedirectResponse
    {
        try {
            $dto = $request->toDTO(Auth::id());
            $service->createRequest($dto);

            return redirect()->route('dashboard')->with('success', 'Service request published successfully.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function cancel(CancelServiceRequestRequest $request, ServiceRequest $serviceRequest, ServiceRequestService $service): RedirectResponse
    {
        try {
            $service->cancelRequest($serviceRequest, $request->getRole(), $request->getReason());
            return back()->with('success', 'Service request cancelled successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function updateStatus(UpdateServiceRequestStatusRequest $request, ServiceRequest $serviceRequest, ServiceRequestService $service): RedirectResponse
    {
        try {
            $service->updateStatus($serviceRequest, $request->getStatus());
            return back()->with('success', 'Service request status updated successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
