<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    public function getPermissionsAttribute($key)
    {
        return json_decode($key);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}