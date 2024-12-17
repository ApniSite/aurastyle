<?php

namespace App\Pipelines;

use App\Notifications\NewOrder;
use Closure;
use Illuminate\Support\Facades\Notification;
use Lunar\Models\Order;

class CreateOrderNotifications
{
    /**
     * @return mixed
     */
    public function handle(Order $order, Closure $next)
    {
        Notification::route('mail', config('meta.support.admin'))
            ->notify(new NewOrder($order));

        return $next($order);
    }
}
