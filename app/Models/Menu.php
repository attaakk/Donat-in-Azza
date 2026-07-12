<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'base_price',
        'extra_price',
        'image_path',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
