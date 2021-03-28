<div
    class="font-sans"
    x-data="{...basePaginator()}"
    x-init="
        numberOfPages = {{ $numberOfPages }}
        currentPage = {{ $currentPage }}
        emits = '{{ $emits }}'
        dispatch = $dispatch
        init()
    "
>
    <div class="flex items-center justify-center space-x-2">
        <button
            x-on:click.stop.prevent="handlePageClick(currentPage - 1)"
            x-bind:class="navigationArrowClasses(currentPage - 1)"
        >
            <i data-feather="chevron-left" class="w-4 h-4"></i>
        </button>

        <template x-for="page in pages">
            <button
                type="button"
                x-bind:class="pageClasses(page)"
                x-text="page"
                x-on:click.stop.prevent="handlePageClick(page)"
            ></button>
        </template>

        <button
            x-on:click.stop.prevent="handlePageClick(currentPage + 1)"
            x-bind:class="navigationArrowClasses(currentPage + 1)"
        >
            <i data-feather="chevron-right" class="w-4 h-4"></i>
        </button>
    </div>
</div>
