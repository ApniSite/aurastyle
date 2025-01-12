<x-slot name="title">{{ $this->title . ' | Tops, Sweaters, Cardigans & more | ' . config('app.name') }}</x-slot>
<div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
    <section>
        <div class="flex items-center gap-4">
            <img class="p-2 w-16 h-16 rounded-full bg-gray-500 hover:bg-indigo-700" src="{{ $this->brand->thumbnail?->getUrl() }}" alt="{{ $this->brand->name }}">
            <div>
                <h2 class="text-3xl font-bold">{{ $this->brand->name }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-8 my-4 sm:grid-cols-3 lg:grid-cols-4">
            @forelse($this->products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="col-span-full text-sm">
                    @if (count($this->topBrands))
                    <x-brands :brands="$this->topBrands" />
                    @endif
                </div>
            @endforelse
            <div class="col-span-full h-16">{{ $this->products->links() }}</div>
        </div>
    </section>
    @foreach ($this->brand->collections as $collection)
        <livewire:components.carousel :collection="$collection" />
    @endforeach
</div>