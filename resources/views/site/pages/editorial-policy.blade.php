@extends('layouts.site', [
    'title' => 'Editorial Policy | Practical Health Science',
    'description' => 'Learn how Practical Health Science evaluates evidence, explains health claims, and maintains a cautious, evidence-based editorial standard.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                Editorial Policy
            </div>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                How we evaluate and explain health science.
            </h1>

            <p class="mt-6 text-lg leading-8 text-slate-600">
                Practical Health Science explains health and biomedical research in a clear, practical, and cautious way. Our editorial process is built around evidence strength, limitations, and real-life meaning.
            </p>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-14">
        <div class="article-content">
            <h2>Our editorial standard</h2>

            <p>
                We prioritize scientific accuracy, clarity, proportionality, and transparency. Our articles are written to help readers understand evidence, not to create fear, sell products, or make unsupported health claims.
            </p>

            <h2>How we assess evidence</h2>

            <p>
                When interpreting a health claim or research finding, we consider the type of evidence, study design, population, sample size, consistency with other research, biological plausibility, limitations, and whether findings have been replicated.
            </p>

            <p>
                We distinguish between different kinds of evidence, including systematic reviews, meta-analyses, randomized controlled trials, observational studies, mechanistic studies, animal studies, cell studies, clinical guidelines, and regulatory documents.
            </p>

            <h2>Evidence strength labels</h2>

            <p>
                Articles may describe evidence as high, moderate, limited, early, very early, mixed, or unclear. These labels are intended to help readers understand how much confidence is reasonable.
            </p>

            <ul>
                <li><strong>High:</strong> supported by strong human evidence or consistent high-quality reviews.</li>
                <li><strong>Moderate:</strong> supported by useful evidence, but with some uncertainty or limitations.</li>
                <li><strong>Limited:</strong> supported by small, inconsistent, or indirect evidence.</li>
                <li><strong>Early:</strong> promising but preliminary, often requiring larger or better studies.</li>
                <li><strong>Very early:</strong> mostly preclinical, mechanistic, animal, or cell-based evidence.</li>
                <li><strong>Mixed or unclear:</strong> evidence is inconsistent or not yet sufficient for a confident conclusion.</li>
            </ul>

            <h2>Sources</h2>

            <p>
                We aim to rely on peer-reviewed studies, systematic reviews, meta-analyses, clinical guidelines, regulatory agencies, academic institutions, and other authoritative sources. Sources are provided for further reading without turning the site into an academic article archive.
            </p>

            <h2>Limitations and uncertainty</h2>

            <p>
                Health science often changes as better evidence becomes available. We avoid presenting early or uncertain findings as settled facts. When important limitations exist, we aim to state them clearly.
            </p>

            <h2>Corrections and updates</h2>

            <p>
                We may update articles when new evidence becomes available, when a claim requires clarification, or when a correction is needed. Articles may include a last reviewed date when appropriate.
            </p>

            <h2>Independence</h2>

            <p>
                Practical Health Science does not make treatment promises or diagnose medical conditions. Any future sponsorship, affiliate relationship, or commercial partnership should be clearly disclosed when relevant.
            </p>
        </div>
    </section>
@endsection