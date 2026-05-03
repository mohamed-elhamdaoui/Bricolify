<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        
        $query = ServiceRequest::with(['category', 'client'])
            ->where('status', 'pending');
        
        // Filter out jobs worker has already applied to
        if (Auth::check() && Auth::user()->isWorker()) {
            $workerProfileId = Auth::user()->workerProfile->id ?? null;
            if ($workerProfileId) {
                $appliedRequestIds = Application::where('worker_profile_id', $workerProfileId)
                    ->pluck('service_request_id')
                    ->toArray();
                
                if (!empty($appliedRequestIds)) {
                    $query->whereNotIn('id', $appliedRequestIds);
                }
            }
        }
        
        // Filter by Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        // Filter by Category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        
        // Filter by Location
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        
        $requests = $query->latest()->paginate(12);
        
        return view('marketplace.index', compact('categories', 'requests'));
    }

    public function show(ServiceRequest $serviceRequest)
    {
        $serviceRequest->load(['category', 'client']);
        
        $hasApplied = false;
        if (Auth::check() && Auth::user()->isWorker()) {
            $workerProfileId = Auth::user()->workerProfile->id ?? null;
            if ($workerProfileId) {
                $hasApplied = Application::where('service_request_id', $serviceRequest->id)
                    ->where('worker_profile_id', $workerProfileId)
                    ->exists();
            }
        }
        
        return view('marketplace.show', compact('serviceRequest', 'hasApplied'));
    }
}
