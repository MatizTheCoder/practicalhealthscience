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
                <article class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex flex-wrap gap-2">
                        @if ($article->category)
                            <a href="{{ route('categories.show', $article->category) }}" class="rounded-full bg-[#EAF7F3] px-3 py-1 text-xs font-semibold text-[#2F7F7A] hover:bg-[#D3EDE7]">
                                {{ $article->category->name }}
                            </a>
                        @endif

                        @if ($article->content_format)
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                                {{ str($article->content_format)->replace('_', ' ')->title() }}
                            </span>
                        @endif
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

                    <div class="mt-5 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs font-medium text-slate-500">
                        @if ($article->author)
                            <span>{{ $article->author->name }}</span>
                        @endif

                        <span>{{ $article->reading_time ?? 1 }} min read</span>

                        @if ($article->published_at)
                            <span>{{ $article->published_at->format('M j, Y') }}</span>
                        @endif
                    </div>
                </article>
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