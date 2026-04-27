<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceRequest;
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
}
