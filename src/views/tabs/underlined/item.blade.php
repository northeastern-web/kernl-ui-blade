<section
    tabindex="0"
    role="tabpanel"
    data-title="{{ $title }}"
    {{ $attributes->merge(['class' => 'py-6']) }}
    x-cloak
>
    {{ $slot }}
</section>
