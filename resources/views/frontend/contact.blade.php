@extends('frontend.master')

@section('content')


    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        @if(Session::has('success-msg'))
                            <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                        @endif
                        <form id="main-contact-form" class="contact-form row" name="contact-form" action="/contact" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                            <img src="/assets_frontend/images/home/logo.jpg "  width = "300px" />
                         
                        <address>
                              <p>ฺBrandname Shopping Cart Oinline System</p>
                               <p>Theblygift</p>
                            <p>999/999</p>
                            <p>ประตูน้ำ</p>
                            <p>Mobile: +6655518471</p>
                            <p>Fax: xxxxxxxxx</p>
                            <p>Email: info@e-shop.com</p>
                            <p>สามารถติดต่อเราได้ ช่วงเวลา 9.00-23.00น. โทร 080-000-0000 </p>
                            <p>IG : thebythegiftgift</p>
                             <p>facebook : Pakaporn-Bythe</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                <li>
                                    <a href="#">facebook : Pakaporn-Bythe<i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#contact-page-->


@stop