@if($action)
    <li
        x-data="{ ...searchModal() }"
        x-on:keydown.window.tab="handleForwardTab"
        x-on:keydown.window.shift.tab="handleBackwardTab"
        x-on:keydown.window.escape="handleEscape"
    >
        <button
            class="
                p-2 text-sm transition-colors focus:outline-none focus:ring focus:ring-blue-500
                @if($dark)
                    text-gray-50 hover:bg-gray-700 py-4
                @else
                    text-gray-600 hover:text-gray-900
                @endif
            "
            x-on:click="toggle"
        >
            <svg class="w-4 h-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
        <div
            role="dialog"
            aria-labelledby="dialog-title"
            x-ref="dialog"
            x-show="open"
            class="h-screen w-full fixed bottom-0 inset-x-0 z-50 sm:inset-0 sm:flex"
            x-cloak
        >
            <div
                x-show.transition.opacity.duration.300ms="open"
                tabindex="-1"
            >
                <div class="absolute inset-0 bg-black bg-opacity-80"></div>
            </div>
            <div
                x-show="open"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="relative w-full h-full flex items-center justify-center p-4 transition-all"
            >
                <div
                    style="max-height: 85vh"
                    class="max-w-3xl w-full"
                    x-on:click.away="toggle"
                >
                    <form
                        action="{{ $action }}"
                        method="GET"
                        class="relative"
                    >
                        <input
                            name="search"
                            type="text"
                            class="block w-full h-full py-3 px-1 text-white text-xl bg-transparent border-0 border-b border-white placeholder-gray-200 md:text-2xl focus:ring-0 focus:border-blue-700"
                            placeholder="Search"
                        >
                        <button
                            type="submit"
                            class="btn-sm py-0 px-3 absolute inset-y-0 right-0 my-1 text-white border-white md:my-3 hover:text-gray-800 hover:bg-white focus:outline-none focus:ring focus:ring-blue-500"
                        >
                            GO
                        </button>
                    </form>
                </div>
            </div>
            <button
                aria-label="Close dialog"
                title="Close dialog"
                type="button"
                class="hidden absolute top-0 right-0 m-4 text-gray-200 sm:inline-block hover:text-gray-300 focus:outline-none focus:ring"
                x-on:click.stop="toggle"
            >
                <svg class="w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
    </li>

    <script>
        let searchModal = () => {
            return {
                open: false,

                toggle() {
                    this.open = !this.open;

                    if (this.open) {
                        document.body.classList.add('overflow-hidden');

                        this.focusDialog();
                    } else {
                        document.body.classList.remove('overflow-hidden');

                        this.previouslyFocusedElement.focus();

                        if (this.removedTabIndexFromFirstFocusableElement) {
                            this.firstFocusableElement.setAttribute('tabindex', 0);
                        }
                    }
                },

                focusDialog() {
                    this.previouslyFocusedElement = document.activeElement;

                    setTimeout(() => {
                        const focusableElements = this.$refs.dialog.querySelectorAll('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex=\'0\']');

                        if (focusableElements.length) {
                            this.firstFocusableElement = focusableElements[0];
                            this.lastFocusableElement = focusableElements[focusableElements.length - 1];

                            this.firstFocusableElement.focus();

                            if (this.firstFocusableElement.tabIndex == 0) {
                                this.firstFocusableElement.removeAttribute('tabindex');
                                this.removedTabIndexFromFirstFocusableElement = true;
                            } else {
                                this.removedTabIndexFromFirstFocusableElement = false;
                            }
                        }
                    }, 200);
                },

                handleBackwardTab(e) {
                    if (! this.open) {
                        return;
                    }

                    if (document.activeElement === this.firstFocusableElement) {
                        e.preventDefault();
                    }
                },

                handleForwardTab(e) {
                    if (! this.open) {
                        return;
                    }

                    if (document.activeElement === this.lastFocusableElement) {
                        e.preventDefault();
                        this.firstFocusableElement.focus();
                    }
                },

                handleEscape() {
                    if (this.open) {
                        this.toggle();
                    }
                },

                previouslyFocusedElement: null,
                firstFocusableElement: null,
                lastFocusableEl: null,
                removedTabIndexFromFirstFocusableElement: false,
            }
        }
    </script>
@endif
