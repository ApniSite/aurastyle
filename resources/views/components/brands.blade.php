<section>
    <div>
        <h3 class="text-2xl font-bold">Top Brands</h3>
    </div>
    <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 my-4 gap-x-4 gap-y-8">
        @forelse($brands as $brand)
            <x-brand-card :brand="$brand" />
        @empty
        @endforelse
    </div>
</section>