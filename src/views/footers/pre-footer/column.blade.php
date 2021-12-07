    <a 
        href="{!! $link['url'] !!}"
        target="{!! $$link['target'] !!}"
        class="p-2 hover:bg-gray-cool-50 block"
    >
        @if ($featherIcon || $title)
            <div>
                @if ($featherIcon)
                    <div class="flex items-center justify-center h-12 w-12 bg-red-700 text-white">
                        <i data-feather="{!! $featherIcon !!}"></i>
                    </div>
                @endif
                @if ($title)
                    <h3 class="mt-5 text-lg leading-6 font-medium text-gray-900">{!! $title !!}</h3>
                @endif
            </div>
        @endif
        @if ($description)
            <div class="mt-2 pr-2 text-base text-gray-500">
                {!! $description !!}
            </div>
        @endif
    </a>