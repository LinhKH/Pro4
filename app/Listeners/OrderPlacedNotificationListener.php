<?php

namespace App\Listeners;

use App\Events\OrderPlacedNotificationEvent;
use App\Mail\OrderPlacedMail;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class OrderPlacedNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlacedNotificationEvent $event): void
    {
        $orderId = $event->orderId;
        $order = Order::with('user')->findOrFail($orderId);
        $order['order_address'] = json_decode($order['order_address'], true);
        // dd($order['order_address']);

        Mail::send(new OrderPlacedMail($order));

    }
}
