<div
    @if(data_get($link, 'expandable', false))
        x-data="{
            expanded: {{ data_get($link, 'expanded', false) ? 'true' : 'false' }}
        }"
    @endif
>
    @if(data_get($link, 'expandable', false))
        <button
            class="
                w-full flex items-center justify-between text-left
                @if(data_get($link, 'active', false))
                    px-2 border-l-2 transition-colors text-gray-900 font-bold border-red-600
                @else
                    px-2 border-l-2 transition-colors border-transparent hover:text-gray-900
                @endif
            "
            x-on:click="expanded = ! expanded"
        >
            <span>
                {{ $link['text'] }}
            </span>
            <svg
                class="ml-3 w-5 h-5 transform transition-transform rotate-180"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                x-bind:class="{ 'rotate-180': expanded }"
                x-cloak
            >
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </button>
    @else
        <a
            href="{{ data_get($link, 'href', '#') }}"
            class="
                w-full flex items-center justify-between text-left
                @if(data_get($link, 'active', false))
                    px-2 border-l-2 transition-colors text-gray-900 font-bold border-red-600
                @else
                    px-2 border-l-2 transition-colors border-transparent hover:text-gray-900
                @endif
            "
        >
            {{ $link['text'] }}
        </a>
    @endif

    <ul
        @if(data_get($link, 'expandable', false))
            x-show="expanded"
            x-cloak
        @endif
        class="py-2 text-sm space-y-2"
    >
        @foreach(data_get($link, 'children', []) as $child)
            <li>
                <a
                    href="{{ data_get($child, 'href', '#') }}"
                    class="px-4 transition-colors hover:text-gray-900"
                >
                    {{ data_get($child, 'text', 'No text') }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
