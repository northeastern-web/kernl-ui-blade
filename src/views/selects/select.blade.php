
<div
    {{ $attributes->merge(['class' => 'relative p-4']) }}

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
        <div class="w-full flex flex-wrap items-start">
            <div class="relative w-full mb-2 sm:mb-0">
                <label for="{{ $name }}-input" class="sr-only">
                    {{ $placeholder }}
                </label>
                <input
                    id="{{ $name }}-input"
                    type="text"
                    class="w-full h-full px-3 py-2 transition-colors border-0 border-b-2 outline-none focus:outline-none"
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
                class="absolute shadow-lg border-1 border-gray-100 top-100 bg-white z-40 w-full rounded-t-0 rounded-sm left-0 max-h-select"
            >
                <ul
                    class="flex flex-col w-full overflow-y-auto h-64 outline-none focus:ring focus:ring-blue-500"
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
                            class="cursor-pointer px-3 w-full hover:bg-gray-100 hover:text-gray-900 duration-100 transition-colors"
                            x-bind:class="{'bg-gray-200': navIndex === index}"
                        >
                            <div
                                class="flex w-full items-center p-2 px-3 rounded-bottom-sm relative"
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

<script>
    let select = () => ({
        dispatch: null,

        name: null,
        multiple: false,
        options: [],
        filters: {},
        value: null,
        placeholder: null,

        isDropdownOpen: false,
        searchTerm: '',

        navIndex: -1,

        init(name, multiple, placeholder, dispatch) {
            this.name = name
            this.multiple = multiple
            this.placeholder = placeholder
            this.dispatch = dispatch
            this.initValue()
            this.resetNavigation()
        },

        setupOptions(options) {
            this.options = options
        },

        setupFilters(listens) {
            Object.keys(listens).forEach(eventName => {
                const key = listens[eventName].filter
                this.filters[key] = null
                document.addEventListener(eventName, e => {
                    this.initValue()
                    this.filters[key] = e.detail.value
                })
            })
        },

        initValue() {
            this.value = this.multiple ? [] : null
        },

        updateValue(value) {
            setTimeout(() => {
                if (this.multiple) {
                    if (this.isOptionValueSelected(value)) {
                        this.value = [
                            ...this.value.filter(item => item !== value)
                        ]
                        return
                    }

                    this.value = [...this.value, value]
                    return
                }

                this.value = !this.isOptionValueSelected(value)
                    ? value
                    : null
            }, 0)

            if (this.multiple) {
                return
            }

            this.close()
        },

        updateValueWithFocusedNavIndex() {
            const option = this.filteredOptions()[this.navIndex]
            if (!option) {
                return
            }

            this.updateValue(option.value)
        },

        setupWatcher() {
            this.$watch('value', () => {
                this.emitValueChangedEvent()
            })
        },

        emitValueChangedEvent() {
            setTimeout(() => this.dispatch(this.eventName(), {value: this.value}, 0))
        },

        eventName() {
            return `${this.name}-changed`
        },

        filteredOptions() {
            return this.options
                .filter(option => {
                    const filterKeys = Object.keys(this.filters)

                    if(filterKeys.length === 0) {
                        return true
                    }

                    return filterKeys
                        .filter(filterKey => {
                            const filterValues = this.filters[filterKey] instanceof Array
                                ? this.filters[filterKey]
                                : [this.filters[filterKey]]

                            const optionValues = option[filterKey] instanceof Array
                                ? option[filterKey]
                                : [option[filterKey]]

                            if (filterValues.length === 0) {
                                return true
                            }

                            return optionValues.filter(option => filterValues.includes(option)).length > 0
                        })
                        .length === filterKeys.length
                })
                .filter(option => {
                    if (!this.searchTerm || this.searchTerm.length === 0) {
                        return true
                    }

                    return option.label.toLowerCase().includes(this.searchTerm.toLowerCase())
                })
        },

        isOptionValueSelected(value) {
            return this.multiple
                ? this.value.includes(value)
                : this.value === value
        },

        isValueFilled() {
            return this.multiple
                ? this.value.length > 0
                : this.value !== null
        },

        placeholderText() {
            if (!this.isValueFilled()) {
                return this.placeholder
            }

            return this.options
                .filter(option => this.isOptionValueSelected(option.value))
                .map(option => option.label)
                .join(', ')
        },

        clearSearchTerm() {
            this.searchTerm = ''
        },

        isOpen() {
            return this.isDropdownOpen
        },

        open() {
            this.isDropdownOpen = true
        },

        close() {
            this.isDropdownOpen = false
            this.clearSearchTerm()
            this.resetNavigation()
        },

        resetNavigation() {
            this.navIndex = -1;
        },

        navigateDown() {
            if (this.navIndex + 1 >= this.filteredOptions().length) {
                return
            }

            this.navIndex += 1

            if (this.navIndex > -1) {
                this.$refs.dropdown.focus()
            }
        },

        navigateUp() {
            if (this.navIndex === -1) {
                return
            }

            this.navIndex -= 1

            if (this.navIndex === -1) {
                this.$refs.searchInput.focus()
            }
        }
    })
</script>
