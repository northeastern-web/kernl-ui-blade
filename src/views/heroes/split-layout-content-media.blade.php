<div {{ $attributes->merge(['class' => 'relative bg-white flex flex-col']) }}>
    <div class="w-full py-16 md:pt-20 md:pb-24 lg:pt-32 lg:pb-40">
        <div class="container max-w-lg mx-0 md:w-1/2 xl:w-1/3 xl:max-w-xl">
            @if(!$slot->isEmpty())
                {{ $slot }}
            @else
                <h1 class="text-3xl text-gray-800 md:text-5xl">
                    {{ $title ?? 'No title' }}
                </h1>
                <p class="mt-6 text-gray-500 md:text-lg">
                    {{ $body ?? 'No body' }}
                </p>
                <a
                    href="{{ $callToActionUrl ?? '#' }}"
                    class="mt-8 btn text-white bg-red-600 hover:bg-red-800"
                >
                    {{ $callToAction ?? 'No call to action' }}
                </a>
            @endif
        </div>
    </div>
    <div
        class="h-64 w-full bg-gray-800 bg-cover bg-no-repeat bg-center md:h-full md:absolute md:inset-y-0 md:right-0 md:w-1/2 xl:w-2/3"
        style="
            background-image: url({{ $mediaUrl }})
        "
    >
    </div>
</div>
