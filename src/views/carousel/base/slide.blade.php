<div
    :class="{ '-translate-x-full': active > {{ $index }}, 'translate-x-full': active < {{ $index }} }"
    class="z-10 absolute inset-0 transform flex items-center justify-center w-full h-full transition-transform duration-200 pointer-events-none {{ $backgroundClasses }}"
    {{ $attributes }}
>
    <div class="max-w-4xl w-full p-8 md:px-16 {{ $slotClasses }}">
        {{ $slot }}
    </div>
</div>
