@php

$tags_english = App\models\Product::groupby('tags_english')->select('tags_english')->get();
$tags_arabic = App\models\Product::groupby('tags_arabic')->select('tags_arabic')->get();

@endphp


 <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list">
@if(Session()->get('language')=='Arabic')
@foreach ($tags_arabic as $tag )
                 <a class="item" title="Phone" href="/product/tag/{{$tag->tags_arabic}}">{{$tag->tags_arabic}}</a>
@endforeach

@else
@foreach ($tags_english as $tag )
                 <a class="item" title="Phone" href="/product/tag/{{$tag->tags_english}}">{{$tag->tags_english}}</a>
@endforeach
@endif

                    </div>
            <!-- /.tag-list -->
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
