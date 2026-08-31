@extends('layouts.site', [
    'title' => ($article->seo_title ?: $article->title) . ' | Practical Health Science',
    'description' => $article->meta_description ?: $article->excerpt ?: 'Evidence-based health science, made practical.',
    'canonical' => $article->canonical_url ?: route('articles.show', $article),
    'ogTitle' => $article->og_title ?: $article->seo_title ?: $article->title,
    'ogDescription' => $article->og_description ?: $article->meta_description ?: $article->excerpt ?: 'Evidence-based health science, made practical.',
    'ogImage' => $article->og_image_path
        ? asset('storage/' . $article->og_image_path)
        : ($article->featured_image_path ? asset('storage/' . $article->featured_image_path) : asset('images/og-default.jpg')),
    'ogType' => 'article',
    'robots' => $article->noindex ? 'noindex, follow' : 'index, follow',
])

@push('structured-data')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $article->title,
            'description' => $article->meta_description ?: $article->excerpt,
            'datePublished' => optional($article->published_at)->toIso8601String(),
            'dateModified' => optional($article->updated_at)->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => optional($article->author)->name ?: 'Practical Health Science Editorial Team',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Practical Health Science',
                'url' => url('/'),
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => route('articles.show', $article),
            ],
            'image' => $article->featured_image_path
                ? asset('storage/' . $article->featured_image_path)
                : asset('images/og-default.jpg'),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
