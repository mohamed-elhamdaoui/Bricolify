<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ServiceRequest;
use App\Models\WorkerProfile;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isWorker()) {
            $stats = [
                'rating' => 4.9, // Mocked for now
                'jobsDone' => $user->applications()->where('applications.status', 'accepted')->count(),
                'pendingApps' => $user->applications()->where('applications.status', 'pending')->count(),
            ];
            return view('worker.dashboard', compact('stats'));
        }

        if ($user->isClient()) {
            $stats = [
                'activeRequests' => $user->serviceRequests()->whereIn('status', ['pending', 'in_progress'])->count(),
                'completedMissions' => $user->serviceRequests()->where('status', 'completed')->count(),
                'totalSpent' => 0, // Mocked
            ];
            return view('client.dashboard', compact('stats'));
        }

        if ($user->isAdmin()) {
            $totalUsers = User::count();
            $activeMissions = ServiceRequest::whereIn('status', ['pending', 'in_progress'])->count();
            $pendingApprovals = WorkerProfile::where('is_validated', false)->count();
            $transactionVolume = 45000; // Mocked until transactions are fully implemented
            
            return view('admin.dashboard', compact('totalUsers', 'activeMissions', 'pendingApprovals', 'transactionVolume'));
        }

        abort(403);
    }
}
