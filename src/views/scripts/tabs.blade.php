<script>
    const tabs = () => {
        return {
            active: 0,

            activeTabClass: '',

            inactiveTabClass: '',

            init(defaultActive) {
                this.setActiveTab(defaultActive)
            },

            tabTitles() {
                return this.tabItems().map(child => child.dataset.title)
            },

            tabItems() {
                return [].slice.call(this.$refs.tabItems.children)
            },

            focusActiveTab() {
                [].slice.call(this.$refs.tabs.getElementsByTagName('button'))
                    .find(node => node.id === `tab-${this.active}`)
                    ?.focus()
            },

            setActiveTab(index) {
                if (index < 0 || index > this.tabItems().length - 1) {
                    return
                }

                this.active = index;

                this.focusActiveTab()

                this.tabItems().forEach(item => {
                    item.classList.add("hidden");
                })

                this.tabItems()[this.active].classList.remove("hidden");
            },

            isActiveTab(index) {
                return this.active === index
            },

            tabClasses(index) {
                return {
                    [this.activeTabClass]: this.isActiveTab(index),
                    [this.inactiveTabClass]: !this.isActiveTab(index)
                }
            },

            tabIndex(index) {
                return this.isActiveTab(index) ? '' : '-1'
            }
        }
    }
</script>
