<div
    x-init="init"
    x-data="{
        active: 0,
        numberOfSlides: 0,
        delay: 5000,
        timer: null,
        dragActive: false,
        initialX: null,
        currentX: null,
        init: function () {
            this.numberOfSlides = this.$refs.slideContainer.children.length;

            this.resetTimer();
        },
        startTimer: function () {
            var $this = this;

            this.timer = setInterval(function () { $this.next(false) }, this.delay);
        },
        stopTimer: function () {
            clearInterval(this.timer);
        },
        resetTimer: function () {
            this.stopTimer();

            this.startTimer();
        },
        next: function (resetTimer) {
            if (resetTimer || true) {
                this.resetTimer();
            }

            if (this.active === this.numberOfSlides - 1) {
                return this.active = 0;
            }

            this.active++;
        },
        previous: function (resetTimer) {
            if (resetTimer || true) {
                this.resetTimer();
            }

            if (this.active === 0) {
                return this.active = this.numberOfSlides - 1;
            }

            this.active--;
        },
        goTo: function (index) {
            this.resetTimer();

            this.active = index;
        },
        dragStart: function (e) {
            this.dragActive = true;

            if (e.type === 'touchstart') {
                return this.initialX = e.touches[0].clientX
            }

            this.initialX = e.clientX;
        },
        drag: function (e) {
            if (this.dragActive) {
                e.preventDefault();

                if (e.type === 'touchmove') {
                    this.currentX = e.touches[0].clientX;
                } else {
                    this.currentX = e.clientX;
                }
            }
        },
        dragEnd: function (e) {
            this.dragActive = false;

            if (this.initialX > this.currentX && this.initialX - 200 > this.currentX) {
                return this.next(false);
            }

            if (this.initialX < this.currentX && this.initialX + 200 < this.currentX) {
                return this.previous(false);
            }
        }
    }"
>
    <div
        class="relative overflow-hidden cursor-pointer {{ $heightClasses }}"
    >
        <div
            x-ref="slideContainer"
            class="absolute inset-0"
            @touchstart="dragStart"
            @touchmove="drag"
            @touchend="dragEnd"
            @mousedown="dragStart"
            @mousemove="drag"
            @mouseup="dragEnd"
            @mouseenter="stopTimer"
            @mouseleave="resetTimer"
        >
            {{ $slot }}
        </div>
        <div class="absolute left-0 bottom-0 flex justify-center p-8 z-10 md:px-16">
            <div class="-mx-1 flex items-center justify-center">
                <template x-for="slide in Array.from({ length: numberOfSlides }, function (x, i) { return i; })" :key="slide">
                    <div class="p-1">
                        <button
                            :aria-label="'Go to slide ' + slide"
                            :title="'Go to slide ' + (slide + 1)"
                            type="button"
                            :class="{ 'bg-white': active == slide }"
                            class="h-4 w-4 border border-white rounded-full transition-colors duration-200 focus:outline-none focus:ring focus:ring-blue-400"
                            @click="goTo(slide)"
                        ></button>
                    </div>
                </template>
            </div>
        </div>
        <div class="absolute bottom-0 right-0 flex z-10">
            <button
                type="button"
                aria-label="Previous slide"
                title="Previous slide"
                class="relative inline-flex p-2 text-gray-700 bg-gray-200 border md:p-4 hover:bg-white focus:outline-none focus:ring focus:ring-blue-400"
                @click="previous"
            >
                <svg class="w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button
                type="button"
                aria-label="Next slide"
                title="Next slide"
                class="relative inline-flex p-2 text-gray-700 bg-gray-200 border md:p-4 hover:bg-white focus:outline-none focus:ring focus:ring-blue-400"
                @click="next"
            >
                <svg class="w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>
    </div>
</div>
