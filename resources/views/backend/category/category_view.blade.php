@extends('admin.admin_master')
@section('content')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Data Tables</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Tables</li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xl-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category Icon</th>
                                            <th>Category Name En</th>
                                            <th>Category Name Fa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)

                                            <tr>
                                                <td>
                                                    <span>
                                                        <i class="{{ $category->category_icon }}"></i>
                                                    </span>
                                                </td>

                                                <td>{{ $category->category_name_en }}</td>
                                                <td>{{ $category->category_name_fa }}</td>
                                                <td>
                                                    <a id="delete"  href="{{ route('category.edit', ['id' => $category->id]) }}"
                                                        class="btn btn-info"><i class="fa fa-edit" style="font-size: x-large"></i></a>
                                                    <a  href="{{ route('category.delete', ['id' => $category->id]) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"  style="font-size: x-large"></i></a>
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
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <h5>Category Name English <span class="text-danger">*</span></h5>
                                                <input type="text" name="category_name_en" id="current_password"
                                                    type="password" class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">

                                                @error('brand_name_en')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>Category Name Persian <span class="text-danger">*</span></h5>
                                                <input type="text" name="category_name_fa" id="password" type="password"
                                                    class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">
                                                @error('brand_name_fa')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>Category Icon <span class="text-danger">*</span></h5>
                                                <input type="text" name="category_icon" id="password_confirmation"
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
