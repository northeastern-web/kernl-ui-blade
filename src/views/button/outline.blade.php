@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn ' . $sizeClasses . ' ' . $colorClasses]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'btn ' . $sizeClasses . ' ' . $colorClasses]) }}>
        {{ $slot }}
    </button>
@endif
