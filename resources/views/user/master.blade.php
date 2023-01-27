<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
@yield('title')


<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="/frontend/assets/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="/frontend/assets/css/main.css">
<link rel="stylesheet" href="/frontend/assets/css/blue.css">
<link rel="stylesheet" href="/frontend/assets/css/owl.carousel.css">
<link rel="stylesheet" href="/frontend/assets/css/owl.transitions.css">
<link rel="stylesheet" href="/frontend/assets/css/animate.min.css">
<link rel="stylesheet" href="/frontend/assets/css/rateit.css">
<link rel="stylesheet" href="/frontend/assets/css/bootstrap-select.min.css">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="/frontend/assets/css/font-awesome.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('user.body.header')

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
        @if (Session::has('succ'))
        <div class="alert alert-success" role="alert">
           {{Session::get('succ')}}
          </div>
        @endif

        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
           {{Session::get('error')}}
          </div>
        @endif
        @yield('content')
      <!-- ============================================== SIDEBAR ============================================== -->
    </div>
  </div>
  <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('user.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="/frontend/assets/js/jquery-1.11.1.min.js"></script>
<script src="/frontend/assets/js/bootstrap.min.js"></script>
<script src="/frontend/assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="/frontend/assets/js/owl.carousel.min.js"></script>
<script src="/frontend/assets/js/echo.min.js"></script>
<script src="/frontend/assets/js/jquery.easing-1.3.min.js"></script>
<script src="/frontend/assets/js/bootstrap-slider.min.js"></script>
<script src="/frontend/assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="/frontend/assets/js/lightbox.min.js"></script>
<script src="/frontend/assets/js/bootstrap-select.min.js"></script>
<script src="/frontend/assets/js/wow.min.js"></script>
<script src="/frontend/assets/js/scripts.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>







    <!--add to cart Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span> </h5>



        <button type="button"  class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
      </div>
      <div class="modal-body">

    <div class = "row">
        <div class = "col-md-4">

            <div class="card" style="width: 18rem;">
                <img src=" " class="card-img-top" alt="..." style= "height : 200px ; width: 180px" id ="pimage">

              </div>



        </div>
        <div class = "col-md-4">
            <ul class="list-group">
                <li class="list-group-item">Product Price:<strong id="price"></strong></li>
                <li class="list-group-item">Product code:<strong id="pcode"></strong></li>
                <li class="list-group-item">Product category:<strong id="pcategory"></strong></li>
                <li class="list-group-item">Product brand:<strong id="pbrand"></strong></li>
                <li class="list-group-item">Product stock:
                    <span class="badge badge-pill badge-success " id ="avilabe" style="background: green; color:white;"></span>
                    <span class="badge badge-pill badge-danger " id ="outofstock" style="background: red; color:white;"></span>
                </li>
              </ul>
        </div>

        <div class = "col-md-4">
          <div class="form-group" id ="colorarea">
            <label for="color" >choose color</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="color"name="color">


              </select>
          </div>
<br><br>
<div class="form-group" id="sizearea">
    <label for="size" >choose size</label>
              <select class="form-select form-select-lg mb-3" id="size" aria-label=".form-select-lg example" name ="size">


              </select>
</div>
              <br><br>



            <div class ="form-group" >
                <label for ="quantity">Quantity</label>
                <input type ="number" class ="form-control" id="quantity" value="1" min="1">
            </div>

            <input type="hidden" id ="product_id">
        <button type="submit" onclick="addToCart()" class ="btn btn-primary mb-2">Add to cart </button>

    </div><!-- // end col md -->

</div> <!-- // end row -->

</div> <!-- // end modal Body -->

</div>
</div>
</div>


<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function productView(id){
      $.ajax({
        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType:'json',
        success:function(data){
            // console.log(data)
            $('#pname').text(data.product.product_name_en);
            $('#price').text(data.product.discount_price);
            $('#pcode').text(data.product.code);
            $('#pcategory').text(data.product.category.name_english);
            $('#pbrand').text(data.product.brand.name_english);
            $('#pimage').attr('src','/backend/admin/ProductImages/'+data.product.product_thambnail);
            $('#product_id').val(id);



            $('select[name="color"]').empty();
            if (data.color==""){
    $('#colorarea').hide();
}
else{
    $('#colorarea').show();
}
   $.each(data.color,function(key,value){
        $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
    })
    $('#avilabe').empty();
    $('#outofstock').empty();
if (data.product.quantity > 0){
$('#avilabe').text('available');
}
else{
    $('#outofstock').text('outofstock');
}




$('select[name="size"]').empty();
if (data.size==""){
    $('#sizearea').hide();
}
else{
    $('#sizearea').show();
}


    $.each(data.size,function(key,value){
    $('select[name="size"]').append('<option value="'+value+'">'+value+'</option')
})

        }

        })
    }


function addToCart(){

var product_id =$('#product_id').val();
var productcolor =$('#color option:selected').text();
var size=$('#size option:selected').text();
var quantity = $('#quantity').val();


$.ajax({type :"POST", dataType:'json',
 data :{
    productcolor:productcolor ,
    size:size ,
    product_id:product_id,
    quantity:quantity
       },
url: "/cart/data/store/"+product_id,

success:function(data){
    miniCart();
    $('#closeModel').click();
   // console.log(data)

   //start addning message
   if($.isEmptyObject(data.error)){
   Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'added to cart successfully ^_^',
  showConfirmButton: false,
  timer: 5000
})
   }
   else{
   Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: 'error',
  showConfirmButton: false,
  timer: 500
})
   }
   //end masage
}
})
}


</script>
//end of add to cart method
<script type="text/javascript">
//minicart
 function miniCart(){
$.ajax({
    type:'get',
    url:'/product/mini/cart',
    dataType:'json',

        success:function(response){
                console.log(response)
                $('span[id="cartCount"]').text(response.cartcount);
                $('#totalPrice').text(response.cartTotal);
                var miniCart = ""
                var i =0;

                $.each(response.carts, function(key,value){
                    if( i < 3){
                    miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/backend/admin/ProductImages/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">${value.price}*${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action">
                        <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"> <i class="fa fa-trash"> </i> </button></div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`}
                i++;

                });

                $('#miniCart').html(miniCart);
            }
        })
     }
//end of mini cart fucntion

miniCart();

//start of cart remove
function miniCartRemove(rowId){
    $.ajax({
type:'get',
dataType:'json',
url:"/mincart/remove/"+rowId ,
success:function(data){
    miniCart();
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'removed from cart successfully ^_^',
  showConfirmButton: false,
  timer: 500
})
}


    })
}



//end of cart remove
</script>


</body>
</html>
