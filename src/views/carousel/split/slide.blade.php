<div
    :class="{ '-translate-x-full': active > {{ $index }}, 'translate-x-full': active < {{ $index }} }"
    {{ $attributes->merge(['class' => 'absolute inset-0 transform translate-x-full flex flex-wrap text-white bg-gray-900 transition-transform duration-200 pointer-events-none']) }}
>
    {{ $slot }}
</div>
