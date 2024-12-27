<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primarykey='id';
    protected $fillable=
    [
        'name',
        'address',
        'phone',
        'message',
        'productid',
        'payment_id'
    ];
}
