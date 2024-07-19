<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $primarykey='catid';
    protected $fillable=
    [
        'name',
        'description',
        'image'
    ];
}
