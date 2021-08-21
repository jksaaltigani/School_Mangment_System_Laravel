<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function getStatus()
    {
        return $this->active = 1 ? __('layout.active') : __('layout.not active');
    }
}