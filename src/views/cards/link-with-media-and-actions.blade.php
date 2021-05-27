<div
    class="{{ $cardClasses() }}"
>
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
    <div class="flex flex-col">
        <div class="pt-8 pb-2 px-5 flex-1">
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

        <div class="px-5 py-6 flex items-center">
            @if(isset($actions))
                {{ $actions }}
            @else
                <a href="{{ $primaryActionUrl }}" class="btn btn-sm text-white bg-red-600 hover:bg-red-800">{{ $primaryActionText }}</a>
                @if($secondaryActionText)
                    <a href="{{ $secondaryActionUrl }}" class="ml-1 btn btn-sm text-gray-900 bg-gray-100 hover:bg-gray-300">{{ $secondaryActionText }}</a>
                @endif
            @endif
        </div>
    </div>
</div>
