<?php

namespace App\Livewire;

use App\Traits\FetchesUrls;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Brand;

class BrandPage extends Component
{
    use FetchesUrls;

    public function mount($slug): void
    {
        $this->url = $this->fetchUrl(
            $slug,
            (new Brand)->getMorphClass(),
            [
                'element.media',
                'element.products.variants.basePrices',
                'element.products.defaultUrl',
            ]
        );

        if (! $this->brand) {
            abort(404);
        }
    }

    /**
     * Computed property to return the brand.
     */
    public function getBrandProperty(): mixed
    {
        return $this->url->element;
    }

    public function getTitleProperty(): string
    {
        return $this->brand->name;
    }

    public function getTopBrandsProperty()
    {
        return Brand::withCount('products')->orderBy('products_count', 'DESC')->take(6)->get();
    }

    public function getProductsProperty()
    {
        return $this->brand->products()->paginate(24);
    }

    public function render(): View
    {
        return view('livewire.brand-page');
    }
}