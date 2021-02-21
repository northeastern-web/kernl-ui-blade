<script>
    const tabs = (tabsCount, activeTabClass, inactiveTabClass) => {
        return {
            active: 0,

            tabsCount: tabsCount,

            setActiveTab(index) {
                if (index < 0 || index > this.tabsCount - 1) {
                    return
                }

                this.active = index;

                this.$refs['tab-' + index].focus();
            },

            isActiveTab(index) {
                return this.active === index
            },

            tabClasses(index) {
                return {
                    [activeTabClass]: this.isActiveTab(index),
                    [inactiveTabClass]: !this.isActiveTab(index)
                }
            },

            tabIndex(index) {
                return this.isActiveTab(index) ? '' : '-1'
            }
        }
    }
</script>

<script>
    const awesomeTabs = () => {
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
                return [].slice.call(this.$refs.tabs.children)
            },

            setActiveTab(index) {
                if (index < 0 || index > this.tabItems().length - 1) {
                    return
                }

                this.active = index;

                document.getElementById(`tab-${index}`).focus()

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
