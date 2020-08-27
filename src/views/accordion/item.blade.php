@props([ 'id' => \Illuminate\Support\Str::random(8), 'title' ])

<li class="border">
    <h3>
        <button
            aria-controls="{{ $id }}"
            :aria-expanded="active == '{{ $id }}' ? 'true' : 'false'"
            :class="{ 'bg-gray-200': active == '{{ $id }}' }"
            class="w-full flex items-center justify-between py-3 px-10 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:shadow-outline"
            @click="setActive('{{ $id }}')"
        >
            <span class="font-bold text-left">{!! $title !!}</span>
            <span aria-hidden="true" x-show="active === '{{ $id }}'" class="ml-2">
                <i data-feather="minus" class="w-4 h-4"></i>
            </span>
            <span aria-hidden="true" x-show="active !== '{{ $id }}'" class="ml-2">
                <i data-feather="plus" class="w-4 h-4"></i>
            </span>
        </button>
    </h3>
    <div
        id="{{ $id }}"
        :aria-hidden="active !== '{{ $id }}'"
        x-show="active == '{{ $id }}'"
        x-transition:enter="transition-all duration-200"
        x-transition:enter-start="opacity-0 max-h-0 overflow-hidden"
        x-transition:enter-end="opacity-100 max-h-screen"
        x-transition:leave="transition-all duration-100"
        x-transition:leave-start="opacity-100 max-h-screen"
        x-transition:leave-end="opacity-0 max-h-0 overflow-hidden"
        class="h-full overflow-y-auto"
        tabindex="0"
    >
        <div class="px-10 py-8">
            {!! $slot !!}
        </div>
    </div>
</li>
