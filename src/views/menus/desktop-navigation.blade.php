<div x-ref="desktopNav" class="hidden xl:flex flex-col items-end">
    @if ($supportNav)
        @include('kernl-ui::/menus/support-navigation')
    @endif
    @if ($links)
        <ul class="-mx-2 flex {{ $supportNav ? 'items-center my-3 text-right' : 'items-center' }}">
            @foreach ($links as $item)
                @isset($item['children'])
                    @if(count($item['children']) > 0)
                        <li
                            class="relative"
                            @isset ($item['slug'])
                                x-on:mouseenter="activeSection = '{{ $item['slug'] }}'"
                            @else
                                x-on:mouseenter="activeSection = '{{ $loop->index }}'"
                            @endif
                            x-on:mouseleave="activeSection = null"
                            x-on:keydown.window.escape="activeSection = null"
                        >
                            <a
                                id="navbar-dropdown-{!! $loop->index !!}"
                                class="inline-flex items-end px-4 py-1 text-sm rounded-sm leading-none text-right
                                @if($dark)
                                    text-white
                                @else
                                    text-gray-800
                                @endif 
                                hover:bg-gray-100 hover:text-gray-800 focus:outline-none focus:ring focus:ring-blue-400"
                                href="{{ $item['href'] }}"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                @isset ($item['slug'])
                                    :aria-expanded="activeSection === '{{ $item['slug'] }}' ? 'true' : 'false'"
                                    @keydown.space.prevent="toggle('{{ $item['slug'] }}')"
                                    @keydown.enter.prevent="toggle('{{ $item['slug'] }}')"
                                    @keydown.arrow-down.prevent="focusNextLink($event, '{{ $item['slug'] }}')"
                                @else
                                    :aria-expanded="activeSection === {{ $loop->index }} ? 'true' : 'false'"
                                    @keydown.space.prevent="toggle({{ $loop->index }})"
                                    @keydown.enter.prevent="toggle({{ $loop->index }})"
                                    @keydown.arrow-down.prevent="focusNextLink($event, {{ $loop->index }})"
                                @endif
                                {!! $currentPath == $item['href'] ? 'aria-current="page"' : '' !!}
                            >
                                <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
                                <span class="py-1 border-b-2 {{ isset($item['match']) && \Illuminate\Support\Str::of($currentPath)->start('/')->is($item['match']) ? 'border-gray-900' : 'border-transparent' }}">
                                    {{ $item['text'] }}
                                </span>
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
                                    @isset ($item['slug']) 
                                        :class="{ 'text-gray-800': activeSection === '{{ $item['slug'] }}'}"
                                    @else
                                        :class="{ 'text-gray-800': activeSection === '{{ $loop->index }}'}"
                                    @endif
                                    class="feather feather-chevron-down ml-1 w-8 h-4 mb-1 
                                    @if($dark)
                                        text-gray-200
                                    @else
                                        text-gray-800
                                    @endif
                                    ">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </a>
                            <div
                                @isset ($item['slug'])
                                    :class="{ 'flex': activeSection === '{{ $item['slug'] }}', 'hidden': activeSection !== '{{ $item['slug'] }}' }"
                                @else
                                    :class="{ 'flex': activeSection === '{{ $loop->index }}', 'hidden': activeSection !== '{{ $loop->index }}' }"
                                @endif
                                aria-labelledby="navbar-dropdown-{!! $loop->index !!}"
                                class="absolute right-0 top-0 z-10 w-64 mt-8 flex-col items-start justify-start py-2 text-left
                                @if($dark)
                                    bg-gray-700
                                @else
                                    bg-white
                                @endif
                                shadow-sm rounded-sm"
                                x-cloak
                            >
                                @foreach ($item['children'] as $child)
                                    <!-- When this page is active, remove `text-gray-600` and add `text-gray-900` to the anchor below -->
                                    <a
                                        
                                        @if($loop->last)
                                            x-on:keydown.tab="activeSection = null"
                                        @endif
                                        class="block w-full py-1.5 px-3 
                                        @if($dark)
                                            text-gray-200
                                            hover:text-gray-50
                                        @else
                                            text-gray-800
                                        @endif
                                        text-sm transition-colors  focus:outline-none focus:ring focus:ring-blue-500 hover:underline"
                                        href="{{ $child['href'] }}"
                                        @keydown.arrow-up.prevent="focusPreviousLink"
                                        @keydown.arrow-down.prevent="focusNextLink"
                                    >
                                        <!-- When this page is active, remove `border-transparent` and add `border-gray-600` to the span below -->
                                        <span class="block w-full px-2 border-l-2 border-transparent">
                                            {!! $child['text'] !!}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        @else
                        <li>
                            <a class="inline-flex items-center px-4 py-1 text-sm rounded-sm leading-none
                                @if($dark)
                                    text-white
                                @else
                                    text-gray-800
                                @endif  
                                hover:bg-gray-100 transition duration-200 hover:text-gray-800 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $item['href'] }}"
                            >
                                <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
                                <span class="py-1 border-b-2 {{ isset($item['match']) && \Illuminate\Support\Str::of($currentPath)->start('/')->is($item['match']) ? 'border-gray-900' : 'border-transparent' }}">
                                    {{ $item['text'] }}
                                </span>
                            </a>
                        </li>
                    @endif
                @else
                    <li>
                        <a class="inline-flex items-center px-4 py-1 text-sm rounded-sm leading-none
                            @if($dark)
                                text-white
                            @else
                                text-gray-800
                            @endif  
                            hover:bg-gray-100 transition duration-200 hover:text-gray-800 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $item['href'] }}"
                        >
                            <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
                            <span class="py-1 border-b-2 {{ isset($item['match']) && \Illuminate\Support\Str::of($currentPath)->start('/')->is($item['match']) ? 'border-gray-900' : 'border-transparent' }}">
                                {{ $item['text'] }}
                            </span>
                        </a>
                    </li>
                @endif
            @endforeach
            @isset($afterLinksDesktop)
                {{ $afterLinksDesktop }}
            @endif
            @if ($search)
                @include('kernl-ui::includes/headers/search-desktop')
            @endif
        </ul>
    @endif
</div>