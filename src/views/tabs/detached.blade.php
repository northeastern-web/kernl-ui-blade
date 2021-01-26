<div class="container py-8 font-sans">
    <div
        x-data="{ ...tabs({{ count($tabs) }}, '{{ $activeTabClass }}', '{{ $inactiveTabClass }}') }"
    >
        <ul role="tablist" class="z-10 flex items-end space-x-12">
            @foreach($tabs as $tab)
                <li role="presentation" class="inline-flex">
                    <button
                        id="tab-{{ $loop->index }}"
                        class="py-1 border-transparent border-b-2 transition-colors focus:outline-none focus:ring focus:ring-blue-500"
                        role="tab"

                        x-ref="tab-{{ $loop->index }}"
                        x-bind:tabindex="tabIndex({{ $loop->index }})"
                        x-bind:class="tabClasses({{ $loop->index }})"
                        x-bind:aria-selected="isActiveTab({{ $loop->index }})"

                        x-on:keydown.arrow-left="setActiveTab({{ $loop->index - 1 }})"
                        x-on:click.prevent="setActiveTab({{ $loop->index }})"
                        x-on:keydown.arrow-right="setActiveTab({{ $loop->index + 1 }})"
                    >
                        {{ $tab }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div>
            {{ $slot }}
        </div>

    </div>
</div>
