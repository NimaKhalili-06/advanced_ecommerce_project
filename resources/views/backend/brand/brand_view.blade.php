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

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Brand Name En</th>
                                            <th>Brand Name Fa</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)

                                            <tr>
                                                <td>{{ $brand->brand_name_en }}</td>
                                                <td>{{ $brand->brand_name_fa }}</td>
                                                <td><img src="{{ $brand->brand_image }}" style="width: 70px;height: 40px;"
                                                        alt=""></td>
                                                <td>
                                                    <a href="" class="btn btn-info">Edit</a>
                                                    <a href=""
                                                        class="btn btn-danger">Delete</a>{{ $brand->brand_name_en }}
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
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('brand.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                            <div class="row">
<div class="form-group col-12">
                                            <h5>Brand Name English <span class="text-danger">*</span></h5>
                                            <input type="text" name="brnad_name_en" id="current_password" type="password"
                                                class="form-control "
                                                data-validation-required-message="This field is required"
                                                aria-invalid="false">
                                            @if (session('validate_message'))
                                                <div class="text-danger">{{ session('validate_message') }}
                                                </div>
                                            @endif
                                            @error('old_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                            <div class="form-group col-12">
                                                <h5>Brand Name Persian <span class="text-danger">*</span></h5>
                                                <input type="text" name="brand_name_fa" id="password" type="password"
                                                    class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                                <input type="file" name="brand_image"
                                                    id="password_confirmation" type="password" class="form-control "
                                                    data-validation-required-message="This field is required"
                                                    aria-invalid="false">
                                                @error('password_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="text-xs-right pt-4 ">
                                                    <button type="submit" class="btn btn-rounded btn-info">Update</button>
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
