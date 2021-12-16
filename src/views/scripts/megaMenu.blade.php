<script>
    const megaMenu = ($el, windowSize) => {
        let menuPosition = $el.getBoundingClientRect().right;
        let edgeDistance = windowSize - menuPosition;
        let positionClass = "";
        let translateClass = "";
        if (edgeDistance > 600) {
            positionClass = "right-full";
            translateClass = "translate-x-full";
        } else {
            positionClass = "left-full";
            translateClass = "-translate-x-full";
        }
        $el.lastElementChild.lastElementChild.classList.add(positionClass);
        $el.lastElementChild.lastElementChild.classList.add(translateClass);
    }
</script>