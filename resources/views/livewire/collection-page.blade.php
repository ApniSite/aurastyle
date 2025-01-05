<div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
    <section>
        <h2 class="text-2xl font-bold mb-3">
            {!! $this->collection->translateAttribute('description') ?? $this->collection->translateAttribute('name') !!}
        </h2>

        @if (count($this->collection->children))
        <nav class="w-full overflow-scroll"><ul class="flex gap-4">
            @foreach ($this->collection->children as $collection)
            <li class="bg-gray-100">
                <a href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                class="block px-3 py-4 transition hover:bg-gray-300">
                {{ $collection->translateAttribute('name') }}
            </a></li>
            @endforeach
        </ul></nav>
        @endif

        <div class="grid grid-cols-2 gap-8 my-4 sm:grid-cols-3 lg:grid-cols-4">
            @forelse($this->collection->products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="col-span-2 text-sm">
                    {!! $this->collection->translateAttribute('description') !!}
                </div>
            @endforelse
        </div>
    </section>
    @foreach ($this->collection->children as $collection)
        @if (count($collection->products))
        <livewire:components.carousel :collection="$collection" />
        @endif
    @endforeach
</div>
