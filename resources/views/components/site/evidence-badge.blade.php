@props([
    'evidence' => null,
    'prefix' => true,
])

@if ($evidence)
    @php
        $label = str($evidence)->replace('_', ' ')->title();

        $classes = match ($evidence) {
            'high' => 'bg-emerald-50 text-emerald-800 ring-emerald-200',
            'moderate' => 'bg-[#EAF7F3] text-[#2F7F7A] ring-[#D3EDE7]',
            'limited' => 'bg-amber-50 text-amber-800 ring-amber-200',
            'early' => 'bg-orange-50 text-orange-800 ring-orange-200',
            'very_early' => 'bg-rose-50 text-rose-800 ring-rose-200',
            'mixed' => 'bg-slate-100 text-slate-700 ring-slate-200',
            'unclear' => 'bg-slate-100 text-slate-700 ring-slate-200',
            default => 'bg-slate-100 text-slate-700 ring-slate-200',
            'not_applicable' => 'bg-slate-100 text-slate-700 ring-slate-200',
        };
    @endphp

    <span class="rounded-full px-3 py-1 text-xs font-semibold ring-1 {{ $classes }}">
        {{ $prefix ? 'Evidence: ' : '' }}{{ $label }}
    </span>
@endif