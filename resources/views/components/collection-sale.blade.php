<section>
    <div class="p-4 overflow-hidden border-4 border-gray-900 rounded-lg">
        <div class="sm:py-32 sm:relative">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-5xl">
                    {{ $this->saleCollection->attr('name') }}
                </h2>

                @if ($this->saleCollection->attr('description'))
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        {!! $this->saleCollection->attr('description') !!}
                    </p>
                @endif

                <a href="{{ route('collection.view', $this->saleCollection->defaultUrl->slug) }}"
                   class="inline-block px-5 py-3 mt-6 text-sm font-medium text-white bg-gray-900 rounded-lg hover:ring-1 hover:ring-black"
                   wire:navigate>Shop the Sale</a>
            </div>

            <div class="mt-8 sm:absolute sm:right-0 sm:top-0 sm:mt-0">
                <div class="flex flex-col">
                    @foreach ($this->saleCollectionImages as $imageGroup)
                        <div class="gap-8 first:flex last:sm:flex last:hidden">
                            @foreach ($imageGroup as $image)
                                <img class="object-cover w-48 h-48 rounded-lg lg:h-72 lg:w-72 odd:mt-8"
                                     src="{{ $image->getUrl('medium') }}"
                                     alt="{{ $image->name }}"
                                     loading="lazy" />
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
