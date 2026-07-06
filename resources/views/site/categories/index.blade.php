@extends('layouts.site', [
    'title' => 'Health Science Categories | Practical Health Science',
    'description' => 'Browse Practical Health Science categories including metabolic health, exercise science, disease prevention, cancer, longevity, nutrition, supplements, health myths, and research explained.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-7xl px-6 py-16">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                ← Back to home
            </a>

            <div class="mt-6 max-w-3xl">
                <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                    Browse categories
                </div>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                    Explore health science by topic.
                </h1>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Practical Health Science organizes evidence-based explainers, myth checks, research breakdowns, and practical takeaways across major health science categories.
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-14">
        <div class="grid gap-5 md:grid-cols-3">
            @foreach ($categories as $category)
                <a
                    href="{{ route('categories.show', $category) }}"
                    class="group rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:border-[#3A8F8A] hover:shadow-md"
                >
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-[#102033] group-hover:text-[#3A8F8A]">
                                {{ $category->name }}
                            </h2>

                            @if ($category->description)
                                <p class="mt-3 line-clamp-4 text-sm leading-6 text-slate-600">
                                    {{ $category->description }}
                                </p>
                            @endif
                        </div>

                        <div class="shrink-0 rounded-full bg-[#EAF7F3] px-3 py-1 text-xs font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                            {{ $category->articles_count }}
                        </div>
                    </div>

                    <div class="mt-5 text-sm font-semibold text-[#3A8F8A]">
                        View category →
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection