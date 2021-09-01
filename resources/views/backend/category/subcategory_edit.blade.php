 @extends('admin.admin_master')


@section('content')
    <div class="container-full">

        <section class="content">
            <div class="row justify-content-center">

                <div class="col-xl-4 col-md-10 col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('subcategory.update',['id'=> $subCategory->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <h5>Categroy Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select id="select" name="category_id"
                                                        class="form-control form-control-lg " aria-invalid="false">
                                                        <option value="">Select Your City</option>
                                                        @foreach ($categories as $category)
                                                            <option {{$category->id == $subCategory->category_id ? "selected": ""}} value="{{ $category->id }}">
                                                                {{ $category->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                <h5>SubCategory Name English <span class="text-danger">*</span></h5>
                                                <input type="text" name="subcategory_name_en"
                                                    value="{{ $subCategory->subcategory_name_en }}" id="current_password"
                                                    type="password" class="form-control"
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">

                                                @error('subcategory_name_en')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>Subcategory Name Persian <span class="text-danger">*</span></h5>
                                                <input type="text" name="subcategory_name_fa"
                                                    value="{{ $subCategory->subcategory_name_fa }}" id="password"
                                                    type="password" class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">
                                                @error('subcategory_name_fa')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <div class="text-xs-right pt-4 ">
                                                    <input type="submit" class="btn btn-rounded btn-info"
                                                        value="Add Category">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
