<?php

namespace App\Pipelines;

use Closure;
use Lunar\Facades\Discounts;
use Lunar\Models\Cart;

class ApplyCustomerGroup
{
    /**
     * Called just before cart totals are calculated.
     *
     * @return mixed
     */
    public function handle(Cart $cart, Closure $next)
    {
        if ($customerGroups = $cart->customer?->customerGroups) {
            Discounts::customerGroup($customerGroups);
        }

        return $next($cart);
    }
}
