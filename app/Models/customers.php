<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_name',
        'customer_purok',
        'customer_barangay',
        'customer_city',
        'customer_phonenum',
        'customer_password'
    ];

    public function order(){
        return $this->hasMany(orders::class);
    }
}
