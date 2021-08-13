<section
    tabindex="0"
    role="tabpanel"
    data-title="{{ $title }}"
    {{ $attributes->merge(['class' => 'px-4 py-6 bg-white']) }}
    x-cloak
>
    {{ $slot }}
</section>
