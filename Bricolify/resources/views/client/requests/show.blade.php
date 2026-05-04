@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    
    <div class="mb-8">
        <a href="{{ route('client.requests.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to my requests
        </a>
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $serviceRequest->title }}</h1>
                <div class="flex gap-3 mt-3 items-center">
                    <span class="text-xs font-bold uppercase tracking-wider bg-sky-50 text-sky-600 px-2.5 py-1 rounded-full border border-sky-100">{{ $serviceRequest->category->name ?? 'Service' }}</span>
                    <span class="text-slate-400 text-sm font-medium">{{ $serviceRequest->location ?? 'Any Location' }}</span>
                    <span class="text-slate-400 text-sm font-medium">•</span>
                    <span class="text-slate-400 text-sm font-medium">Posted {{ $serviceRequest->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="flex items-center gap-3 flex-wrap">
                @if($serviceRequest->isCancelled())
                    <div class="inline-flex items-center px-4 py-2 text-sm font-semibold text-rose-700 bg-rose-50 border border-rose-200 rounded-xl">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        Cancelled by {{ ucfirst($serviceRequest->cancelled_by_role ?? 'Unknown') }}
                    </div>
                @elseif($serviceRequest->isPending())
                    <a href="{{ route('client.requests.edit', $serviceRequest) }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Edit
                    </a>
                    <form action="{{ route('client.service-requests.destroy', $serviceRequest) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this request? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-rose-600 bg-rose-50 border border-rose-200 rounded-xl hover:bg-rose-100 hover:border-rose-300 transition-all">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Delete
                        </button>
                    </form>
                @elseif($serviceRequest->status === 'accepted')
                    <form action="{{ route('client.service-requests.status', $serviceRequest) }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="status" value="in_progress">
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-700 bg-indigo-50 border border-indigo-200 rounded-xl hover:bg-indigo-600 hover:text-white transition-all">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Start Job
                        </button>
                    </form>
                @elseif($serviceRequest->status === 'in_progress')
                    <form action="{{ route('client.service-requests.status', $serviceRequest) }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-xl hover:bg-emerald-600 hover:text-white transition-all">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Mark as Done
                        </button>
                    </form>
                @elseif($serviceRequest->isCompleted())
                    <span class="inline-flex items-center px-4 py-2 text-sm font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-xl">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Completed
                    </span>
                @endif
                @if(!$serviceRequest->isCancelled())
                    <x-badge type="warning">{{ $serviceRequest->applications->count() }} Quotes Received</x-badge>
                @endif
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            @if($serviceRequest->image_url)
                <div class="mb-8 rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm">
                    <img src="{{ asset('storage/' . $serviceRequest->image_url) }}" alt="{{ $serviceRequest->title }}" class="w-full max-h-[400px] object-cover">
                </div>
            @endif

            <div class="bg-white rounded-3xl border border-slate-200/60 p-8 shadow-sm">
                <h2 class="text-lg font-bold text-slate-900 mb-4">Description</h2>
                <div class="prose prose-slate max-w-none font-light text-slate-600 leading-relaxed whitespace-pre-wrap">{{ $serviceRequest->description }}</div>
            </div>

            @if($serviceRequest->isCancelled())
                <div class="bg-rose-50 border border-rose-200 rounded-2xl p-6">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-rose-800 text-sm">Request Cancelled</h4>
                            <p class="text-rose-700 text-sm font-light mt-1">
                                Cancelled by <span class="font-semibold">{{ ucfirst($serviceRequest->cancelled_by_role ?? 'Unknown') }}</span>
                                @if($serviceRequest->cancelled_at)
                                    on {{ $serviceRequest->cancelled_at->format('M d, Y') }}
                                @endif
                            </p>
                            @if($serviceRequest->cancel_reason)
                                <p class="text-rose-600 text-sm mt-2 bg-white/50 rounded-lg p-3 border border-rose-100">
                                    <span class="font-semibold">Reason:</span> {{ $serviceRequest->cancel_reason }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <x-alert type="info">Review the applicants below and choose the one that best fits your needs. Once accepted, they will be notified.</x-alert>
            @endif

            @if($serviceRequest->isCompleted() && $serviceRequest->assignedWorker)
            <div class="bg-white rounded-3xl border border-slate-200/60 p-8 shadow-sm mt-8">
                <h2 class="text-lg font-bold text-slate-900 mb-4">Rate Your Worker</h2>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-full bg-slate-900 text-white flex items-center justify-center font-bold text-lg">{{ substr($serviceRequest->assignedWorker->user->name ?? 'W', 0, 1) }}</div>
                    <div>
                        <h4 class="font-bold text-slate-900">{{ $serviceRequest->assignedWorker->user->name ?? 'Worker' }}</h4>
                        @if($serviceRequest->assignedWorker->rating_average > 0)
                            <div class="flex items-center text-sm text-amber-400">
                                <span>★ {{ number_format($serviceRequest->assignedWorker->rating_average, 1) }}</span>
                                <span class="text-slate-400 ml-1">({{ $serviceRequest->assignedWorker->rating_count }} Reviews)</span>
                            </div>
                        @endif
                    </div>
                </div>
                <form action="{{ route('client.reviews.store', $serviceRequest) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">Rating</label>
                        <div class="flex flex-col gap-2">
                            <div class="flex gap-1" id="star-rating-container">
                                @for($i = 1; $i <= 5; $i++)
                                    <button type="button" data-rating="{{ $i }}" class="star-btn text-3xl text-slate-200 transition-all duration-200 focus:outline-none">
                                        ★
                                    </button>
                                @endfor
                                <input type="hidden" name="rating" id="rating-input" value="5" required>
                            </div>
                            <span id="rating-label" class="text-sm font-bold text-amber-500">Excellent</span>
                        </div>
                    </div>
                    <div>
                        <label for="comment" class="block text-sm font-bold text-slate-900 mb-2">Your Review (Optional)</label>
                        <textarea id="comment" name="comment" rows="4" class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder-slate-400 resize-none" placeholder="Share your experience with this worker..."></textarea>
                    </div>
                    <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition-all">
                        Submit Review
                    </button>
                </form>
            </div>
            @endif
        </div>

        <!-- Sidebar / Applicants -->
        @if(!$serviceRequest->isCancelled())
        <div class="lg:col-span-1 space-y-6">
            <h2 class="text-lg font-bold text-slate-900">Applicants ({{ $serviceRequest->applications->count() }})</h2>
            
            <div class="space-y-4">
                @forelse($serviceRequest->applications as $application)
                <div onclick="document.getElementById('worker-modal-{{ $application->id }}').classList.remove('hidden')" class="cursor-pointer bg-white rounded-2xl border border-slate-200/60 p-5 shadow-sm hover:border-indigo-200 transition-colors group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center font-bold">{{ substr($application->workerProfile->user->name ?? 'W', 0, 1) }}</div>
                            <div>
                                <h4 class="font-bold text-sm text-slate-900 group-hover:text-indigo-600 transition-colors">{{ $application->workerProfile->user->name ?? 'Worker' }}</h4>
                                <div class="flex items-center gap-3 mt-1">
                                    <div class="flex items-center text-xs text-amber-400">
                                        @if($application->workerProfile->rating_average > 0)
                                            <span>★ {{ number_format($application->workerProfile->rating_average, 1) }}</span>
                                            <span class="text-slate-400 ml-1">({{ $application->workerProfile->rating_count }} Reviews)</span>
                                        @else
                                            <span class="text-slate-400">No reviews yet</span>
                                        @endif
                                    </div>
                                    <span class="text-slate-300">|</span>
                                    <span class="text-xs text-slate-500">{{ $application->workerProfile->experience_years ?? 0 }} years exp.</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                        </div>
                    </div>

                    @if($serviceRequest->isPending() && !$serviceRequest->isCancelled())
                    <div class="flex gap-2 mt-4" onclick="event.stopPropagation();">
                        <form action="{{ route('client.applications.accept', $application) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full py-2 bg-indigo-50 text-indigo-700 font-semibold rounded-xl text-sm hover:bg-indigo-600 hover:text-white transition-all">Accept</button>
                        </form>
                        <form action="{{ route('client.applications.refuse', $application) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to refuse this application?');">
                            @csrf
                            <button type="submit" class="w-full py-2 bg-rose-50 text-rose-700 font-semibold rounded-xl text-sm hover:bg-rose-600 hover:text-white transition-all">Refuse</button>
                        </form>
                    </div>
                    @endif
                </div>

                <!-- Worker Profile Modal -->
                <div id="worker-modal-{{ $application->id }}" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
                    <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
                        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="text-xl font-bold text-slate-900">Worker Profile</h3>
                            <button onclick="document.getElementById('worker-modal-{{ $application->id }}').classList.add('hidden')" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg hover:bg-slate-100 transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        
                        <div class="p-6">
                            <!-- Worker Header -->
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-16 h-16 rounded-full bg-slate-900 text-white flex items-center justify-center font-bold text-2xl">{{ substr($application->workerProfile->user->name ?? 'W', 0, 1) }}</div>
                                <div class="flex-1">
                                    <h4 class="text-xl font-bold text-slate-900">{{ $application->workerProfile->user->name ?? 'Worker' }}</h4>
                                    <div class="flex items-center gap-3 mt-2">
                                        @if($application->workerProfile->rating_average > 0)
                                            <div class="flex items-center text-amber-400">
                                                <span class="text-lg">★ {{ number_format($application->workerProfile->rating_average, 1) }}</span>
                                                <span class="text-slate-400 ml-2 text-sm">({{ $application->workerProfile->rating_count }} Reviews)</span>
                                            </div>
                                        @else
                                            <span class="text-slate-400 text-sm">No reviews yet</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-slate-500 mt-1">{{ $application->workerProfile->experience_years ?? 0 }} years of experience</p>
                                </div>
                            </div>

                            <!-- Bio -->
                            @if($application->workerProfile->bio)
                            <div class="mb-6 p-4 bg-slate-50 rounded-2xl">
                                <h5 class="text-sm font-bold text-slate-900 mb-2">About</h5>
                                <p class="text-sm text-slate-600">{{ $application->workerProfile->bio }}</p>
                            </div>
                            @endif

                            <!-- Skills -->
                            @if($application->workerProfile->skills && $application->workerProfile->skills->count() > 0)
                            <div class="mb-6">
                                <h5 class="text-sm font-bold text-slate-900 mb-3">Skills</h5>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($application->workerProfile->skills as $skill)
                                        <span class="px-3 py-1.5 bg-sky-50 text-sky-600 rounded-lg text-sm border border-sky-100">{{ $skill->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Reviews -->
                            @if($application->workerProfile->reviews && $application->workerProfile->reviews->count() > 0)
                            <div>
                                <h5 class="text-sm font-bold text-slate-900 mb-4">Recent Reviews</h5>
                                <div class="space-y-4">
                                    @foreach($application->workerProfile->reviews->take(5) as $review)
                                    <div class="p-4 border border-slate-100 rounded-2xl">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex text-amber-400 text-sm">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->rating)
                                                        ★
                                                    @else
                                                        <span class="text-slate-200">★</span>
                                                    @endif
                                                @endfor
                                            </div>
                                            <span class="text-xs text-slate-400">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                        @if($review->comment)
                                            <p class="text-sm text-slate-600">{{ $review->comment }}</p>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @if($application->workerProfile->reviews->count() > 5)
                                    <p class="text-center text-sm text-slate-400 mt-4">+ {{ $application->workerProfile->reviews->count() - 5 }} more reviews</p>
                                @endif
                            </div>
                            @else
                                <div class="text-center py-8 text-slate-400">
                                    <p>No reviews yet</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-6 border-t border-slate-100 flex gap-3">
                            <button onclick="document.getElementById('worker-modal-{{ $application->id }}').classList.add('hidden')" class="flex-1 py-3 bg-slate-100 text-slate-700 font-bold rounded-xl hover:bg-slate-200 transition-all">Close</button>
                            @if($serviceRequest->isPending() && !$serviceRequest->isCancelled())
                            <form action="{{ route('client.applications.accept', $application) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition-all">Hire This Worker</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-slate-500 font-light">No applicants yet.</p>
                @endforelse
            </div>
        </div>
        @endif

    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('rating-input');
        const ratingLabel = document.getElementById('rating-label');
        let selectedRating = 5;

        const labels = {
            1: 'Terrible',
            2: 'Poor',
            3: 'Average',
            4: 'Good',
            5: 'Excellent'
        };

        function renderStars(rating) {
            stars.forEach(star => {
                const starValue = parseInt(star.getAttribute('data-rating'));
                if (starValue <= rating) {
                    star.classList.remove('text-slate-200');
                    star.classList.add('text-amber-400', 'scale-110');
                } else {
                    star.classList.remove('text-amber-400', 'scale-110');
                    star.classList.add('text-slate-200');
                }
            });
            ratingLabel.textContent = labels[rating] || '';
        }

        stars.forEach(star => {
            star.addEventListener('mouseenter', () => {
                const hoverValue = parseInt(star.getAttribute('data-rating'));
                renderStars(hoverValue);
            });

            star.addEventListener('mouseleave', () => {
                renderStars(selectedRating);
            });

            star.addEventListener('click', () => {
                selectedRating = parseInt(star.getAttribute('data-rating'));
                ratingInput.value = selectedRating;
                renderStars(selectedRating);
                
                // Add a little pop animation on click
                star.classList.add('animate-ping');
                setTimeout(() => star.classList.remove('animate-ping'), 400);
            });
        });

        // Initial render
        renderStars(selectedRating);
    });
</script>
@endpush
@endsection
