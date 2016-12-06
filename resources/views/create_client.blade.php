@extends('layouts/master')

@section('extra_css')

    <link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>


@stop




@section('content')

    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-title no-border">
                <h4>Add <span class="semi-bold">Client</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body no-border"> <br>
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
                <form  action="/administrator/create_client" method="post">
                    @if(Session::has('success-msg-registered'))
                        <p class="alert alert-success">{{ Session::get('success-msg-registered') }}</p>
                    @endif

                    <div class="form-group">
                        <label class="form-label"> Name</label>
                        <span class="help">e.g. "Jonh Smith"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="name"  value="{{old('name')}}" id="form1Name" class="form-control">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">email</label>
                        <span class="help">e.g. "john@example.com"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="email" value="{{old('email')}}" id="form1Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <span class="help">e.g. "Must be strong"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="password" id="form1Url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <span class="help">e.g. "Must be numeric"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="phone" value="{{old('phone')}}" id="form1Url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">address</label>
                        <span class="help">e.g. "Must be correct"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="address" value="{{old('address')}}" id="form1Url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">zip code</label>
                        <span class="help">e.g. "Must be correct"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="zip" value="{{old('zip')}}" id="form1Url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">city</label>
                        <span class="help">e.g. "Must be correct"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="city" value="{{old('city')}}" id="form1Url" class="form-control">
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-danger btn-cons"><i class="icon-ok"></i> Save</button>
                            <button type="button" class="btn btn-white btn-cons">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>




@stop