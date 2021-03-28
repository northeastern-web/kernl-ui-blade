
@if ($inPhpMode())
    @include('kernl-ui::paginators.php.base')
@endif

@if ($inJsMode())
    @include('kernl-ui::paginators.js.base')
@endif
