<div
    {{ $attributes->whereStartsWith('x-show') }}
    class="absolute inset-0 flex items-center justify-center transform"
    x-transition:enter="transition ease-in-out duration-300"
    x-transition:enter-start="transform opacity-0"
    x-transition:leave="transition ease-in-out duration-300"
    x-transition:leave-end="transform opacity-0"
>
    <!-- Semi-transparent overlay -->
    <div class="absolute inset-0 bg-white bg-opacity-40"></div>
    <!-- Loading spinner -->
    <i data-feather="loader" aria-label="Loading" class="w-6 h-6 animate-spin text-gray-600"></i>
</div>
