<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceRequest;
use App\Models\WorkerProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $recentRequests = ServiceRequest::with(['category', 'client'])
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        return view('welcome', compact('categories', 'recentRequests'));
    }

    public function categories()
    {
        $categories = Category::with('skills.workerProfiles')->get()->map(function ($category) {
            $category->workers_count = $category->skills->flatMap->workerProfiles
                ->where('status', 'active')
                ->unique('id')
                ->count();
            return $category;
        });

        $stats = [
            'total_categories' => $categories->count(),
            'total_workers' => WorkerProfile::where('status', 'active')->count()
        ];

        return view('categories.index', compact('categories', 'stats'));
    }
}
