@props([
    'category' => null,
])

@if ($category)
    <a
        href="{{ route('categories.show', $category) }}"
        class="rounded-full bg-[#EAF7F3] px-3 py-1 text-xs font-semibold text-[#2F7F7A] ring-1 ring-[#D3EDE7] transition hover:bg-[#D3EDE7] hover:text-[#102033]"
    >
        {{ $category->name }}
    </a>
@endif