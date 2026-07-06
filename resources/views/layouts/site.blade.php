<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
    $siteName = 'Practical Health Science';
    $pageTitle = $title ?? $siteName;
    $pageDescription = $description ?? 'Evidence-based health science, made practical.';
    $canonicalUrl = $canonical ?? url()->current();
    $ogTitle = $ogTitle ?? $pageTitle;
    $ogDescription = $ogDescription ?? $pageDescription;
    $ogImage = $ogImage ?? asset('images/og-default.jpg');
    $robots = $robots ?? 'index, follow';
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="robots" content="{{ $robots }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    @stack('structured-data')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F7FBFA] text-[#17212B] antialiased">
    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4">
            <a href="{{ route('home') }}" class="group flex min-w-0 items-center gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#EAF7F3] ring-1 ring-[#D3EDE7]">
                    <span class="text-lg font-bold text-[#1E2A5A]">P</span>
                </div>

                <div class="min-w-0">
                    <div class="truncate text-base font-bold tracking-tight text-[#102033] sm:text-lg">
                        Practical Health Science
                    </div>

                    <div class="hidden text-xs font-medium text-[#3A8F8A] sm:block">
                        Evidence-based health science, made practical.
                    </div>
                </div>
            </a>

            <nav class="hidden items-center gap-7 text-sm font-medium text-slate-700 lg:flex">
                <a href="{{ route('home') }}#latest" class="hover:text-[#3A8F8A]">Latest</a>
                <a href="{{ route('categories.index') }}" class="hover:text-[#3A8F8A]">Categories</a>
                <a href="{{ route('search') }}" class="hover:text-[#3A8F8A]">Search</a>
                <a href="{{ route('home') }}#newsletter" class="hover:text-[#3A8F8A]">Newsletter</a>
                <a href="{{ route('pages.about') }}" class="shrink-0 hover:text-[#3A8F8A]">About</a>
            </nav>

            <div class="flex items-center gap-2 lg:hidden">
                <a
                    href="{{ route('search') }}"
                    class="inline-flex items-center justify-center rounded-full border border-[#D3EDE7] bg-white px-4 py-2 text-sm font-semibold text-[#1E2A5A] hover:border-[#3A8F8A]">
                    Search
                </a>
            </div>
        </div>

        <div class="border-t border-slate-100 bg-white px-6 py-3 lg:hidden">
            <nav class="mx-auto flex max-w-7xl items-center gap-5 overflow-x-auto text-sm font-medium text-slate-700">
                <a href="{{ route('home') }}#latest" class="shrink-0 hover:text-[#3A8F8A]">Latest</a>
                <a href="{{ route('categories.index') }}" class="shrink-0 hover:text-[#3A8F8A]">Categories</a>
                <a href="{{ route('home') }}#newsletter" class="shrink-0 hover:text-[#3A8F8A]">Newsletter</a>
                <a href="{{ route('pages.about') }}" class="shrink-0 hover:text-[#3A8F8A]">About</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-6 py-12">
            <div class="grid gap-10 md:grid-cols-[1.4fr_0.8fr_0.8fr_1fr]">
                <div>
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#EAF7F3] ring-1 ring-[#D3EDE7]">
                            <span class="text-lg font-bold text-[#1E2A5A]">P</span>
                        </div>

                        <div>
                            <div class="text-lg font-bold text-[#102033]">
                                Practical Health Science
                            </div>

                            <div class="text-xs font-medium text-[#3A8F8A]">
                                Evidence-based health science, made practical.
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 max-w-md text-sm leading-6 text-slate-600">
                        We explain what health science actually says — without hype, fear, or misinformation.
                    </p>
                </div>

                <div>
                    <div class="text-sm font-semibold text-[#102033]">Explore</div>

                    <ul class="mt-4 space-y-2 text-sm text-slate-600">
                        <li><a href="{{ route('home') }}#latest" class="hover:text-[#3A8F8A]">Latest articles</a></li>
                        <li><a href="{{ route('categories.index') }}" class="hover:text-[#3A8F8A]">Categories</a></li>
                        <li><a href="{{ route('search') }}" class="hover:text-[#3A8F8A]">Search</a></li>
                    </ul>
                </div>

                <div>
                    <div class="text-sm font-semibold text-[#102033]">Editorial</div>

                    <ul class="mt-4 space-y-2 text-sm text-slate-600">
                        <li><a href="{{ route('pages.about') }}" class="hover:text-[#3A8F8A]">About</a></li>
                        <li><a href="{{ route('pages.editorial-policy') }}" class="hover:text-[#3A8F8A]">Editorial Policy</a></li>
                        <li><a href="{{ route('pages.medical-disclaimer') }}" class="hover:text-[#3A8F8A]">Medical Disclaimer</a></li>
                        <li><a href="{{ route('pages.contact') }}" class="hover:text-[#3A8F8A]">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <div class="text-sm font-semibold text-[#102033]">Important note</div>

                    <p class="mt-4 text-sm leading-6 text-slate-600">
                        Content is for educational purposes only and does not provide medical advice, diagnosis, or treatment.
                    </p>
                </div>
            </div>

            <div class="mt-10 border-t border-slate-200 pt-6 text-xs leading-6 text-slate-500">
                © {{ date('Y') }} Practical Health Science. All rights reserved.
            </div>
        </div>
    </footer>
</body>

</html>