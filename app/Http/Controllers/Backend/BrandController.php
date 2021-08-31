<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }
    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => ['required'],
            'brand_name_fa' => ['required'],
            'brand_image' => ['required', 'mimes:jpeg,png,jpg']
        ], [
            'brand_name_en.required' => "Please enter a english brand name.",
            'brand_name_fa.required' => "Please enter a persian brand name.",
            'brand_image.required' => 'Please choose an image.',
            'brand_image.mimes' => 'Please enter image with allowed type . Allowed types : jpg,png,jpeg'
        ]);
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_fa' => $request->brand_name_fa,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_fa' => str_replace(' ', '-', $request->brand_name_fa),
            'brand_image' => $save_url
        ]);
        return Redirect::back()->with('success', 'Brand Inserted successfully');
    }
    public function BrandEdit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }
    public function BrandUpdate(Request $request, $id)
    {
        $request->validate([
            'brand_name_en' => ['required'],
            'brand_name_fa' => ['required'],
            'brand_image' => ['mimes:png,jpg,jpeg']
        ]);

        $brand = Brand::find($id);

        if ($request->file('brand_image')) {
            unlink($brand->brand_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fa' => $request->brand_name_fa,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_fa' => str_replace(' ', '-', $request->brand_name_fa),
                'brand_image' => $save_url
            ]);


        }else{
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fa' => $request->brand_name_fa,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_fa' => str_replace(' ', '-', $request->brand_name_fa),
            ]);
        }
        return Redirect::back()->with('success', 'Brand Updated successfully');
    }

    public function BrandDelete($id)
    {
        $brand = Brand::find($id);
        unlink($brand->brand_image);
        $brand->delete();
        return Redirect()->back()->with('message','Brand deleted successfully ');
    }
}
