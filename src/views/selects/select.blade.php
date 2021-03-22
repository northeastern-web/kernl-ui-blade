
<div>
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        x-data="{...{{$name}}Select()}"
        x-model="value"
        x-init='() => {
            init("{{ $name }}", $dispatch)
            setupOptions(@json($options));
            setupFilters(@json($listens));
            setupWatcher();
            @if($initialValue !== null)
            updateValue("{{ $initialValue }}");
            @endif
        }'
        {{ $attributes }}
    >
        <option x-bind:value="null">Select option</option>
        <template x-for="option in filteredOptions()">
            <option x-bind:value="option.value" x-text="option.label"></option>
        </template>
    </select>
</div>

<script>
    const {{$name}}Select = () => ({
        dispatch: null,
        name: null,
        options: [],
        filters: {},
        value: null,

        init(name, dispatch) {
            this.name = name
            this.dispatch = dispatch
        },

        setupOptions(options) {
            this.options = options
        },

        setupFilters(listens) {
            Object.keys(listens).forEach(eventName => {
                const key = listens[eventName].filter
                this.filters[key] = null
                document.addEventListener(eventName, e => {
                    this.updateValue(null)
                    this.filters[key] = e.detail.value
                })
            })
        },

        updateValue(value) {
            setTimeout(() => this.value = value, 0)
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
                            const filterValues = (
                                this.filters[filterKey] instanceof Array
                                    ? this.filters[filterKey]
                                    : [this.filters[filterKey]]
                            ).filter(filterValue => filterValue !== null)

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
        }
    })
</script>
