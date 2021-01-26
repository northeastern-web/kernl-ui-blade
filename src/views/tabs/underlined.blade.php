<div class="container py-8 font-sans">
    <div
        x-data="{ ...underlinedTabs({{ count($tabs) }}) }"
    >
        <ul
            role="tablist"
            class="z-10 flex items-end -mb-px border-b border-gray-300"
        >
            @foreach($tabs as $tab)
                <li role="presentation" class="inline-flex">
                    <button
                        id="tab-{{ $loop->index }}"
                        class="px-6 py-3 font-bold border-transparent border-b-3 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-blue-500"
                        role="tab"

                        x-ref="tab-{{ $loop->index }}"
                        x-bind:tabindex="tabIndex({{ $loop->index }})"
                        x-bind:class="tabClasses({{ $loop->index }})"

                        x-bind:aria-selected="isActiveTab({{ $loop->index }})"

                        x-on:click.prevent="setActiveTab({{ $loop->index }})"
                        x-on:keydown.arrow-left="setActiveTab({{ $loop->index - 1 }})"
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
