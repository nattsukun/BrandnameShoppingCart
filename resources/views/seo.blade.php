@extends('layouts/master')

@section('content')

    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-title no-border">
                <h4>SEO <span class="semi-bold">Settings</span></h4>
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
                <form  action="/administrator/seo" method="post">
                    @if(Session::has('success-msg'))
                        <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="form-label">Keyword</label>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="keyword" value="{{old('keyword',!empty($seo)?$seo->keyword:'')}}" id="form1Name" class="form-control">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="description" value="{{old('description',!empty($seo)?$seo->description:'')}}" id="form1Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Google Analytics Code</label>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <textarea name="google_analytics" class="form-control">{{old('google_analytics',!empty($seo)?$seo->google_analytics:'')}}</textarea>
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