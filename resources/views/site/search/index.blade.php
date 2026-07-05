@extends('layouts.site', [
    'title' => $search ? 'Search results for "' . $search . '" | Practical Health Science' : 'Search | Practical Health Science',
    'description' => 'Search Practical Health Science for evidence-based explainers on health claims, biomedical research, nutrition, exercise, longevity, and disease prevention.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-7xl px-6 py-14">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                ← Back to home
            </a>

            <div class="mt-6 max-w-3xl">
                <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                    Search Practical Health Science
                </div>

                <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                    Search evidence-based health science
                </h1>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Search explainers, myth checks, research breakdowns, and practical takeaways.
                </p>
            </div>

            <form action="{{ route('search') }}" method="GET" class="mt-8 flex max-w-2xl flex-col gap-3 sm:flex-row">
                <input
                    type="search"
                    name="q"
                    value="{{ $search }}"
                    placeholder="Search topics, claims, supplements, diseases..."
                    class="min-h-12 flex-1 rounded-full border border-slate-300 bg-white px-5 text-sm text-[#102033] shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[#3A8F8A] focus:ring-4 focus:ring-[#EAF7F3]"
                >

                <button
                    type="submit"
                    class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#1E2A5A] px-6 text-sm font-semibold text-white shadow-sm hover:bg-[#102033]"
                >
                    Search
                </button>
            </form>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-14">
        @if (strlen($search) > 0 && strlen($search) < 2)
            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-6 text-sm leading-6 text-amber-900">
                Please enter at least 2 characters to search.
            </div>
        @elseif ($search)
            <div class="flex items-end justify-between gap-6">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                        Results for “{{ $search }}”
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        {{ $articles->total() }} published {{ \Illuminate\Support\Str::plural('article', $articles->total()) }} found
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

                            @if ($article->evidence_strength)
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                                    Evidence: {{ str($article->evidence_strength)->replace('_', ' ')->title() }}
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

                        @if ($article->key_takeaway)
                            <div class="mt-4 rounded-2xl bg-[#F7FBFA] p-4 text-sm leading-6 text-slate-700 ring-1 ring-slate-200">
                                <strong class="text-[#102033]">Takeaway:</strong>
                                {{ $article->key_takeaway }}
                            </div>
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
                        No published articles found for “{{ $search }}”.
                    </div>
                @endforelse
            </div>

            @if ($articles->hasPages())
                <div class="mt-10">
                    {{ $articles->links() }}
                </div>
            @endif
        @else
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-slate-600">
                Enter a search term to find Practical Health Science articles.
            </div>
        @endif
    </section>
@endsection