<?php

namespace App\Livewire;

use App\Traits\FetchesUrls;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Lunar\Models\Collection as CollectionModel;

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
        $description = $this->collection->translateAttribute('description');
        return $description ? html_entity_decode(strip_tags($description)) : $this->collection->translateAttribute('name');
    }

    public function getProductsProperty()
    {
        return $this->collection->products()->paginate(8);
    }

    public function render(): View
    {
        return view('livewire.collection-page');
    }
}
