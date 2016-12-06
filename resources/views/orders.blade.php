@extends('layouts.master')

@section('extra_css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>

@stop

@section('extra_js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
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
                    <h4> <span class="semi-bold">Orders</span></h4>
                    <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>

                </div>

                <div class="grid-body ">

                    <table class="table" id="example3" >
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Client</th>
                            <th>Total</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>zip</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr class="odd gradeX">
                            <td>{{$order->product}}</td>
                            <td>{{$order->client}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->zip}}</td>
                            <td>{{$order->city}}</td>
                                <td>
                                    <form action="/administrator/order/update/{{$order->id}}" method="post">
                                    <div class="form-group">
                                <label class="form-label">{{$order->status}}</label>
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <select id="source" name="status" style="width:100%">
                                        <optgroup label="Status">
                                            <option value="Processing">Processing</option>
                                            <option value="Processed">Processed</option>
                                            <option value="Shipping">Shipping</option>
                                            <option value="Delivered">Delivered</option>

                                        </optgroup>
                                    </select>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Update</button>
                                </div></div></form></td>
                            <td><a href="/administrator/orders/{{$order->id}}"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>

                        </tr>
@endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop