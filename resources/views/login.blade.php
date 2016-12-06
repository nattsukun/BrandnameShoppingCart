<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Brandname SC OS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/magic_space.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
    <!-- END CSS TEMPLATE -->
    
    
      <!--  CSS new Login TEMPLATE -->
    <style type="text/css">
body { 
 background: url('/assets/example/bg_suburb.jpg') no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}

.panel-default {
 opacity: 0.9;
 margin-top:30px;
}
.form-group.last {
 margin-bottom:0px;
}
</style>
   <!--  CSS new Login TEMPLATE -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top lazy" style="background-image: url('/assets/img/loginadmin2.jpg')">
<div class="container">
    
    <div class="row login-container animated fadeInUp">
      <div class="col-md-3">
         <img src="<?php echo asset('./assets/img/LOGINADMIN.jpg'); ?> " width="320px" hight="450">
         </div>
        <div class="col-md-7 col-md-offset-2 tiles white no-padding">
            
            <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
   
                <h2 class="normal">Sign in to   Brandname SC OS Admin
                </h2>
                <p>สำหรับ Adminเท่านั้น <br></p>
              
            </div>
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
                <form id="frm_login" class="animated fadeIn" action="/administrator/auth/login" method="post">

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="col-md-6 col-sm-6 ">
                            <input id="login_username" name="email" type="text"  class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input id="login_pass" type="password" name="password"  class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">เลือกประเภทAdmin</label>
                            <select class="form-control" name="role">

                                <option value="Administrator" >Administrator</option>
                                
                            <!-- close to only admin role
                                  <option value="Manager" >Manager</option>
                                <option value="Accountant" >Accountant</option>
                                -->

                            </select>
                        </div>
                    </div>
                    <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="control-group  col-md-12">
                            <div class="checkbox checkbox check-success"> 
                             
                                <input type="checkbox" id="checkbox1" value="1">
                                <label for="checkbox1">จำฉันไว้ในระบบ </label>
                                <button type="submit"  class="btn btn-success btn-cons pull-right" id="login_toggle">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




    </div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="/assets/js/login_v2.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>



</html>