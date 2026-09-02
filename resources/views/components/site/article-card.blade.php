@props([
    'article',
    'showCategory' => true,
    'showTakeaway' => false,
])

<article class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
    <div class="flex flex-wrap gap-2">
        @if ($showCategory)
            <x-site.category-badge :category="$article->category" />
        @endif

        <x-site.format-badge :format="$article->content_format" />

        <x-site.evidence-badge :evidence="$article->evidence_strength" />
    </div>

    <h3 class="mt-4 text-xl font-bold leading-tight text-[#102033]">
        <a href="{{ route('articles.show', $article) }}" class="hover:text-[#3A8F8A]">
            {{ $article->title }}
        </a>
    </h3>

    @if ($article->excerpt)
        <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">
            {{ $article->excerpt }}
        </p>
    @endif

    @if ($showTakeaway && $article->key_takeaway)
        <div class="mt-4 rounded-2xl bg-[#F7FBFA] p-4 text-sm leading-6 text-slate-700 ring-1 ring-slate-200">
            <strong class="text-[#102033]">Takeaway:</strong>
            {{ $article->key_takeaway }}
        </div>
    @endif

    <div class="mt-5 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs font-medium text-slate-500">
        @if ($article->author)
            <span>{{ $article->author->name }}</span>
        @endif

        <span>{{ $article->display_reading_time }} min read</span>

        @if ($article->published_at)
            <span>{{ $article->published_at->format('M j, Y') }}</span>
        @endif
    </div>
</article>