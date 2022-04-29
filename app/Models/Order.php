<?php

namespace App\Models;
use App\Models\Order_items;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'message',
        'payment_mode',
        'payment_id',
        'status',
        'total_price',
        'tracking_number',


    ];

    public function order_items()
    {
        return $this->hasMany(Order_items::class);
    }
}
