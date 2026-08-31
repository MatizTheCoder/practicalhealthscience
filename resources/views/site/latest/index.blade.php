@extends('layouts.site', [
    'title' => 'Latest Health Science Articles | Practical Health Science',
    'description' => 'Read the latest evidence-based health science articles from Practical Health Science, including exercise, metabolism, nutrition, disease prevention, supplements, longevity, and research explained.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-7xl px-6 py-16">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                ← Back to home
            </a>

            <div class="mt-6 max-w-3xl">
                <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                    Latest articles
                </div>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                    Latest evidence-based health science articles.
                </h1>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Browse the newest Practical Health Science explainers, myth checks, research breakdowns, and practical takeaways.
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-14">
        @if ($articles->isNotEmpty())
            <div class="grid gap-6 md:grid-cols-3">
                @foreach ($articles as $article)
                    <x-site.article-card :article="$article" :showTakeaway="true" />
                @endforeach
            </div>

            <div class="mt-10">
                {{ $articles->links() }}
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-slate-600">
                No published articles yet. New articles will appear here after they are published.
            </div>
        @endif
    </section>
@endsection