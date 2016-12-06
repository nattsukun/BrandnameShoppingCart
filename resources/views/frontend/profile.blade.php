@extends('frontend.master')

@section('extra_js')
<script>
    $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
    //get data-for attribute
    var dataFor = $(this).attr('data-for');
    var idFor = $(dataFor);

    //current button
    var currentButton = $(this);
    idFor.slideToggle(400, function() {
    //Completed slidetoggle
    if(idFor.is(':visible'))
    {
    currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
    }
    else
    {
    currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
    }
    })
    });


    $('[data-toggle="tooltip"]').tooltip();


    });
</script>
@stop

@section('extra_css')
    <style>
    .user-row {
    margin-bottom: 14px;
    }

    .user-row:last-child {
    margin-bottom: 0;
    }

    .dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
    }

    .dropdown-user:hover {
    cursor: pointer;
    }

    .table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
    }

    .table-user-information > tbody > tr:first-child {
    border-top: 0;
    }


    .table-user-information > tbody > tr > td {
    border-top: 0;
    }
    .toppad
    {margin-top:20px;
    }
    </style>

@stop

@section('content')


    <div class="container">
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success-msg'))
                <p class="alert alert-danger">{{ Session::get('success-msg') }}</p>
            @endif
            <h2 class="title text-center">Profile Details</h2>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{Auth::user()->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">


                            <div class=" col-md-12 col-lg-12 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{Auth::user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{Auth::user()->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{Auth::user()->address}}</td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td>Zip code</td>
                                        <td>{{Auth::user()->zip}}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{Auth::user()->city}}</td>
                                    </tr>


                                    </tbody>
                                </table>

                                <a href="/account" class="btn btn-primary">Go to My Account</a>
                                <a href="/" class="btn btn-primary">Go to Shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
   Edit Profile
</button>
                              <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <form action="/edit_client/{{Auth::user()->id}}" method="post">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                                    </div>
                                    <div class="modal-body">


                                            <div class="form-group">
                                                <label class="form-label"> Name</label>
                                                <span class="help">e.g. "Jonh Smith"</span>
                                                <div class="input-with-icon  right">
                                                    <i class=""></i>
                                                    <input type="text" name="name"  value="{{Auth::user()->name}}" id="form1Name" class="form-control">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"> email</label>
                                                <span class="help">e.g. "john@example.com"</span>
                                                <div class="input-with-icon  right">
                                                    <i class=""></i>
                                                    <input type="text" name="email"  value="{{Auth::user()->email}}" id="form1Email" class="form-control">
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
                                                    <input type="text" name="phone"  value="{{Auth::user()->phone}}" id="form1Url" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">address</label>
                                                <span class="help">e.g. "Must be correct"</span>
                                                <div class="input-with-icon  right">
                                                    <i class=""></i>
                                                    <input type="text" name="address"  value="{{Auth::user()->address}}" id="form1Url" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">zip code</label>
                                                <span class="help">e.g. "Must be correct"</span>
                                                <div class="input-with-icon  right">
                                                    <i class=""></i>
                                                    <input type="text" name="zip"  value="{{Auth::user()->zip}}" id="form1Url" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">city</label>
                                                <span class="help">e.g. "Must be correct"</span>
                                                <div class="input-with-icon  right">
                                                    <i class=""></i>
                                                    <input type="text" name="city"  value="{{Auth::user()->city}}" id="form1Url" class="form-control">
                                                </div>
                                            </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop
