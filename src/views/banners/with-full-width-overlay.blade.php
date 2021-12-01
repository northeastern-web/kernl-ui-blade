<div
    class="
        {!! 
            $height == 'half' ? 'py-8 md:py-10 lg:py-16' : 'py-16 md:py-20 lg:py-32' 
        !!} 
        @if ($solidBackgroundColor == 'light_gray')
            {{ 'bg-gray-400' }} 
        @elseif ($solidBackgroundColor == 'dark_gray') 
            {{ 'bg-gray-600' }} 
        @else 
            {{ 'bg-black' }}
        @endif
        bg-center bg-cover bg-no-repeat"
        @if($includeImage)
        {!! 
            $backgroundUrl ? ' style="background-image: 
            linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), 
            url(' . $backgroundUrl . ')"' : ''
        !!}
        @endif
>
    <div class="container">
        <div class="max-w-2xl text-white">
            {{ $slot }}
        </div>
    </div>
</div>
