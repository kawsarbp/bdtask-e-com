<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $producat)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ route('productDetails',$producat->id) }}" class="option1">
                                View Cart
                            </a>

                        </div>
                    </div>
                    <div class="img-box">
                        <img src="/uploads/products/{{ $producat->photo }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $producat->product_name }}
                        </h5>
                        <h6>
                        @if($producat->discount_price)

                            <span style="color:green;">${{ $producat->discount_price }}</span>
                            <span class="text-danger" style="text-decoration: line-through;">${{ $producat->product_price }}</span>
                            @else
                                ${{ $producat->product_price }}
                        @endif
                        </h6>
                    </div>
                </div>
            </div>
            @endforeach
                {{ $products->links() }}
        </div>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
