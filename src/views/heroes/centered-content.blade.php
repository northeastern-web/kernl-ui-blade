<div {{ $attributes->merge(['class' => 'pt-16 pb-20 md:pt-20 md:pb-24 lg:pt-32 lg:pb-40']) }}>
    <div class="container sm:text-center">
        @if(!$slot->isEmpty())
            {{ $slot }}
        @else
            <h1 class="text-4xl text-gray-900 font-bold uppercase md:text-5xl lg:text-6xl">
                {{ $title ?? '' }}
            </h1>
            <span class="mt-6 inline-flex w-20 border-t-4 border-red-600 md:mt-8"></span>
            <p class="mt-2 text-gray-900 md:text-lg">
                {{ $subtitle ?? '' }}
            </p>
            <p class="mt-6 mx-auto max-w-3xl text-gray-600 md:text-lg">
                {{ $body ?? '' }}
            </p>
        @endif
    </div>
</div>
