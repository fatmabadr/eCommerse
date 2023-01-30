<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
             @if(Auth::guard('web')->check()) <li><a href="{{route('user.profile')}}"> <i class="icon fa fa-heart"></i> @if (Session()->get('language')=='Arabic') حسابي @else My Account @endif  </a></li>  @endif
              <li><a href="{{route('wishList.page')}}"><i class="icon fa fa-heart"></i>@if (Session()->get('language')=='Arabic') قائمة  امنياتي @else Wishlist @endif</a></li>
              <li><a href="#"><i class="icon fa fa-shopping-cart"></i> @if (Session()->get('language')=='Arabic') عربة التسوق@else My Cart @endif</a></li>
              <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
            @if(Auth::guard('web')->check())
              <li><a href="{{route('user.logout')}}"><i class="icon fa fa-lock"></i>@if(Session()->get('language')=="Arabic") تسجيل خروج@else Logout @endif</a></li>
              @else
              <li><a href="{{route('user.login')}}"><i class="icon fa fa-lock"></i>@if(session()->get('language')=="Arabic") تسجبل الدخول   @else Login @endif</a></li>
              @endif
            </ul>
          </div>
          <!-- /.cnt-account -->

          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">@if(Session()->get('language')=="Arabic")  دولار امريكي  @else USD @endif</a></li>
                  <li><a href="#">@if(Session()->get('language')=="Arabic")  ريال سعودي@else  SAR @endif</a></li>
                  <li><a href="#">@if(Session()->get('language')=="Arabic") جنيه مصري @else EGP @endif</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"> @if (Session()->get('language')=='Arabic') اللفة @else Language @endif</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <div class="form-check">



                        <input class="form-check-input" type="radio" name="language" id="english"  checked >
                       <label class="form-check-label" for="english"     >
                            <a href="{{route('language.english')}}">   English - EN</a>
                        </label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="language" id="arabic"  @if (Session()->get('language')=='Arabic') checked @endif>
                        <label class="form-check-label" for="arabic">
                            <a href="{{route('language.arabic')}}">   العربية - AR</a>
                        </label>
                      </div>


                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled -->
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{route('home')}}"> <img src="/frontend/assets/images/logo.png" alt="logo"> </a> </div>
            <!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->

          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
            <!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form>
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">Computer</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="Search here..." />
                  <a class="search-button" href="#" ></a> </div>
              </form>
            </div>
            <!-- /.search-area -->
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->

          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id ="cartCount"></span></div>
                <div class="total-price-basket"> <span class="lbl">cart -</span>
                     <span class="total-price"> <span class="sign">$</span>
                     <span class="value" id ="totalPrice"></span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>

                {{-- start mini cart --}}
                <div id="miniCart">

                </div>


                {{-- end mincart --}}



                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text" > Total :</span>
                        <span class='price' id ="totalPrice" ></span> </div>
                    <div class="clearfix"></div>
                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total-->

                </li>
              </ul>
              <!-- /.dropdown-menu-->
            </div>
            <!-- /.dropdown-cart -->

            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="{{route('home')}}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if (Session()->get('language')=='Arabic') الصفحة الرئيسية@else Home @endif</a> </li>

                  @php
                  $categories = App\Models\Catgory::latest()->orderBy('name_english','ASC')->get();
                  @endphp
                  @foreach ($categories as $category)



                  <li class="dropdown yamm mega-menu"> <a href=" " data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if(Session()->get('language')=="Arabic") {{$category->name_arabic}}@else {{$category->name_english}} @endif</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('name_english','ASC')->get();
                            @endphp


                              @foreach ($subcategories as $subcategory)


                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">


                             <a href="{{url('/'.$subcategory->name_english.'/'.$subcategory->id)}}" > <h2 class="title"> @if(Session()->get('language')=="Arabic") {{$subcategory->name_arabic}}@else{{$subcategory->name_english}}@endif</h2></a>
                              <ul class="links">


                                @php
                                $subsubcategories = App\Models\Subsubcategory::where('subcategory_id',$subcategory->id)->orderBy('name_english','ASC')->get();
                                @endphp
                                 @foreach ($subsubcategories as $subsubcategory)
                                <li><a href="#">@if(Session()->get('language')=="Arabic") {{$subsubcategory->name_arabic}}@else{{$subsubcategory->name_english}}@endif</a></li>
                              @endforeach
                              </ul>
                            </div>
                            @endforeach
                            <!-- /.col -->
                          </div>
                            <!-- /.col -->
                        </div>
                      </li>
                    </ul>
                  </li>

                  @endforeach
                  <li class="dropdown  navbar-right special-menu"> <a href="#">@if (Session()->get('language')=="Arabic") عروض اليوم@else Todays offer @endif</a> </li>

                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer -->
            </div>
            <!-- /.navbar-collapse -->

          </div>
          <!-- /.nav-bg-class -->
        </div>
        <!-- /.navbar-default -->
      </div>
      <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

  </header>
