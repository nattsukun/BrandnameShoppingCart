@extends('layouts/master')

@section('content')

    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-title no-border">
                <h4>Edit <span class="semi-bold">Paypal</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body no-border"> <br>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form  action="/administrator/payments" method="post">
                    @if(Session::has('success-msg'))
                        <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="form-label">Client Id</label>
                        <span class="help">e.g. "client id provided by paypal"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="client_id" value="{{isset($row->client_id)?$row->client_id:''}}" id="form1Name" class="form-control">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Secret</label>
                        <span class="help">e.g. "secret key provided by paypal"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="secret" value="{{isset($row->secret)?$row->secret:''}}" id="form1Email" class="form-control">
                        </div>
                    </div>




                    <div class="form-actions">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Save</button>
                            <button type="button" class="btn btn-white btn-cons">Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>






@stop