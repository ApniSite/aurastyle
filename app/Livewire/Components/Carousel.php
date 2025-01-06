<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class Carousel extends Component
{
    public $title;

    public $collectionUrl;

    public $products;

    public function mount($collection = null): void
    {
        if ($collection) {
            $this->title = $collection->attr('name');
            $this->collectionUrl = $collection->defaultUrl->slug;
            $this->products = $collection->products()->orderBy('created_at', 'DESC')->take(8)->get();
        }
    }

    public function render(): View
    {
        return view('livewire.components.carousel');
    }
}