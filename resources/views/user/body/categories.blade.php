@php
      $categories = App\Models\Catgory::latest()->orderBy('name_english','ASC')->get();

@endphp
 <div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @foreach ($categories as $category)


        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$category->name_english}}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">

                <div class="col-sm-12 col-md-3">
                  <ul class="links list-unstyled">
                    @php
                    $subsubcategories = App\Models\Subsubcategory::where('category_id',$category->id)->orderBy('name_english','ASC')->get();
                    @endphp

                       @foreach ($subsubcategories as $subsubcategory)
                    <li><a href="{{url('/subsubcategory/'.$subsubcategory->name_english.'/'.$subsubcategory->id)}}">{{$subsubcategory->name_english}}</a></li>
                       @endforeach

                  </ul>
                </div>

                <!-- /.col -->
                <!-- /.col -->

                <!-- /.col -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
@endforeach


      </ul>
      <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
  </div>
