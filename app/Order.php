<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = ['customer_name', 'customer_email', 'customer_telephone', 'customer_address', 'delivery_date', 'delivery_time', 'amount', 'user_id', 'payment_id'];

    /**
     * Get the user that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
