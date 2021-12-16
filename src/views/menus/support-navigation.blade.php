<ul class="-mx-2 flex items-center">
    @foreach ($supportNav as $item)
        @isset ($item['children'])
            @if(count($item['children']) > 0)
                <li
                    class="relative" 
                    @isset ($item['slug'])
                        x-on:mouseenter="activeSection = '{{ $item['slug'] }}'"
                    @else
                        x-on:mouseenter="activeSection = '{{ $loop->index }}'"
                    @endif
                    x-on:mouseleave="activeSection = null"
                >
                
                    <a 
                        id="navbar-dropdown-1"
                        class="inline-flex items-center px-3 border-gray-500  hover:bg-gray-100 hover:text-gray-800 {{ $item['isLast'] ? '' : 'border-r' }} {{ $item['isFeatured'] ? 'font-bold' : '' }} text-xs uppercase 
                        @if($dark)
                            text-white
                        @else
                            text-gray-800
                        @endif
                        focus:outline-none focus:ring focus:ring-blue-400"
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
                            :aria-expanded="activeSection === '{{ $loop->index }}' ? 'true' : 'false'"
                            @keydown.space.prevent="toggle('{{ $loop->index }}')"
                            @keydown.enter.prevent="toggle('{{ $loop->index }}')"
                            @keydown.arrow-down.prevent="focusNextLink($event, '{{ $item['slug'] }}')"
                        @endif
                    >
                        <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
                        <span class="py-1 border-b-2 {{ isset($item['match']) && \Illuminate\Support\Str::of($currentPath)->start('/')->is($item['match']) ? 'border-gray-900' : 'border-transparent' }}">
                            {{ $item['text'] }}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="feather feather-chevron-down ml-2 w-4 h-4     
                        @if($dark)
                            text-gray-200
                        @else
                            text-gray-800
                        @endif">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div
                        @isset ($item['slug'])
                            :class="{ 'flex': activeSection === '{{ $item['slug'] }}', 'hidden': activeSection !== '{{ $item['slug'] }}' }"
                        @else
                            :class="{ 'flex': activeSection === '{{ $loop->index }}', 'hidden': activeSection !== '{{ $loop->index }}' }"
                        @endif
                        aria-labelledby="navbar-dropdown-1"
                        class="absolute right-0 top-0 z-10 w-64 mt-6 flex-col items-start justify-start py-2 
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
                                class="block w-full py-2 px-3 
                                @if($dark)
                                    text-gray-200
                                    hover:text-gray-50
                                @else
                                    text-gray-800
                                    hover:underline
                                @endif
                                text-xs transition-colors focus:outline-none focus:ring focus:ring-blue-500"
                                href="{{ $child['href'] }}"
                                @keydown.arrow-up.prevent="focusPreviousLink"
                                @keydown.arrow-down.prevent="focusNextLink"
                            >
                                <!-- When this page is active, remove `border-transparent` and add `border-gray-600` to the span below -->

                                <span class="block w-full px-2 border-l-2 {{ isset($child['match']) && \Illuminate\Support\Str::of($currentPath)->start('/')->is($child['match']) ? 'border-transparent' : 'border-gray-600' }}">
                                    {!! $child['text'] !!}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </li>
            @else
                <li>
                    <a
                        class="inline-flex items-center px-3 text-xs border-gray-500  hover:bg-gray-100 hover:text-gray-800 transition duration-100 tracking-wide{{ $item['isLast'] ? '' : ' border-r' }}{{ $item['isFeatured'] ? ' font-bold' : '' }} uppercase @if($dark)
                            text-white
                        @else
                            text-gray-800
                        @endif 
                        focus:outline-none focus:ring focus:ring-blue-400"
                        href="{{ $item['href'] }}"
                    >
                    <!-- When the page or child pages are active, remove `border-transparent` and add `border-gray-900` to the span below -->
                    <span class="py-1 border-b-2 {{ isset($item['match']) && \Illuminate\Support\Str::of($currentPath)->start('/')->is($item['match']) ? 'border-gray-900' : 'border-transparent' }}">
                        {{ $item['text'] }}
                    </span>
                    </a>
                </li>
            @endif
        @endif
    @endforeach
</ul>
