@extends('user.master')
@section('content')







 <!-- ===== ======== HEADER : END ============================================== -->

    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">

@if(session()->get('language')==('Arabic'))

<li><a href="{{route('home')}}">الصفحة الرئيسية </a></li>
/

                <li><a href="#">  {{$product['subsubcategory']['name_arabic'] }} </a></li>
                /

                <li class='active'>{{$product->name_arabic}}</li>
@else
                <li><a href="{{route('home')}}">Home</a></li>
/

                <li><a href="#">  {{$product['subsubcategory']['name_english'] }} </a></li>
                /

                <li class='active'>{{$product->name_english}}</li>
@endif
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                <div class="home-banner outer-top-n">
<img src="/frontend/assets/images/banners/LHS-banner.jpg" alt="Image">
</div>



        <!-- ============================================== HOT DEALS ============================================== -->
@include('user.body.hotDeals')
<!-- ============================================== HOT DEALS: END ============================================== -->

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
    <h3 class="section-title">Newsletters</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <p>Sign Up for Our Newsletter!</p>
        <form>
             <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
            <button class="btn btn-primary">Subscribe</button>
        </form>
    </div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="/frontend/assets/images/testimonials/member1.png" alt="Image"></div>
        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
        <div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
             <div class="avatar"><img src="/frontend/assets/images/testimonials/member3.png" alt="Image"></div>
        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
        <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="/frontend/assets/images/testimonials/member2.png" alt="Image"></div>
        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
        <div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

    </div><!-- /.owl-carousel -->
</div>

<!-- ============================================== Testimonials: END ============================================== -->



                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
            <div class="detail-block">
                <div class="row  wow fadeInUp">

                         <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">






        <div id="owl-single-product">
            <div class="single-product-gallery-item" id="slide{{$product->id}}">
                <a data-lightbox="image-1" data-title="Gallery" href="/backend/admin/productimages/{{$product->product_thambnail }}">
                    <img class="img-responsive" alt="" src="/backend/admin/productimages/{{$product->product_thambnail }}" data-echo="/backend/admin/productimages/{{$product->product_thambnail }}"/>
                </a>
            </div><!-- /.single-product-gallery-item -->

            @foreach ($multiimages as $img)
            <div class="single-product-gallery-item" id="slide{{$img->id}}">
                <a data-lightbox="image-1" data-title="Gallery" href="/backend/admin/multi-image/{{$img->PhotoName }}">
                    <img class="img-responsive" alt="" src="/backend/admin/multi-image/{{$img->PhotoName }}" data-echo="/backend/admin/multi-image/{{$img->PhotoName }}"/>
                </a>
            </div><!-- /.single-product-gallery-item -->

 @endforeach

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">

                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$product->id}}">
                        <img class="img-responsive" width="85" alt="" src="/backend/admin/productimages/{{$product->product_thambnail }}" data-echo="/backend/admin/productimages/{{$product->product_thambnail }}" />
                    </a>
                </div>

                @foreach ($multiimages as $img)

                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$img->id}}">
                        <img class="img-responsive" width="85" alt="" src="/backend/admin/multi-image/{{$img->PhotoName }}" data-echo="/backend/admin/multi-image/{{$img->PhotoName }}" />
                    </a>
                </div>

                @endforeach

            </div><!-- /#owl-single-product-thumbnails -->



        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->
                    <div class='col-sm-6 col-md-7 product-info-block'>
                        <div class="product-info">
                            <h1 class="name">@if (session()->get('language')=="Arabic") {{$product->name_arabic}}  @else {{$product->name_english}}@endif</h1>

                            <div class="rating-reviews m-t-20">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="rating rateit-small"></div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="reviews">
                                            <a href="#" class="lnk">(13 Reviews)</a>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.rating-reviews -->

                            <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="stock-box">
                                            <span class="label">@if (session()->get('language')=="Arabic")  التوافر  @else Availability @endif:</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="stock-box">
                                            <span class="value">@if (session()->get('language')=="Arabic")  في المخزن @else In Stock @endif</span>
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.stock-container -->

                            <div class="description-container m-t-20">
                                @if (session()->get('language')=="Arabic") {{$product->short_description_arabic}}    @else  {{$product->short_description_english}}     @endif                       </div><!-- /.description-container -->

                            <div class="price-container info-container m-t-20">
                                <div class="row">


                                    <div class="col-sm-4">
                                        <div class="price-box">
                                            <span class="price">$  {{$product->discount_price}}  </span>
                                            <span class="price-strike">$  {{$product->selling_price}}  </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="favorite-button m-t-10">
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                               <i class="fa fa-signal"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div><!-- /.row -->
                            </div><!-- /.price-container -->




                            @php
                            $color_en = $product->color_english;
                            $product_colors_en = explode(','  , $color_en);

                            $color_ar = $product->color_arabic;
                            $product_colors_ar = explode(',', $color_ar);


                            $size_en = $product->size_english;
                            $product_sizes_en = explode(',' , $size_en);

                            $size_ar = $product->size_arabic;
                            $product_sizes_ar = explode(',', $size_ar);

                            @endphp



                            <div class="quantity-container info-container">
                                <div class="row">



                                    <div class="col-sm-4">
                                <div class="form-group">

                                    @if ($product->color_english ==null)

                                    @else

                                    <label class="info-title control-label">choose color <span>*</span></label>
                                    <select class="form-control unicase-form-control selectpicker" id="color">
                                        @if(session()->get('language')=='Arabic'))
                                        @foreach ($product_colors_ar as $product_color_ar)
                                        <option>{{$product_color_ar}}</option>
                                        @endforeach



                                        @else
                                        @foreach ($product_colors_en as $product_color_en)
                                        <option>{{$product_color_en}}</option>
                                        @endforeach

                                        @endif



                                    </select>
                                    @endif
                                </div>
                            </div>



