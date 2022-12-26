@extends('admin.inc.layouts')
@section('title','Order')

@section('main-contant')

    <div class="card-body table-responsive">
        <div class="adv-table">
            <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline " role="grid">
                <h4>All Orders</h4>
                <table class="display table table-bordered table-striped dataTable" id="dynamic-table"
                       aria-describedby="dynamic-table_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting">SL NO</th>
                        <th class="sorting">Name</th>
                        <th class="sorting">Email</th>
                        <th class="sorting">Address</th>
                        <th class="sorting">Phone</th>
                        <th class="sorting">Product Name</th>
                        <th class="sorting">Quantity</th>
                        <th class="sorting">Product Price</th>
                        <th class="sorting">Payment Status</th>
                        <th class="sorting">Delivery Status</th>
                        <th class="sorting">Image</th>
                        <th class="sorting">Action</th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->product_quantity }}</td>
                            <td>{{ $order->product_price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td><img src="/uploads/products/{{ $order->photo }}" alt="product" style="width: 50px;"></td>
                            <td>
                                @if($order->delivery_status == 'Processing')
                                <a href="{{ route('order.delivered',$order->id) }}" onclick="return confirm('Are you sure !')" class="btn btn-outline-info btn-sm">Delivered</a>
                                @else
                                    <div class="text-success">Delivered</div>
                                @endif
                                    <a href="{{ route('order.pdf',$order->id) }}" class="btn btn-primary btn-sm">Print Pdf</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection



