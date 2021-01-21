<div
    x-init="init()"
    x-data="{
        show: false,
        alertName: `{{ $label }}`,
        init() {
            @if ($remember)
                if (localStorage && ! localStorage.getItem('hide-' + this.alertName)) {
                    this.show = true;
                }
            @else
                this.show = true;
            @endif
        },
        close() {
            this.show = false;

            @if ($remember)
                if (localStorage) {
                    localStorage.setItem('hide-' + this.alertName, true)
                }
            @endif
        }
    }"
    x-show="show"
    x-transition:enter="transition duration-300"
    x-transition:leave="transition duration-300"
    {{ $attributes }}
>
    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-end="transform opacity-0"
        role="alert"
        class="bg-yellow-400"
    >
        <div class="flex items-center justify-between px-4 py-4 text-black lg:px-16">
            <div>
                {{ $slot }}
            </div>
            @if ($closeable)
                <button aria-label="close alert" class="ml-4 p-1 rounded-full transition-colors duration-200 hover:text-gray-800 focus:outline-none focus:ring focus:ring-blue-400" @click="close">
                    <i data-feather="x-circle" class="w-5 h-5"></i>
                </button>
            @endif
        </div>
    </div>
</div>
