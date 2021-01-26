<div class="container py-8 font-sans">
    <div
        x-data="{ ...borderedTabs({{ count($tabs) }}) }"
    >
        <ul role="tablist" class="-mb-px z-10 flex items-end">
            @foreach($tabs as $tab)
            <li role="presentation" class="inline-flex">
                <button
                    id="tab-{{ $loop->index }}"
                    class="px-6 py-3 font-bold border-t border-l border-r border-transparent hover:border-gray-300 focus:outline-none focus:ring focus:ring-blue-500"
                    role="tab"

                    x-ref="tab-{{ $loop->index }}"
                    x-bind:tabindex="tabIndex({{ $loop->index }})"
                    x-bind:class="tabClasses({{ $loop->index }})"
                    x-bind:aria-selected="isActiveTab({{ $loop->index }})"

                    x-on:keydown.arrow-left="setActiveTab({{ $loop->index - 1 }})"
                    x-on:click.prevent="setActiveTab({{ $loop->index }})"
                    x-on:keydown.arrow-right="setActiveTab({{ $loop->index + 1 }})"
                >
                    Section 1
                </button>
            </li>
            @endforeach
        </ul>

        <div class="border border-gray-300">
            {{ $slot }}
        </div>

    </div>
</div>
