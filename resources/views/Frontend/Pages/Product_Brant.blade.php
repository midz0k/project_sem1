@extends ('Frontend.master') 
@section('ProductCss')
<link rel="stylesheet" href="{{url('assert')}}/css/Product.css">
@stop
@section('Product_Brand') 
<div class="prssdasd" style="background-image: url({{url('uploads')}}/slidershow1-2-1820x785_1820x785.jpg); ">
    <div style="background: radial-gradient(100% 100% at 50% 0%, #ffffff 0%, #efefefad 100%);">
        <div class="container">
            <div class="sadasds">
                <h4>Home <span>Product</span></h4>
            </div>
        </div>
    </div>
</div>
<div class="main_content">
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>
                            <ul class="widget_categories">
                                @foreach ($Category as $value)
                                    <li><a href="{{route('Category_Product',$value->slug)}}">- {{$value->name}}<span class="categories_num">({{$value->Product->count()}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Promotion</h5>
                            <ul class="widget_categories">
                                @foreach ($Promotion as $value)
                                    <li><a href="{{route('Promotion_Product',$value->name)}}">- Sale {{$value->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Filter</h5>
                            <div class="filter_price">
                                <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 10%; width: 50%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 10%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span>
                                </div>
                                <div class="price_range">
                                    <span>Price: <span id="flt_price">$50 - $300</span></span>
                                    <input type="hidden" id="price_first">
                                    <input type="hidden" id="price_second">
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Brand</h5>
                            <ul class="widget_categories">
                                @foreach ($Brand as $value)
                                    <li><a href="{{route('Brand_Product',$value->slug)}}">- {{$value->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Color</h5>
                            <div class="product_color_switch">
                                @foreach ($Color as $value)
                                    <a href="{{route('Color_Product',$value->slug)}}"><span style="background-color: {{$value->code_color}};"></span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">

                                </div>
                                <div class="product_header_right">
                                    <form>
                                        @csrf
                                        <select class="form-control" name="sort" id="sort">
                                            <option>-----Lọc Sản Phẩm-----</option>
                                            <option value="{{Request::url()}}?sort_by=giam">--Giá Giảm Dần--</option>
                                            <option value="{{Request::url()}}?sort_by=tang">--Giá Tăng Dần--</option>
                                            <option value="{{Request::url()}}?sort_by=new">--Sản Phẩm Mới Nhất--</option>
                                            <option value="{{Request::url()}}?sort_by=sale">--Sản Phẩm Sale--</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_az">--A đến Z--</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_za">--Z đến A--</option>
                                            <option value="{{Request::url()}}">--Không--</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($Bran->Product->count() > 0)
                    <div class="row shop_container list">
                        @foreach ($Bran->Product as $value)
                        <div class="col-md-4 col-6">
                            <div class="product">
                                <div class="product_img">
                                    <a href="{{route('View',$value->slug)}}">
                                        @if ($value->sale_price > 0)
                                            <span class="pr_flash bg-danger">SALE</span>
                                        @else
                                            <span class="pr_flash bg-success">New</span>
                                        @endif     
                                        <img src="{{url('uploads')}}/{{$value -> image}}" class="img-thumbnail" style="width: 100%;" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>
                                                Add To Cart</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title" style="font-size: 30px; font-weight: 700;margin-top: 10px;"><a href="{{route('View',$value->slug)}}">{{$value->name}}</a></h6>
                                    <div class="product_price">
                                        @if ($value->sale_price > 0)
                                            <span class="price">{{$value->price-(($value->price * $value->Promotion->detail1)/100)}}.000đ</span>
                                            <del>{{$value->price}}.000đ</del>
                                            <div class="on_sale">
                                                <span>{{$value->Promotion->detail1}}% Off</span>
                                            </div>
                                        @else
                                            <span class="price">{{$value->price}}.000đ</span>
                                        @endif
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                    </div>
                                    <div class="pr_desc">
                                        <p style="font-size: 18px;">{{$value->description}}</p>
                                    </div>
                                    <div class="pr_switch_wrap" style="margin-top: 20px;">
                                        <div class="product_color_switch">
                                            @foreach ($value->getColorById($value->id) as $value)
                                                <span class="" style="background-color: {{$value->code_color}};"></span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="list_product_action_box" style="margin-top: 20px;">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i>
                                                    Add To Cart</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>   
                    @else
                    <div class="row shop_container list" style="float: right;">
                        <div class="alert alert-success">
                            <strong>Xin Lỗi!</strong> Nhãn Hiệu Này Hiện Tại Chưa Có Sản Phẩm Nào.
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
</div>
@stop
@section('ProductJs')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{url('assert')}}/jquery/product.js">
<script>
    $('.product_color_switch span').each(function() {
        var get_color = $(this).attr('data-color');
        $(this).css("background-color", get_color);
    });

    $('.product_color_switch span,.product_size_switch span').on("click", function() {
        $(this).siblings(this).removeClass('active').end().addClass('active');
    });
</script>
@stop