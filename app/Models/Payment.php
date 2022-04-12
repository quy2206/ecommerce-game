<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'payment_methods';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [];

    /**
     * Get all of the orders for the payment method.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'payment_method_id', 'id');
    }
}
