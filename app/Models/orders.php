<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'order_purok',
        'order_barangay',
        'order_city',
        'order_pnumber',
        'truck_id',
        'returned',
        'total_price',
        'order_status'
    ];

    public function customer(){
        return $this->belongsTo(customers::class, 'customer_id');
    }

    public function product(){
        return $this->belongsToMany(products::class, 'orders_products','order_id', 'product_id')->withPivot('quantity');
    }

    public function truck(){
        return $this->belongsTo(trucks::class);
    }


}
