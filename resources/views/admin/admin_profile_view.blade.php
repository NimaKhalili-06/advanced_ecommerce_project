@extends('admin.admin_master')
@section('content')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black"
                        style="background: url('../images/gallery/full/10.jpg') center center;">
                        <h3 class="widget-user-username">{{ $adminData->name }}</h3>
                        <h6 class="widget-user-desc">{{ $adminData->email }}</h6>
                    </div>
                    <div class="widget-user-image">
                        <img class="rounded-circle"
                            src="{{ isset($adminData->profile_photo_path) ? asset($adminData->profile_photo_path) : asset('backend/images/150x100.png') }}"
                            alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">12K</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 br-1 bl-1">
                                <div class="description-block">
                                    <h5 class="description-header">550</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">158</h5>
                                    <span class="description-text">TWEETS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <br>
                    <div class="justify-content-center "
                        style="text-align: center;padding:0% 30%;border-top:1px solid rgba(255, 255, 255, 0.12)">
                        <a class="btn btn-primary my-3 " href="{{ url('admin/profile/edit') }}" style="width: 50%;">Edit
                            profile</a>
                    </div>
                </div>






            </div>
        </section>
        <!-- /.content -->
    </div>
   
@endsection
