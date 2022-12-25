@extends('admin.inc.layouts')
@section('title','Manage Category')

@section('main-contant')

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <section class="card">
                <header class="card-header">
                    Category Add Form
                </header>
                <div class="card-body">
                    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" id="product_name" placeholder="Product Name" required="">
                        </div>
                        <div class="form-group">
                            <label for="product_category">Product Category</label>
                            <select name="product_category" id="product_category" class="form-control" required="">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option {{ $category->id == $product->product_category ? 'selected':'' }}   value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Product Price</label>
                            <input type="number" name="product_price" value="{{ $product->product_price }}" class="form-control" id="product_price" placeholder="Product Price" required="">
                        </div>
                        <div class="form-group">
                            <label for="discount_price">Discount Price</label>
                            <input type="number" name="discount_price" value="{{ $product->discount_price }}" class="form-control" id="discount_price" placeholder="Discount Price">
                        </div>

                        <div class="form-group">
                            <label for="product_quantity">Product Quantity</label>
                            <input type="number" name="product_quantity" value="{{ $product->product_quantity }}" class="form-control" id="product_quantity" placeholder="Product Quantity" required="">
                        </div>
                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <textarea name="product_description" id="product_description" cols="10" rows="5" class="form-control" required="">
                                {{ $product->product_description }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="photo">Product Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                            <img src="/uploads/products/{{$product->photo}}" style="width: 60px;" alt="">
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="category_name">status</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ $product->status == 'active'?'checked=""':'' }} type="radio" name="status" id="active" value="active">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ $product->status == 'inactive'?'checked=""':'' }}  type="radio" name="status" id="inactive" value="inactive">
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                            @error('status') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </form>

                </div>
            </section>
        </div>
    </div>

@endsection



