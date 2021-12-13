<div x-ref="desktopNav" class="hidden xl:flex flex-col items-end">
    @if ($supportNav)
        @include('kernl-ui::/menus/support-navigation')
    @endif
@if ($links)
    <ul class="-mx-2 flex {{ $supportNav ? 'items-end my-3 text-right' : 'items-center' }}">
        @foreach ($links as $item)
            @if (!$item->children)
                <li>
                    <a class="inline-flex items-center px-4 py-1 text-sm rounded-sm leading-none
                        @if($dark)
                            text-white
                        @else
                            text-gray-800
                        @endif  
                        hover:bg-gray-100 transition duration-200 hover:text-gray-800 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $item->url }}"
                    >
                        <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
                        <span class="py-1 border-b-2 border-transparent">
                            {!! $item->label !!} {!! $item->active ? '<span class="sr-only">(current)</span>' : '' !!}
                        </span>
                    </a>
                </li>
            @else
                <li
                    class="relative"
                    x-on:mouseenter="activeSection = '{{ $item->slug }}'"
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
                        href="{{ $item->url }}"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        :aria-expanded="activeSection === '{{ $item->slug }}' ? 'true' : 'false'"
                        @keydown.space.prevent="toggle('{{ $item->slug }}')"
                        @keydown.enter.prevent="toggle('{{ $item->slug }}')"
                        @keydown.arrow-down.prevent="focusNextLink($event, '{{ $item->slug }}')"
                    >
                        <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
                        <span class="py-1 border-b-2 border-transparent">
                            {!! $item->label !!}
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
                            :class="{ 'text-gray-800': activeSection === '{{ $item->slug }}'}"
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
                        :class="{ 'flex': activeSection === '{{ $item->slug }}', 'hidden': activeSection !== '{{ $item->slug }}' }"
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
                        @foreach ($item->children as $child)
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
                                href="{{ $child->url }}"
                                @keydown.arrow-up.prevent="focusPreviousLink"
                                @keydown.arrow-down.prevent="focusNextLink"
                            >
                                <!-- When this page is active, remove `border-transparent` and add `border-gray-600` to the span below -->
                                <span class="block w-full px-2 border-l-2 border-transparent">
                                    {!! $child->label !!}
                                </span>
                            </a>
                        @endforeach
                    </div>
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