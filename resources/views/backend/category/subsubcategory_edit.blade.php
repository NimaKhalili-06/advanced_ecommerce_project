@extends('admin.admin_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <!-- /.col -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            <div class="table-responsive">
                                <form method="POST"
                                    action="{{ route('subsubcategory.update' , ['id' => $subSubCategory->id]) }}">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <h5>Categroy Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select id="select" name="category_id"
                                                        class="form-control form-control-lg " aria-invalid="false">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option
                                                                {{ $category->id == $subSubCategory->category_id ? 'selected' : '' }}
                                                                value="{{ $category->id }}">
                                                                {{ $category->category_name_en }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>SubCategroy Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select id="select" name="subcategory_id"
                                                        class="form-control form-control-lg " aria-invalid="false">
                                                        <option value="">Select SubCategory</option>

                                                    </select>
                                                    @error('subcategory_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-12">
                                                <h5>SubSubCategory Name English <span class="text-danger">*</span></h5>
                                                <input type="text" value="{{ $subSubCategory->subsubcategory_name_en }}"
                                                    name="subsubcategory_name_en" id="current_password" type="password"
                                                    class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">

                                                @error('subsubcategory_name_en')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>SubSubCategory Name Persian <span class="text-danger">*</span></h5>
                                                <input type="text" name="subsubcategory_name_fa" id="password"
                                                    type="password" value="{{ $subSubCategory->subsubcategory_name_fa }}"
                                                    class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">
                                                @error('subsubcategory_name_fa')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="text-xs-right pt-4 ">
                                                <input type="submit" class="btn btn-rounded btn-info"
                                                    value="Edit SubSubCategory">
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
    <!-- /.box-body -->
    </div>
    <!-- /.box -->


    <!-- /.box -->
    </div>
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>
    <script>
        let category_id = $('select[name="category_id"]').val();
        if (category_id) {
            $.ajax({
                url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="subcategory_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subcategory_id"]').append(
                            '<option value="' + value.id + '">' + value
                            .subcategory_name_en + '</option>')
                    })
                }
            })
        }
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                let category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>')
                            })
                        }
                    })
                }
            })
        })
    </script>
@endsection
