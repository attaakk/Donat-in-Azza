<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'invoice_id',
        'user_id',
        'menu_id',
        'quantity',
        'size',
        'total_price',
        'service_type',
        'notes',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
