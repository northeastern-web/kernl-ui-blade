<div
    class="py-16 bg-black bg-center bg-cover bg-no-repeat md:py-20"
    {!! 
        $backgroundUrl ? ' style="background-image: 
        linear-gradient(rgba(0, 0, 0, .8), rgba(0, 0, 0, .8)), 
        url(' . $backgroundUrl . ')"' : ''
    !!}
>
    <div class="container">
        <div class="max-w-2xl text-white">
            {{ $slot }}
        </div>
    </div>
</div>
