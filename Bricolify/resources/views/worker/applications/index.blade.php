@extends('layouts.dashboard')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">My Applications</h1>
        <p class="mt-2 text-sm text-slate-500 font-light">Track the status of the missions you've applied for.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500 shadow-[0_1px_0_rgba(0,0,0,0.05)]">
                <tr>
                    <th scope="col" class="px-6 py-4 font-bold">Mission</th>
                    <th scope="col" class="px-6 py-4 font-bold">Client</th>
                    <th scope="col" class="px-6 py-4 font-bold">Status</th>
                    <th scope="col" class="px-6 py-4 font-bold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($applications as $application)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <a href="{{ route('worker.requests.show', $application->serviceRequest) }}" class="font-bold text-slate-900 hover:text-indigo-600 transition-colors">{{ $application->serviceRequest->title }}</a>
                        <div class="text-xs text-slate-500 mt-1">Applied {{ $application->created_at->diffForHumans() }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-700">{{ substr($application->serviceRequest->client->name ?? 'C', 0, 1) }}</div>
                            <span class="font-medium text-slate-700">{{ $application->serviceRequest->client->name ?? 'Client' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @if($application->isPending())
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-amber-50 text-amber-600 border border-amber-200">Pending</span>
                        @elseif($application->isAccepted())
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Accepted</span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-rose-50 text-rose-600 border border-rose-200">{{ ucfirst($application->status) }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            @if($application->isPending())
                                <form action="{{ route('worker.applications.cancel', $application) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to cancel this application?');">
                                    @csrf
                                    <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all" title="Cancel">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            @elseif($application->isAccepted() && $application->serviceRequest->status === 'accepted')
                                <form action="{{ route('worker.service-requests.status', $application->serviceRequest) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="status" value="in_progress">
                                    <button type="submit" class="px-3 py-1.5 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-lg hover:bg-indigo-600 hover:text-white transition-all">Start Job</button>
                                </form>
                            @elseif($application->serviceRequest->status === 'in_progress')
                                <form action="{{ route('worker.service-requests.status', $application->serviceRequest) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="status" value="completed">
                                    <button type="submit" class="px-3 py-1.5 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-lg hover:bg-emerald-600 hover:text-white transition-all">Complete Job</button>
                                </form>
                            @endif
                            <a href="{{ route('worker.requests.show', $application->serviceRequest) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm transition-colors">View</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="text-slate-400 font-medium">No applications yet</div>
                        <a href="{{ route('worker.requests.index') }}" class="inline-block mt-2 text-indigo-600 hover:text-indigo-800 font-semibold text-sm">Browse Requests</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
