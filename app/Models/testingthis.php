<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testingthis extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_detail'
    ];

    public function customer(){
        return $this->belongsTo(customers::class);
    }
}
