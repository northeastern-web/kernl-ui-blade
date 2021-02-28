<div x-data="{
                    navIsOpen: true,
                    init() {
                    console.log('helop')
                        document.body.classList.add('overflow-x-hidden');
                        this.$watch('navIsOpen', (val) => document.body.classList[val ? 'add' : 'remove']('overflow-y-hidden'));
                    }
                }" x-init="init()"
     class="px-4 md:w-1/3 lg:w-1/5 lg:px-4" @keydown.window.escape="navIsOpen = false">
    <button class="btn text-gray-900 uppercase bg-gray-200 md:hidden hover:bg-gray-300" @click="navIsOpen = true">
        About
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ml-2 w-4 h-4"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </button>
    <div class="fixed inset-0 w-full h-full bg-black bg-opacity-80 md:hidden" x-show="navIsOpen" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-end="opacity-0" style="display: none;"></div>
    <nav aria-label="mobile category navigation" x-show="navIsOpen" class="fixed inset-y-0 right-0 max-w-sm w-full py-12 px-6 text-gray-600 bg-white overflow-y-auto shadow md:hidden" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="transform translate-x-full" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-end="transform translate-x-full" @click.away="navIsOpen = false" style="display: none;">
        <div class="flex flex-col">
            <div class="w-full flex items-center justify-between">
                <a href="#" class="px-2 uppercase tracking-wide text-gray-900 border-l-2 border-transparent">
                    About
                </a>
                <button class="text-gray-500 md:hidden transition-colors hover:text-gray-600 focus:outline-none focus:ring focus:ring-blue-500" @click="navIsOpen = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-6 h-6"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <a class="mt-3 px-2 border-l-2 transition-colors border-transparent hover:text-gray-900" href="#">
                Our Staff
            </a>
            <div x-data="{ expanded: false }" class="mt-3">
                <button class="w-full flex items-center justify-between px-2 text-left border-l-2 transition-colors border-transparent hover:text-gray-900" @click="expanded = ! expanded">
                    <span>Job Opportunities</span>
                    <svg :class="{ 'rotate-180': expanded }" class="ml-3 w-4 h-4 transform transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <ul x-show="expanded" class="py-2 text-sm space-y-2" style="display: none;">
                    <li>
                        <a href="#" class="px-4 transition-colors hover:text-gray-900">Full-time positions</a>
                    </li>
                    <li>
                        <a href="#" class="px-4 transition-colors hover:text-gray-900">Part-time positions</a>
                    </li>
                </ul>
            </div>
            <a class="mt-3 px-2 border-l-2 transition-colors border-transparent hover:text-gray-900" href="#">
                Our Community Partners
            </a>
            <!-- Active URL state -->
            <a class="mt-3 px-2 border-l-2 transition-colors text-gray-900 font-bold border-red-600" href="#">
                Awards, Grants, and Recognitions
            </a>
            <a class="mt-3 px-2 border-l-2 transition-colors border-transparent hover:text-gray-900" href="#">
                Donations and Sponsorships
            </a>
            <a class="mt-3 px-2 border-l-2 transition-colors border-transparent hover:text-gray-900" href="#">
                Contact Us
            </a>
        </div>
    </nav>

    {{-- Desktop --}}
    <nav
        aria-label="desktop category navigation"
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
