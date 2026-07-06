@extends('layouts.site', [
    'title' => 'Medical Disclaimer | Practical Health Science',
    'description' => 'Practical Health Science content is for educational purposes only and does not provide medical advice, diagnosis, or treatment.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                Medical Disclaimer
            </div>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                Educational content, not medical advice.
            </h1>

            <p class="mt-6 text-lg leading-8 text-slate-600">
                Practical Health Science provides general educational information about health science and biomedical research. It does not provide medical advice, diagnosis, or treatment.
            </p>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-14">
        <div class="article-content">
            <h2>Not a substitute for professional care</h2>

            <p>
                The information on Practical Health Science is intended for educational purposes only. It should not be used as a substitute for advice from a qualified physician, pharmacist, registered dietitian, physical therapist, or other licensed healthcare professional.
            </p>

            <h2>No diagnosis or treatment</h2>

            <p>
                We do not diagnose medical conditions, recommend individual treatment plans, prescribe medications, or provide emergency medical guidance.
            </p>

            <p>
                Always consult a qualified healthcare professional before making decisions about medications, supplements, diet, exercise, medical testing, or treatment — especially if you have a medical condition, are pregnant, are taking medication, or are under medical care.
            </p>

            <h2>Emergency situations</h2>

            <p>
                If you think you may have a medical emergency, contact emergency services immediately.
            </p>

            <h2>Scientific uncertainty</h2>

            <p>
                Health science evolves over time. Research findings may change as new evidence becomes available. We aim to explain current evidence cautiously, but no article can cover every individual circumstance or replace professional medical judgment.
            </p>

            <h2>Use of the site</h2>

            <p>
                By using this website, you understand that Practical Health Science content is informational and educational only. Any actions you take based on information from this site are your responsibility and should be discussed with a qualified professional when relevant.
            </p>
        </div>
    </section>
@endsection