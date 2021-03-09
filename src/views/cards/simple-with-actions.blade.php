<div class="{{ $cardClasses() }}">
    <h2 class="{{ $titleClasses() }}">
        {{ $title }}
    </h2>
    <p class="{{ $bodyClasses }}">
        {{ $body }}
    </p>
    <div class="mt-8 flex items-center">
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
    </div>
</div>
