<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $subCategories = SubCategory::latest()->get();
        $categories = Category::orderBy('category_name_en',"ASC")->get();
        return view('backend.category.subcategory_view',compact('subCategories','categories'));
    }
    public function SubCategoryStore(Request $request)
    {
        
        $request->validate([
            'category_id' => ['required'],
            'subcategory_name_en' => ['required','min:2','max:255'],
            'subcategory_name_fa' => ['required','min:2','max:255'],
        ]);
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fa' => $request->subcategory_name_fa,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'subcategory_slug_fa'=> str_replace(' ','-',$request->category_name_fa),
            'created_at'=> Carbon::now()
        ]);
        return Redirect::back()->with('success','SubCategory inserted successfully');
    }
    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subCategory = SubCategory::find($id);
        return view('backend.category.subcategory_edit',compact('categories','subCategory'));
    }
    public function SubCategoryUpdate(Request $request,$id)
    {
        $request->validate([
            'category_id' => ['required'],
            'subcategory_name_en' => ['required','min:2','max:255'],
            'subcategory_name_fa' => ['required','min:2','max:255'],
        ]);
        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fa' => $request->subcategory_name_fa,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'subcategory_slug_fa'=> str_replace(' ','-',$request->category_name_fa),
            'updated_at'=> Carbon::now()
        ]);
        return Redirect()->route('all.subcategory')->with('success','SubCategory Updated successfully');
    }
    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();
        return Redirect()->back()->with('success','SubCategory deleted successfully');
    }
}
