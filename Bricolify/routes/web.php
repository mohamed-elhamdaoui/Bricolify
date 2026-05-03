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
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MarketplaceController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories.index');
Route::get('/workers', function () { return "Filtered workers coming soon"; })->name('workers.index');
Route::get('/requests', [MarketplaceController::class, 'index'])->name('requests.index');
Route::get('/requests/{serviceRequest}', [MarketplaceController::class, 'show'])->name('requests.show');
Route::get('/about', function () { return view('about'); })->name('about');


Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', function () { return view('auth.register'); })->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    // ==========================================
    // ONBOARDING ROUTES
    // ==========================================
    Route::get('/onboarding', function () { return view('onboarding.index'); })->name('onboarding');
    Route::post('/onboarding/client', function () {
        // User is already client by default — just redirect to dashboard
        return redirect()->route('dashboard')->with('success', 'Welcome! Your client account is ready.');
    })->name('onboarding.client');
    Route::get('/onboarding/worker', function () {
        $categories = \App\Models\Category::with('skills')->get();
        return view('onboarding.worker', compact('categories'));
    })->name('onboarding.worker.create');
    Route::post('/onboarding/worker', [WorkerProfileController::class, 'store'])->name('onboarding.worker.store');

    // ==========================================
    // 1. CLIENT ROUTES
    // ==========================================
    Route::middleware('role:client')->prefix('client')->name('client.')->group(function () {
        // Blade View Routes
        Route::get('/requests', [ServiceRequestController::class, 'index'])->name('requests.index');
        Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('requests.create');
        Route::get('/requests/{serviceRequest}/edit', [ServiceRequestController::class, 'edit'])->name('requests.edit');
        Route::get('/requests/{serviceRequest}', [ServiceRequestController::class, 'show'])->name('requests.show');
        Route::get('/reviews/create', function () { return view('client.reviews.create'); })->name('reviews.create');

        // Form Actions
        Route::post('/service-requests', [ServiceRequestController::class, 'store'])->name('service-requests.store');
        Route::put('/service-requests/{serviceRequest}', [ServiceRequestController::class, 'update'])->name('service-requests.update');
        Route::delete('/service-requests/{serviceRequest}', [ServiceRequestController::class, 'destroy'])->name('service-requests.destroy');
        Route::post('/service-requests/{serviceRequest}/cancel', [ServiceRequestController::class, 'cancel'])->name('service-requests.cancel');
        Route::post('/service-requests/{serviceRequest}/status', [ServiceRequestController::class, 'updateStatus'])->name('service-requests.status');
        Route::post('/applications/{application}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');
        Route::post('/applications/{application}/refuse', [ApplicationController::class, 'refuse'])->name('applications.refuse');
        Route::post('/service-requests/{serviceRequest}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    });

    // ==========================================
    // 2. WORKER ROUTES
    // ==========================================
    Route::middleware(['role:worker', 'active_worker'])->prefix('worker')->name('worker.')->group(function () {
        // Blade View Prototypes
        Route::get('/requests', [MarketplaceController::class, 'index'])->name('requests.index');
        Route::get('/requests/{serviceRequest}', [MarketplaceController::class, 'show'])->name('requests.show');
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/profile/show', function () { return view('worker.profile.show'); })->name('profile.show');
        Route::get('/profile/edit', function () { return view('worker.profile.edit'); })->name('profile.edit');

        // Form Actions
        Route::post('/profile', [WorkerProfileController::class, 'store'])->name('profile.store');
        Route::post('/service-requests/{serviceRequest}/apply', [ApplicationController::class, 'store'])->name('applications.store');
        Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
        Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
        Route::post('/applications/{application}/cancel', [ApplicationController::class, 'cancel'])->name('applications.cancel');
        Route::post('/service-requests/{serviceRequest}/status', [ServiceRequestController::class, 'updateStatus'])->name('service-requests.status');
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
        Route::get('/skills', function () {
            // Skills are now managed inline on the categories page
            return redirect()->route('admin.categories.index')->with('success', 'Manage skills directly within each category below.');
        })->name('skills.index');
        Route::get('/skills/create', [AdminController::class, 'createSkill'])->name('skills.create');
        Route::post('/skills', [AdminController::class, 'storeSkill'])->name('skills.store');
        Route::get('/skills/{skill}/edit', [AdminController::class, 'editSkill'])->name('skills.edit');
        Route::put('/skills/{skill}', [AdminController::class, 'updateSkill'])->name('skills.update');
        Route::delete('/skills/{skill}', [AdminController::class, 'destroySkill'])->name('skills.destroy');

        // Form Actions
        Route::post('/worker-profiles/{workerProfile}/validate', [WorkerProfileController::class, 'validateProfile'])->name('worker-profiles.validate');
        Route::post('/worker-profiles/{workerProfile}/suspend', [AdminController::class, 'suspendWorker'])->name('worker-profiles.suspend');
        Route::post('/worker-profiles/{workerProfile}/reinstate', [AdminController::class, 'reinstateWorker'])->name('worker-profiles.reinstate');
    });
});
