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
        @if ($search)
            <li 
                x-data="{ ...searchModal() }"
                x-on:keydown.window.tab="handleForwardTab"
                x-on:keydown.window.shift.tab="handleBackwardTab"
                x-on:keydown.window.escape="handleEscape"
            >
                <button 
                    aria-label="Search"
                    class="p-2 text-sm rounded-sm transition-colors 
                    @if($dark)
                        text-white
                    @else
                        text-gray-800
                    @endif 
                    hover:bg-gray-100 hover:text-gray-800 focus:outline-none focus:ring focus:ring-blue-500" 
                    x-on:click="toggle"
                >
                    <svg 
                        role="img"
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"    
                        class="w-8 h-4 mb-1" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor" 
                        stroke-width="2" 
                        fill="none" 
                        stroke-linecap="round" 
                        stroke-linejoin="round"
                    >
                        <title>Search</title>
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
                <div
                    role="dialog"
                    aria-labelledby="dialog-title"
                    x-ref="dialog"
                    x-show="open"
                    class="h-screen w-full fixed bottom-0 inset-x-0 z-50 sm:inset-0 sm:flex"
                    x-cloak
                >
                    <div
                        x-show.transition.opacity.duration.300ms="open"
                        tabindex="-1"
                    >
                        <div class="absolute inset-0 bg-black bg-opacity-90"></div>
                    </div>
                    <div
                        x-show="open"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        class="relative w-full h-full flex items-center justify-center p-4 transition-all"
                    >
                        <div
                            style="max-height: 85vh"
                            class="max-w-3xl w-full"
                            x-on:click.away="toggle"
                        >
                            <form action="/" method="GET" class="relative" role="search">
                                <input 
                                    name="s" 
                                    type="text" 
                                    class="block w-full h-full py-3 px-1 
                                    @if($dark)
                                    text-white
                                    @else
                                        text-gray-800
                                    @endif 
                                    text-xl bg-transparent border-0 border-b border-white placeholder-gray-200 md:text-2xl focus:ring-0 focus:border-blue-700" 
                                    placeholder="Search by keywords"
                                >
                                <button class="btn-sm py-0 px-3 absolute inset-y-0 right-0 my-1 
                                text-white border-white md:my-3 hover:text-gray-800 hover:bg-white focus:outline-none focus:ring focus:ring-blue-500">
                                    GO
                                </button>
                            </form>
                        </div>
                    </div>
                    <button
                        aria-label="Close dialog"
                        title="Close dialog"
                        type="button"
                        class="hidden absolute top-0 right-0 m-4 text-gray-200 sm:inline-block hover:text-gray-300 focus:outline-none focus:ring"
                        x-on:click.stop="toggle"
                    >
                        <svg 
                            class="w-6 h-6" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            fill="none" 
                            stroke-linecap="round" 
                            stroke-linejoin="round"
                        >
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
            </li>
        @endif
    </ul>
@endif
</div>