<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Practical Health Science' }}</title>
    <meta name="description" content="{{ $description ?? 'Evidence-based health science, made practical.' }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F7FBFA] text-[#17212B] antialiased">
    <header class="border-b border-slate-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <a href="{{ route('home') }}" class="group flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#EAF7F3] ring-1 ring-[#D3EDE7]">
                    <span class="text-lg font-bold text-[#1E2A5A]">P</span>
                </div>

                <div>
                    <div class="text-lg font-bold tracking-tight text-[#102033]">
                        Practical Health Science
                    </div>
                    <div class="text-xs font-medium text-[#3A8F8A]">
                        Evidence-based health science, made practical.
                    </div>
                </div>
            </a>

            <nav class="hidden items-center gap-7 text-sm font-medium text-slate-700 md:flex">
                <a href="{{ route('home') }}#latest" class="hover:text-[#3A8F8A]">Latest</a>
                <a href="{{ route('home') }}#categories" class="hover:text-[#3A8F8A]">Categories</a>
                <a href="{{ route('search') }}" class="hover:text-[#3A8F8A]">Search</a>
                <a href="{{ route('home') }}#newsletter" class="hover:text-[#3A8F8A]">Newsletter</a>
                <a href="#" class="hover:text-[#3A8F8A]">About</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-6 py-10">
            <div class="grid gap-8 md:grid-cols-3">
                <div>
                    <div class="text-lg font-bold text-[#102033]">
                        Practical Health Science
                    </div>
                    <p class="mt-3 max-w-md text-sm leading-6 text-slate-600">
                        We explain what health science actually says — without hype, fear, or misinformation.
                    </p>
                </div>

                <div>
                    <div class="text-sm font-semibold text-[#102033]">Editorial</div>
                    <ul class="mt-3 space-y-2 text-sm text-slate-600">
                        <li><a href="#" class="hover:text-[#3A8F8A]">Editorial Policy</a></li>
                        <li><a href="#" class="hover:text-[#3A8F8A]">Medical Disclaimer</a></li>
                        <li><a href="#" class="hover:text-[#3A8F8A]">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <div class="text-sm font-semibold text-[#102033]">Important note</div>
                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        Content is for educational purposes only and does not provide medical advice, diagnosis, or treatment.
                    </p>
                </div>
            </div>

            <div class="mt-10 border-t border-slate-200 pt-6 text-xs text-slate-500">
                © {{ date('Y') }} Practical Health Science. All rights reserved.
            </div>
        </div>
    </footer>
</body>

</html>