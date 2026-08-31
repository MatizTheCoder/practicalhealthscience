@extends('layouts.site', [
    'title' => 'Terms of Use | Practical Health Science',
    'description' => 'Read the Terms of Use for Practical Health Science, including acceptable use, educational content limitations, intellectual property, and disclaimers.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                ← Back to home
            </a>

            <div class="mt-8">
                <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                    Terms of Use
                </div>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                    Terms of Use
                </h1>

                <p class="mt-6 text-xl leading-8 text-slate-600">
                    These Terms of Use explain the conditions for accessing and using Practical Health Science.
                </p>

                <p class="mt-4 text-sm text-slate-500">
                    Last updated: {{ now()->format('F j, Y') }}
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-14">
        <div class="article-content">
            <h2>1. Acceptance of Terms</h2>

            <p>
                By accessing or using Practical Health Science, you agree to these Terms of Use. If you do not agree with these terms, you should stop using the website.
            </p>

            <h2>2. Educational Content Only</h2>

            <p>
                Practical Health Science provides evidence-based health science information for educational and informational purposes only.
            </p>

            <p>
                Content on this website does not provide medical advice, diagnosis, treatment, or a substitute for consultation with a qualified healthcare professional.
            </p>

            <h2>3. No Medical Advice</h2>

            <p>
                You should not use content from Practical Health Science to diagnose, treat, prevent, or manage any disease or health condition.
            </p>

            <p>
                Always consult a qualified healthcare professional before making decisions about medications, supplements, medical treatments, diet, exercise, or health-related behavior, especially if you have a medical condition or are taking medication.
            </p>

            <h2>4. Emergency Situations</h2>

            <p>
                Practical Health Science is not intended for emergency medical situations. If you believe you may have a medical emergency, contact emergency services or seek immediate medical attention.
            </p>

            <h2>5. Evidence and Uncertainty</h2>

            <p>
                We aim to present health research accurately and cautiously. However, scientific evidence changes over time, and articles may not always reflect the newest available research immediately.
            </p>

            <p>
                Content may discuss evidence strength, limitations, uncertainty, and practical interpretation, but readers should not treat any article as personalized advice.
            </p>

            <h2>6. User Responsibilities</h2>

            <p>
                You agree to use this website lawfully and responsibly. You should not:
            </p>

            <ul>
                <li>Use the website for unlawful, harmful, or misleading purposes.</li>
                <li>Attempt to interfere with the website’s security, performance, or availability.</li>
                <li>Copy, scrape, reproduce, or redistribute substantial parts of the website without permission.</li>
                <li>Misrepresent Practical Health Science content as professional medical advice.</li>
            </ul>

            <h2>7. Intellectual Property</h2>

            <p>
                Unless otherwise stated, text, design elements, branding, graphics, article structure, and other content on Practical Health Science are owned by or licensed to Practical Health Science.
            </p>

            <p>
                You may read, share links to, and quote short excerpts from our content with proper attribution. You may not reproduce, republish, sell, or distribute substantial portions of our content without permission.
            </p>

            <h2>8. External Links</h2>

            <p>
                Practical Health Science may link to third-party websites, including scientific journals, public health organizations, research databases, medical institutions, or other external resources.
            </p>

            <p>
                External links are provided for reference and convenience. We do not control and are not responsible for third-party content, policies, accuracy, or availability.
            </p>

            <h2>9. Advertising, Affiliates, and Sponsorships</h2>

            <p>
                Practical Health Science may display advertising, use affiliate links, or publish sponsored content in the future. When relevant, we aim to label commercial relationships clearly.
            </p>

            <p>
                Editorial content should not be shaped by hype, fear-based claims, or undisclosed promotional influence.
            </p>

            <h2>10. No Warranties</h2>

            <p>
                Practical Health Science is provided on an “as is” and “as available” basis. We make reasonable efforts to provide accurate and useful information, but we do not guarantee that the website or its content will always be complete, current, error-free, secure, or uninterrupted.
            </p>

            <h2>11. Limitation of Liability</h2>

            <p>
                To the maximum extent permitted by law, Practical Health Science and its owners, editors, contributors, or affiliates are not liable for any loss, injury, claim, or damages arising from your use of the website or reliance on its content.
            </p>

            <h2>12. Changes to These Terms</h2>

            <p>
                We may update these Terms of Use from time to time. The updated version will be posted on this page with a revised “Last updated” date.
            </p>

            <h2>13. Contact</h2>

            <p>
                Questions about these Terms of Use may be sent through our contact page.
            </p>

            <p>
                <a href="{{ route('pages.contact') }}">Contact Practical Health Science</a>
            </p>
        </div>
    </section>
@endsection