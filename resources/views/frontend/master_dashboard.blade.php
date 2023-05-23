<!DOCTYPE html>
<html class="no-js" lang="en">
 @php
    $seo = App\Models\Seo::find(1);
  @endphp
<head>
    <meta charset="utf-8" />
    <title>@yield('title') </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_description }}" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }} " />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
    {{--  <link rel="stylesheet" href="assets/css/plugins/slider-range.css" />  --}}
    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />  --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <!-- Modal -->

    <!-- Quick view -->
    @include('frontend.body.quickview')
    <!-- Header  -->

    @include('frontend.body.header')

    <!-- End Header  -->




    <!--End header-->

    <main class="main">
        @yield('main')
    </main>

    <footer class="main">
        @include('frontend.body.footer')
    </footer>
    <!-- Preloader Start -->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{asset('frontend/assets/imgs/theme/loading.gif')}}" alt="" />
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>  --}}

    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/plugins/slider-range.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</script>

</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>



    <script type="text/javascript">
        //   $.ajaxSetUp({
        //     headers:{
        //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        //     }
        //   })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        //Srart product view with model

        function productView(id) {
            // alert (id);
            $.ajax({
                type: "GET",
                url: '/product/view/model/' + id,
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#pbrand').text(data.product.brand.brand_name);
                    $('#pimage').attr('src', '/' + data.product.product_thambnail);
                    $('#pvendor_id').text(data.product.vendor_id);
                    $('#product_id').val(id);
                    $('#qty').val(1);

                    //Product price
                    if (data.product.discount_price != null) {
                        $('#pprice').text(data.product.discount_price)
                        $('#oldprice').text(data.product.selling_price)

                    } else {
                        $('#pprice').text(' ');
                        $('#oldprice').text('data.product.selling_price');
                    }
                    //Start Stock Option
                    if (data.product.product_qty > 0) {
                        $("#viable").text(' ').show();
                        $("#stockout").text('stockout').hide();
                        $("#aviable").text('aviable').show();

                    } else {
                        $("#viable").text('viable').hide();
                        $("#stockout").text(' ').show();
                        $("#stockout").text('stockout').show();
                    }

                    //End Stock Option
                    //Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            '</option>')
                        if (data.size == '') {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) //End size

                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            '</option>')
                        if (data.color == '') {
                            $('#colorArea').hide();
                        } else {
                            $('colorArea').show();
                        }
                    }) //End color


                }
            })
        } //End

        //Start add to cart product


        function addToCart() {
            // return alert();
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
             var vendor = $('#pvendor_id').text();

            // console.log(id);
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor:vendor

                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    couponCalculation();
                    miniCart();
                    $('#closeModal').click();
                    // console.log(data);

                    //start message
                    const Toast = Swal.mixin({

                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success

                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error

                        })

                    }
                    //end message
                }
            })
        }

        //End add to cart product

        //Start add to cart details product


        function addToCartDetails() {
            // return alert();
            var product_name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var vendor = $('#vproduct_id').val();
            // console.log(id);
            var color = $('#dcolor option:selected').text();
            var size = $('#dsize option:selected').text();
            var quantity = $('#dqty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor:vendor

                },
                url: "/dcart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    couponCalculation();
                    // console.log(data);

                    //start message
                    const Toast = Swal.mixin({

                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success

                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error

                        })

                    }
                    //end message
                }
            })
        }

        //End add to cart detail product
    </script>



    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: "GET",
                url: "/product/mini/cart",
                dataType: 'json',
                success: function(response) {
                    couponCalculation();
                    //  console.log(response);
                    $('span[id="cartSubTotal"]').text(response.cartTotal).append('$','')
                    $('#cartQty').text(response.cartQty);
                    var miniCart = " "

        $.each(response.carts, function(key,value){
           miniCart += ` <ul>
            <li>
                <div class="shopping-cart-img">
                    <a href="shop-product-right.html"><img alt="Nest" src="/${value.options.image} " style="width:50px;height:50px;" /></a>
                </div>
                <div class="shopping-cart-title" style="margin: -73px 74px 14px; width" 146px;>
                    <h4><a href="shop-product-right.html"> ${value.name} </a></h4>
                    <h4><span>${value.qty} × </span>$${value.price}</h4>
                </div>
                <div class="shopping-cart-delete" style="margin: -85px 1px 0px;">
                    <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"  ><i class="fi-rs-cross-small"></i></a>
                </div>
            </li>
        </ul>
        <hr><br>
               `
          });
            $('#miniCart').html(miniCart);
        }
    })
 }
  miniCart(); //End mini cart


                //Start minicart remove
        function miniCartRemove(rowId){
            // console.log(rowId);
         $.ajax({
        type: 'GET',
        url: '/minicart/product/remove/'+rowId,
        dataType:'json',
        success:function(data){
            // console.log(data);
            couponCalculation();

        miniCart();
             // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 2000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    title: data.error,
                    })
                }
              // End Message
        }
     })

                }
                //End minicart remove
                    </script>

                    {{-- //Start Wishlist add --}}

                    <script type="text/javascript">

                        function addToWishList(product_id){
                            $.ajax({
                                type: "POST",
                                dataType: 'json',
                                url: "/add-to-wishlist/"+product_id,
                                success:function(data){
                                    wishlist();
                                     // Start Message
                            const Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  icon: 'success',
                                  showConfirmButton: false,
                                  timer: 3000
                            })
                            if ($.isEmptyObject(data.error)) {

                                    Toast.fire({
                                    type: 'success',
                                    title: data.success,
                                    })
                            }else{

                           Toast.fire({
                                    type: 'error',
                                    icon: 'error',
                                    title: data.error,
                                    })
                                }
                              // End Message
                                }
                            })
                        }
                    </script>

                    {{-- //End Wishlist add --}}

                     {{-- //Start Load Wishlist data --}}

                     <script type="text/javascript">

                        function wishlist(product_id){
                            $.ajax({
                                type: "GET",
                                dataType: 'json',
                                url: "/get/wishlist/product/",
                                success:function(response){
                          $('#wishQty').text(response.wishQty);
                     var rows = ""
                     $.each(response.wishlist, function(key,value){
          rows += `<tr class="pt-30">
                          <td class="custome-checkbox pl-30">

                          </td>
                          <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                          <td class="product-des product-name">
                              <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                              {{--  <div class="product-rate-cover">
                                  <div class="product-rate d-inline-block">
                                      <div class="product-rating" style="width: 90%"></div>
                                  </div>
                                  <span class="font-small ml-5 text-muted"> (4.0)</span>
                              </div>  --}}
                          </td>
                          <td class="price" data-title="Price">
                          ${value.product.discount_price == null
                          ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                          :`<h3 class="text-brand">$${value.product.discount_price}</h3>`
                          }

                          </td>
                          <td class="text-center detail-info" data-title="Stock">
                              ${value.product.product_qty > 0
                                  ? `<span class="stock-status in-stock mb-0"> In Stock </span>`
                                  :`<span class="stock-status out-stock mb-0">Stock Out </span>`
                              }

                          </td>

                          <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fi-rs-trash"></i></a>
                          </td>
                      </tr> `
         });
        //  console.log(rows);
         $('#wishlist').html(rows);
                  }
                            })
                        }
                        wishlist();
                        //End Load Wishlist data

                        //Wishlist remove start
                        function wishlistRemove(id){

                            $.ajax({
                                type: "GET",
                                dataType: 'json',
                                url: "/wishlist/remove/"+id,
                                success:function(data){
                                    wishlist();
                                     // Start Message
                            const Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  icon: 'success',
                                  showConfirmButton: false,
                                  timer: 3000
                            })
                            if ($.isEmptyObject(data.error)) {

                                    Toast.fire({
                                    type: 'success',
                                    title: data.success,
                                    })
                            }else{

                           Toast.fire({
                                    type: 'error',
                                    icon: 'error',
                                    title: data.error,
                                    })
                                }
                              // End Message
                                }
                            })
                        }
                        //wishlist remove end

                    </script>
                    {{-- //End wishlist load data --}}

                    {{-- //Start Add to Compare --}}
 <script type="text/javascript">

    function addToCompare(product_id){
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-compare/"+product_id,
            success:function(data){

                 // Start Message
        const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              icon: 'success',
              showConfirmButton: false,
              timer: 3000
        })
        if ($.isEmptyObject(data.error)) {

                Toast.fire({
                type: 'success',
                title: data.success,
                })
        }else{

       Toast.fire({
                type: 'error',
                icon: 'error',
                title: data.error,
                })
            }
          // End Message
            }
        })
    }
</script>
{{-- //End Add to Compare --}}









   {{-- //Start Load Compare data --}}

   <script type="text/javascript">

    function compare(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/get/compare/product/",
            success:function(response){
               var rows = ""
               $.each(response.compare, function(key,value){
    rows += ` <tr class="pr_image">
                                <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
<td class="row_img"><img src="/${value.product.product_thambnail} " style="width:200px; height:200px;"  alt="compare-img" /></td>

                            </tr>
                            <tr class="pr_title">
                                <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                <td class="product_name">
                                    <h6><a href="shop-product-full.html" class="text-heading">${value.product.product_name} </a></h6>
                                </td>

                            </tr>
                            <tr class="pr_price">
                                <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                <td class="product_price">
                  ${value.product.discount_price == null
                    ? `<h4 class="price text-brand">$${value.product.selling_price}</h4>`
                    :`<h4 class="price text-brand">$${value.product.discount_price}</h4>`
                    }
                                </td>

                            </tr>

                            <tr class="description">
                                <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                <td class="row_text font-xs">
                                    <p class="font-sm text-muted"> ${value.product.short_descp}</p>
                                </td>

                            </tr>
                            <tr class="pr_stock">
                                <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                <td class="row_stock">
                            ${value.product.product_qty > 0
                            ? `<span class="stock-status in-stock mb-0"> In Stock </span>`
                            :`<span class="stock-status out-stock mb-0">Stock Out </span>`
                           }
                          </td>

                            </tr>

        <tr class="pr_remove text-muted">
            <td class="text-muted font-md fw-600"></td>
            <td class="row_remove">
                <a type="submit" class="text-muted" id="${value.id}" onclick="compareRemove(this.id)" ><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>            </td>

        </tr> `
   });
   $('#compare').html(rows);
            }
        })
    }
compare();
// / End Load Compare Data -->
// Compare Remove Start
// Compare Remove start

function compareRemove (id){

$.ajax({
    type: "GET",
    dataType: 'json',
    url: "/compare/remove/"+id,
    success:function(data){
        wishlist();
        // Start Message
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    icon: 'success',
    showConfirmButton: false,
    timer: 3000
})
if ($.isEmptyObject(data.error)) {

        Toast.fire({
        type: 'success',
        title: data.success,
        })
}else{

Toast.fire({
        type: 'error',
        icon: 'error',
        title: data.error,
        })
    }
// End Message
    }
})
}



// Compare Remove End

     </script>
                <!--  // Start Load MY Cart // -->
                <script type="text/javascript">
                    function cart(){
                $.ajax({
                    type: 'GET',
                    url: '/get/cart/product',
                    dataType: 'json',
                    success:function(response){
                        // console.log(response)
                        cart();
                        miniCart();

                    var rows = ""
                    $.each(response.carts, function(key,value){
                        rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">

                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.options.image} " alt="#"></td>
                        <td class="product-des product-name">
                            <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">${value.name} </a></h6>

                        </td>
                        <td class="price" data-title="Price">
                            <h4 class="text-body">$${value.price} </h4>
                        </td>
                            <td class="price" data-title="Price">
                            ${value.options.color == null
                            ? `<span>.... </span>`
                            : `<h6 class="text-body">${value.options.color} </h6>`
                            }
                        </td>
                            <td class="price" data-title="Price">
                            ${value.options.size == null
                            ? `<span>.... </span>`
                            : `<h6 class="text-body">${value.options.size} </h6>`
                            }
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            <div class="detail-extralink mr-15">
                                <div class="detail-qty border radius">
                                    <a type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>

                    <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                                    <a  type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)"  class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                            <h4 class="text-brand">$${value.subtotal} </h4>
                        </td>
                        <td class="action text-center" data-title="Remove">
                            <a type="submit" id="${value.rowId}" onclick="cartRemove(this.id)"  ><i  class="fi-rs-trash mr-5"></i></a>
                            </td>
                    </tr>`
                        });
                        $('#cartPage').html(rows);
                    }
                })
                }
                cart();
                                              // Cart Remove Start
  function cartRemove(rowId){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/cart/remove/"+rowId,
                success:function(data){
                couponCalculation();
                    cart();
                    miniCart();
                     // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error,
                    })
                }
              // End Message
                }
            })
        }
// Cart Remove End
       //Cart Decrement start
       function cartDecrement(rowId){
        $.ajax({
               type:"GET",
               url:"/cart/decrement/"+rowId,
               dataType:'json',
               success:function(){
                // cartDecrement();
                couponCalculation();
                cart();
                miniCart();


               }
        })

       }
       //cart Decrement end
       //Cart increment start
       function cartIncrement(rowId){
        $.ajax({
               type:"GET",
               url:"/cart/increment/"+rowId,
               dataType:'json',
               success:function(){
                // cartIncrement();
                couponCalculation();
                cart();
                miniCart();


               }
        })

       }

       //Cart increment End
</script>
 <!--  // End Load MY Cart // -->

    </script>
<!--  // End Load MY Cart // -->



<!--  ////////////// Start Apply Coupon ////////////// -->
<script type="text/javascript">

  function applyCoupon(){
    var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {coupon_name:coupon_name},
                url: "/coupon-apply",
                success:function(data){

                    couponCalculation();
                    cart();
                    miniCart();

                    if (data.validity == true) {
                        $('#couponField').hide();
                    }
                     // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error,
                    })
                }
              // End Message
                }
            })
        }

        // Start CouponCalculation Method
     function couponCalculation(){
        $.ajax({
            type: 'GET',
            url: "/coupon-calculation",
            dataType: 'json',
            success:function(data){
                //////For Testing
                cart();
                miniCart();


                if(data.total){

                    $('#couponCalField').html(
                        ` <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Subtotal</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$ ${data.total}</h4>
                        </td>
                    </tr>

                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Grand Total</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.total}</h4>
                        </td>
                    </tr>
                    ` )

                }else{

                    $('#couponCalField').html(
                    `<tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Subtotal</h6>
                    </td>
                    <td class="cart_total_amount">
                        <h4 class="text-brand text-end">$${data.subtotal}</h4>
                    </td>
                </tr>

                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Coupon </h6>
                    </td>
                    <td class="cart_total_amount">
                        <h6 class="text-brand text-end">${data.coupon_name} <a type="submit" onclick="couponRemove()"><i class="fi-rs-trash"></i> </a> </h6>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Discount Amount  </h6>
                    </td>
                    <td class="cart_total_amount">
    <h4 class="text-brand text-end">$${data.discount_amount}</h4>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Grand Total </h6>
                    </td>
                    <td class="cart_total_amount">
          <h4 class="text-brand text-end">$${data.total_amount}</h4>
                    </td>
                </tr> `
                    )

                }

            }
        })
     }
     couponCalculation();
     // Start CouponCalculation Method
</script>

   <!--  ////////////// End Apply Coupon ////////////// -->

   <!--  ////////////// End Apply Coupon ////////////// -->

   <script type="text/javascript">
       // Coupon Remove Start
     function couponRemove(){
               $.ajax({
                   type: "GET",
                   dataType: 'json',
                   url: "/coupon-remove",
                   success:function(data){
                      couponCalculation();
                      cart();
                      miniCart();

                      $('#couponField').show();
                        // Start Message
               const Toast = Swal.mixin({
                     toast: true,
                     position: 'top-end',

                     showConfirmButton: false,
                     timer: 3000
               })
               if ($.isEmptyObject(data.error)) {

                       Toast.fire({
                       type: 'success',
                       icon: 'success',
                       title: data.success,
                       })
               }else{

              Toast.fire({
                       type: 'error',
                       icon: 'error',
                       title: data.error,
                       })
                   }
                 // End Message
                   }
               })
           }
   // Coupon Remove End
        </script>

                </html>
