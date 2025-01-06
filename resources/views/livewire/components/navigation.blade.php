<header class="relative border-b border-gray-100">
    <div class="bg-gray-600 text-xs text-white hidden md:block">
        <div class="max-w-screen-xl flex justify-between mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <div class="ml-4"><span>Always find best deals with us</span></div>
            <div><span>Free Delivery* & returns</span></div>
            <div class="mr-4"><ul class="flex flex-wrap items-center justify-center">
                <li><a href="#" class="ml-4 underline">Support</a></li>
                <li><a href="#" class="ml-4 underline">Track Order</a></li>
                <li><a href="{{ route('account') }}" class="ml-4 underline">Account</a></li>
            </ul></div>
        </div>
    </div>
    <div class="max-w-screen-xl flex items-center justify-between h-16 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center">
            <a href="{{ url('/') }}" class="flex items-center flex-shrink-0" wire:navigate>
                <span class="sr-only">Home</span>
                <x-brand.logo class="w-auto h-8 text-gray-500 hover:text-indigo-600 hidden sm:block" />
                <x-brand.icon class="w-auto h-8 text-gray-500 hover:text-indigo-600 block sm:hidden" />
            </a>

            <nav class="hidden lg:gap-4 lg:flex lg:ml-8">
                @foreach ($this->collections as $collection)
                <div class="relative" x-data="{ open: false }" @mouseover.away="open = false">
                    <a class="py-4 text-sm font-medium transition hover:opacity-75"
                       href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                       wire:navigate @mouseover="open = true">
                        {{ $collection->attr('name') }}
                    </a>

                    @if (count($collection->children))
                    <div class="absolute top-auto z-50 w-60 mx-auto bg-gray-100 border border-gray-100 shadow-xl sm:left-auto rounded-md"
                        x-show="open" x-transition x-cloak>
                    <ul class="text-sm font-medium text-gray-600 ">
                        @foreach ($collection->children as $collection)
                        <li><a href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                            class="flex items-center px-3 py-4 transition hover:bg-gray-200">
                            {{ $collection->attr('name') }}
                        </a></li>
                        @endforeach
                    </ul>
                    </div>
                    @endif
                </div>
                @endforeach
            </nav>
        </div>

        <div class="flex items-center justify-between flex-1 ml-4 lg:justify-end">
            <x-header.search class="max-w-sm mr-4" />

            <div class="flex items-center -mr-4 sm:-mr-6 lg:mr-0">
                <livewire:components.user />
                <livewire:components.cart />

                <div x-data="{ mobileMenu: false }">
                    <button x-on:click="mobileMenu = !mobileMenu"
                            class="grid flex-shrink-0 w-16 h-16 border-l border-gray-100 lg:hidden">
                        <span class="sr-only">Toggle Menu</span>

                        <span class="place-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </span>
                    </button>

                    <div class="absolute right-0 z-50 w-screen sm:max-w-xs"
                        x-cloak x-transition x-show="mobileMenu">
                        <ul x-on:click.away="mobileMenu = false"
                            class="p-6 space-y-4 bg-white border border-gray-100 shadow-xl rounded-xl">
                            @foreach ($this->collections as $collection)
                                <li><a class="text-sm font-medium"
                                       href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                                       wire:navigate>
                                        {{ $collection->attr('name') }}
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
