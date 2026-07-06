@extends('layouts.site', [
'title' => 'Practical Health Science | Evidence-based health science, made practical.',
'description' => 'Practical Health Science explains what health science actually says — clearly, cautiously, and without hype.',
])

@section('content')
<section class="bg-gradient-to-b from-white to-[#F7FBFA]">
    <div class="mx-auto grid max-w-7xl gap-12 px-6 py-16 md:grid-cols-[1.1fr_0.9fr] md:items-center lg:py-24">
        <div>
            <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                What does the science actually say?
            </div>

            <h1 class="mt-6 max-w-4xl text-4xl font-extrabold tracking-tight text-[#102033] md:text-6xl">
                Evidence-based health science, made practical.
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">
                We translate complex health and biomedical research into clear, practical, and trustworthy explanations for everyday readers.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="#latest" class="inline-flex items-center justify-center rounded-full bg-[#1E2A5A] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#102033]">
                    Read latest articles
                </a>

                <a href="{{ route('categories.index') }}" class="inline-flex items-center justify-center rounded-full border border-[#D3EDE7] bg-white px-6 py-3 text-sm font-semibold text-[#1E2A5A] hover:border-[#3A8F8A]">
                    Browse categories
                </a>
            </div>
        </div>

        <div class="rounded-[2rem] border border-[#D3EDE7] bg-white p-6 shadow-sm">
            <div class="rounded-[1.5rem] bg-[#EAF7F3] p-6">
                <div class="text-sm font-semibold uppercase tracking-wide text-[#3A8F8A]">
                    Editorial promise
                </div>

                <ul class="mt-5 space-y-4 text-sm leading-6 text-slate-700">
                    <li>
                        <strong class="text-[#102033]">1. What does the science say?</strong><br>
                        Clear explanation of the evidence.
                    </li>

                    <li>
                        <strong class="text-[#102033]">2. How strong is the evidence?</strong><br>
                        Careful distinction between strong, limited, early, and mixed findings.
                    </li>

                    <li>
                        <strong class="text-[#102033]">3. What are the limitations?</strong><br>
                        No hype, no miracle claims, no false certainty.
                    </li>

                    <li>
                        <strong class="text-[#102033]">4. What should a reasonable reader take away?</strong><br>
                        Practical meaning in real life.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="latest" class="mx-auto max-w-7xl px-6 py-14">
    <div class="flex items-end justify-between gap-6">
        <div>
            <h2 class="text-3xl font-bold tracking-tight text-[#102033]">
                Latest evidence-based explainers
            </h2>

            <p class="mt-3 max-w-2xl text-slate-600">
                Clear, cautious breakdowns of health claims, research findings, and biomedical developments.
            </p>
        </div>
    </div>

    @if ($featuredArticle)
    <article class="mt-8 grid overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm md:grid-cols-[1fr_1.2fr]">
        <div class="flex min-h-64 items-center justify-center bg-[#EAF7F3] p-8">
            @if ($featuredArticle->featured_image_path)
            <img
                src="{{ asset('storage/' . $featuredArticle->featured_image_path) }}"
                alt="{{ $featuredArticle->featured_image_alt ?: $featuredArticle->title }}"
                class="h-full w-full rounded-[1.5rem] object-cover">
            @else
            <div class="text-center">
                <div class="text-sm font-semibold uppercase tracking-wide text-[#3A8F8A]">
                    Featured
                </div>

                <div class="mt-3 text-5xl font-black text-[#1E2A5A]">
                    PHS
                </div>
            </div>
            @endif
        </div>

        <div class="p-8">
            <div class="flex flex-wrap gap-2">
                @if ($featuredArticle->category)
                <span class="rounded-full bg-[#EAF7F3] px-3 py-1 text-xs font-semibold text-[#2F7F7A]">
                    {{ $featuredArticle->category->name }}
                </span>
                @endif

                @if ($featuredArticle->content_format)
                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                    {{ str($featuredArticle->content_format)->replace('_', ' ')->title() }}
                </span>
                @endif
            </div>

            <h3 class="mt-4 text-2xl font-bold tracking-tight text-[#102033] md:text-3xl">
                <a href="{{ route('articles.show', $featuredArticle) }}" class="hover:text-[#3A8F8A]">
                    {{ $featuredArticle->title }}
                </a>
            </h3>

            @if ($featuredArticle->excerpt)
            <p class="mt-4 text-base leading-7 text-slate-600">
                {{ $featuredArticle->excerpt }}
            </p>
            @endif

            @if ($featuredArticle->key_takeaway)
            <div class="mt-5 rounded-2xl bg-[#F7FBFA] p-4 text-sm leading-6 text-slate-700 ring-1 ring-slate-200">
                <strong class="text-[#102033]">Practical takeaway:</strong>
                {{ $featuredArticle->key_takeaway }}
            </div>
            @endif

            <div class="mt-6 text-sm text-slate-500">
                {{ $featuredArticle->reading_time ?? 1 }} min read

                @if ($featuredArticle->published_at)
                · {{ $featuredArticle->published_at->format('M j, Y') }}
                @endif
            </div>
        </div>
    </article>
    @endif

    <div class="mt-8 grid gap-6 md:grid-cols-3">
        @forelse ($latestArticles as $article)
        <x-site.article-card :article="$article" />
        @empty
        @unless ($featuredArticle)
        <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-slate-600 md:col-span-3">
            No published articles yet. Publish an article from the admin panel to see it here.
        </div>
        @endunless
        @endforelse
    </div>
</section>

<section id="categories" class="border-y border-slate-200 bg-white">
    <div class="mx-auto max-w-7xl px-6 py-14">
        <h2 class="text-3xl font-bold tracking-tight text-[#102033]">
            Explore by category
        </h2>

        <p class="mt-3 max-w-2xl text-slate-600">
            Browse Practical Health Science by major topic area.
        </p>

        <div class="mt-8 grid gap-4 md:grid-cols-3">
            @foreach ($categories as $category)
            <a href="{{ url('/categories/' . $category->slug) }}" class="rounded-2xl border border-slate-200 bg-[#F7FBFA] p-5 transition hover:border-[#3A8F8A] hover:bg-[#EAF7F3]">
                <div class="font-semibold text-[#102033]">
                    {{ $category->name }}
                </div>

                @if ($category->description)
                <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">
                    {{ $category->description }}
                </p>
                @endif
            </a>
            @endforeach
        </div>
    </div>
</section>

<section id="newsletter" class="mx-auto max-w-7xl px-6 py-16">
    <div class="rounded-[2rem] bg-[#102033] p-8 text-white md:p-12">
        <div class="max-w-2xl">
            <h2 class="text-3xl font-bold tracking-tight">
                Understand health science without the hype.
            </h2>

            <p class="mt-4 leading-7 text-slate-200">
                Newsletter infrastructure will be added later. For now, this section reserves the growth layer of the site.
            </p>
        </div>
    </div>
</section>
@endsection