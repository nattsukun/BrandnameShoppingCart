@extends('layouts.master')

@section('extra_css')
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
                    <h4> <span class="semi-bold">Coupons</span></h4>
                    <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>

                </div>

                <div class="grid-body ">
                    <a href="/administrator/create_coupon"> <button class="btn btn-primary"  style="margin-bottom:20px" id="test2">Add Coupon</button></a>
                    <table class="table" id="example3" >
                        <thead>
                        <tr>
                            <th>Coupon Id</th>
                            <th>Coupon Code</th>
                            <th>Coupon Value</th>
                            <th>Delete</th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($coupons as $coupon)

                            <tr class="odd gradeX">
                                <td>{{$coupon->id}}</td>
                                <td>{{$coupon->code}}</td>
                                <td>{{$coupon->value}}</td>
                                <td><a href="/administrator/delete_coupon/{{$coupon->id}}"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>

                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop