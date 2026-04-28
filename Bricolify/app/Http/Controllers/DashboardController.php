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

        if ($user->isClient()) {
            return redirect()->route('client.requests.index');
        }

        if ($user->isWorker()) {
             return redirect()->route('worker.requests.index');
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
