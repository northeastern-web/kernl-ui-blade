<a
    href="{{ data_get($link, 'href', '#') }}"
    @if(data_get($link, 'active', false))
        class="px-2 border-l-2 transition-colors text-gray-900 font-bold border-red-600"
    @else
        class="px-2 border-l-2 transition-colors border-transparent hover:text-gray-900"
    @endif
>
    {{ $link['text'] }}
</a>
