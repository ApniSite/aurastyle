<x-slot name="schema">{!! $this->websiteSchema->toScript() !!}</x-slot>
<div>
    <x-promo-banner class="bg-gray-100 px-2 py-2 mb-4" />

    <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-6 sm:px-6 lg:px-8">
        @if ($this->saleCollection)
            <x-collection-sale />
        @endif

        @if (count($this->latestProducts))
        <x-carousel title="New Styles" collectionUrl="sale" :products="$this->latestProducts" />
        @endif

        @if (count($this->topBrands))
        <x-brands :brands="$this->topBrands" />
        @endif

        @if ($collection = $this->randomCollection)
            <x-carousel
                :title="$collection->attr('name')"
                :collectionUrl="$collection->defaultUrl->slug"
                :products="$collection->products()->orderBy('created_at', 'DESC')->take(8)->get()" />
        @endif
    </div>
</div>
