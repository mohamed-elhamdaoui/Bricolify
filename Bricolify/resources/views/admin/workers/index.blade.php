@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

    {{-- Header --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Worker Approvals</h1>
            <p class="mt-2 text-sm text-slate-500 font-light">Review and activate worker accounts before they can apply to jobs.</p>
        </div>
        {{-- Stats --}}
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-bold px-3 py-1.5 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 inline-block"></span>
                {{ $workers->where('status', 'pending')->count() }} Pending
            </span>
            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold px-3 py-1.5 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span>
                {{ $workers->where('status', 'active')->count() }} Active
            </span>
        </div>
    </div>

    {{-- Flash --}}
    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl px-4 py-3 text-sm font-medium">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500 shadow-[0_1px_0_rgba(0,0,0,0.05)]">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold">Worker</th>
                        <th scope="col" class="px-6 py-4 font-bold">Experience</th>
                        <th scope="col" class="px-6 py-4 font-bold">Skills</th>
                        <th scope="col" class="px-6 py-4 font-bold">Applied</th>
                        <th scope="col" class="px-6 py-4 font-bold">Status</th>
                        <th scope="col" class="px-6 py-4 font-bold text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($workers as $worker)
                    <tr class="hover:bg-slate-50/60 transition-colors">

                        {{-- Worker Info --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm shrink-0">
                                    {{ strtoupper(substr($worker->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-bold text-slate-900">{{ $worker->user->name }}</div>
                                    <div class="text-xs text-slate-400">{{ $worker->user->email }}</div>
                                </div>
                            </div>
                        </td>

                        {{-- Experience --}}
                        <td class="px-6 py-4">
                            <span class="font-semibold text-slate-800">{{ $worker->experience_years }}</span>
                            <span class="text-slate-400 text-xs ml-1">yr{{ $worker->experience_years != 1 ? 's' : '' }}</span>
                        </td>

                        {{-- Skills --}}
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-1 max-w-[200px]">
                                @forelse($worker->skills->take(3) as $skill)
                                    <span class="text-[10px] font-semibold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">{{ $skill->name }}</span>
                                @empty
                                    <span class="text-xs text-slate-400 italic">No skills</span>
                                @endforelse
                                @if($worker->skills->count() > 3)
                                    <span class="text-[10px] font-semibold bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">+{{ $worker->skills->count() - 3 }}</span>
                                @endif
                            </div>
                        </td>

                        {{-- Applied Date --}}
                        <td class="px-6 py-4 text-xs text-slate-500 font-medium">
                            {{ $worker->created_at->format('M d, Y') }}
                        </td>

                        {{-- Status — driven by worker_profiles.status --}}
                        <td class="px-6 py-4">
                            @if($worker->status === 'pending')
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-700 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 inline-block"></span>Pending
                                </span>
                            @elseif($worker->status === 'active')
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span>Active
                                </span>
                            @elseif($worker->status === 'suspended')
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-red-700 bg-red-50 border border-red-200 px-2.5 py-1 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 inline-block"></span>Suspended
                                </span>
                            @endif
                        </td>

                        {{-- Action --}}
                        <td class="px-6 py-4 text-right">
                            @if($worker->status === 'pending')
                                <form action="{{ route('admin.worker-profiles.validate', $worker) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                            class="text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-1.5 rounded-lg transition-colors">
                                        Approve
                                    </button>
                                </form>
                            @elseif($worker->status === 'active')
                                <span class="text-xs text-slate-400 font-medium">Approved</span>
                            @elseif($worker->status === 'suspended')
                                <span class="text-xs text-red-400 font-medium">Suspended</span>
                            @endif
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <p class="text-slate-400 font-light">No worker profiles submitted yet.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
