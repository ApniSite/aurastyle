<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Brand;
use Lunar\Models\Collection;
use Lunar\Models\Url;
use Spatie\SchemaOrg\Schema;

class Home extends Component
{
    public function getWebsiteSchemaProperty() {
        return Schema::onlineStore()
            ->name(config('app.name'))
            ->url(config('app.url'))
            ->logo(asset('apple-touch-icon.png'))
            ->keywords(config('meta.keywords'))
            ->description(config('meta.description'))
            ->sameAs(config('meta.social.facebook'))
            ->contactPoint(Schema::contactPoint()->email(config('meta.support.email')));
    }
    /**
     * Return the sale collection.
     */
    public function getSaleCollectionProperty(): Collection | null
    {
        return Url::whereElementType((new Collection)->getMorphClass())->whereSlug('sale')->first()?->element ?? null;
    }

    /**
     * Return all images in sale collection.
     */
    public function getSaleCollectionImagesProperty()
    {
        if (! $this->getSaleCollectionProperty()) {
            return null;
        }

        $collectionProducts = $this->getSaleCollectionProperty()
            ->products()->inRandomOrder()->limit(4)->get();

        $saleImages = $collectionProducts->map(function ($product) {
            return $product->thumbnail;
        });

        return $saleImages->chunk(2);
    }

    /**
     * Return a random collection.
     */
    public function getRandomCollectionProperty(): ?Collection
    {
        $collections = Url::whereElementType((new Collection)->getMorphClass());

        if ($this->getSaleCollectionProperty()) {
            $collections = $collections->where('element_id', '!=', $this->getSaleCollectionProperty()?->id);
        }

        foreach ($collections->inRandomOrder() as $collection) {
            if ($collection->has('products')) {
                return $collection->element;
            }
        }

        return $collections->inRandomOrder()->first()?->element;
    }

    public function getLatestProductsProperty()
    {
        return Product::status('published')->orderBy('created_at', 'DESC')->take(8)->get();
    }

    public function getTopBrandsProperty()
    {
        return Brand::withCount('products')->orderBy('products_count', 'DESC')->take(6)->get();
    }

    public function render(): View
    {
        return view('livewire.home');
    }
}
