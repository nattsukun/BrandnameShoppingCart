@extends('layouts.master')

@section('extra_css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>


@stop

@section('extra_js')


    <script src="/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
    <script src="/assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript" ></script>
    <script type="text/javascript" src="/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script src="/assets/js/datatables.js" type="text/javascript"></script>



@stop

@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4> <span class="semi-bold">Products</span></h4>
                    <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>

                </div>

                <div class="grid-body ">
                    <a href="/administrator/create_product"> <button class="btn btn-success"  style="margin-bottom:20px" id="test2">Add Product</button></a>

                    <table class="table" id="example3" >
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Offer</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                        <tr class="odd gradeX">
                            <td>{{$product->name}}</td>

                            @if (sizeof($product->images) > 0)
                            <td><img style="width:100px;" src="{{$product->images[0]->image}}" data-img="{{$product->images[0]->image}}" alt="" class="superbox-img"></td>
                            @endif

                             <td>{{$product->price}}</td>
                            <td>{{$product->offer_price}}</td>
                            <td>{{$product->category}}</td>
                            @if($product->status=='InActive')
                                <td>InActive</td>
                            @else
                                <td>Active</td>
                            @endif
                            <td><a href="/administrator/edit_product/{{$product->id}}"> <button type="button" class="btn btn-success btn-sm">Edit</button></a></td>
                            <td><a href="/administrator/delete_product/{{$product->id}}"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>

                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop