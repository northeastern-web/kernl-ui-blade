<footer class="py-10 bg-gray-800">
    <div class="px-4 text-white lg:px-16">
        <div class="-mx-2 flex flex-wrap justify-between space-y-8 lg:space-y-0">
            <div class="w-full px-2 lg:w-auto">
                <a class="inline-block hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-400" href="#">
                    {{ $logo ?? 'No logo' }}
                </a>

                @isset($address)
                    <address class="mt-4 text-sm not-italic">
                        {{ $address }}<br>
                    </address>
                @endisset

                <div class="mt-8 flex items-center space-x-2">
                    @if($facebookUrl)
                        <a class="p-1 hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $facebookUrl }}" aria-label="Facebook" title="Facebook">
                            @include('kernl-ui::includes.icons.facebook')
                        </a>
                    @endif
                    @if($twitterUrl)
                        <a class="p-1 hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $twitterUrl }}" aria-label="Twitter" title="Twitter">
                            @include('kernl-ui::includes.icons.twitter')
                        </a>
                    @endif
                    @if($youtubeUrl)
                        <a class="p-1 hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $youtubeUrl }}" aria-label="Youtube" title="Youtube">
                            @include('kernl-ui::includes.icons.youtube')
                        </a>
                    @endif
                    @if($linkedinUrl)
                        <a class="p-1 hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $linkedinUrl }}" aria-label="Linkedin" title="Linkedin">
                            @include('kernl-ui::includes.icons.linkedin')
                        </a>
                    @endif
                    @if($instagramUrl)
                        <a class="p-1 hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $instagramUrl }}" aria-label="Instagram" title="Instagram">
                            @include('kernl-ui::includes.icons.instagram')
                        </a>
                    @endif
                    @if($snapchatUrl)
                        <a class="p-1 hover:text-gray-300 focus:outline-none focus:ring focus:ring-blue-400" href="{{ $snapchatUrl }}" aria-label="Snapchat" title="Snapchat">
                            @include('kernl-ui::includes.icons.snapchat')
                        </a>
                    @endif
                </div>
            </div>
            @foreach($links as $link)
                <div class="w-1/2 px-2 flex flex-col md:w-1/4 lg:w-auto">
                    <h3 class="font-bold">
                        {{ data_get($link, 'text', '') }}
                    </h3>
                    @foreach(data_get($link, 'children', []) as $child)
                        <a
                            class="mt-2 text-sm text-gray-300 hover:text-gray-400 focus:outline-none focus:ring focus:ring-blue-400"
                            href="{{ data_get($child, 'href', '#') }}"
                        >
                            {{ data_get($child, 'text', '') }}
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

</footer>
