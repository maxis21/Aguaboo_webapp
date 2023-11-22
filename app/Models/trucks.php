<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trucks extends Model
{
    use HasFactory;
    protected $fillable = [
        'trucks'
    ];

    public function order(){
        return $this->hasMany(orders::class, 'truck_id');
    }
}
