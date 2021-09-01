<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_name_fa',
        'subcategory_slug_en',
        'subcategory_slug_fa'
    ];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
