@extends('layouts.site', [
    'title' => 'About | Practical Health Science',
    'description' => 'Practical Health Science is an evidence-based digital media brand that explains health and biomedical research clearly, practically, and without hype.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                About Practical Health Science
            </div>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                Evidence-based health science, made practical.
            </h1>

            <p class="mt-6 text-lg leading-8 text-slate-600">
                Practical Health Science is an evidence-based digital media brand that translates complex health and biomedical research into clear, practical, and trustworthy content for everyday readers.
            </p>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-14">
        <div class="article-content">
            <h2>What we do</h2>

            <p>
                We help readers understand what health science actually says — without hype, fear, miracle claims, or misinformation.
            </p>

            <p>
                Our goal is not to replace medical advice or clinical care. Instead, we explain the evidence behind health claims, biomedical discoveries, nutrition and supplement debates, exercise science, longevity research, disease mechanisms, and emerging therapies in a way that is clear and useful.
            </p>

            <h2>Our editorial focus</h2>
            

            <p>
                Every major Practical Health Science article is designed to help readers answer four questions:
            </p>

            <ul>
                <li>What does the science say?</li>
                <li>How strong is the evidence?</li>
                <li>What are the limitations?</li>
                <li>What should a reasonable reader take away?</li>
            </ul>
            <div class="not-prose mt-10 rounded-[1.5rem] border border-[#D3EDE7] bg-[#EAF7F3] p-6">
                <h2 class="text-2xl font-bold tracking-tight text-[#102033]">
                    Meet the Editorial Team
                </h2>

                <p class="mt-3 text-base leading-7 text-slate-700">
                    Learn more about the people, scientific background, and editorial principles behind Practical Health Science.
                </p>

                <a href="{{ route('pages.editorial-team') }}" class="mt-5 inline-flex text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                    View editorial team →
                </a>
            </div>

            <h2>What makes us different</h2>

            <p>
                Practical Health Science sits between academic research, health journalism, and everyday health decisions. We read and interpret scientific sources on behalf of the reader, then explain what the findings probably mean — and what they do not mean.
            </p>

            <p>
                We avoid exaggerated certainty. If the evidence is early, mixed, limited, or based mainly on animal or cell studies, we say so clearly.
            </p>

            <h2>Our voice</h2>

            <p>
                Clear, calm, cautious, practical, and evidence-based. We do not use fear-based messaging, miracle language, influencer-style certainty, or treatment promises.
            </p>
        </div>
    </section>
@endsection