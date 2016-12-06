
@extends('frontend.master')



@section('content')

<section>
   
    <div class="container">
        
         
         
          
  <!--slide header -->

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
       <!-- Indicators -->
       <ol class="carousel-indicators">
         <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
         <li data-target="#carousel-example-generic" data-slide-to="1"></li>
         <li data-target="#carousel-example-generic" data-slide-to="2"></li>
       </ol>

       <!-- Wrapper for slides -->
       <div class="carousel-inner" role="listbox" >
           <div class="item active">
             <img src="/assets_frontend/images/home/A1.jpg" alt="1"/>
              <div class="carousel-caption">
                   <h1>THE VALUE YOU DESERVE</h1>
                  <p>descriptioom </p>
           </div>
         </div>

         <div class="item">
             <img src="/assets_frontend/images/home/A2.PNG"" alt="2"/>

           <div class="carousel-caption">
                  <h1>THE VALUE YOU DESERVE</h1>
                  <p>descriptioom </p>
           </div>
         </div>

       <div class="item">
           <img src="/assets_frontend/images/home/A3.jpg"" alt=""/>

            <div class="carousel-caption">
                  <h1>THE VALUE YOU DESERVE</h1>
                  <p>คุณค่าที่คุณคู่ควร </p>
           </div>
         </div>
         
       </div>

       <!-- Controls --><BR>
       <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
       </a>
       <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
       </a>
     </div>
  <div class="fadeout"></div>
  <!-- end slide header -->
       
     
        
        
        
        <div class="row">
            @include('frontend.sidebar')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">All Items</h2>
                    @if(Session::has('success-msg'))
                        <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
                    @endif
                    @if(Session::has('paid-msg'))
                        <p class="alert alert-success">{{ Session::get('paid-msg') }}</p>
                    @endif

                    @foreach ($products as $product)

                    <div class="col-sm-6" >
                        <div class="product-image-wrapper" onclick="location.href='/product_details/{{$product->id}}'">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    @if (sizeof($product->images) > 0)
                                    <img style="width: 300px;height: 300px" src="{{$product->images[0]->image}}" alt="" />
                                    @endif
                                    <h2>{{$product->offer_price}}฿</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="/product/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div><!--features_items-->
                <div class="pull-right">
                    {!! $products->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@stop
