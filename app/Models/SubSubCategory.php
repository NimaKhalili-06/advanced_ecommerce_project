<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_name_fa',
        'subsubcategory_slug_en',
        'subsubcategory_slug_fa'
    ];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}
