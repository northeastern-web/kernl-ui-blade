<section
    role="tabpanel"
    id="section-{{ $index }}"
    class="py-8"
    aria-labelledby="tab-{{ $index }}"

    x-show="isActiveTab({{ $index }})"
    x-bind:hidden="!isActiveTab({{ $index }})"
>
    {{ $slot }}
</section>
