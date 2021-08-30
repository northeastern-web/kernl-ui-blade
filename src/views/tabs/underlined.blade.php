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
        class="z-10 flex items-end -mb-px border-b border-gray-300"
        x-ref="tabs"
    >
        <template
            x-for="(tabTitle, index) in tabTitles()"
            x-bind:key="index"
        >
            <li role="presentation" class="inline-flex">
                <button
                    class="px-6 py-3 font-bold border-transparent border-b-3 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-blue-500"
                    role="tab"

                    x-bind:id="`tab-${index}`"
                    x-bind:class="tabClasses(index)"

                    x-bind:aria-selected="isActiveTab(index)"
                    x-bind:tabindex="tabIndex(index)"

                    x-on:keydown.arrow-left="setActiveTab(index - 1)"
                    x-on:click.prevent="setActiveTab(index)"
                    x-on:keydown.arrow-right="setActiveTab(index + 1)"

                    x-text="tabTitle"
                ></button>
            </li>
        </template>
    </ul>

    <div x-ref="tabItems">
        {{ $slot }}
    </div>
</div>
