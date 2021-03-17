<a
    href="{{ $url }}"
    aria-label="{{ $title }}"
    class="{{ $cardClasses() }}"
>
    <div class="relative w-full bg-black">
        <div class="h-full aspect-w-16 aspect-h-9">
            <img
                src="{{ $imageUrl }}"
                alt="{{ $title }}"
                class="w-full h-full object-cover transition-opacity group-hover:opacity-80"
            >
        </div>
    </div>
    <div class="flex flex-col flex-1 pt-6 pb-8 px-5">
        <div class="flex-1">
            @if(isset($main))
                {{ $main }}
            @else
                <div class="{{ $eventClasses() }}">
                    <div class="flex space-x-2 items-center">
                        <i data-feather="calendar" class="w-4 h-4"></i>
                        <p class="text-sm font-bold">{{ $date }}</p>
                    </div>
                    <div class="flex space-x-2 items-center">
                        <i data-feather="clock" class="w-4 h-4"></i>
                        <p class="text-sm font-bold">{{ $time }}</p>
                    </div>
                </div>
                <div class="mt-5">
                    <h2 class="{{ $titleClasses() }}">
                        {{ $title }}
                    </h2>
                    <p class="{{ $bodyClasses() }}">
                        {{ $body }}
                    </p>
                </div>
            @endif
        </div>

        @if($withFooter)
            <footer class="{{ $footerClasses() }}">
                @if(isset($footer))
                    {{ $footer }}
                @else
                    <span class="{{ $footerTextClasses() }}">
                    {{ $footerText }}
                </span>
                    <i data-feather="arrow-right" class="ml-2 w-4 h-4"></i>
                @endif
            </footer>
        @endif
    </div>
</a>
