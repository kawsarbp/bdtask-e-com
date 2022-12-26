@extends('admin.inc.layouts')
@section('title','Dashboard')

@section('main-contant')

    <div class="row state-overview">

        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol terques">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value">
                    <h1 class="{{--count--}}">{{$totalUser}}</h1>
                    <p>Total Customers</p>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol red">
                    <i class="fa fa-tags"></i>
                </div>
                <div class="value">
                    <h1 class=" {{--count2--}}">{{ $totalDelivery }}</h1>
                    <p>Total Delivery</p>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol yellow">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="value">
                    <h1 class=" {{--count3--}}">{{ $totalProduct }}</h1>
                    <p>Total Products</p>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol blue">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h1 class=" {{--count4--}}">{{ $toalRevenue }}</h1>
                    <p>Total Revenue</p>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol yellow">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="value">
                    <h1 class=" {{--count5--}}">{{ $totalOrder }}</h1>
                    <p>Total Orders</p>
                </div>
            </section>
        </div>


        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol blue">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h1 class=" {{--count6--}}">{{ $totalprocessing }}</h1>
                    <p>Order Processing</p>
                </div>
            </section>
        </div>
    </div>



@endsection
