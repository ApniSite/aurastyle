<?php

namespace App\Livewire;

use App\Traits\FetchesUrls;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Lunar\Models\Collection as CollectionModel;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CollectionPage extends Component
{
    use FetchesUrls, WithPagination;

    public function mount(string $slug): void
    {
        $this->url = $this->fetchUrl(
            $slug,
            (new CollectionModel)->getMorphClass(),
            [
                'element.thumbnail',
                'element.products.variants.basePrices',
                'element.products.defaultUrl',
            ]
        );

        if (! $this->url) {
            abort(404);
        }
    }

    /**
     * Computed property to return the collection.
     */
    public function getCollectionProperty(): mixed
    {
        return $this->url->element;
    }

    public function getTitleProperty(): string
    {
        $description = $this->collection->attr('description');
        return $description ? html_entity_decode(strip_tags($description)) : $this->collection->attr('name');
    }

    /**
     * Computed property to return current image.
     */
    public function getImageProperty(): ?Media
    {
        return $this->collection->media->sortBy('order_column')->first();
    }

    public function getProductsProperty()
    {
        return $this->collection->products()->orderBy('created_at', 'DESC')->paginate(24);
    }

    public function render(): View
    {
        return view('livewire.collection-page');
    }
}
