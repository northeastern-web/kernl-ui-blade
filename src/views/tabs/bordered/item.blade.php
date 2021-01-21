<section
    role="tabpanel"
    id="section-{{ $index }}"
    class="px-4 py-6"
    aria-labelledby="tab-{{ $index }}"

    x-show="isActiveTab({{ $index }})"
    x-bind:hidden="!isActiveTab({{ $index }})"
>
    {{ $slot }}
</section>
