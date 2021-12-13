<div x-ref="desktopNav" class="hidden xl:flex flex-col items-end" x-cloak>
    @if ($supportNav)
        @include('kernl-ui::/menus/support-navigation')
    @endif

    @if ($links)
        <ul class="-mx-2 flex {{ $supportNav ? 'items-start my-3' : 'items-center' }}">
            @foreach ($links as $item)
                <div x-data="{isOpen: false} "class="relative" role="listitem">
                    {{-- Mega Menu Item --}}
                    <div>
                        <a
                            @click="
                                isOpen = !isOpen;
                                let windowSize = screen.width;
                                megaMenu($el, windowSize);
                            "
                            @if($item->children)
                                x-on:click.prevent
                            @endif
                            href="{{ $item->url }}"
                            :class="isOpen ? 'bg-gray-100 text-gray-800' : ''"
                            class="inline-flex items-center pl-4 py-1 text-sm rounded-sm hover:bg-gray-100 transition duration-200 hover:text-gray-800 hover:cursor-pointer focus:outline-none focus:ring focus:ring-blue-400
                                {{ $dark ? 'text-white' : 'text-gray-800' }}
                                {{ !$item->children ? ' pr-4' :''}}
                            " 
                            aria-expanded="false"

                        >
                            <span class="py-1 border-b-2 border-transparent">{!! $item->label !!}</span>
                            @if ($item->children)
                                <svg 
                                    class="text-gray-400 mx-4 xl:ml-1 xl:mr-5 h-5 w-5 group-hover:text-gray-500 transition ease-in-out duration-150" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 20 20" 
                                    fill="currentColor" 
                                    aria-hidden="true"
                                >
                                    <path 
                                        fill-rule="evenodd" 
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                                        clip-rule="evenodd" 
                                    />
                                </svg>
                            @endif
                        </a>
                    
                    @if($item->children)
                        {{-- Mega Menu - Pop-out --}}
                        <div
                            x-show="isOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            @click.away="isOpen = false"
                            @mouseleave="isOpen = false"
                            x-on:keydown.window.escape="isOpen = false"
                            class="absolute z-10 transform mt-3 px-2 w-screen shadow-lg max-w-md sm:px-0 lg:max-w-max"
                            role="presentation"                        
                        >
                            <div class="pt-4 pl-8 pr-16 bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative bg-white px-5 py-3 mt-6">
                                    <a 
                                        href="{!! $item->url !!}" 
                                        class="-m-3 pr-1 flex mb-1 items-start  border-l-3 border-transparent hover:border-red-700 transition ease-in-out duration-150"
                                    >
                                        <div class="mx-4">
                                            <p class="text-base uppercase font-medium text-gray-800 text-sm leading-5">
                                                {!! $item->label !!}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                @php 
                                    $childrenCount = count($item->children);
                                    $cols = ceil($childrenCount/6);
                                @endphp
                                <ul class="relative grid gap-6 bg-white px-5 py-3 sm:gap-8 sm:p-8 lg:grid-cols-{!! $cols !!}">
                                    @foreach ($item->children as $child)
                                        <li>
                                            <a 
                                            @if($loop->last && !$mega_menu_cta )
                                                x-on:keydown.tab="isOpen = false"
                                            @endif
                                            href="{!! $child->url !!}" 
                                            class="-m-3 pr-1 flex mb-1 h-5 items-center border-l-3 border-transparent hover:border-red-700  transition ease-in-out duration-150"
                                        >
                                            <div class="mx-4">
                                                <p class="text-base font-medium hover:underline text-gray-800 leading-5 hover:text-black">
                                                    {!! $child->label !!}
                                                </p>
                                            </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Mega Menu CTA --}}
                            @if($mega_menu_cta)
                                <div class="p-5 w-full bg-gray-cool-100 sm:p-8">
                                    <a 
                                        x-on:keydown.tab="isOpen = false"
                                        target="{!! $mega_menu_cta['target'] !!}" 
                                        href="{!! $mega_menu_cta['url'] !!}" 
                                        class="-m-3 p-1 flow-root rounded-md hover:bg-gray-100 transition ease-in-out duration-150"
                                    >
                                        <span class="flex items-center">
                                            <span class="text-base font-medium text-gray-800 leading-5">
                                                {!! $mega_menu_cta['title'] !!}
                                            </span>
                                        
                                            @if ($mega_menu_alert)
                                                <span class="ml-3 inline-flex items-center px-3 py-0.5 text-xs font-medium leading-5 bg-gray-cool-300">
                                                    {!! $mega_menu_alert !!}
                                                </span>
                                            @endif

                                        </span>
                                        
                                        @if($mega_menu_copy)
                                            <span class="mt-1 block text-sm text-gray-500">
                                                {!! $mega_menu_copy !!}
                                            </span>
                                        @endif
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                    </div>
                </div>
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