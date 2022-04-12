<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    use SoftDeletes;

    protected $table = 'admins';

    protected $guarded = [];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The roles that belong to the admin.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Set the admin's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the admin's role name.
     *
     * @return string
     */
    public function getRoleNames()
    {
        $roleNames = $this->roles->pluck('name')->toArray();
        return implode(', ', $roleNames);
    }

    /**
     * Get the admin's role id.
     *
     * @return string
     */
    public function getRoleIds()
    {
        $roleIds = $this->roles->pluck('id')->toArray();
        return $roleIds;
    }
}
