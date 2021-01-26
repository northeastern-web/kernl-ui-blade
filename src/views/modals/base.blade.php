<div
    x-data="{ ...modal() }"
    x-on:keydown.window.tab="handleForwardTab"
    x-on:keydown.window.shift.tab="handleBackwardTab"

    @if($closeOnEscapeKey)
    x-on:keydown.window.escape="handleEscape"
    @endif

    x-on:open-modal-{{ strtolower($id) }}.window="handleOpen"
    x-on:close-modal-{{ strtolower($id) }}.window="handleClose"

    x-cloak
>
    <div
        role="dialog"
        aria-labelledby="dialog-title"
        x-ref="dialog"
        x-show="open"
        class="h-screen w-full fixed bottom-0 inset-x-0 z-50 sm:inset-0 sm:flex"
    >
        <div
            x-show.transition.opacity.duration.300ms="open"
            tabindex="-1"
        >
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
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
                class="max-w-3xl w-full bg-white rounded-sm p-4 shadow-xl overflow-y-auto transition-all sm:p-8"
                @if($closeOnClickOutside)
                x-on:click.away="handleClose"
                @endif
            >
                {{ $slot }}
            </div>
        </div>

        @if($closeable)
            <button
                aria-label="Close dialog"
                title="Close dialog"
                type="button"
                class="hidden absolute top-0 right-0 m-4 text-gray-200 sm:inline-block hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-500"
                x-on:click.stop="handleClose"
            >
                <svg class="w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        @endif
    </div>

</div>
