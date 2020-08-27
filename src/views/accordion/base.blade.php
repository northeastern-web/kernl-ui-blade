<ul
    x-data="{
        active: '{{ $defaultSection }}',
        setActive: function (section) {
            if (this.active === section) {
                this.active = null;
            } else {
                this.active = section;
            }
        }
    }"
    class="space-y-4"
    aria-label="{{ $label }}"
    x-cloak
>
    {!! $slot !!}
</ul>
