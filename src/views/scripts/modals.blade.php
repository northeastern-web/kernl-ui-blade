
<script>
    window.NUModals = {
        open(modalId) {
            window.dispatchEvent(new CustomEvent(`open-modal-${modalId.toLowerCase()}`))
        },

        close(modalId) {
            window.dispatchEvent(new CustomEvent(`close-modal-${modalId.toLowerCase()}`))
        },
    }
</script>

<script>
    const modal = () => {
        return {
            open: false,

            previouslyFocusedElement: null,
            firstFocusableElement: null,
            lastFocusableEl: null,
            removedTabIndexFromFirstFocusableElement: false,

            toggle() {
                this.open = !this.open;

                if (this.open) {
                    document.body.classList.add('overflow-hidden');
                    this.focusDialog();
                    return
                }

                document.body.classList.remove('overflow-hidden');

                this.previouslyFocusedElement.focus();

                if (this.removedTabIndexFromFirstFocusableElement) {
                    this.firstFocusableElement.setAttribute('tabindex', 0);
                }
            },

            handleOpen() {
                if (this.open) return
                this.toggle()
            },

            handleClose() {
                if (!this.open) return
                this.toggle()
            },

            focusDialog() {
                this.previouslyFocusedElement = document.activeElement;

                setTimeout(() => {
                    const focusableElements = this.$refs.dialog.querySelectorAll('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex=\'0\']');

                    if (focusableElements.length === 0) {
                        return
                    }

                    this.firstFocusableElement = focusableElements[0];
                    this.lastFocusableElement = focusableElements[focusableElements.length - 1];

                    this.firstFocusableElement.focus();

                    if (this.firstFocusableElement.tabIndex == 0) {
                        this.firstFocusableElement.removeAttribute('tabindex');
                        this.removedTabIndexFromFirstFocusableElement = true;
                    } else {
                        this.removedTabIndexFromFirstFocusableElement = false;
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
                this.handleClose()
            },
        }
    }
</script>
