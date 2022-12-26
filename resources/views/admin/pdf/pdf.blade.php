<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <style>
        @page {
            @bottom-right {
                content: counter(page) " of " counter(pages);
            }
        }
    </style>
</head>

<body>
<br>
<div class="container" style="page-break-before: always;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <strong>Application #:</strong>
                    <span>{{ $order->id }}</span>
                </div>
            </div>
            <h4>From: Faz Group</h4>
            <table class="table table-bordered table-condensed">
                <tbody>

                <tr>
                    <td>
                        <h6>
                            <strong>Applicant name</strong>
                        </h6>
                        <span>{{ $order->name }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>Email address</strong>
                        </h6>
                        <span>{{ $order->email }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>Customer Phone</strong>
                        </h6>
                        <span>{{ $order->phone }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>Customer Address</strong>
                        </h6>
                        <span>{{ $order->address }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>Product Name</strong>
                        </h6>
                        <span>{{ $order->product_name }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>Product Quantity</strong>
                        </h6>
                        <span>{{ $order->product_quantity }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>Payment Status</strong>
                        </h6>
                        <span>{{ $order->payment_status }}</span>
                    </td>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>
