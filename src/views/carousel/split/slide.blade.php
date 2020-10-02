<div
    :class="{ '-translate-x-full': active > {{ $index }}, 'translate-x-full': active < {{ $index }} }"
    class="absolute inset-0 translate-x-full w-full h-full flex items-end transition-transform duration-200 pointer-events-none {{ $backgroundClasses }}"
    {{ $attributes }}
>
    <div class="relative h-64 w-full flex items-center p-8 bg-black-semi-9 sm:h-full sm:max-w-sm md:px-16 lg:max-w-lg xl:max-w-2xl {{ $slotClasses }}">
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
