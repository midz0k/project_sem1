@extends ('Frontend.master') 
@section('ViewCss')
<link rel="stylesheet" href="{{url('assert')}}/css/view.css">
<link rel="stylesheet" href="{{url('assert')}}/css/Product.css">
@stop
@section('ViewJs')
<link rel="stylesheet" href="{{url('assert')}}/css/view.js">
@stop
@section('Product_View') 
<div class="prssdasd" style="background-image: url({{url('uploads')}}/slidershow1-2-1820x785_1820x785.jpg); ">
    <div style="background: radial-gradient(100% 100% at 50% 0%, #ffffff 0%, #efefefad 100%);">
        <div class="container">
            <div class="sadasds">
                <h4>Home <span>Product Details</span></h4>
            </div>
        </div>
    </div>
</div>
<div class="container p-0 m2999">
    <form action="{{route('Cart')}}" method="post">
    <div class="row">
        @csrf
        <input type="hidden" name="id" value="{{$Product->id}}">
        <div class="col-xl-4">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper-container mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{url('uploads')}}/{{$Product -> image}}" />
                    </div>
                    @foreach ($Product->imageAttr($Product -> id) as $value)
                        <div class="swiper-slide">
                            <img src="{{url('uploads')}}/{{$value -> image}}" />
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{url('uploads')}}/{{$Product -> image}}" />
                    </div>
                    @foreach ($Product->imageAttr($Product -> id) as $value)
                        <div class="swiper-slide">
                            <img src="{{url('uploads')}}/{{$value -> image}}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-7 sadsdasd">
            <div class="tieus">
                <p style="font-weight: 700;">Brand: {{$Product->Brand->name}}</p>
                <h2>{{$Product->name}}</h2>
            </div>
            <div style="margin-bottom: 10px;">
                <div class="fssdfsd">
                    @if ($Product->sale_price > 0)
                        <span class="ssdasdasd">{{$Product->price-(($Product->price * $Product->Promotion->detail1)/100)}}.000đ</span>
                        <del>{{$Product->price}}.000đ</del>
                        <span class="salwss">{{$Product->Promotion->detail1}}% Off</span>
                    @else
                        <span class="ssdasdasd">{{$Product->price}}.000đ</span>
                    @endif
                </div>
            </div>
            <div class="sadasdasdasd">
                <p class="huhuss">{{$Product->description}}</p>
                <p>1 Year AL Jazeera Brand Warranty </p>
                <p>30 Day Return Policy</p>
                <p>Cash on Delivery available</p>
            </div>
            <div class="pr_switch_wrap" style="margin-top: 20px;">
                <div class="product_color_switch" style="display:flex;">
                    <p style="font-weight: 700; margin-right: 10px;">Color: </p>
                    @foreach ($Product->getColorById($Product->id) as $value)
                        <span class="get_color " id="{{$value->id}}" style="background-color: {{$value->code_color}};"></span>
                    @endforeach
                </div>
                <input type="hidden" name="attr" class="attr">
            </div>
            <div class="sadasdas" style="display:flex;">
                <div class="cart-product-quantity">
                    <div class="quantity">
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                        <input type="button" value="+" class="plus">
                    </div>
                </div>
                <button type="submit" style="margin-left: 50px;" class="btn btn-warning">Add To Cart</button>
            </div>
            <div class="sfasfasf">
                <p>Category: <span>{{$Product->Category->name}}</span></p>
            </div>
        </div>
    </div>
    </form>
</div>

<div class="container p-0">
    <div>
        <h4 class="jdsfjdh">Reviews</h4>
    </div>
    <div class="container border" style="margin-bottom: 50px;"> 
        <div>
            <div class="media p-3">
                <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <div class="media-body">
                    <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="media p-3">
                        <img src="img_avatar2.png" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:45px;">
                        <div class="media-body">
                            <h4>Jane Doe <small><i>Posted on February 20 2016</i></small></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
                <button type="submit" id="comment" class="btn btn-warning">Submit</button>
            </div>
        </div>
    </div>
</div>

@if ($Proend->count() >=5 )
<div style="width:100%;" class="sdadasdsssss">
    <div class="container p-0 ">
        <div class="row no-gutters ">
            <div class="col-xl-12">
                <h3 class="ssassas">Related products</h3>
            </div>
            <div class="col-xl-12">
                <div class="owl-carousel owl-theme ">
                    @foreach ($Proend as $value)
                    <div class="item ">
                        <div>
                            <div class="products ">
                                <div>
                                    <a href="{{route('View',$value->slug)}}">
                                        <img style="width: 100%; " src="{{url('uploads')}}/{{$value->image}}" alt=" ">
                                    </a>
                                </div>
                                <div class="pppw ">
                                    <span class="badge badge-pill badge-success ">New</span>
                                </div>
                                <div class="carrt ">
                                    <a href="" id="ss" class="btn "><i class="fas fa-shopping-basket "></i></a>
                                </div>
                            </div>
                            <div class="prossss ">
                                <div class="fssdfsdssss">
                                    @if ($Product->sale_price > 0)
                                        <span class="ssdasdasd">{{$Product->price-(($Product->price * $Product->Promotion->detail1)/100)}}.000đ</span>
                                        <del>{{$Product->price}}.000đ</del>
                                        <span class="salwssss">{{$Product->Promotion->detail1}}% Off</span>
                                    @else
                                        <del>{{$Product->price}}.000đ</del>
                                    @endif
                                </div>
                                <a href="{{route('View',$value->slug)}}">
                                    {{$value->detail1}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container p-0 sdadasdsssss">
    <div class="row mb-50 ">
        <div class="col-xl-12">
            <h3 class="ssassas">Related products</h3>
        </div>
        @foreach ($Proend as $value)
        <div class="col-6 col-sm-6 col-md-3 col-xl-3">
            <div>
                <div class="products ">
                    <div>
                        <a href="{{route('View',$value->slug)}}">
                            <img style="width: 100%; " src="{{url('uploads')}}/{{$value->image}}" alt=" ">
                        </a>
                    </div>
                    <div class="pppw ">
                        <span class="badge badge-pill badge-success ">New</span>
                    </div>
                    <div class="carrt ">
                        <a href="" id="ss" class="btn "><i class="fas fa-shopping-basket "></i></a>
                    </div>
                </div>
                <div class="prossss ">
                    <div class="fssdfsdssss">
                        @if ($value->sale_price > 0)
                            <span class="ssdasdasd">{{$value->price-(($value->price * $value->Promotion->detail1)/100)}}.000đ</span>
                            <del>{{$value->price}}.000đ</del>
                            <span class="salwssss">{{$value->Promotion->detail1}}% Off</span>
                        @else
                            <span class="ssdasdasd">{{$value->price}}.000đ</span>
                        @endif
                    </div>
                    <a href="{{route('View',$value->slug)}}">
                        {{$value->name}}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<script src="{{url('assert')}}/css/view.js"></script>
<script>
    $('.get_color').click(function(){
        // alert('dsadasd')
        $('.attr').val(this.id);
    })
</script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
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
<script>
    $('.product_color_switch span').each(function() {
        var get_color = $(this).attr('data-color');
        $(this).css("background-color", get_color);
    });

    $('.product_color_switch span,.product_size_switch span').on("click", function() {
        $(this).siblings(this).removeClass('active').end().addClass('active');
    });
</script>
<script src="{{url('assert')}}/css/owl.carousel.js"></script>
<script>
    $('.owl-carousel ').owlCarousel({
        loop: true,
        margin: 10,
        dot: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
@stop

