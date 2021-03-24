
<div
    {{ $attributes->merge(['class' => 'relative']) }}

    x-data="{...select()}"
    x-init='() => {
        init("{{ $name }}", {{ $multiple ? 'true' : 'false' }}, "{{ $placeholder }}", $dispatch)
        setupOptions(@json($options));
        setupFilters(@json($listens));
        setupWatcher();
        @if($initialValue)
        updateValue("{{ $initialValue }}");
        @endif
    }'
    x-on:click.away="close()"
    x-on:keydown.prevent.stop.escape="close()"

    x-on:keydown.arrow-down="navigateDown()"
    x-on:keydown.arrow-up="navigateUp()"
>
    <div class="inline-block relative w-full">
        <div class="w-full">
            <div class="relative w-full">
                <label for="{{ $name }}-input" class="sr-only">
                    {{ $placeholder }}
                </label>
                <input
                    id="{{ $name }}-input"
                    type="text"
                    class="w-full transition-colors border-0 border-b border-gray-400 focus:border-blue-600"
                    x-bind:class="{'border-red-600': isOpen()}"
                    x-ref="searchInput"
                    x-model="searchTerm"
                    x-on:keydown.prevent.stop.enter="open()"
                    x-on:focus.debounce.300="open()"
                    x-bind:placeholder="placeholderText()"
                />

                <span class="absolute inset-y-0 right-0 flex items-center transition mr-3">
                    <button
                        type="button"
                        class="cursor-pointer w-5 h-5 text-gray-600 transition-transform transform duration-200 outline-none focus:outline-none rotate-180"
                        x-on:click="!isOpen() ? open() : close()"
                        x-bind:class="{'transform rotate-180': isOpen()}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                </span>
            </div>
        </div>
        <div class="w-full px-4">
            <div
                x-cloak
                x-show.transition.duration.300ms="isOpen()"
                class="absolute shadow-lg border border-gray-100 bg-white z-40 w-full rounded-t-0 rounded-sm left-0"
            >
                <ul
                    class="flex flex-col w-full overflow-y-auto focus:outline-none focus:ring focus:ring-blue-500"
                    style="max-height: 16rem"
                    :aria-expanded="isOpen() ? 'true' : 'false'"
                    tabindex="0"
                    x-ref="dropdown"
                    x-on:keydown.prevent.stop.enter="updateValueWithFocusedNavIndex"
                >
                    <template
                        x-for="(filteredOption, index) in filteredOptions()"
                        x-bind:key="filteredOption.value"
                    >
                        <li
                            class="cursor-pointer w-full hover:bg-gray-100 hover:text-gray-900 duration-100 transition-colors"
                            x-bind:class="{
                                'bg-gray-200': navIndex === index,
                                'bg-gray-100': isOptionValueSelected(filteredOption.value),
                            }"
                        >
                            <div
                                class="flex w-full items-center py-2 px-3 rounded-bottom-sm relative"
                                x-on:click="updateValue(filteredOption.value)"
                            >
                                <div
                                    class="mx-2 leading-6"
                                    x-text="filteredOption.label"
                                    x-bind:class="{'text-red-500': isOptionValueSelected(filteredOption.value)}"
                                ></div>
                            </div>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </div>
</div>
