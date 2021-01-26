<div
    class="py-16 bg-black bg-center bg-cover bg-no-repeat md:py-20"
    style="background-image: url('{{ $backgroundUrl }}')"
>
    <div class="container">
        <div class="max-w-2xl px-6 py-12 text-white bg-black bg-opacity-80 lg:px-12 lg:py-16">
            {{ $slot }}
        </div>
    </div>
</div>
