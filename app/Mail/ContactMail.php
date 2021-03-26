<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('orders@deliveboo.com')->markdown('mail.contacts')
        ->with([
            'name' => $this->order->customer_name,
            'email' => $this->order->customer_email,
            'customer_address' => $this->order->customer_address,
            'delivery_date' => $this->order->delivery_date,
            'delivery_time' => $this->order->delivery_time,
            'amount' => $this->order->amount,
            
        ]);
    }
}