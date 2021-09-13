@extends('admin.admin_master')
@section('content')

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product En</th>
                                        <th>Product Price</th>
                                        <th>Quentity</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)

                                    <tr>
                                        <td>
                                            <img src="{{ asset($product->product_thambnail) }}"
                                                style="width: 60px;height: 50px" alt="">
                                        </td>

                                        <td>{{ $product->product_name_en }}</td>
                                        <td>{{ $product->selling_price }}$</td>
                                        <td>{{ $product->product_qty }} Pic</td>
                                        <td>
                                            <span class="badge badge-pill badge-danger">
                                                @if($product->discount_price == NULL)
                                                No discount
                                                @else
                                                {{ round($product->discount_price/$product->selling_price*100) }}%
                                                @endif
                                            </span>
                                        </td>
                                        <td><span
                                                class="badge badge-pill {{ $product->status==1? 'badge-success': 'badge-danger'}}">{{ $product->status==1?'Active':'Inactive' }}</span>
                                        </td>

                                        <td width="30%">
                                            <a id="delete" href="{{ route('product.edit', ['id' => $product->id]) }}"
                                                class="btn btn-info"><i class="fa fa-edit"
                                                    style="font-size: x-large"></i></a>
                                            <a href="{{ route('product.delete', ['id' => $product->id]) }}"
                                                class="btn btn-danger"><i class="fa fa-trash"
                                                    style="font-size: x-large"></i></a>
                                            @if ($product->status==1)
                                            <a href="{{ route('product.inactive', ['id' => $product->id]) }}"
                                                class="btn btn-danger"><i title="inactive product"
                                                    class="fa fa-arrow-down" style="font-size: x-large"></i></a>
                                            @else
                                            <a href="{{ route('product.active', ['id' => $product->id]) }}"
                                                class="btn btn-success"><i title="active product" class="fa fa-arrow-up"
                                                    style="font-size: x-large"></i></a>
                                            @endif
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