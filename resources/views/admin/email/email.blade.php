@extends('admin.inc.layouts')
@section('title','Send Mail')

@section('main-contant')

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <section class="card">
                <header class="card-header">
                    <strong>Send Mail To: {{$order->email}}</strong>
                </header>
                <div class="card-body">
                    <form action="{{ route('order.mail',$order->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="greeting">Greeting</label>
                            <input type="text" name="greeting" value="Welcome" class="form-control" id="greeting" placeholder="Greeting" required="">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" value="E-Com" class="form-control" id="subject" placeholder="Subject" required="">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <input type="text" name="message" value="Thank you for your order" class="form-control" id="message" placeholder="Message" required="">
                        </div>


                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
@endsection
