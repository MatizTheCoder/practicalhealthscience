@extends('layouts.site', [
    'title' => 'Newsletter | Practical Health Science',
    'description' => 'Subscribe to future Practical Health Science updates for evidence-based health science explainers, research breakdowns, and practical takeaways.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                ← Back to home
            </a>

            <div class="mt-8">
                <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                    Newsletter
                </div>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                    Evidence-based health science updates are coming soon.
                </h1>

                <p class="mt-6 text-xl leading-8 text-slate-600">
                    Practical Health Science will offer a newsletter for readers who want clear, practical summaries of health research without hype, fear, or exaggerated claims.
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-14">
        <div class="rounded-[1.5rem] border border-[#D3EDE7] bg-[#EAF7F3] p-7">
            <div class="text-sm font-bold uppercase tracking-wide text-[#2F7F7A]">
                What to expect
            </div>

            <h2 class="mt-4 text-2xl font-bold tracking-tight text-[#102033]">
                Clear research summaries, practical takeaways, and careful evidence interpretation.
            </h2>

            <p class="mt-4 text-lg leading-8 text-slate-700">
                The Practical Health Science newsletter is planned to highlight new articles, explain important health claims, summarize emerging research, and help readers understand what the evidence actually supports.
            </p>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="text-sm font-bold uppercase tracking-wide text-[#3A8F8A]">
                    Research explained
                </div>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Short explanations of new or important health science findings, written for practical understanding.
                </p>
            </div>

            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="text-sm font-bold uppercase tracking-wide text-[#3A8F8A]">
                    Evidence strength
                </div>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Clear distinction between strong evidence, moderate evidence, early findings, and unsupported claims.
                </p>
            </div>

            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="text-sm font-bold uppercase tracking-wide text-[#3A8F8A]">
                    Practical meaning
                </div>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Cautious, real-world interpretation without replacing professional medical advice.
                </p>
            </div>
        </div>

        <div class="mt-10 rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                Subscription form coming later
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-700">
                We are not collecting email addresses yet. A subscription form will be added after the newsletter system and email privacy workflow are fully configured.
            </p>

            <p class="mt-4 text-base leading-7 text-slate-700">
                Until then, you can check the latest articles directly on Practical Health Science.
            </p>

            <a href="{{ route('latest.index') }}" class="mt-6 inline-flex rounded-full bg-[#102033] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#3A8F8A]">
                View latest articles
            </a>
        </div>
    </section>
@endsection