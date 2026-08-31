@extends('layouts.site', [
    'title' => 'Privacy Policy | Practical Health Science',
    'description' => 'Read the Privacy Policy for Practical Health Science, including how we may collect, use, and protect information when you use this website.',
])

@section('content')
    <section class="border-b border-slate-200 bg-gradient-to-b from-white to-[#F7FBFA]">
        <div class="mx-auto max-w-4xl px-6 py-16">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#3A8F8A] hover:text-[#102033]">
                ← Back to home
            </a>

            <div class="mt-8">
                <div class="inline-flex rounded-full bg-[#EAF7F3] px-4 py-2 text-sm font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7]">
                    Privacy Policy
                </div>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-[#102033] md:text-5xl">
                    Privacy Policy
                </h1>

                <p class="mt-6 text-xl leading-8 text-slate-600">
                    This Privacy Policy explains how Practical Health Science may collect, use, and protect information when you visit this website.
                </p>

                <p class="mt-4 text-sm text-slate-500">
                    Last updated: {{ now()->format('F j, Y') }}
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-6 py-14">
        <div class="article-content">
            <h2>1. Introduction</h2>

            <p>
                Practical Health Science is an evidence-based health science education website. We respect your privacy and aim to be clear about how information may be collected and used when you access our website.
            </p>

            <p>
                By using this website, you agree to the terms of this Privacy Policy. If you do not agree with this policy, you should stop using the website.
            </p>

            <h2>2. Information We May Collect</h2>

            <p>
                We may collect limited information when you visit or interact with Practical Health Science. This may include:
            </p>

            <ul>
                <li>Information you voluntarily provide, such as your name or email address if you contact us or subscribe to a newsletter.</li>
                <li>Technical information such as IP address, browser type, device type, pages visited, referral source, and general usage data.</li>
                <li>Information collected through cookies, analytics tools, or similar technologies when they are enabled on the website.</li>
            </ul>

            <h2>3. How We Use Information</h2>

            <p>
                We may use collected information to:
            </p>

            <ul>
                <li>Operate, maintain, and improve the website.</li>
                <li>Understand how readers use our content.</li>
                <li>Respond to messages or inquiries.</li>
                <li>Send newsletter updates if you choose to subscribe.</li>
                <li>Monitor website performance, security, and reliability.</li>
                <li>Support advertising, analytics, or content measurement if these services are added.</li>
            </ul>

            <h2>4. Cookies and Analytics</h2>

            <p>
                Practical Health Science may use cookies or similar technologies to improve website functionality, measure traffic, analyze reader behavior, and understand content performance.
            </p>

            <p>
                Third-party analytics or advertising services may also use cookies or similar technologies according to their own privacy policies. You can usually control or disable cookies through your browser settings.
            </p>

            <h2>5. Advertising and Third-Party Services</h2>

            <p>
                Practical Health Science may display advertising or use third-party services such as analytics, advertising networks, embedded content, email newsletter services, or performance tools.
            </p>

            <p>
                These third parties may collect information according to their own policies. We are not responsible for the privacy practices of third-party websites or services.
            </p>

            <h2>6. Email and Contact Information</h2>

            <p>
                If you contact us or subscribe to updates, we may use the information you provide to respond to your inquiry or send requested communications.
            </p>

            <p>
                You may unsubscribe from email communications when an unsubscribe option is provided.
            </p>

            <h2>7. Health Information</h2>

            <p>
                Practical Health Science does not provide personal medical advice and does not intentionally collect sensitive personal health information for diagnosis, treatment, or medical decision-making.
            </p>

            <p>
                Please do not send personal medical records, private health details, or urgent medical questions through this website.
            </p>

            <h2>8. Data Security</h2>

            <p>
                We take reasonable steps to protect information associated with the website. However, no method of online transmission or storage is completely secure, and we cannot guarantee absolute security.
            </p>

            <h2>9. Children’s Privacy</h2>

            <p>
                Practical Health Science is intended for a general audience and is not directed to children under the age of 13. We do not knowingly collect personal information from children under 13.
            </p>

            <h2>10. Links to Other Websites</h2>

            <p>
                Our articles may link to scientific journals, public health organizations, medical resources, or other third-party websites. We are not responsible for the content, privacy policies, or practices of external websites.
            </p>

            <h2>11. Changes to This Policy</h2>

            <p>
                We may update this Privacy Policy from time to time. The updated version will be posted on this page with a revised “Last updated” date.
            </p>

            <h2>12. Contact</h2>

            <p>
                Questions about this Privacy Policy may be sent through our contact page.
            </p>

            <p>
                <a href="{{ route('pages.contact') }}">Contact Practical Health Science</a>
            </p>
        </div>
    </section>
@endsection