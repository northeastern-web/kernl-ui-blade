<div>
    <div
        x-init="init"
        x-data="{
            active: 0,
            numberOfSlides: 0,
            delay: {{ $delay }},
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
            class="relative h-96 overflow-hidden cursor-pointer lg:h-128"
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
            <div class="absolute inset-y-0 left-0 flex items-center px-1 z-10 md:px-2">
                <button
                    type="button"
                    aria-label="Previous slide"
                    title="Previous slide"
                    class="inline-flex p-1 text-white bg-black bg-opacity-60 rounded md:p-2 focus:outline-none focus:ring focus:ring-blue-400"
                    @click="previous"
                >
                    <svg class="w-4 h-4 md:w-6 md:h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center px-1 z-10 md:px-2">
                <button
                    type="button"
                    aria-label="Next slide"
                    title="Next slide"
                    class="inline-flex p-1 text-white bg-black bg-opacity-60 rounded md:p-2 focus:outline-none focus:ring focus:ring-blue-400"
                    @click="next"
                >
                    <svg class="w-4 h-4 md:w-6 md:h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
            <div class="absolute inset-x-0 bottom-0 flex justify-center z-10">
                <div class="-mx-1 flex items-center justify-center">
                    <template x-for="slide in Array.from({ length: numberOfSlides }, function (x, i) { return i; })" :key="slide">
                        <div class="p-1">
                            <button
                                :aria-label="'Go to slide ' + slide"
                                :title="'Go to slide ' + (slide + 1)"
                                type="button"
                                :class="{ 'opacity-50': active !== slide }"
                                class="h-3 w-3 bg-white rounded-full transition-opacity duration-200 focus:outline-none focus:ring focus:ring-blue-400"
                                @click="goTo(slide)"
                            ></button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
