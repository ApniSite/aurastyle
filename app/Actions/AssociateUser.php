<?php

namespace App\Actions;

use Lunar\Actions\Carts\AssociateUser as CartsAssociateUser;
use Lunar\Base\LunarUser;
use Lunar\Models\Cart;

class AssociateUser extends CartsAssociateUser
{
    /**
     * Associate the addresses of the user to the cart
     */
    public function execute(Cart $cart, LunarUser $user, $policy = 'merge'): self
    {
        parent::execute($cart, $user, $policy);

        if ($customer = $user->latestCustomer()) {
            if($address = $customer->addresses()->where('shipping_default', '1')->first()) {
                $cart->setShippingAddress($address);
            }

            if($address = $customer->addresses()->where('billing_default', '1')->first()) {
                $cart->setBillingAddress($address);
            }
        }

        return $this;
    }
}