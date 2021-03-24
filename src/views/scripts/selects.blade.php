<script>
    const select = () => ({
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
