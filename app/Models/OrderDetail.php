<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'order_details';

    protected $fillable = [
        'product_id',
        'order_id',
        'promotion_id',
        'quantity',
        'price',
    ];
    public function getFormatQuantityAttribute()
    {
        // Format and Return
        return number_format($this->quantity);
    }
    public function getFormatPriceAttribute()
    {
        // Format and Return
        return number_format($this->price) . ' ' . trans('message.currency');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
