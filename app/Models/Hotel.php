<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_image',
        'carousel_image',
        'long_description',
        'short_description',
        'price',
        'available_rooms',
    ];
    protected $cast = ['carousel_image' => 'array'];
}
