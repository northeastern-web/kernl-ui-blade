<div
    class="py-16 md:py-20 lg:py-32 bg-black bg-center bg-cover bg-no-repeat"
    {!! 
        $backgroundUrl ? ' style="background-image: 
        linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), 
        url(' . $backgroundUrl . ')"' : ''
    !!}
>
    <div class="container">
        <div class="max-w-2xl text-white">
            {{ $slot }}
        </div>
    </div>
</div>
