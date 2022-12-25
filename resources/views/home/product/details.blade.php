<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css"/>
    <!-- font awesome style -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="/assets/css/responsive.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
@include('home.inc.header')




<div class="container py-5" style="min-height: 400px;">
    <div class="row justify-content-center">

        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
                <div class="option_container">
                </div>
                <div class="img-box">
                    <img src="/uploads/products/{{ $product->photo }}" alt="">
                </div>
                <div class="detail-box">
                    <h5>
                        {{ $product->product_name }}
                    </h5>
                    <h6>
                        @if($product->discount_price)
                            <span style="color:green;">Product Price:  ${{ $product->discount_price }}</span>
                            <span class="text-danger" style="text-decoration: line-through;"> Product Price:  ${{ $product->product_price }}</span>
                        @else
                            Product Price:  ${{ $product->product_price }}
                        @endif
                    </h6>
                    <p>Available Quantity : {{ $product->product_quantity }}</p>
                    <p>Des: {{ $product->product_description }}</p>
                    <form action="{{ route('addToCart',$product->id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1" style="border-radius: 50px;">
                        <input type="submit" value="Add To Cart" style="border-radius: 50px;">
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>







<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
<script src="/assets/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="/assets/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="/assets/js/bootstrap.js"></script>
<!-- custom js -->
<script src="/assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@if(session()->has('message'))
    <script>
        toastr.{{ session()->get('type') }}(" {!! session()->get('message') !!} ");
    </script>
@endif

</body>
</html>
