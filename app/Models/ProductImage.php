<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'url',
    ];

    protected $hidden = [];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
