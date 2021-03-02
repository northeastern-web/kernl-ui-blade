{{-- Mobile --}}
<div
    x-data="{
        navIsOpen: false,
        init() {
            document.body.classList.add('overflow-x-hidden');
            this.$watch('navIsOpen', (val) => document.body.classList[val ? 'add' : 'remove']('overflow-y-hidden'));
        }
    }"
    x-init="init()"
    x-on:keydown.window.escape="navIsOpen = false"
    {{ $attributes }}
>
    <button
        class="btn text-gray-900 uppercase bg-gray-200 md:hidden hover:bg-gray-300"
        x-on:click="navIsOpen = true"
    >
        {{ $title }}
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="feather feather-menu ml-2 w-4 h-4">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </button>
    {{-- Overlay --}}
    <div
        class="fixed inset-0 w-full h-full bg-black bg-opacity-80 md:hidden"
        x-show="navIsOpen"
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:leave="transition-opacity ease-in duration-300"
        x-transition:leave-end="opacity-0"
        style="display: none;"
    ></div>

    <nav
        aria-label="mobile {{ strtolower($title) }} navigation"
        class="fixed inset-y-0 right-0 max-w-sm w-full py-12 px-6 text-gray-600 bg-white overflow-y-auto shadow md:hidden"
        style="display: none;"

        x-show="navIsOpen"
        x-on:click.away="navIsOpen = false"

        x-transition:enter="transition-transform ease-out duration-300"
        x-transition:enter-start="transform translate-x-full"
        x-transition:leave="transition-transform ease-in duration-300"
        x-transition:leave-end="transform translate-x-full"
    >
        <div class="flex flex-col space-y-3">
            <div class="w-full flex items-center justify-between">
                <a href="#" class="px-2 uppercase tracking-wide text-gray-900 border-l-2 border-transparent">
                    {{ $title }}
                </a>
                <button class="text-gray-500 md:hidden transition-colors hover:text-gray-600 focus:outline-none focus:ring focus:ring-blue-500" @click="navIsOpen = false">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-x w-6 h-6"
                    >
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            @foreach($links as $link)
                @if(count(data_get($link, 'children', [])) > 0)
                    @include('kernl-ui::includes.interior-navigation.base.link-with-children', ['link' => $link])
                @else
                    @include('kernl-ui::includes.interior-navigation.base.link', ['link' => $link])
                @endif
            @endforeach
        </div>
    </nav>
</div>

{{-- Desktop --}}
<div
    {{ $attributes->merge(['class' => 'px-4 md:w-1/3 lg:w-1/5']) }}
>
    <nav
        aria-label="desktop {{ strtolower($title) }} navigation"
        class="hidden sticky top-0 py-8 text-gray-600 md:flex flex-col space-y-3"
    >
        <a href="#" class="px-2 uppercase tracking-wide text-gray-900 border-l-2 border-transparent">
            {{ $title ?? 'No title' }}
        </a>
        @foreach($links as $link)
            @if(count(data_get($link, 'children', [])) > 0)
                @include('kernl-ui::includes.interior-navigation.base.link-with-children', ['link' => $link])
            @else
                @include('kernl-ui::includes.interior-navigation.base.link', ['link' => $link])
            @endif
        @endforeach
    </nav>
</div>
