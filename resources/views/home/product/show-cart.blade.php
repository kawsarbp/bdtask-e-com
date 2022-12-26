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
    <title>E-com</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css"/>
    <!-- font awesome style -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="/assets/css/responsive.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
@include('home.inc.header')


<div class="container py-5" style="min-height: 500px;">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="table-responsive" style="border-radius: 8px;">
                <table class="table-hover table-bordered table table-hover ">
                    <tr style="background:gray;">
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Quanity</th>
                        <th>Price</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    <?php $totalPrice = 0; ?>
                    @foreach($carts as $cart)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $cart->product_name }}</td>
                            <td>{{ $cart->product_quantity }}</td>
                            <td>{{ $cart->product_price }}</td>
                            <td><img src="/uploads/products/{{ $cart->photo }}" alt="Product" style="width: 60px;" ></td>
                            <td><a href="{{ route('removeCart',$cart->id) }}" onclick="return confirm('Are you sure !')" class="btn btn-warning btn-sm">Remove Cart</a></td>
                        </tr>
                        <?php  $totalPrice = $totalPrice + $cart->product_price ?>
                    @endforeach

                </table>
            </div>
            <div class="text-right text-success">Total Price: <strong class="text-info">${{ $totalPrice }}</strong></div>
            <div class="text-center text-info">
                <h3 class="">Proceed To Cart</h3>
                <div>
                    <a href="{{ route('cashOnDelivery') }}" class="btn  btn-primary">Cash On Delivery</a>
                    <a href="{{ route('stripe',base64_encode($totalPrice)) }}" class="btn btn-primary">Pay Using Card</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@if(session()->has('message'))
    <script>
        toastr.{{ session()->get('type') }}(" {!! session()->get('message') !!} ");
    </script>
@endif

</body>
</html>
