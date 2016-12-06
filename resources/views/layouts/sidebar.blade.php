<!-- BEGIN SIDEBAR -->
<div class="page-sidebar " id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">

        <!-- BEGIN SIDEBAR MENU -->
        <p class="menu-title">เลือกเมนูที่ต้องการ <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
        <ul>
            @if(Auth::user()->role=='Administrator')

            <li  class=""  > <a href="/administrator"> <i class="fa fa-user"></i>  <span class="title">จัดการผู้ดูแลระบบ</span></a></li>

            @endif

                @if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
            <li class="start"> <a href="#"> <i class="fa fa-rocket"></i> <span class="title">จัดการหมวดหมู่</span> <span class="selected"></span> </span> </a>
                <ul class="sub-menu">
                    <li > <a href="/administrator/categories"> หมวดหมู่หลัก </a> </li>
                    <li > <a href="/administrator/subcategories"> หมวดหมู่ย่อย </a> </li>

                </ul>
            </li>
                @endif
                @if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
            <li class=""> <a href="/administrator/clients"> <i class="fa fa-user"></i>  <span class="title">จัดการUserลูกค้า</span></a></li>
                @endif
            <li class=""> <a href="/administrator/orders"> <i class="fa fa-suitcase"></i>  <span class="title">จัดการออเดอร์</span></a></li>
                @if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
            <li class=""> <a href="/administrator/products"> <i class="fa fa-heart"></i>  <span class="title">จัดการสินค้า</span></a></li>
            <li class=""> <a href="/administrator/reviews"> <i class="fa fa-comments"></i>  <span class="title"> รีวิว</span></a></li>
                @endif
                @if(Auth::user()->role=='Administrator')
                
                
                  <!--   <li class=""> <a href="/administrator/coupons"> <i class="fa fa-money"></i>  <span class="title">Coupons</span></a></li>              -->
                <li class="start"> <a href="#"> <i class="fa fa-rocket"></i> <span class="title">ระบบจ่ายเงิน</span> <span class="selected"></span> </span> </a>
                <ul class="sub-menu">
                    <li > <a href="/administrator/payments"> Paypal </a> </li>


                </ul>
            </li>
                @endif
            <li class=""> <a href="/administrator/system"> <i class="fa fa-gear"></i>  <span class="title">ตั้งค่า</span></a></li>
            <li class=""> <a href="/administrator/seo"> <i class="fa fa-globe"></i>  <span class="title">Seo</span></a></li>
            <li class=""> <a href="/administrator/auth/logout"> <i class="fa fa-power-off"></i>  <span class="title">ออกจากระบบ</span></a></li>


        </ul>

        <div class="clearfix"></div>
        <!-- END SIDEBAR MENU -->
    </div>
</div>

<div class="footer-widget">
    <div class="progress transparent progress-small no-radius no-margin">
        <div data-percentage="79%" class="progress-bar progress-bar-danger animate-progress-bar" ></div>
    </div>
    <div class="pull-right">
        <div class="details-status"> <span data-animation-duration="560" data-value="100" class="animate-number"></span>% </div>
        <a href="/administrator/auth/logout"><i class="fa fa-power-off"></i></a></div>
</div>

<!-- END SIDEBAR -->