<?php

namespace App;

use App\User;
use App\Product;
use App\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'order_number', 'order_total', 'email', 'phone', 'organization', 'address', 'city', 'country', 'matrix', 'origin', 'intended_use', 'message', 'order_status_id', 'accept_order', 'budget', 'payment_proof', 'payment_proof_one', 'payment_proof_two', 'service_speci', 'signed_service_speci', 'result', 'raw_data'];

    // relationship with users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship with products
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot(['quantity', 'item_status', 'item_result']);
    }

    // relationship with order_statuses
    public function order_statuses() {
        return $this->belongsTo(OrderStatus::class);
    }
}
