<!DOCTYPE html>
<html lang="en">
<head>
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icon.png') }}">

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

<body class="min-h-screen bg-[#F7FBFA] text-slate-900 antialiased">
    <div class="flex min-h-screen flex-col">
        <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img
                    src="{{ asset('images/logo_horizontal.png') }}"
                    alt="Practical Health Science"
                    class="h-9 w-auto sm:h-16 md:h-18"
                />
                </a>

                <nav class="hidden items-center gap-6 text-sm font-semibold text-slate-700 md:flex">
                    <a
                        href="{{ route('home') }}#latest"
                        class="{{ request()->routeIs('home') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                    >
                        Latest
                    </a>

                    <a
                        href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.*') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                    >
                        Categories
                    </a>

                    <a
                        href="{{ route('tags.index') }}"
                        class="{{ request()->routeIs('tags.*') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                    >
                        Topics
                    </a>

                    <a
                        href="{{ route('search') }}"
                        class="{{ request()->routeIs('search') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                    >
                        Search
                    </a>

                    <a
                        href="{{ route('home') }}#newsletter"
                        class="hover:text-[#3A8F8A]"
                    >
                        Newsletter
                    </a>

                    <a
                        href="{{ route('pages.about') }}"
                        class="{{ request()->routeIs('pages.about') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                    >
                        About
                    </a>
                </nav>

                <a
                    href="{{ route('search') }}"
                    class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-[#102033] shadow-sm transition hover:border-[#3A8F8A] hover:text-[#3A8F8A] md:hidden"
                >
                    Search
                </a>
            </div>

            <div class="mx-auto flex max-w-7xl gap-5 overflow-x-auto px-6 pb-3 text-sm font-semibold text-slate-700 md:hidden">
                <a
                    href="{{ route('home') }}#latest"
                    class="shrink-0 {{ request()->routeIs('home') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                >
                    Latest
                </a>

                <a
                    href="{{ route('categories.index') }}"
                    class="shrink-0 {{ request()->routeIs('categories.*') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                >
                    Categories
                </a>

                <a
                    href="{{ route('tags.index') }}"
                    class="shrink-0 {{ request()->routeIs('tags.*') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                >
                    Topics
                </a>

                <a
                    href="{{ route('search') }}"
                    class="shrink-0 {{ request()->routeIs('search') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                >
                    Search
                </a>

                <a
                    href="{{ route('home') }}#newsletter"
                    class="shrink-0 hover:text-[#3A8F8A]"
                >
                    Newsletter
                </a>

                <a
                    href="{{ route('pages.about') }}"
                    class="shrink-0 {{ request()->routeIs('pages.about') ? 'text-[#3A8F8A]' : 'hover:text-[#3A8F8A]' }}"
                >
                    About
                </a>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

        <footer class="border-t border-slate-200 bg-white">
            <div class="mx-auto max-w-7xl px-6 py-12">
                <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-[1.3fr_0.9fr_0.9fr_0.9fr_1fr]">
                    <div>
                        <img
    src="{{ asset('images/logo_horizontal.png') }}"
    alt="Practical Health Science"
    class="h-12 w-auto md:h-14"
/>

                        <p class="mt-5 max-w-sm text-sm leading-6 text-slate-600">
                            Practical Health Science explains what health research actually says, how strong the evidence is, and what a reasonable reader can take away.
                        </p>
                    </div>

                    <div>
                        <div class="text-sm font-semibold text-[#102033]">Explore</div>

                        <ul class="mt-4 space-y-2 text-sm text-slate-600">
                            <li>
                                <a href="{{ route('home') }}#latest" class="hover:text-[#3A8F8A]">
                                    Latest articles
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categories.index') }}" class="hover:text-[#3A8F8A]">
                                    Categories
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tags.index') }}" class="hover:text-[#3A8F8A]">
                                    Topics
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('search') }}" class="hover:text-[#3A8F8A]">
                                    Search
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="text-sm font-semibold text-[#102033]">Categories</div>

                        <ul class="mt-4 space-y-2 text-sm text-slate-600">
                            @foreach ($footerCategories ?? collect() as $footerCategory)
                                <li>
                                    <a href="{{ route('categories.show', $footerCategory) }}" class="hover:text-[#3A8F8A]">
                                        {{ $footerCategory->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <div class="text-sm font-semibold text-[#102033]">Editorial</div>

                        <ul class="mt-4 space-y-2 text-sm text-slate-600">
                            <li>
                                <a href="{{ route('pages.about') }}" class="hover:text-[#3A8F8A]">
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.editorial-policy') }}" class="hover:text-[#3A8F8A]">
                                    Editorial Policy
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.medical-disclaimer') }}" class="hover:text-[#3A8F8A]">
                                    Medical Disclaimer
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.contact') }}" class="hover:text-[#3A8F8A]">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="text-sm font-semibold text-[#102033]">Important note</div>

                        <p class="mt-4 text-sm leading-6 text-slate-600">
                            Content on Practical Health Science is for educational purposes only and is not a substitute for professional medical advice, diagnosis, or treatment.
                        </p>
                    </div>
                </div>

                <div class="mt-10 border-t border-slate-200 pt-6 text-sm text-slate-500">
                    © {{ date('Y') }} Practical Health Science. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>