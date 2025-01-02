<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Lunar\Models\CustomerGroup;
use Lunar\Models\Discount;
use Lunar\Models\Product as LunarProduct;

class Product extends LunarProduct
{
    /**
     * Compute to return discount.
     */
    public function discount(): ?Discount
    {
        $customerGroups = Auth::user()?->latestCustomer()?->customerGroups
            ?? collect([CustomerGroup::getDefault()]);
        $collections = $this->collections;

        return Discount::active()
        ->usable()
        ->customerGroup($customerGroups)
        ->whereHas('collections', function($query) use ($collections) {
            $prefix = config('lunar.database.table_prefix');
            $query->whereIn("{$prefix}collection_discount.collection_id", $collections->pluck('id'));
        })
        ->orderBy('priority', 'desc')
        ->orderBy('id')
        ->first();
    }
    /**
     * Check if product is available for purchase
     */
    public function isAvailable(): bool
    {
        return $this->variants->reject(function ($variant) {
            return !$variant->canBeFulfilledAtQuantity(1);
        })->count();
    }
}
