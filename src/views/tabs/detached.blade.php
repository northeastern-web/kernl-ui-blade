<div
    x-data="{ ...tabs() }"
    x-init="() => {
        activeTabClass = '{{ $activeTabClass }}'
        inactiveTabClass = '{{ $inactiveTabClass }}'
        init({{ $defaultActive }})
    }"
>
    <ul
        role="tablist"
        class="z-10 flex items-end space-x-12"
        x-ref="tabs"
    >
        <template
            x-for="(tabTitle, index) in tabTitles()"
            x-bind:key="index"
            hidden
        >
            <li role="presentation" class="inline-flex">
                <button
                    class="py-1 border-transparent border-b-2 transition-colors focus:outline-none focus:ring focus:ring-blue-500"
                    role="tab"

                    x-bind:id="`tab-${index}`"
                    x-bind:class="tabClasses(index)"

                    x-bind:aria-selected="isActiveTab(index)"
                    x-bind:tabindex="tabIndex(index)"

                    x-on:keydown.arrow-left="setActiveTab(index - 1); focusActiveTab(index - 1);"
                    x-on:click.prevent="setActiveTab(index)"
                    x-on:keydown.arrow-right="setActiveTab(index + 1); focusActiveTab(index + 1);"

                    x-text="tabTitle"
                ></button>
            </li>
        </template>
    </ul>

    <div x-ref="tabItems">
        {{ $slot }}
    </div>
</div>
