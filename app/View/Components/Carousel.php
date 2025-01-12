<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Carousel extends Component
{
    public $title;

    public $collectionUrl;

    public $products;

    public function __construct($title = null, $collectionUrl = null, $products = null, $collection = null)
    {
        if ($collection) {
            $this->title = $collection->attr('name');
            $this->collectionUrl = $collection->defaultUrl->slug;
            $this->products = $collection->products()->orderBy('created_at', 'DESC')->take(8)->get();
        } else {
            $this->title = $title;
            $this->collectionUrl = $collectionUrl;
            $this->products = $products;
        }
    }

    public function shouldRender(): bool
    {
        return count($this->products);
    }

    public function render(): View
    {
        return view('components.carousel');
    }
}