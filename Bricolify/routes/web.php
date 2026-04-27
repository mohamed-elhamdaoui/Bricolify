<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkerProfileController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ReviewController;

// Public Routes
Route::get('/', function () { return view('welcome'); })->name('home');
// Route::get('/', function () { return view('view'); }); // matches view.blade.php

Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Authenticated Routes


    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/notifications', function () { return view('notifications'); })->name('notifications');

    // ==========================================
    // 1. CLIENT ROUTES
    // ==========================================
    Route::middleware('can:is-client')->prefix('client')->name('client.')->group(function () {
        // Blade View Prototypes
        Route::get('/requests', function () { return view('client.requests.index'); })->name('requests.index');
        Route::get('/requests/create', function () { return view('client.requests.create'); })->name('requests.create');
        Route::get('/requests/show', function () { return view('client.requests.show'); })->name('requests.show');
        Route::get('/reviews/create', function () { return view('client.reviews.create'); })->name('reviews.create');

        // Form Actions
        Route::post('/service-requests', [ServiceRequestController::class, 'store'])->name('service-requests.store');
        Route::post('/service-requests/{serviceRequest}/cancel', [ServiceRequestController::class, 'cancel'])->name('service-requests.cancel');
        Route::post('/service-requests/{serviceRequest}/status', [ServiceRequestController::class, 'updateStatus'])->name('service-requests.status');
        Route::post('/applications/{application}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');
        Route::post('/service-requests/{serviceRequest}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    });

    // ==========================================
    // 2. WORKER ROUTES
    // ==========================================
    Route::middleware('can:is-worker')->prefix('worker')->name('worker.')->group(function () {
        // Blade View Prototypes
        Route::get('/requests', function () { return view('worker.requests.index'); })->name('requests.index');
        Route::get('/requests/show', function () { return view('worker.requests.show'); })->name('requests.show');
        Route::get('/applications', function () { return view('worker.applications.index'); })->name('applications.index');
        Route::get('/profile/show', function () { return view('worker.profile.show'); })->name('profile.show');
        Route::get('/profile/edit', function () { return view('worker.profile.edit'); })->name('profile.edit');

        // Form Actions
        Route::post('/profile', [WorkerProfileController::class, 'store'])->name('profile.store');
        Route::post('/service-requests/{serviceRequest}/apply', [ApplicationController::class, 'store'])->name('applications.store');
        Route::post('/applications/{application}/cancel', [ApplicationController::class, 'cancel'])->name('applications.cancel');
    });

    // ==========================================
    // 3. ADMIN ROUTES
    // ==========================================
     
        // Blade View Prototypes
        Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard.view');
        Route::get('/workers', function () { return view('admin.workers.index'); })->name('workers.index');
        Route::get('/categories', function () { return view('admin.categories.index'); })->name('categories.index');
        Route::get('/skills', function () { return view('admin.skills.index'); })->name('skills.index');

        // Form Actions
        Route::post('/worker-profiles/{workerProfile}/validate', [WorkerProfileController::class, 'validateProfile'])->name('worker-profiles.validate');
    


