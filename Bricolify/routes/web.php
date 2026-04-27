<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkerProfileController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ReviewController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', function () { return view('view'); }); // matches view.blade.php

Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', function () { return view('auth.register'); })->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/notifications', function () { return view('notifications'); })->name('notifications');


    
    // ==========================================
    // 1. CLIENT ROUTES
    // ==========================================
    Route::middleware('role:client')->prefix('client')->name('client.')->group(function () {
        // Blade View Routes
        Route::get('/requests', [ServiceRequestController::class, 'index'])->name('requests.index');
        Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('requests.create');
        Route::get('/requests/{serviceRequest}', [ServiceRequestController::class, 'show'])->name('requests.show');
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
    Route::middleware('role:worker')->prefix('worker')->name('worker.')->group(function () {
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
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // Workers
        Route::get('/workers', [AdminController::class, 'workers'])->name('workers.index');

        // Categories
        Route::get('/categories', [AdminController::class, 'categories'])->name('categories.index');
        Route::get('/categories/create', [AdminController::class, 'createCategory'])->name('categories.create');
        Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
        Route::get('/categories/{category}/edit', [AdminController::class, 'editCategory'])->name('categories.edit');
        Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])->name('categories.update');
        Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('categories.destroy');

        // Skills
        Route::get('/skills', [AdminController::class, 'skills'])->name('skills.index');
        Route::get('/skills/create', [AdminController::class, 'createSkill'])->name('skills.create');
        Route::post('/skills', [AdminController::class, 'storeSkill'])->name('skills.store');
        Route::get('/skills/{skill}/edit', [AdminController::class, 'editSkill'])->name('skills.edit');
        Route::put('/skills/{skill}', [AdminController::class, 'updateSkill'])->name('skills.update');
        Route::delete('/skills/{skill}', [AdminController::class, 'destroySkill'])->name('skills.destroy');

        // Form Actions
        Route::post('/worker-profiles/{workerProfile}/validate', [WorkerProfileController::class, 'validateProfile'])->name('worker-profiles.validate');
    });
});
