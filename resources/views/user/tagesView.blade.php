
<!-- ============================================== HEADER ============================================== -->
@extends('user.master')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->

<!-- ====== === HEADER : END === ========== -->


















<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="{{route('home')}}">Home</a></li>
        <li class='active'>{{$tag}}</li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'>
        <!-- ================================== TOP NAVIGATION ================================== -->

            @include('user.body.categories')
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter">
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->




            <!-- ============================================== COMPARE============================================== -->
            <div class="sidebar-widget wow fadeInUp outer-top-vs">
              <h3 class="section-title">Compare products</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
                <!-- /.compare-report -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== COMPARE: END ============================================== -->
            <!-- ============================================== PRODUCT TAGS ============================================== -->
           @include('user.body.ProductTags')
            <!-- /.sidebar-widget -->
          <!----------- Testimonials------------->
            @include('user.body.Testimonials')

            <!-- ============================================== Testimonials: END ============================================== -->

            <div class="home-banner"> <img src="/frontend/assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
          </div>
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'>
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="/frontend/assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
              </div>
              <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
          </div>
        </div>


        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">

              <!-- /.col -->

              <!-- /.col -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">

                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">

                  <!-- /.item -->


 @foreach ($products as $product)



                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{route('product.details',$product->id)}}"> <img src="/backend/admin/productimages/{{$product->product_thambnail}}"  alt=""></a> </div>
                          <!-- /.image -->
                            @if(($product->discount_price - $product->selling_price) != 0 )
                          <div class="tag sale"><span> sale </span></div>
                            @endif
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{route('product.details',$product->id)}}">{{$product->name_english}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> ${{$product->discount_price}} </span>

                            <span class="price-before-discount">${{$product->selling_price}}</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->

                    </div>
                    <!-- /.products -->
                  </div>


@endforeach




                  <!-- /.item -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.category-product -->

            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane "  id="list-container">
              <div class="category-product">


 @foreach ($products as $product)



                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image">  <a href="{{route('product.details',$product->id)}}"> <img src="/backend/admin/productimages/{{$product->product_thambnail}}"  alt=""> </a></div>
                            @if( $product->created_at->diffInHours(\Carbon\Carbon::now())< 120 )
                            <div class="tag new"><span>new</span></div>
                            @endif
                        </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="detail.html">@if(session()->get('language')==('Arabic')) {{$product->name_arabic}} @else {{$product->name_english}} @endif</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> ${{$product->discount_price}} </span> <span class="price-before-discount"> ${{$product->selling_price}} </span> </div>
                            <!-- /.product-price -->
                            <div class="description m-t-10">

                                @if(session()->get('language')==('Arabic'))
                                {{$product->short_description_arabic}}
                                @else
                                {{$product->short_description_english}}
                                @endif

                            </div>
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                </ul>
                              </div>
                              <!-- /.action -->
                            </div>
                            <!-- /.cart -->

                          </div>
                          <!-- /.product-info -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-list-row -->




                    </div>
                    <!-- /.product-list -->
                  </div>
                  <!-- /.products -->
                </div>
                <!-- /.category-product-inner -->



@endforeach


              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                 {{$products->links()}}
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right -->

          </div>
          <!-- /.filters-container -->

        </div>
        <!-- /.search-result-container -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand1.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand2.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand3.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand4.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand5.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand6.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand2.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand4.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand1.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="/frontend/assets/images/brands/brand5.png" src="/frontend/assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
      </div>
      <!-- /.logo-slider-inner -->

    </div>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
  <!-- /.container -->

</div>
<!-- /.body-content -->













@endsection
