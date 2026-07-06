@extends('layouts.site', [
    'title' => 'Contact | Practical Health Science',
    'description' => 'Contact Practical Health Science for editorial questions, corrections, or general inquiries.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                Contact
            </div>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                Get in touch.
            </h1>

            <p class="mt-6 text-lg leading-8 text-slate-600">
                For editorial questions, correction requests, or general inquiries, you can contact Practical Health Science.
            </p>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-14">
        <div class="grid gap-6 md:grid-cols-2">
            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-bold text-[#102033]">
                    Editorial inquiries
                </h2>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    For article feedback, correction requests, or source-related questions.
                </p>

                <p class="mt-5 text-sm font-semibold text-[#3A8F8A]">
                    editorial@practicalhealthscience.com
                </p>
            </div>

            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-bold text-[#102033]">
                    General contact
                </h2>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    For general questions about Practical Health Science.
                </p>

                <p class="mt-5 text-sm font-semibold text-[#3A8F8A]">
                    hello@practicalhealthscience.com
                </p>
            </div>
        </div>

        <div class="mt-8 rounded-2xl border border-slate-200 bg-[#F7FBFA] p-6 text-sm leading-6 text-slate-600">
            <strong class="text-[#102033]">Note:</strong>
            We cannot provide personal medical advice, diagnosis, or treatment recommendations by email.
        </div>
    </section>
@endsection