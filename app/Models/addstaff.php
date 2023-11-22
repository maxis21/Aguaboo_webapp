<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addstaff extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'contact_number',
        'role',
        'email_address',
        'password'
    ];

}
