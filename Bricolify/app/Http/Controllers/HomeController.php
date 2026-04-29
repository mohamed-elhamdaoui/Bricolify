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

        $requests = ServiceRequest::with(['category', 'client'])
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        return view('welcome', compact('categories', 'requests'));
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

    public function requests(Request $request)
    {
        $categories = Category::all();
        
        $query = ServiceRequest::with(['category', 'client'])->where('status', 'pending');
        
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        
        $requests = $query->latest()->paginate(10);
        
        return view('requests.index', compact('categories', 'requests'));
    }
}
