@extends('admin.inc.layouts')
@section('title','Dashboard')

@section('main-contant')

    <div class="card-body">
        <div class="adv-table">
            <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline" role="grid">

                <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting">SL NO</th>
                        <th class="sorting">Product Name</th>
                        <th class="sorting">Product Price</th>
                        <th class="sorting">Product Quantity</th>
                        <th class="sorting">Product Photo</th>
                        <th class="sorting">Status</th>
                        <th class="sorting">Action</th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($products as $product)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->product_quantity }}</td>
                        <td><img src="uploads/products/{{ $product->photo }}" alt="Products" style="width: 80px; height: 100px;"></td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure !')" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection



