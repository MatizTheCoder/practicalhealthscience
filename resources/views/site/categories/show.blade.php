@extends('layouts.site', [
'title' => ($category->seo_title ?: $category->name) . ' | Practical Health Science',
'description' => $category->meta_description ?: $category->description ?: 'Evidence-based health science, made practical.',
])

@section('content')
<section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
    <div class="mx-auto max-w-7xl px-6 py-14">
        <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
            ← Back to home
        </a>

        <div class="mt-6 max-w-3xl">
            <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                Category
            </div>

            <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                {{ $category->name }}
            </h1>

            @if ($category->description)
            <p class="mt-5 text-lg leading-8 text-slate-600">
                {{ $category->description }}
            </p>
            @endif
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-6 py-14">
    <div class="flex items-end justify-between gap-6">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                Articles in {{ $category->name }}
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                {{ $articles->total() }} published {{ Str::plural('article', $articles->total()) }}
            </p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 md:grid-cols-3">
        @forelse ($articles as $article)
        <x-site.article-card :article="$article" :showCategory="false" />
        @empty
        <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-slate-600 md:col-span-3">
            No published articles in this category yet.
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