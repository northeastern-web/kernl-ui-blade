<div class="px-4 py-32 font-sans">
    <div class="flex items-center justify-center space-x-2">
        {{-- Arrow Previous --}}
        <a
            href="{{ $pagePaginationUrl($currentPage - 1) }}"
            class="{{ $navigationArrowsClasses($currentPage - 1) }}"
        >
            <i data-feather="chevron-left" class="w-4 h-4"></i>
        </a>


        @foreach(range(1, $numberOfPages) as $page)
            <a
                href="{{ $pagePaginationUrl($page) }}"
                class="{{ $pageClasses($page) }}"
            >
                {{ $page }}
            </a>
        @endforeach

        {{-- Arrow Next --}}
        <a
            href="{{ $pagePaginationUrl($currentPage + 1) }}"
            class="{{ $navigationArrowsClasses($currentPage + 1) }}"
        >
            <i data-feather="chevron-right" class="w-4 h-4"></i>
        </a>
    </div>
</div>
