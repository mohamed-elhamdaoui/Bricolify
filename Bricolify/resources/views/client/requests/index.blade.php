@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">My Requests</h1>
            <p class="mt-2 text-sm text-slate-500 font-light">Manage your home service requests and track progress.</p>
        </div>
        <a href="{{ route('client.requests.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white transition-all bg-indigo-600 rounded-xl shadow-[0_4px_14px_0_rgb(79,70,229,0.39)] hover:shadow-[0_6px_20px_rgba(79,70,229,0.23)] hover:bg-indigo-700 hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Post New Request
        </a>
    </div>

    <!-- Filters/Tabs -->
    <div class="mb-8 border-b border-slate-200">
        <nav class="-mb-px flex space-x-8">
            <a href="{{ route('client.requests.index', ['status' => 'all']) }}" class="{{ $status === 'all' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm transition-colors">
                All Requests
            </a>
            <a href="{{ route('client.requests.index', ['status' => 'pending']) }}" class="{{ $status === 'pending' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm transition-colors">
                Pending
            </a>
            <a href="{{ route('client.requests.index', ['status' => 'in_progress']) }}" class="{{ $status === 'in_progress' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm transition-colors">
                In Progress
            </a>
            <a href="{{ route('client.requests.index', ['status' => 'completed']) }}" class="{{ $status === 'completed' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm transition-colors">
                Completed
            </a>
            <a href="{{ route('client.requests.index', ['status' => 'cancelled']) }}" class="{{ $status === 'cancelled' ? 'border-rose-500 text-rose-600' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300' }} whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm transition-colors">
                Cancelled
            </a>
        </nav>
    </div>

    <!-- Requests Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($requests as $request)
        <div class="bg-white rounded-3xl border border-slate-200/60 overflow-hidden shadow-sm hover:shadow-md transition-shadow relative group">
            @if($request->image_url)
                <div class="w-full h-32 overflow-hidden">
                    <img src="{{ asset('storage/' . $request->image_url) }}" alt="{{ $request->title }}" class="w-full h-full object-cover">
                </div>
            @endif
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                <span class="text-[10px] font-bold uppercase tracking-wider bg-sky-50 text-sky-600 px-2.5 py-1 rounded-full border border-sky-100">{{ $request->category->name ?? 'Service' }}</span>
                @if($request->isPending())
                    <x-badge type="warning">{{ $request->applications->count() }} Quotes</x-badge>
                @elseif($request->isCompleted())
                    <x-badge type="success">Completed</x-badge>
                @elseif($request->isCancelled())
                    <x-badge type="danger">Cancelled</x-badge>
                @else
                    <x-badge type="info">{{ ucfirst(str_replace('_', ' ', $request->status)) }}</x-badge>
                @endif
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2 truncate">{{ $request->title }}</h3>
            <p class="text-sm text-slate-500 mb-6 font-light line-clamp-2">{{ $request->description }}</p>
            
            <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                <div class="text-xs text-slate-400">Posted {{ $request->created_at->diffForHumans() }}</div>
                <div class="flex items-center gap-2">
                    @if($request->isPending() && !$request->isCancelled())
                        <a href="{{ route('client.requests.edit', $request) }}" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>
                        <form action="{{ route('client.service-requests.destroy', $request) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this request?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all" title="Delete">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    @elseif($request->isCancelled())
                        <span class="text-xs text-rose-500 font-medium">By {{ ucfirst($request->cancelled_by_role ?? 'Unknown') }}</span>
                    @endif
                    <a href="{{ route('client.requests.show', $request) }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 transition-colors flex items-center group-hover:translate-x-1 duration-300">
                        View
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
        @empty
        <!-- Empty State -->
        <div class="col-span-full text-center py-24 bg-white rounded-3xl border border-slate-200/60 border-dashed">
            <div class="mx-auto w-16 h-16 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-1">No requests yet</h3>
            <p class="text-slate-500 font-light mb-6">Get started by posting your first home service request.</p>
            <a href="{{ route('client.requests.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition-all bg-slate-900 rounded-xl hover:bg-slate-800">
                Post Request
            </a>
        </div>
        @endforelse
    </div>

</div>
@endsection
