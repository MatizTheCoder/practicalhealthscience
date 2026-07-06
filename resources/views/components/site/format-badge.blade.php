@props([
    'format' => null,
])

@if ($format)
    @php
        $label = str($format)->replace('_', ' ')->title();

        $classes = match ($format) {
            'explainer' => 'bg-[#EAF7F3] text-[#2F7F7A] ring-[#D3EDE7]',
            'myth_check' => 'bg-amber-50 text-amber-800 ring-amber-200',
            'research_breakdown' => 'bg-emerald-50 text-emerald-800 ring-emerald-200',
            'practical_takeaway' => 'bg-slate-100 text-slate-700 ring-slate-200',
            'emerging_therapy_explained' => 'bg-rose-50 text-rose-800 ring-rose-200',
            'evidence_brief' => 'bg-indigo-50 text-indigo-800 ring-indigo-200',
            default => 'bg-slate-100 text-slate-700 ring-slate-200',
        };
    @endphp

    <span class="rounded-full px-3 py-1 text-xs font-semibold ring-1 {{ $classes }}">
        {{ $label }}
    </span>
@endif