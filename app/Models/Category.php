<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'level',
        'status',
    ];


    public const STATUS = [
        0, // hidden
        1, // show
    ];

    protected static function boot()
    {
        parent::boot();

        // update data for field slug of table categories
        static::saving(function ($model) {
            $slug = Str::of($model->name)->slug('-');
            $model->slug = strtolower($slug);
        });
    }


    protected static function booted()
    {
        static::addGlobalScope('scope_status', function (Builder $builder) {
            $builder->where('status', self::STATUS[1]);
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function limitProducts()
    {
        return $this->products()
            //->status() // Add Scope STATUS
            ->take(4); // Get 4 records
    }
}
