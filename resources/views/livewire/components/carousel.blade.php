<section>
    <a class="flex justify-between font-medium transition hover:opacity-75"
        href="{{ route('collection.view', $collectionUrl) }}" >
        <h3 class="text-2xl font-bold">{{ $title }}</h3>
        <span class="text-indigo-600">See more →</span>
    </a>

    <div class="grid grid-cols-2 my-4 sm:grid-cols-4 lg:grid-cols-5 gap-x-4 gap-y-8">
        @forelse($products as $product)
            <x-product-card :product="$product" />
        @empty
        @endforelse
    </div>
</section>