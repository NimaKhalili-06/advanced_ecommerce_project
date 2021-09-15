@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Add Product</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('product.update',['id' => $product->id]) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">


                                <div class="row">
                                    <!-- start 1st row  -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Brand Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="brand_id" class="form-control" required="">
                                                    <option value="" selected="" disabled="">Select Brand</option>
                                                    @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{$brand->id == $product->brand_id?'selected':''}}>
                                                        {{ $brand->brand_name_en}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Category Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control" required="">
                                                    <option value="" selected="" disabled="">Select Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{$category->id == $product->category_id?'selected':''}}>
                                                        {{ $category->category_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subcategory_id" class="form-control" required="">
                                                    <option value="" selected="" disabled="">Select SubCategory</option>
                                                    @foreach($subcategories as $item)
                                                    @if($item->category_id == $product->category_id)
                                                    <option value="{{ $item->id }}"
                                                        {{$item->id == $product->subcategory_id?'selected':''}}>
                                                        {{ $item->subcategory_name_en }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('subcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                </div> <!-- end 1st row  -->



                                <div class="row">
                                    <!-- start 2nd row  -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subsubcategory_id" class="form-control" required="">
                                                    <option value="" selected="" disabled="">Select SubSubCategory
                                                    </option>
                                                    @foreach($subsubcategories as $item)
                                                    @if($item->subcategory_id == $product->subcategory_id)
                                                    <option value="{{ $item->id }}"
                                                        {{$item->id == $product->subsubcategory_id?'selected':''}}>
                                                        {{ $item->subsubcategory_name_en }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('subsubcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Name En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_name_en }}"
                                                    name="product_name_en" class="form-control" required="">
                                                @error('product_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Name fa <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_name_fa }}"
                                                    name="product_name_fa" class="form-control" required="">
                                                @error('product_name_fa')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                </div> <!-- end 2nd row  -->



                                <div class="row">
                                    <!-- start 3RD row  -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_code }}"
                                                    name="product_code" class="form-control" required="">
                                                @error('product_code')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Quantity <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_qty }}"
                                                    name="product_qty" class="form-control" required="">
                                                @error('product_qty')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Tags En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_tags_en }}"
                                                    name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet"
                                                    data-role="tagsinput" required="">
                                                @error('product_tags_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                </div> <!-- end 3RD row  -->






                                <div class="row">
                                    <!-- start 4th row  -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Tags fa <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_tags_fa }}"
                                                    name="product_tags_fa" class="form-control" value="Lorem,Ipsum,Amet"
                                                    data-role="tagsinput" required="">
                                                @error('product_tags_fa')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Size En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_size_en }}"
                                                    name="product_size_en" class="form-control"
                                                    value="Small,Midium,Large" data-role="tagsinput" required="">
                                                @error('product_size_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Size fa <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_size_fa }}"
                                                    name="product_size_fa" class="form-control"
                                                    value="Small,Midium,Large" data-role="tagsinput" required="">
                                                @error('product_size_fa')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                </div> <!-- end 4th row  -->



                                <div class="row">
                                    <!-- start 5th row  -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Product Color En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_color_en }}"
                                                    name="product_color_en" class="form-control" value="red,Black,Amet"
                                                    data-role="tagsinput" required="">
                                                @error('product_color_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Product Color fa <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->product_color_fa }}"
                                                    name="product_color_fa" class="form-control" value="red,Black,Large"
                                                    data-role="tagsinput" required="">
                                                @error('product_color_fa')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->




                                </div> <!-- end 5th row  -->




                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->selling_price }}"
                                                    name="selling_price" class="form-control" required="">
                                                @error('selling_price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->
                                    <!-- start 6th row  -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $product->discount_price }}"
                                                    name="discount_price" class="form-control">
                                                @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    {{-- <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="product_thambnail" class="form-control"
                                                    onChange="mainThamUrl(this)" required="">
                                                @error('product_thambnail')
                                                <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="" id="mainThmb">
                                </div>
                            </div>


                        </div> <!-- end col md 4 -->


                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Multiple Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg"
                                        required="">
                                    @error('multi_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row" id="preview_img"></div>

                                </div>
                            </div>


                        </div> <!-- end col md 4 --> --}}

                </div> <!-- end 6th row  -->





                <div class="row">
                    <!-- start 7th row  -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <h5>Short Description English <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="short_descp_en" id="textarea" class="form-control" required
                                    placeholder="Textarea text">{{ $product->short_descp_en }}</textarea>
                            </div>
                        </div>

                    </div> <!-- end col md 6 -->

                    <div class="col-md-6">

                        <div class="form-group">
                            <h5>Short Description fadi <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="short_descp_fa" id="textarea" class="form-control" required
                                    placeholder="Textarea text">{{ $product->short_descp_fa }}</textarea>
                            </div>
                        </div>


                    </div> <!-- end col md 6 -->

                </div> <!-- end 7th row  -->





                <div class="row">
                    <!-- start 8th row  -->
                    <div class="col-md-6">

                        <div class="form-group ">
                            <h5>Long Description English <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea id="editor1" name="long_descp_en" rows="10" cols="80" required="">{{ $product->long_descp_en }}

						</textarea>
                            </div>
                        </div>

                    </div> <!-- end col md 6 -->

                    <div class="col-md-6">

                        <div class="form-group">
                            <h5>Long Description fadi <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea id="editor2" name="long_descp_fa" rows="10" cols="80">{{ $product->long_descp_fa }}
						</textarea>
                            </div>
                        </div>


                    </div> <!-- end col md 6 -->

                </div> <!-- end 8th row  -->


                <hr>



                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">

                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                        {{ $product->hot_deals == 1 ? 'checked': ''}} value="1">
                                    <label for="checkbox_2">Hot Deals</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" {{ $product->featured == 1 ? 'checked': ''}}
                                        name="featured" value="1">
                                    <label for="checkbox_3">Featured</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">

                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" {{ $product->special_offer == 1 ? 'checked': ''}}
                                        id="checkbox_4" name="special_offer" value="1">
                                    <label for="checkbox_4">Special Offer</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" {{ $product->special_deals == 1 ? 'checked': ''}}
                                        id="checkbox_5" name="special_deals" value="1">
                                    <label for="checkbox_5">Special Deals</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>









                <div class="text-xs-right">
                    <input type="submit" class="mb-5 btn btn-rounded btn-primary" value="Update Product">
                </div>
                </form>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>

<section class="content">
    <div class="row">

        <div class="col-lg-8">
            <div class="box bt-3 border-primary">
                <div class="box-header">
                    <h4 class="box-title">Product multi image <strong>update</strong></h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        @foreach ($product_images as $img)
                        <div class="col-md-4 col-lg-3 col-12">
                            <div class="bg-secondary card">

                                <img class="card-img-top" src="{{ asset($img->photo_name) }}" alt="">
                                <div class="card-body">
                                    <a class="btn btn-danger" href="{{ route('image.delete',['id'=> $img->id]) }}">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="box bt-3 border-primary">
                <div class="box-header">
                    <h4 class="box-title">Delete image</h4>
                </div>
                <div class="box-header">
                    <div class="">
                        <form action="{{ route('multiImg.update',['id'=> $product->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="multi_img[]" id="multiImg" multiple class="form-control">
                                <div class="p-3 py-2 ">
                                    <div class="row" id="preview_img"></div>
                                </div>
                                <input type="submit" class="btn btn-primary " value="Add Image(s)">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">
                        Update Thumbnail
                    </h4>
                </div>
                <div class="box-body">
                    <div class="card">
                        <img src="{{ asset($product->product_thambnail) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <form action="{{ route("thumbnail.update",['id'=> $product->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control" onchange="mainThamUrl(this)" name="product_thambnail">
                                    <img src="" id="mainThmb" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update thambnail">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            let category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subsubcategory_id"]').empty();
                        $('select[name="subsubcategory_id"]').append
                        (
                            '<option selected value="">Select SubSubCategory</option>'
                        )
                        $('select[name="subcategory_id"]').append('<option selected value="">Select SubCategory</option>')
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subcategory_name_en + '</option>')
                        })

                    }
                })
            }
        })
        $('select[name="subcategory_id"]').on('change',function() {
            console.log('object')
            let subCategory_id = $(this).val();
            console.log("{{ url('/categroy/subsubcategory/ajax')}}/"+subCategory_id)
            if(subCategory_id) {
                $.ajax({
                    url:"{{ url('/category/subsubcategory/ajax')}}/"+subCategory_id,
                    type:"GET",
                    dataType:"json",
                    success: function(data) {
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data,function(key,value) {
                            console.log(value)
                            $('select[name="subsubcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subsubcategory_name_en + '</option>')
                        })
                    }
                })
            }
        })
    })
</script>
<script>
    function mainThamUrl(input) {
        if(input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
     }


    $(document).ready(function(){
        $('#multiImg').on('change', function(){ //on file input change
    console.log("object")
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        var data = $(this)[0].files; //this file data

        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img />').addClass('thumb').attr('src', e.target.result).width(80).css({'border-radius' : 0})
                .height(80); //create image element
                    $('#preview_img').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });

     }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
     }
  });
 });

</script>
@endsection
