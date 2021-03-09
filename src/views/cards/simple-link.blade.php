<a
    href="{{ $url }}"
    aria-label="{{ $title }}"
    class="{{ $cardClasses() }}"
>
    <h2 class="{{ $titleClasses() }}">
        {{ $title }}
    </h2>
    <p class="{{ $bodyClasses() }}">
        {{ $body }}
    </p>
    @if ($withFooter)
        <footer class="mt-10 flex justify-between items-center">
            <span class=" text-xs ">
                {{ $footerText }}
            </span>
            <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
        </footer>
    @endif
</a>