<article class="bg-white">
    <header class="border-b border-slate-200 bg-gradient-to-b from-[#F7FBFA] to-white">
        <div class="mx-auto max-w-4xl px-6 py-14">
            <div class="flex flex-wrap gap-2">
                @if ($article->category)
                    <x-site.category-badge :category="$article->category" />
                @endif

                @if ($article->content_format)
                    <x-site.format-badge :format="$article->content_format" />
                @endif
            </div>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                {{ $article->title }}
            </h1>

            @if ($article->subtitle)
                <p class="mt-5 text-xl leading-8 text-slate-600">
                    {{ $article->subtitle }}
                </p>
            @elseif ($article->excerpt)
                <p class="mt-5 text-xl leading-8 text-slate-600">
                    {{ $article->excerpt }}
                </p>
            @endif

            <div class="mt-6 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-slate-500">
                @if ($article->author)
                    <span>
                        By <span class="font-semibold text-[#102033]">{{ $article->author->name }}</span>
                    </span>
                @endif

                @if ($article->published_at)
                    <span>{{ $article->published_at->format('M j, Y') }}</span>
                @endif

                <span>{{ $article->reading_time ?? 1 }} min read</span>

                @if ($article->last_reviewed_at)
                    <span>Last reviewed {{ $article->last_reviewed_at->format('M j, Y') }}</span>
                @endif
            </div>

            @if ($article->evidence_strength)
                <div class="mt-8 rounded-[1.5rem] border border-[#D3EDE7] bg-[#EAF7F3] p-6">
                    <div class="text-sm font-bold uppercase tracking-wide text-[#2F7F7A]">
                        Evidence Strength
                    </div>

                    <div class="mt-3 flex flex-wrap items-center gap-3">
                        <x-site.evidence-badge :evidence="$article->evidence_strength" :prefix="false" />

                        <p class="text-sm leading-6 text-slate-700">
                            This rating reflects the overall strength and consistency of the available evidence.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </header>

    @if ($article->featured_image_path)
        <div class="mx-auto max-w-5xl px-6 pt-10">
            <img
                src="{{ asset('storage/' . $article->featured_image_path) }}"
                alt="{{ $article->featured_image_alt ?: $article->title }}"
                class="aspect-[16/9] w-full rounded-[2rem] object-cover shadow-sm ring-1 ring-slate-200">
        </div>
    @endif

    <div class="mx-auto grid max-w-7xl gap-10 px-6 py-12 lg:grid-cols-[minmax(0,1fr)_320px]">
        <main class="mx-auto w-full max-w-3xl">
            @if ($article->quick_answer)
                <section class="rounded-[1.5rem] border border-[#D3EDE7] bg-[#EAF7F3] p-6">
                    <div class="text-sm font-bold uppercase tracking-wide text-[#2F7F7A]">
                        Quick Answer
                    </div>

                    <p class="mt-3 text-lg leading-8 text-[#102033]">
                        {!! nl2br(e($article->quick_answer)) !!}
                    </p>
                </section>
            @endif

            @if ($article->what_the_science_says)
                <section class="mt-10 rounded-[1.5rem] border border-[#CFE9E4] bg-gradient-to-br from-white via-[#F7FBFA] to-[#EAF7F3] p-7 shadow-sm">
                    <div class="text-sm font-bold uppercase tracking-wide text-[#2F7F7A]">
                        What the Science Says
                    </div>

                    <p class="mt-4 text-lg leading-8 text-slate-700">
                        {!! nl2br(e($article->what_the_science_says)) !!}
                    </p>
                </section>
            @endif

            @if ($article->body)
                <section class="mt-10">
                    <div class="article-content">
                        {!! $article->body !!}
                    </div>
                </section>
            @endif

            @if ($article->limitations_summary)
                <section class="mt-12 border-t border-slate-200 pt-10">
                    <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                        Limitations Summary
                    </h2>

                    <p class="mt-4 text-lg leading-8 text-slate-700">
                        {!! nl2br(e($article->limitations_summary)) !!}
                    </p>
                </section>
            @endif

            @if ($article->real_life_meaning)
                <section class="mt-12 rounded-[1.5rem] bg-[#102033] p-7 text-white">
                    <h2 class="text-2xl font-bold tracking-tight">
                        What This Means in Real Life
                    </h2>

                    <p class="mt-4 text-lg leading-8 text-slate-100">
                        {!! nl2br(e($article->real_life_meaning)) !!}
                    </p>
                </section>
            @endif

            @if ($article->key_takeaway)
                <section class="mt-8 rounded-[1.5rem] border border-slate-200 bg-[#F7FBFA] p-6">
                    <div class="text-sm font-bold uppercase tracking-wide text-[#3A8F8A]">
                        Key Takeaway
                    </div>

                    <p class="mt-3 text-lg leading-8 text-[#102033]">
                        {!! nl2br(e($article->key_takeaway)) !!}
                    </p>
                </section>
            @endif

            @if ($article->sources->isNotEmpty())
                <section class="mt-12 border-t border-slate-200 pt-10">
                    <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                        Sources
                    </h2>

                    <div class="mt-6 space-y-4">
                        @foreach ($article->sources as $source)
                            <div class="rounded-2xl border border-slate-200 bg-white p-5">
                                <div class="font-semibold text-[#102033]">
                                    {{ $source->title }}
                                </div>

                                <div class="mt-2 text-sm leading-6 text-slate-600">
                                    @if ($source->authors)
                                        {{ $source->authors }}.
                                    @endif

                                    @if ($source->journal)
                                        <em>{{ $source->journal }}</em>.
                                    @endif

                                    @if ($source->year)
                                        {{ $source->year }}.
                                    @endif
                                </div>

                                <div class="mt-3 flex flex-wrap gap-2 text-xs">
                                    @if ($source->source_type)
                                        <span class="rounded-full bg-[#EAF7F3] px-3 py-1 font-semibold text-[#2F7F7A]">
                                            {{ str($source->source_type)->replace('_', ' ')->title() }}
                                        </span>
                                    @endif

                                    @if ($source->evidence_level)
                                        <x-site.evidence-badge :evidence="$source->evidence_level" />
                                    @endif

                                    @if ($source->doi)
                                        <span class="rounded-full bg-slate-100 px-3 py-1 font-semibold text-slate-700">
                                            DOI: {{ $source->doi }}
                                        </span>
                                    @endif

                                    @if ($source->pmid)
                                        <span class="rounded-full bg-slate-100 px-3 py-1 font-semibold text-slate-700">
                                            PMID: {{ $source->pmid }}
                                        </span>
                                    @endif
                                </div>

                                @if ($source->note)
                                    <p class="mt-3 text-sm leading-6 text-slate-600">
                                        {{ $source->note }}
                                    </p>
                                @endif

                                @if ($source->url)
                                    <a href="{{ $source->url }}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                                        View source
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            @if ($article->has_medical_disclaimer)
                <section class="mt-12 rounded-2xl border border-slate-200 bg-slate-50 p-5 text-sm leading-6 text-slate-600">
                    <strong class="text-[#102033]">Medical disclaimer:</strong>
                    This article is for educational purposes only and does not provide medical advice, diagnosis, or treatment. Always consult a qualified healthcare professional for personal medical decisions.
                </section>
            @endif
        </main>

        <aside class="lg:sticky lg:top-8 lg:self-start">
            <div class="space-y-6">
                @if ($article->tags->isNotEmpty())
                    <section class="rounded-[1.5rem] border border-slate-200 bg-[#F7FBFA] p-5">
                        <h2 class="text-sm font-bold uppercase tracking-wide text-[#102033]">
                            Topics
                        </h2>

                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach ($article->tags as $tag)
                                <a href="{{ route('tags.show', $tag) }}" class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-700 ring-1 ring-slate-200 hover:text-[#3A8F8A]">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if ($article->series->isNotEmpty())
                    <section class="rounded-[1.5rem] border border-slate-200 bg-white p-5">
                        <h2 class="text-sm font-bold uppercase tracking-wide text-[#102033]">
                            Series
                        </h2>

                        <div class="mt-4 space-y-2">
                            @foreach ($article->series as $series)
                                <div class="text-sm font-semibold text-[#3A8F8A]">
                                    {{ $series->title }}
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if ($relatedArticles->isNotEmpty())
                    <section class="rounded-[1.5rem] border border-slate-200 bg-white p-5">
                        <h2 class="text-sm font-bold uppercase tracking-wide text-[#102033]">
                            Related Reading
                        </h2>

                        <div class="mt-4 space-y-4">
                            @foreach ($relatedArticles as $related)
                                <a href="{{ route('articles.show', $related) }}" class="block">
                                    @if ($related->category)
                                        <div class="text-xs font-semibold text-[#3A8F8A]">
                                            {{ $related->category->name }}
                                        </div>
                                    @endif

                                    <div class="mt-1 text-sm font-semibold leading-5 text-[#102033] hover:text-[#3A8F8A]">
                                        {{ $related->title }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>
        </aside>
    </div>

    @if ($relatedArticles->isNotEmpty() || $moreFromCategory->isNotEmpty() || $latestArticles->isNotEmpty())
        <section class="border-t border-slate-200 bg-[#F7FBFA]">
            <div class="mx-auto max-w-7xl px-6 py-14">
                @if ($relatedArticles->isNotEmpty())
                    <div>
                        <div class="flex items-end justify-between gap-6">
                            <div>
                                <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                                    Related Reading
                                </h2>

                                <p class="mt-2 text-sm text-slate-600">
                                    Continue with articles connected to this topic.
                                </p>
                            </div>
                        </div>

                        <div class="mt-8 grid gap-6 md:grid-cols-3">
                            @foreach ($relatedArticles as $related)
                                <x-site.article-card :article="$related" />
                            @endforeach
                        </div>
                    </div>
                @elseif ($moreFromCategory->isNotEmpty())
                    <div>
                        <div class="flex items-end justify-between gap-6">
                            <div>
                                <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                                    More from {{ $article->category->name }}
                                </h2>

                                <p class="mt-2 text-sm text-slate-600">
                                    Explore more Practical Health Science articles from this category.
                                </p>
                            </div>

                            <a href="{{ route('categories.show', $article->category) }}" class="hidden text-sm font-semibold text-[#3A8F8A] hover:text-[#102033] md:inline">
                                View category →
                            </a>
                        </div>

                        <div class="mt-8 grid gap-6 md:grid-cols-3">
                            @foreach ($moreFromCategory as $categoryArticle)
                                <x-site.article-card :article="$categoryArticle" />
                            @endforeach
                        </div>
                    </div>
                @elseif ($latestArticles->isNotEmpty())
                    <div>
                        <div class="flex items-end justify-between gap-6">
                            <div>
                                <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                                    Latest Articles
                                </h2>

                                <p class="mt-2 text-sm text-slate-600">
                                    Recent evidence-based explainers from Practical Health Science.
                                </p>
                            </div>

                            <a href="{{ route('home') }}#latest" class="hidden text-sm font-semibold text-[#3A8F8A] hover:text-[#102033] md:inline">
                                View latest →
                            </a>
                        </div>

                        <div class="mt-8 grid gap-6 md:grid-cols-3">
                            @foreach ($latestArticles as $latest)
                                <x-site.article-card :article="$latest" />
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
</article>
@endsection