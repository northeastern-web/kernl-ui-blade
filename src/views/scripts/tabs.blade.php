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
