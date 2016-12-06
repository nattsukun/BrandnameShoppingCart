
@if(isset($system))

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->

        <div class="container">
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> {{$system->tel}}</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> {{$system->email}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/assets_frontend/images/home/ShoppingCartred.png" alt=""  width="37"/></a>
                    </div>
                    
                  
                    
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/profile"><i class="fa fa-user" ></i> Profile</a></li>
                            <li><a href="/account"><i class="fa fa-lock"></i> Account</a></li>
                            <li><a href="/cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if(Auth::check())
                            <li><a href="/logout"><i class="fa fa-key"></i> Logout</a></li>
                                @else
                                <li><a href="/login"><i class="fa fa-key"></i> Login</a></li>
@endif
                        </ul>


                </div>

            </div>
        </div>
      
    </div><!--/header-middle-->




        </div><!--/.navbar-collapse -->
      </div>
    
      
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Home</a></li>


                            <li><a href="/cart">Cart</a></li>


                            @if(Auth::check())
                                <li><a href="/logout"><i></i> Logout</a></li>
                            @else
                                <li><a href="/login"><i></i> Login</a></li>
                            @endif




                            <li><a href="/contact">Contact</a></li>
                        </ul>

                    </div>
                    <div class="col-lg-4 pull-right" >
                        <form action="/" method="post">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for...">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>



      </span>
                        </div><!-- /input-group -->
                        </form>
                    </div><!-- /.col-lg-6 -->
                </div>


                </div>


            </div>


        </div>

    </div>

</header>

    @endif