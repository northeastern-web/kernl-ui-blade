<a
    href="{{ $url }}"
    aria-label="{{ $title }}"
    class="{{ $cardClasses() }}"
>
    <div class="flex-1">
        @if(isset($main))
            {{ $main }}
        @else
            <h2 class="{{ $titleClasses() }}">
                {{ $title }}
            </h2>
            <p class="{{ $bodyClasses() }}">
                {{ $body }}
            </p>
        @endif
    </div>

    @if ($withFooter)
        <footer class="mt-10 flex justify-between items-center">
            @if(isset($footer))
                {{ $footer }}
            @else
                <span class=" text-xs ">
                    {{ $footerText }}
                </span>
                    <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
            @endif
        </footer>
    @endif
</a>
