<script>
    const localHeaderNav = () => {
        return {
            navIsOpen: false,
            activeSection: null,
            focusableElements: [],

            init() {
                this.focusableElements = Array.from(this.$refs.desktopNav.querySelectorAll('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex=\'0\']'));
            },

            isSectionActive(section) {
                return this.activeSection === section
            },

            setActiveSection(section) {
                this.activeSection = section
            },

            sectionClasses(section) {
                return {
                    'flex': this.isSectionActive(section), 
                    'hidden': !this.isSectionActive(section),    
                }
            },

            toggle(section) {
                if (this.activeSection === section) {
                    return this.activeSection = null;
                }

                this.activeSection = section;
            },

            focusPreviousLink(event) {
                const index = this.focusableElements.indexOf(event.target);

                this.focusableElements[index - 1].focus();
            },

            focusNextLink(event, section) {
                if (section === undefined) {
                    section = null;
                }

                if (section && this.activeSection !== section) {
                    return this.activeSection = section;
                }

                const index = this.focusableElements.indexOf(event.target);

                this.focusableElements[index + 1].focus();
            }
        }
    }
</script>