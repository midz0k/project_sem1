@extends ('Frontend.master') 
@section('checkoutcss')
<link rel="stylesheet" href="{{url('assert')}}/css/CheckOut.css">
@stop
@section('CheckOut')
@if (!Auth::check())
<div class="container dsadasdsss" >
    <div class="row">
        <div class="col-xl-6">
            <div class="alert alert-warning">
                <strong>Returning customer?</strong><a href="{{route('Signin')}}?Page=check_out" class="alert-link"> Click here to login</a>.
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row jfhdsjfjds">
        <div class="col-xl-6 details">
            <h4>Billing Details</h4>
            <form method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input class="form-control" name="name" type="text" placeholder="Full Name*" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email*" value="{{Auth::user()->email}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input class="form-control" name="phone" type="text" placeholder="Phone*" value="{{Auth::user()->phone}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input class="form-control" name="address" type="text" placeholder="địa chỉ nhà - xã/huyện - thành phố*">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="sdasd">Additional Information</label>
                <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="5" placeholder="Order notes"></textarea>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="jadhasdjas">
                <h4>Your Orders</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Cart->content() as $value)
                            <tr>
                                <th>{{$value['name']}} <span>({{$value['quantity']}})</span></th>
                                <th scope="row">{{$value['quantity'] * $value['price']}}.000đ</th>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th>{{$Cart->get_Total_price()}}.000đ</th>
                        </tr>
                    </tfoot>
                </table>
                <button type="submit" class="btn btn-warning">Place Order</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endif
@stop