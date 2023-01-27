 <div class="sidebar-widget outer-bottom-small wow fadeInUp">
      <h3 class="section-title">Special Deals</h3>
      <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            @php

            $spetialOfferProducts=App\Models\Product::where('specialdeals',1)->limit(9)->get();
    $i=0;
            @endphp

@foreach ( $spetialOfferProducts as $product)

@if ($i %3 ==0)
            <div class="item">
            <div class="products special-product">

@php
$x=0; @endphp
@endif


@php
    $i++;
@endphp

<div class="product">
    <div class="product-micro">
      <div class="row product-micro-row">
        <div class="col col-xs-5">
          <div class="product-image">
            <div class="image"> <a href="{{route('product.details',$product->id)}}"> <img src="backend/admin/productimages/{{$product->product_thambnail}}"  alt=""> </a> </div>
            <!-- /.image -->

          </div>
          <!-- /.product-image -->
        </div>
        <!-- /.col -->
        <div class="col col-xs-7">
          <div class="product-info">
            <h3 class="name"><a href="{{route('product.details',$product->id)}}">{{$product->name_english}}</a></h3>
            <div class="rating rateit-small"></div>
            <div class="product-price"> <span class="price"> ${{$product->selling_price}} </span> </div>
            <!-- /.product-price -->

          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.product-micro-row -->
    </div>
    <!-- /.product-micro -->

  </div>




              @if ($i %3 ==0)
              @php
                  $x=1;
              @endphp
                    </div>
                  </div>

              @endif

              @endforeach
                  @if($x==0)  </div></div>@endif

                  <!-- /.sidebar-widget-body -->
                </div>
              </div>
              </div>
