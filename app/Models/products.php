<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_price'
    ];

    public function order(){
        return $this->belongsToMany(orders::class, 'orders_products','order_id', 'product_id')->withPivot('quantity');
    }
}
