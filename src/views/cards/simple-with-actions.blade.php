<div class="{{ $cardClasses() }}">

    <div class="flex-1">
        @if(isset($main))
            {{ $main }}
        @else
            <h2 class="{{ $titleClasses() }}">
                {{ $title }}
            </h2>
            <p class="{{ $bodyClasses }}">
                {{ $body }}
            </p>
        @endif
    </div>

    <div class="mt-8 flex items-center">
        @if(isset($actions))
            {{ $actions }}
        @else
            <a
                href="{{ $primaryActionUrl }}"
                class="{{ $primaryActionClasses() }}"
            >
                {{ $primaryActionText }}
            </a>
            @if($secondaryActionUrl)
                <a
                    href="{{ $secondaryActionUrl }}"
                    class="ml-1 btn btn-sm text-gray-900 bg-gray-100 hover:bg-gray-300"
                >
                    {{ $secondaryActionText }}
                </a>
            @endif
        @endif
    </div>

</div>
