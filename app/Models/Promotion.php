<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'promotions';
    protected $fillable = [
        'code',
        'type',
        'discount',
        'begin_date',
        'end_date',
        'quantity',
        'status',
    ];
    public const PAGE_LIMIT = 50;
    public const STATUS = [
        0, // private
        1, // public (default)
    ];
}
