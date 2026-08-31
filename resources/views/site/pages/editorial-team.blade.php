@extends('layouts.site', [
    'title' => 'Editorial Team | Practical Health Science',
    'description' => 'Meet the Practical Health Science editorial team and learn how our evidence-based health science content is developed, reviewed, and presented.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                ← Back to home
            </a>

            <div class="mt-8">
                <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                    Editorial Team
                </div>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                    The people and principles behind Practical Health Science.
                </h1>

                <p class="mt-6 text-xl leading-8 text-slate-600">
                    Practical Health Science is built to translate health research into clear, practical, evidence-based explanations for readers who want to understand what the science actually says.
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-14">
        <div class="article-content">
            <h2>Editorial Leadership</h2>

            <div class="not-prose mt-6 rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-center">
                    <div class="flex h-36 w-36 shrink-0 items-center justify-center rounded-[1.5rem] bg-white p-1">
                        <img
                            src="{{ asset('images/5.png') }}"
                            alt="Practical Health Science editorial team"
                            class="block h-full w-full object-contain"
                        >
                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="text-2xl font-bold tracking-tight text-[#102033]">
                            Practical Health Science Editorial Team
                        </h3>

                        <p class="mt-2 text-sm font-semibold uppercase tracking-wide text-[#2F7F7A]">
                            Evidence-based health science translation
                        </p>

                        <p class="mt-4 text-base leading-7 text-slate-700">
                            Our editorial work focuses on interpreting health and biomedical research in a way that is accurate, practical, cautious, and understandable for non-specialist readers.
                        </p>

                        <p class="mt-4 text-base leading-7 text-slate-700">
                            Articles are developed with attention to the strength of evidence, biological plausibility, study limitations, uncertainty, and real-world relevance.
                        </p>
                    </div>
                </div>
            </div>

            <h2>Founder and Scientific Editor</h2>

            <div class="not-prose mt-6 rounded-[1.5rem] border border-[#D3EDE7] bg-[#EAF7F3] p-6">
                <h3 class="text-2xl font-bold tracking-tight text-[#102033]">
                    Muhammed Emre Karaman, PhD
                </h3>

                <p class="mt-2 text-sm font-semibold uppercase tracking-wide text-[#2F7F7A]">
                    Exercise physiology, sports biochemistry, and evidence-based health science communication
                </p>

                <p class="mt-4 text-base leading-7 text-slate-700">
                    Muhammed Emre Karaman is an academic researcher in sports sciences with expertise in exercise physiology, sports biochemistry, and molecular responses to exercise.
                </p>

                <p class="mt-4 text-base leading-7 text-slate-700">
                    His work and scientific interests include exercise metabolism, inflammatory biomarkers, molecular signaling, obesity-related physiology, and the translation of research findings into practical health understanding.
                </p>

                <p class="mt-4 text-base leading-7 text-slate-700">
                    At Practical Health Science, he leads the editorial direction, evidence interpretation, topic selection, source evaluation, and scientific framing of articles.
                </p>
            </div>

            <h2>How We Work</h2>

            <p>
                Practical Health Science is not designed as a medical advice website, a supplement promotion platform, or a scientific journal. It is an evidence-based health science translation platform.
            </p>

            <p>
                Our goal is to help readers understand health claims more clearly by explaining what the research suggests, how strong the evidence is, where uncertainty remains, and what a reasonable practical takeaway would be.
            </p>

            <h2>Editorial Review Principles</h2>

            <p>
                Each major article is developed around four editorial questions:
            </p>

            <ul>
                <li>What does the science say?</li>
                <li>How strong is the evidence?</li>
                <li>What are the limitations?</li>
                <li>What should a reasonable reader take away?</li>
            </ul>

            <p>
                We aim to distinguish between strong evidence, moderate evidence, early findings, mechanistic hypotheses, and claims that are popular but not yet well supported.
            </p>

            <h2>Use of Sources</h2>

            <p>
                Articles are based on scientific literature, clinical guidelines, systematic reviews, randomized trials, observational studies, mechanistic research, and other credible sources when relevant.
            </p>

            <p>
                We prioritize the quality and relevance of evidence over novelty or popularity. When evidence is limited, mixed, or preliminary, the article should clearly say so.
            </p>

            <h2>Medical Disclaimer</h2>

            <p>
                Practical Health Science content is for educational purposes only. It does not provide personal medical advice, diagnosis, or treatment.
            </p>

            <p>
                Readers should consult a qualified healthcare professional for personal medical questions, symptoms, treatment decisions, medication use, or changes to diet, exercise, or supplementation.
            </p>
        </div>
    </section>
@endsection