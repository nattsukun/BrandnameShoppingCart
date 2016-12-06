@extends('layouts/master')

@section('content')

    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-title no-border">
                <h4>System <span class="semi-bold">Settings</span></h4>
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
                <form  action="/administrator/system" method="post">
                    @if(Session::has('success-msg'))
                        <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="form-label">Shop Title</label>
                        <span class="help">e.g. "Title of your shop"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="title" value="{{old('title',!empty($system)?$system->title:'')}}" id="form1Name" class="form-control">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Shop URL</label>
                        <span class="help">e.g. "website URL"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="url" value="{{old('url',!empty($system)?$system->url:'')}}" id="form1Email" class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">System Email</label>
                        <span class="help">e.g. "shop@eshop.com"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="email" value="{{old('email',!empty($system)?$system->email:'')}}" id="form1Email" class="form-control">
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="form-label">System telephone</label>
                        <span class="help">e.g. "0800008000"</span> 
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="tel" value="{{old('tel',!empty($system)?$system->tel:'')}}" id="tel" class="form-control">
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




@stop