<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActive()
    {
        return 'active';
    }

    public function permission()
    {
        return $this->belongsTo(Permissions::class, 'permission_id', 'id');
    }

    public function hasApilty($permiss)
    {
        $roles = $this->permission;
        if (!$roles)
            return false;

        foreach ($roles->permissions as $permission) {
            if (is_array($permiss) && in_array($permission, $permiss))
                return true;
            elseif (is_string($permiss) && $permiss == $permission)
                return true;
        }
        return false;
    }
}