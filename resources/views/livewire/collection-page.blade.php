<x-slot name="title">{{ $this->title . ' | ' . config('app.name') }}</x-slot>
<div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
    <section>
        @if ($this->image)
        <div class="relative aspect-w-1 aspect-h-1 mb-4">
            <img class="object-cover rounded-xl" src="{{ $this->image->getUrl() }}" alt="{{ $this->title }}" />
        </div>
        @endif
        <h2 class="text-2xl font-bold mb-3">{{ $this->title }}</h2>

        @if (count($this->collection->children))
        <nav class="w-full overflow-scroll"><ul class="flex gap-4">
            @foreach ($this->collection->children as $collection)
            <li class="bg-gray-100">
                <a href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
                class="block px-3 py-4 transition hover:bg-gray-300">
                {{ $collection->attr('name') }}
            </a></li>
            @endforeach
        </ul></nav>
        @endif

        @if (count($this->products))
        <div class="grid grid-cols-2 gap-8 my-4 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($this->products as $product)
                <x-product-card :product="$product" />
            @endforeach
            <div class="col-span-full h-16">{{ $this->products->links() }}</div>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"></div>
        @endif
    </section>
    @foreach ($this->collection->children as $collection)
        <x-carousel :collection="$collection" />
    @endforeach
</div>
