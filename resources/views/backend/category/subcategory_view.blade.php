@extends('admin.admin_master')
@section('content')

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xl-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category </th>
                                            <th>SubCategory Name En</th>
                                            <th>SubCategory Name Fa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subCategories as $subCategory)

                                            <tr>
                                                <td>
                                                    {{ $subCategory->category->category_name_en }}
                                                </td>

                                                <td>{{ $subCategory->subcategory_name_en }}</td>
                                                <td>{{ $subCategory->subcategory_name_fa }}</td>
                                                <td>
                                                    <a id="delete"
                                                        href="{{ route('subcategory.edit', ['id' => $subCategory->id]) }}"
                                                        class="btn btn-info"><i class="fa fa-edit"
                                                            style="font-size: x-large"></i></a>
                                                    <a href="{{ route('subcategory.delete', ['id' => $subCategory->id]) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            style="font-size: x-large"></i></a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('subcategory.store') }}">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <h5>Categroy Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select  id="select" name="category_id" 
                                                        class="form-control form-control-lg " aria-invalid="false">
                                                        <option value="">Select Your City</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">
                                                                {{ $category->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>SubCategory Name English <span class="text-danger">*</span></h5>
                                                <input type="text" name="subcategory_name_en" id="current_password"
                                                    type="password" class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">

                                                @error('subcategory_name_en')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>SubCategory Name Persian <span class="text-danger">*</span></h5>
                                                <input type="text" name="subcategory_name_fa" id="password" type="password"
                                                    class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">
                                                @error('subcategory_name_fa')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
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

@endsection
