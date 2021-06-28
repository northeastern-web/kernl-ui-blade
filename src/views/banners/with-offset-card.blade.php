<div
    class="py-24 md:py-20 lg:py-32 bg-black bg-center bg-cover bg-no-repeat"
    {!! 
        $backgroundUrl ? 'style="background-image: url(' . $backgroundUrl . ')"' : ''
    !!}
>
    <div class="container hidden sm:block">
        <div class="max-w-2xl px-6 py-12 text-white bg-black bg-opacity-80 lg:px-12 lg:py-16">
            {{ $slot }}
        </div>
    </div>
</div>


<div class="py-8 w-full bg-gray-100 block sm:hidden">   
    <div class="container h-full z-2">
    {{ $slot }}
    </div>
</div>