@if ($product->size_english==null)
@else


                            <div class="col-sm-4">
                                <div class="form-group">

                                    <label class="info-title control-label">choose size <span>*</span></label>
                                    <select class="form-control unicase-form-control selectpicker" id ="size">

                                        @if(session()->get('language')=='Arabic'))
                                        @foreach ($product_sizes_ar as $product_size_ar)
                                        <option>{{$product_size_ar}}</option>
                                        @endforeach
                                        @else


                                        @foreach ($product_sizes_en as $product_size_en)
                                        <option>{{$product_size_en}}</option>
                                        @endforeach

                                        @endif




                                    </select>
                                </div>
                            </div>

 @endif



                                </div></div>

                            <div class="quantity-container info-container">
                                <div class="row">


                                    <div class="col-sm-2">
                                        <span class="label" >@if(session()->get('language')=="Arabic") الكمية @else  Qty @endif  :</span>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="cart-quantity">
                                            <div class="quant-input">
                                                <div class="arrows">
                                                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                </div>
                                                <input type="text" value="1" id ="quantity" min="1">
                                          </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> @if(session()->get('language')=="Arabic") اضف للعربة @else  Add to cart @endif</button>

                                    </div>


                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->




<input type="hidden" id="product_id" value="{{$product->id}}"

                        </div><!-- /.product-info -->
                    </div><!-- /.col-sm-7 -->
                </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">@if (session()->get('language')=="Arabic") مواصفات @else  DESCRIPTION @endif</a></li>
                                <li><a data-toggle="tab" href="#review">@if (session()->get('language')=="Arabic") التقييمات  @else  REVIEW @endif </a></li>
                                <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">


                                        <p class="text">@if (session()->get('language')=="Arabic"){!! $product->long_description_arabic !!}  @else {!! $product->long_description_english !!} @endif</p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>

                                            <div class="reviews">
                                                <div class="review">
                                                    <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                    <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                                                                        </div>

                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->



                                        <div class="product-add-review">
                                            <h4 class="title">Write your own review</h4>
                                            <div class="review-table">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table><!-- /.table .table-bordered -->
                                                </div><!-- /.table-responsive -->
                                            </div><!-- /.review-table -->

                                            <div class="review-form">
                                                <div class="form-container">
                                                    <form role="form" class="cnt-form">

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                </div><!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                </div><!-- /.form-group -->
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                    <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->

                                                        <div class="action text-right">
                                                            <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                        </div><!-- /.action -->

                                                    </form><!-- /.cnt-form -->
                                                </div><!-- /.form-container -->
                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                                <div id="tags" class="tab-pane">
                                    <div class="product-tag">

                                        <h4 class="title">Product Tags</h4>
                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-container">

                                                <div class="form-group">
                                                    <label for="exampleInputTag">Add Your Tags: </label>
                                                    <input type="email" id="exampleInputTag" class="form-control txt">


                                                </div>

                                                <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                            </div><!-- /.form-container -->
                                        </form><!-- /.form-cnt -->

                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                            </div>
                                        </form><!-- /.form-cnt -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->
<!-- ====================== Related PRODUCTS ========================== -->


@php
$RelatedProducts=App\Models\Product::where('category_id',$product->category_id)->limit(30)->get();
@endphp

<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Related products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">


        @foreach($RelatedProducts as $product)
		<div class="item item-carousel">
			<div class="products">




	<div class="product">
		<div class="product-image">
			<div class="image">
				<a href="{{route('product.details',$product->id)}}"><img  src="/backend/admin/ProductImages/{{$product->product_thambnail}}" alt=""></a>
			</div><!-- /.image -->

            {{$product->created_at}}
            @if( $product->created_at->diffInHours(\Carbon\Carbon::now())< 120 )
            <div class="tag new"><span>new</span></div>
            @endif

		</div><!-- /.product-image -->


		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">{{$product->name_english}}</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">
				<span class="price">
					${{$product->discount_price}}		</span>
										     <span class="price-before-discount">$ {{$product->selling_price}}</span>

			</div><!-- /.product-price -->

		</div><!-- /.product-info -->

        <div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">

							<button class="btn btn-primary icon" data-toggle="modal"  id="{{$product->id}}"  onclick="productView(this.id)" data-target="#exampleModal" type="button">
								<i class="fa fa-shopping-cart"></i>

							</button>
						</li>
                        <li>
<button class="btn btn-primary icon" type="button" title="add to wishlist" id="{{$product->id}}" onclick="addToWishList(this.id)">
    <i class="fa fa-heart"></i> </button>
</li>
						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->


</div><!-- /.product -->




			</div><!-- /.products -->

		</div><!-- /.item -->

        @endforeach

			</div><!-- /.home-owl-carousel -->

        </section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->







            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->

</div>














@endsection
