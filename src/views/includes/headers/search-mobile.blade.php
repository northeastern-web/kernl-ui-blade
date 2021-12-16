@if($action)
    <li class="block pb-4">
        <form
            action="{{ $action ? $action : '/' }}"
            method="GET"
            class="relative"
        >
            <svg
                @if($dark)
                    class="absolute top-3.5 left-0 w-4 h-4 text-gray-50 pointer-events-none"
                @else
                    class="absolute top-3.5 left-0 w-4 h-4 text-gray-700 pointer-events-none"
                @endif
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input
                name="{{$searchName ? $searchName : 'search'}}"
                type="text"
                @if($dark)
                    class="block w-full h-full py-3 pl-6 pr-1 bg-transparent border-0 border-b placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-blue-700"
                @else
                    class="block w-full h-full py-3 pl-6 pr-1 bg-transparent border-0 border-b border-gray-500 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-blue-700"
                @endif
                placeholder="Search"
            >
            <button
                @if($dark)
                    class="btn-sm py-0 px-3 absolute inset-y-0 right-0 my-1 text-gray-50 border-gray-400 md:my-3 focus:outline-none focus:ring focus:ring-blue-500"
                @else
                    class="btn-sm py-0 px-3 absolute inset-y-0 right-0 my-1 text-gray-600 border-gray-500 md:my-3 focus:outline-none focus:ring focus:ring-blue-500"
                @endif
            >
                GO
            </button>
        </form>
    </li>
@endif
