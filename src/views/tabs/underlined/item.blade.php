<section
    role="tabpanel"
    id="section-{{ $index }}"
    class="py-6"
    aria-labelledby="tab-{{ $index }}"

    x-show="isActiveTab({{ $index }})"
    x-bind:hidden="!isActiveTab({{ $index }})"
>
    {{ $slot }}
</section>
