@extends ('Frontend.master') 
@section('Cartcss')
<link rel="stylesheet" href="{{url('assert')}}/css/Card.css">
@stop
@section('ShowCart')
<div class="prssdasd" style="background-image: url({{url('uploads')}}/slidershow1-2-1820x785_1820x785.jpg); ">
    <div style="background: radial-gradient(100% 100% at 50% 0%, #ffffff 0%, #efefefad 100%);">
        <div class="container">
            <div class="sadasds">
                <h4>Shopping Cart</h4>
            </div>
        </div>
    </div>
</div>
<div class="main_content">
    <!-- START SECTION SHOP -->
    <div class="section" style="margin: 100px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <form method="post" action="{{route('Cart.update')}}">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th>Color</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Cart-> content() as $key => $gio_hang)
                                <input type="hidden" name="key[]" value="{{$key}}">
                                <tr>
                                    <td class="product-thumbnail"><a href="{{route('View',$gio_hang['Product']->slug)}}"><img src="{{url('uploads/')}}/{{$gio_hang['image']}}" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product"><a class="dsdadsasd" href="{{route('View',$gio_hang['Product']->slug)}}">{{$gio_hang['name']}}</a></td>
                                    <td class="product-price" data-title="Price">{{$gio_hang['price']}}.000đ</td>
                                    <td>
                                        <select name="attr[]" class="form-control" id="exampleFormControlSelect1">
                                            @foreach ($gio_hang['Product']->getColorById($gio_hang['id']) as $color)
                                                <option value="{{$color->color_id}}" {{($color->color_id == $gio_hang['attr'])?'selected':''}}>{{$color -> name}}</option>   
                                            @endforeach 
                                        </select>
                                    </td>
                                    <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity[]" value="{{$gio_hang['quantity']}}" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div></td>
                                    <td class="product-subtotal" data-title="Total">{{$gio_hang['price'] * $gio_hang['quantity']}}.000đ</td>
                                    <td class="product-remove" data-title="Remove"><a href="{{route('delete_Cart',$key)}}"><i class='fas fa-times'></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                 <tr>
                                    <td colspan="8">
                                        <div class="row no-gutters">
                                            <div class="col-lg-12 col-md-6 text-left text-md-right">
                                                <button class="btn btn-outline-warning btn-sm" type="submit">Update Cart</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount" style="text-align: right;"><strong>{{$Cart->get_Total_price()}}.000đ</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('Cart.checkOut')}}" class="btn btn-fill-out">Proceed To CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
    <script>
        $('.plus').on('click', function() {
            if ($(this).prev().val()) {
                $(this).prev().val(+$(this).prev().val() + 1);
            }
        });
        $('.minus').on('click', function() {
            if ($(this).next().val() > 1) {
                if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
            }
        });
    </script>
@stop