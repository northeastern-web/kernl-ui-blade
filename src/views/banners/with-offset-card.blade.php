<div
    class="py-16 md:py-20 lg:py-32 bg-black bg-center bg-cover bg-no-repeat"
    {!! 
        $backgroundUrl ? 'style="background-image: url(' . $backgroundUrl . ')"' : ''
    !!}
>
    <img class="w-full object-cover sm:hidden" src="{{ $backgroundUrl }}" alt="Header image: {{ $backgroundUrl }}" />
    <div class="container hidden sm:block">
        <div class="max-w-2xl px-6 py-12 text-white bg-black bg-opacity-80 lg:px-12 lg:py-16">
            {{ $slot }}
        </div>
    </div>

    <div class="w-full bg-white block sm:hidden">   
        <div class="container flex justify-start items-center h-full z-2">
        {{ $slot }}
        </div>
    </div>

</div>