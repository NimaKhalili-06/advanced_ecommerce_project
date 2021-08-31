<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }
    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => ['required'],
            'category_name_fa' => ['required'],
            'category_icon' => ['required']
        ], [
            'category_name_en.required' => 'Please enter category english name',
            'category_name_fa.required' => 'Please enter category persian name'
        ]);
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_fa' => $request->category_name_fa,
            'category_slug_en' => strtolower(str_replace(" ", "-", $request->category_name_en)),
            'category_slug_fa' => str_replace(" ", "-", $request->category_name_fa),
            'category_icon' => $request->category_icon
        ]);
        return Redirect()->back()->with('message', 'Category added successfully');
    }
    public function CategoryEdit($id)
    {
        $category = Category::find($id);
        return view('backend.category.category_edit', compact('category'));
    }
    public function CategoryUpdate(Request $request)
    {
        $request->validate([
            'category_name_en' => ['required'],
            'category_name_fa' => ['required'],
            'category_icon' => ['required']
        ]);
        $category = Category::findOrFail($request->id);
        $category->update([
            'category_name_en' => $request->category_name_en,
            'category_name_fa' => $request->category_name_fa,
            'category_icon' => $request->category_icon
        ]);
        return Redirect()->route('all.category')->with("success",'Category Updated Successfully');
    }
    public function CategoryDelete($id)
    {
        Category::find($id)->delete();
        return Redirect()->back()->with('success',"Category Deleted Successfully");
    }
}
