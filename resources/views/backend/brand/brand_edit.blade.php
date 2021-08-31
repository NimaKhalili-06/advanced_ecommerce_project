@extends('admin.admin_master')


@section('content')
    <div class="container-full">

        <section class="content">
            <div class="row justify-content-center">

                <div class="col-xl-4 col-md-10 col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('brand.update',['id' => $brand->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <h5>Brand Name English <span class="text-danger">*</span></h5>
                                                <input type="text" name="brand_name_en"
                                                    value="{{ $brand->brand_name_en }}" id="current_password"
                                                    type="password" class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">

                                                @error('brand_name_en')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>Brand Name Persian <span class="text-danger">*</span></h5>
                                                <input type="text" name="brand_name_fa"
                                                    value="{{ $brand->brand_name_fa }}" id="password" type="password"
                                                    class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">
                                                @error('brand_name_fa')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                                <input type="file" name="brand_image" id="password_confirmation"
                                                    type="password" class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">
                                                @error('brand_image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="text-xs-right pt-4 ">
                                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Brand">
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
