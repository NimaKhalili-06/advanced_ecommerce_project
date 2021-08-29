<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brnad_name_en', 
        'brnad_name_fa', 
        'brnad_flug_en', 
        'brnad_flug_fa', 
        'brnad_image'
    ];
}
