<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'name',
    ];

    public const ListRole = [
        1, // admin
        2, // shipper
        3, // editor
    ];
    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}
