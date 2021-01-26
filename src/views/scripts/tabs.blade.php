<script>
    const underlinedTabs = (tabsCount) => {
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
                    'border-red-600 text-gray-800': this.isActiveTab(index),
                    'text-gray-600': !this.isActiveTab(index)
                }
            },

            tabIndex(index) {
                return this.isActiveTab(index) ? '' : '-1'
            }
        }
    }
</script>

<script>
    const detachedTabs = (tabsCount) => {
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
                    'border-gray-900 text-gray-900': this.isActiveTab(index),
                    'text-gray-600 hover:border-gray-600': !this.isActiveTab(index)
                }
            },

            tabIndex(index) {
                return this.isActiveTab(index) ? '' : '-1'
            }
        }
    }
</script>

<script>
    const borderedTabs = (tabsCount) => {
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
                    'text-gray-800 bg-white border-gray-300': this.isActiveTab(index),
                    'text-gray-600 bg-transparent': !this.isActiveTab(index)
                }
            },

            tabIndex(index) {
                return this.isActiveTab(index) ? '' : '-1'
            }
        }
    }
</script>
