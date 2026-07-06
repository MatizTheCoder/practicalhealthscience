@extends('layouts.site', [
'title' => $tag->name . ' | Practical Health Science',
'description' => $tag->description ?: 'Evidence-based Practical Health Science articles about ' . $tag->name . '.',
])

@section('content')
<section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
    <div class="mx-auto max-w-7xl px-6 py-14">
        <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
            ← Back to home
        </a>

        <div class="mt-6 max-w-3xl">
            <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                Topic
            </div>

            <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                {{ $tag->name }}
            </h1>

            @if ($tag->description)
            <p class="mt-5 text-lg leading-8 text-slate-600">
                {{ $tag->description }}
            </p>
            @else
            <p class="mt-5 text-lg leading-8 text-slate-600">
                Evidence-based articles and explainers related to {{ $tag->name }}.
            </p>
            @endif
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-6 py-14">
    <div class="flex items-end justify-between gap-6">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                Articles tagged with “{{ $tag->name }}”
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                {{ $articles->total() }} published {{ \Illuminate\Support\Str::plural('article', $articles->total()) }}
            </p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 md:grid-cols-3">
        @forelse ($articles as $article)
        <x-site.article-card :article="$article" />
        @empty
        <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-slate-600 md:col-span-3">
            No published articles with this tag yet.
        </div>
        @endforelse
    </div>

    @if ($articles->hasPages())
    <div class="mt-10">
        {{ $articles->links() }}
    </div>
    @endif
</section>
@endsection