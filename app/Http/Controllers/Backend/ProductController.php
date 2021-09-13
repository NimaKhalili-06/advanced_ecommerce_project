<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }
    public function StoreProduct(Request $request)
    {
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/products/thambnail/' . $name_gen;
        Image::make($image)->resize(917, 1000)->save($save_url);

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_fa' => $request->product_name_fa,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_fa' => str_replace(' ', '-', $request->product_name_fa),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_fa' => $request->product_tags_fa,
            'product_size_en' => $request->product_size_en,
            'product_size_fa' => $request->product_size_fa,
            'product_color_en' => $request->product_color_en,
            'product_color_fa' => $request->product_color_fa,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_fa' => $request->short_descp_fa,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_fa' => $request->long_descp_fa,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now()

        ]);
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            Image::make($img)->resize(917, 1000)->save($uploadPath);
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now()
            ]);
        }
        return Redirect::route('manage-product')->with("success", 'Product inserted successfully');
    }
    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }
    public function EditProduct($id)
    {
        $product_images = MultiImg::where('product_id', $id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategories', 'subsubcategories', 'product', 'product_images'));
    }
    public function UpdateProduct($id, Request $request)
    {
        $request->validate([
            "brand_id" => ['required'],
            "category_id" => ['required'],
            "subcategory_id" => ['required'],
            "subsubcategory_id" => ['required'],
            "product_name_en" => ['required'],
            "product_name_fa" => ['required'],
            "product_code" => ['required'],
            "product_qty" => ['required'],
            "product_tags_en" => ['required'],
            "product_tags_fa" => ['required'],
            "product_size_en" => ['required'],
            "product_size_fa" => ['required'],
            "product_color_en" => ['required'],
            "product_color_fa" => ['required'],
            "selling_price" => ['required'],
            "discount_price" => ['required'],
            "short_descp_en" => ['required'],
            "short_descp_fa" => ['required'],
            "long_descp_en" => ['required'],
            "long_descp_fa" => ['required'],
            "hot_deals" => ['required'],
            "special_deals" => ['required'],
        ]);
        Product::find($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_fa' => $request->product_name_fa,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_fa' => str_replace(' ', '-', $request->product_name_fa),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_fa' => $request->product_tags_fa,
            'product_size_en' => $request->product_size_en,
            'product_size_fa' => $request->product_size_fa,
            'product_color_en' => $request->product_color_en,
            'product_color_fa' => $request->product_color_fa,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_fa' => $request->short_descp_fa,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_fa' => $request->long_descp_fa,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now()

        ]);
        return Redirect::route('manage-product')->with('success', 'Product Updated successfully');
    }
    public function MultiImageUpdate($id, Request $reuqest)
    {
        $reuqest->validate([
            'multi_img' => ['required']
        ]);
        $images = $reuqest->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            Image::make($img)->resize(917, 1000)->save($uploadPath);
            MultiImg::insert([
                'product_id' => $id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now()
            ]);
        }
        return Redirect::back()->with('success', 'Image(s) added successfully');
    }
    public function ThumbnailUpdate($id, Request $request)
    {
        $request->validate([
            'product_thambnail' => ['required', 'mimes:png,jpg,jpeg']
        ]);
        $img = $request->file('product_thambnail');
        $old_thumbnail = Product::find($id)->product_thambnail;
        $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        $uploadPath = 'upload/products/thambnail/' . $make_name;
        Image::make($img)->resize(917, 1000)->save($uploadPath);
        unlink($old_thumbnail);
        Product::find($id)->update([
            'product_thambnail'=> $uploadPath
        ]);
        return Redirect::back()->with('success','Thumbnail Updated successfully');
    }
    public function ImageDelete($id)
    {
        $image = MultiImg::find($id);
        unlink($image->photo_name);
        $image->delete();
        return Redirect::back()->with('success','Image deleted successfully');
    }
    public function InActive($id)
    {
        Product::find($id)->update([
            'status'=> 0
        ]);
        return Redirect::back()->with('success','Product inactive successfully');
    }
    public function Active($id)
    {
        Product::find($id)->update([
            'status'=> 1
        ]);
        return Redirect::back()->with('success','Product active successfully');
    }
    public function deleteProduct($id)
    {
        $images = MultiImg::where('product_id',$id);
        foreach($images as $img) {
            unlink($img->photo_name);
        }
        $images->delete();
        $product = Product::find($id);
        unlink($product->product_thambnail);
        $product->delete();
        return Redirect::back()->with('success','Product Deleted successfully');
    }
}
