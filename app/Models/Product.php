<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'code',
        'thumbnail',
        'content',
        'status',
        'quantity',
        'price',
        'is_feature',
    ];
    protected $hidden = [];

    protected static function boot()
    {
        parent::boot();

        // update data for field slug of table products
        static::saving(function ($model) {
            // save slug
            $slug = Str::of($model->name)->slug('-');
            $model->slug = $slug;
        });
    }
    public const STATUS = [
        0, // hidden
        1, // show
    ];
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function promotions()
    {
        return $this->hasMany(Promotion::class, 'product_id', 'id');
    }
    public function scopeStatus($query, $status = self::STATUS[1])
    {
        return $query->where('status', $status);
    }
}
