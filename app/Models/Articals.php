<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articals extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'id', 'name', 'description', 'sort_des', 'slug', 'content', 'photo',    'user_id',    'category_id',  'tag',  'created_at', 'updated_at'
    ];


    public function scopeActive($q)
    {
        return $q->where('active', 1)->orderBy('created_at', 'DESC');
    }
    public function scopeUnactive($q)
    {
        return $q->where('active', 0)->orderBy('created_at', 'DESC');
    }

    public function getActive()
    {
        return $this->active == 1 ? 'active' : 'not active';
    }


    public function getPhotoAttribute($key)
    {
        return $key ? asset('/articals/'.$this->id ."/"  . $key) : asset('public_img/03.png');
    }

    public function getMinPhotoAttribute($key)
    {
        return  $key ? asset('/articals/'.$this->id ."/" . $key)   : asset('public_img/vr.png');
    }

    #################### realtion section ##########################
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}