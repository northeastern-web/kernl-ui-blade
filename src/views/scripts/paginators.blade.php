<script>
    const basePaginator = () => ({
        pages: [],
        numberOfPages: 0,
        currentPage: 1,
        emits: 'pageChanged',
        dispatch: null,

        init() {
            this.pages = [...Array(this.numberOfPages).keys()].map(page => page + 1)
        },

        isCurrentPage(page) {
            return page === this.currentPage
        },

        handlePageClick(page) {
            if (page < 1) {
                return
            }

            if (page > this.numberOfPages) {
                return
            }

            this.currentPage = page
            this.dispatch(this.emits, {page})
        },

        pageClasses(page) {
            return []
                .concat(this.isCurrentPage(page) ? [
                    'inline-flex',
                    'items-center',
                    'justify-center',
                    'w-6',
                    'h-6',
                    'text-sm',
                    'leading-none',
                    'text-white',
                    'bg-gray-900',
                    'rounded-full',
                    'focus:outline-none',
                    'focus:ring',
                    'focus:ring-blue-500',
                ] : [])
                .concat(!this.isCurrentPage(page) ? [
                    'inline-flex',
                    'items-center',
                    'justify-center',
                    'w-6',
                    'h-6',
                    'text-sm',
                    'leading-none',
                    'rounded-full',
                    'focus:outline-none',
                    'focus:ring',
                    'focus:ring-blue-500',
                ] : [])
                .join(' ')
        },

        navigationArrowClasses(page) {
            return []
                .concat([
                    'inline-flex',
                    'items-center',
                    'justify-center',
                    'w-6',
                    'h-6',
                    'text-sm',
                    'leading-none',
                    'rounded-full',
                    'focus:outline-none',
                    'focus:ring',
                    'focus:ring-blue-500',
                ])
                .concat(1 > page || page > this.numberOfPages ? [
                    'text-gray-300',
                ] : [])
                .concat(1 < page && page < this.currentPage ? [
                    'text-gray-700',
                ] : [])
                .join(' ')
        },
    })
</script>
