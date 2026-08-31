@extends('layouts.site', [
    'title' => 'Health Science Topics | Practical Health Science',
    'description' => 'Browse Practical Health Science topics including exercise, metabolism, inflammation, nutrition, supplements, longevity, disease mechanisms, and biomedical research.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-7xl px-6 py-16">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                ← Back to home
            </a>

            <div class="mt-6 max-w-3xl">
                <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                    Browse topics
                </div>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                    Explore evidence-based health science topics.
                </h1>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Find Practical Health Science explainers by specific topics, claims, mechanisms, supplements, diseases, and research areas.
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-14">
        @if ($tags->isNotEmpty())
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($tags as $tag)
                    <a
                        href="{{ route('tags.show', $tag) }}"
                        class="group rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-[#3A8F8A] hover:shadow-md"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h2 class="text-lg font-bold text-[#102033] group-hover:text-[#3A8F8A]">
                                    {{ $tag->name }}
                                </h2>

                                @if ($tag->description)
                                    <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">
                                        {{ $tag->description }}
                                    </p>
                                @else
                                    <p class="mt-3 text-sm leading-6 text-slate-600">
                                        Evidence-based articles related to {{ $tag->name }}.
                                    </p>
                                @endif
                            </div>

                            <div class="shrink-0 rounded-full bg-[#EAF7F3] px-3 py-1 text-xs font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                                {{ $tag->articles_count }}
                            </div>
                        </div>

                        <div class="mt-5 text-sm font-semibold text-[#3A8F8A]">
                            View topic →
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-slate-600">
                No public topics yet. Tags will appear here after they are connected to published articles.
            </div>
        @endif
    </section>
@endsection