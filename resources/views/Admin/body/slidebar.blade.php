@php
  //  dd(Request::route()->getPrefix())
  //  dd(Route::current()->getName())
@endphp



<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="/backend/images/logo-dark.png" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{Route::current()->getName()=='dashboard'?'active': ''}}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{Request::route()->getPrefix()=='/brand' ?'active' :''}} ">
            <a href="#">
            <i data-feather="message-circle"></i>
            <span >Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
            </a>
          <ul class="treeview-menu " >
            <li><a href="{{route('brands.view')}} "><i class="ti-more "></i>All Brands</a></li>

          </ul>
        </li>


        <li class="treeview {{Request::route()->getPrefix()=='/category' ?'active' :''}} ">
            <a href="#">
              <i data-feather="message-circle"></i>
              <span >Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu " >
              <li><a href="{{route('categories.view')}} "><i class="ti-more "></i>All Categories</a></li>
                <li><a href="{{route('subCategories.view')}} "><i class="ti-more "></i>All sub category</a></li>
                <li><a href="{{route('sub->subCategories.view')}} "><i class="ti-more "></i>All sub->subcategory</a></li>

              </ul>
          </li>



        <li class="treeview {{Request::route()->getPrefix()=='/product'?'active' : ''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('product.add')}}"><i class="ti-more"></i>Add new product</a></li>
            <li><a href="{{route('products.mange')}}"><i class="ti-more"></i>Manage Products</a></li>

          </ul>
        </li>

        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>





		<li class="header nav-small-cap">EXTRA</li>



		<li>
          <a href="auth_login.html">

			<span>				 <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
            </span>
          </a>
        </li>

      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
