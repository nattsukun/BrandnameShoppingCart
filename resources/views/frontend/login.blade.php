@extends('frontend.master')


@section('content')

    <section id="form"><!--form-->
    
    
    
        <div class="container">
             <div class="tiles grey p-t-20 p-b-20 text-black">
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
                    @if(Session::has('error_msg'))
                        <p class="alert alert-danger">{{ Session::get('error_msg') }}</p>
                    @endif
                <form id="frm_login" class="animated fadeIn" action="/login" method="post">
        <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="col-md-6 col-sm-6 ">
                            <input id="login_username" name="email" type="text"  class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input id="login_pass" type="password" name="password"  class="form-control" placeholder="Enter Password">
                        </div>
                   
                      
                    </div>
                    <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="control-group  col-md-3">
                            <div class="checkbox checkbox check-success"> 
                             
                                <input type="checkbox" id="checkbox1" value="1">
                                <label for="checkbox1">จำฉันไว้ในระบบ </label>
                              <br>
                                <button type="submit" class="btn btn-primary" >Login</button>    
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Reset password</button>
                                   
                            </div>
                        </div>    
                    </div>
                </form>

                    </div>
                    
                    
                    
                
                    
                    
                    
                    
                    
                    <!--/login form-->
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="/password/email" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Forget Password?</h4>
                                </div>
                                <div class="modal-body">


                                        @if(Session::has('success-msg'))
                                            <p class="alert alert-danger">{{ Session::get('success-msg') }}</p>
                                        @endif
                                            <div class="input-group input-group-md">
                                                <span class="input-group-addon" id="sizing-addon1">@</span>
                                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
                                            </div>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                                    </form>

                            </div>
                        </div>
                    </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="/register" method="post">
                            @if(Session::has('success-msg-registered'))
                                <p class="alert alert-success">{{ Session::get('success-msg-registered') }}</p>
                            @endif
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Name"/>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="email"name="email" value="{{old('email')}}" placeholder="Email Address"/>
                            <input type="password" name="password" placeholder="Password"/>
                            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone"/>
                            <input type="text" name="address" value="{{old('address')}}" placeholder="Address"/>
                            <input type="text" name="zip" value="{{old('zip')}}" placeholder="Zip Code"/>
                            <input type="text" name="city" value="{{old('city')}}" placeholder="City"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->




@stop