@extends('admin.admin_master')
@section('content')
    <div class="container-full">

        <!-- Main content -->
        <section class="content col-lg-5 col-md-8 col-sm-10 col-12 justify-content-center">
            <div class="row">

                <section class="content col-12">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Admin Change Password</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="{{ url('update/change/password') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="form-group col-md-12 ">
                                                        <h5>Current Password <span class="text-danger">*</span></h5>
                                                        <input type="password" name="old_password" id="current_password"
                                                            type="password" class="form-control "
                                                            data-validation-required-message="This field is required"
                                                            aria-invalid="false">
                                                        @if (session('validate_message'))
                                                            <div class="text-danger">{{ session('validate_message') }}</div>
                                                        @endif
                                                        @error('old_password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12 ">
                                                        <h5>New Password <span class="text-danger">*</span></h5>
                                                        <input type="password" name="password" id="password" type="password"
                                                            class="form-control "
                                                            data-validation-required-message="This field is required"
                                                            aria-invalid="false">
                                                        @error('password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                                        <input type="password" name="password_confirmation"
                                                            id="password_confirmation" type="password" class="form-control "
                                                            data-validation-required-message="This field is required"
                                                            aria-invalid="false">
                                                        @error('password_confirmation')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>



                                                </div>
                                                <div class="text-xs-right">
                                                    <button type="submit" class="btn btn-rounded btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
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
    </div>
    </section>
    <!-- /.content -->
    </div>
@endsection
