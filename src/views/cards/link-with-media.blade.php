<a
    @if (!empty($url))
        href="{{ $url }}"
    @endif
    aria-label="{{ $title }}"
    class="{{ $cardClasses() }}"
>
    @if ($imageUrl && !empty($imageUrl))
        <div class="{{ $imageOuterImageContainerClasses() }}">
            <div class="{{ $imageInnerImageContainerClasses() }}">
                <img
                    src="{{ $imageUrl }}"
                    alt="{{ $title }}"
                    class="w-full h-full object-cover transition-opacity group-hover:opacity-80"
                >
                @if($badge)
                    <div class="absolute top-0 left-0 px-5 py-6">
                        <span role="status" class="inline-flex px-4 py-2 text-xs text-white leading-none bg-black bg-opacity-50 rounded-md">
                            {{ $badge }}
                        </span>
                    </div>
                @endif
            </div>
        </div>
    @endif
    <div class="flex flex-col">

        <div class="{{ $bodyClasses() }}">
            @if(isset($main))
                {{ $main }}
            @else
                @if($preHeader)
                    <div class="{{ $preHeaderClasses() }}">
                        {{ $preHeader }}
                    </div>
                @endif
                <h2 class="{{ $titleClasses() }}">
                    {{ $title }}
                </h2>
                <p class="{{ $messageClasses() }}">
                    {{ $body }}
                </p>
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
