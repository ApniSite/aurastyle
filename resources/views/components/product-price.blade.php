<p {{ $attributes }}>
    <span class="sr-only">Price</span>
    <span class="font-bold">{{ $price?->price->formatted() }}</span>
    @if ($price?->compare_price->value)
    <span class="text-xs text-gray-500 line-through">{{ $price?->compare_price->formatted() }}</span>
    @endif
</p>