@extends('layouts/master')

@section('extra_css')

    <link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>

@stop

@section('extra_js')

    <script src="/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>

@stop


@section('content')

    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-title no-border">
                <h4>Add <span class="semi-bold">Product</span></h4>
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
                <form  action="/administrator/create_product" method="post" enctype="multipart/form-data">
                    @if(Session::has('success-msg'))
                        <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                    @endif
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <span class="help">e.g. "Moto x"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="name" value="{{old('name')}}" id="form1Name" class="form-control">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="category" value="{{old('category')}}">
                            @foreach($categories as $category)

                                <option value="{{$category->name}}" >{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Subcategory</label>
                        <select class="form-control" name="subcategory" value="{{old('subcategory')}}">
                            @foreach($subcategories as $subcategory)

                                <option value="{{$subcategory->name}}" >{{$subcategory->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Price</label>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="price" value="{{old('price')}}" id="form1Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Offer Price</label>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <input type="text" name="offer_price" value="{{old('offer_price')}}" id="form1Name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Images</label>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                           <input style="border-style: none" type="file" name="image[]" multiple>
                        </div>
                    </div>


                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="input-with-icon  right">
                                <i class=""></i>
                                <select id="source" name="status" style="width:100%">
                                    <optgroup label="Status">
                                        <option value="Active">Active</option>
                                        <option value="InActive">InActive</option>
                                    </optgroup>
                                    </select>
                            </div>
                        </div>



                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <span class="help">e.g. "About Product"</span>
                        <div class="input-with-icon  right">
                            <i class=""></i>
                            <textarea rows="8" cols="100" name="description" value="{{old('description')}}">

</textarea>
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