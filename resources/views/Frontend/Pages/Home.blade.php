@extends ('Frontend.master') 
@section('Home') 
<div id="demos" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner ">
        <div class="carousel-item imgess active ">
            <img src="{{url('assert')}}/images/trắng.jpg " alt="Los Angeles " width="100 " height="200 ">
            <div class="carousel-captions " style="color: black ">
                <div class="row justify-content-md-center ">
                    <span class="sp"><i class="fas fa-tags "></i></span>
                    <div class="fff">
                        <h5>Take up to An Extra 20% Off*</h5>
                        <p>Buy More save more</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item imgess ">
            <img src="{{url('assert')}}/images/trắng.jpg " alt="Chicago " width="100 " height="200 ">
            <div class="carousel-captions " style="color: black ">
                <div class="row justify-content-md-center ">
                    <span class="sp "><i class="fas fa-tags "></i></span>
                    <div class="fff ">
                        <h5>Take up to An Extra 20% Off*</h5>
                        <p>Buy More save more</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item imgess ">
            <img src="{{url('assert')}}/images/trắng.jpg " alt="New York " width="100 " height="200 ">
            <div class="carousel-captions " style="color: black ">
                <div class="row justify-content-center ">
                    <span class="sp "><i class="fas fa-tags "></i></span>
                    <div class="fff ">
                        <h5>Take up to An Extra 20% Off*</h5>
                        <p>Buy More save more</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active ">
            <img src="{{url('assert')}}/images/1.jpg " alt="Los Angeles " width="1100 " height="500 ">
            <div class="carousel-caption ">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
            </div>
        </div>
        <div class="carousel-item ">
            <img src="{{url('assert')}}/images/2.jpg " alt="Chicago " width="1100 " height="500 ">
            <div class="carousel-caption ">
                <h3>Chicago</h3>
                <p>Thank you, Chicago!</p>
            </div>
        </div>
        <div class="carousel-item ">
            <img src="{{url('assert')}}/images/3.jpg " alt="New York " width="1100 " height="500 ">
            <div class="carousel-caption ">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

<div class="container p-0 ">
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="banner " style="background-image: url({{url('assert')}}/images/bannerleft.jpg); ">
                <div class="banners wow bounceInLeft">
                    <div>
                        <p>Design Suite Jewelry</p>
                        <h3>ROYAL DIAMOND <br> COLLECTION</h3>
                    </div>
                    <div>
                        <span>20% OFF</span>
                        <button type="button " class="btn btn-warnings ">Shop Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="banner " style="background-image: url({{url('assert')}}/images/bannerright.jpg); ">
                <div class="banners wow bounceInRight">
                    <div>
                        <p>Design Suite Jewelry</p>
                        <h3>ROYAL DIAMOND <br> COLLECTION</h3>
                    </div>
                    <div>
                        <span>20% OFF</span>
                        <button type="button " class="btn btn-warnings ">Shop Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container p-0 ">
    <div class="row mb-50 ">
        <div class="col-xl-12 ">
            <div class="arrivals ">
                <h2>ARRIVALS EXPLORE</h2>
                <span>exclusive tyles only available at Facty</span>
                <div>
                    <span><i class="fas fa-gem "></i></span>
                </div>
            </div>
        </div>

        @foreach ($Product as $value)
        <div class="col-6 col-sm-6 col-md-3 col-xl-3">
            <div>
                <div class="products">
                    <div>
                        <a href="{{route('View',$value->slug)}}">
                            <img style="width: 100%; " src="{{url('uploads')}}/{{$value->image}}" alt=" ">
                        </a>
                    </div>
                    <div class="pppw">
                        <span class="badge-success badge badge-danger">SALE</span>
                    </div>
                    <div class="carrt ">
                        <a href="" id="ss" class="btn "><i class="fas fa-shopping-basket "></i></a>
                    </div>
                </div>
                <div class="prossss">
                    <div class="fssdfsdssss">
                        @if ($value->sale_price > 0)
                            <span class="ssdasdasd">{{$value->price-(($value->price * $value->Promotion->detail1)/100)}}.000đ</span>
                            <del>{{$value->price}}.000đ</del>
                            <span class="salwssss">{{$value->Promotion->detail1}}% Off</span>
                        @else
                            <del>{{$value->price}}.000đ</del>
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

<div class="container p-0 ">
    <div class="saveup " style="background-image: url( '{{url('assert')}}/images/banner4.jpg ') ">
        <div class="saveups ">
            <div>
                <h2 class="wow bounceInLeft">MY STERY DEALS <span>SAVE UP TO 50%</span></h2>
                <a ref=" ">EVEAL YOUR DEALS</a>
            </div>
            <div>
                <p>BUY ONLINE OR ORDER IN STORE</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-0 mt50 ">
    <div class="row no-gutters justify-content ">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <img style="width: 100%; height: 100%;" src="{{url('assert')}}/images/banner5.jpg " alt=" ">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 bannerblack ">
            <div class="bannerblacks ">
                <div>
                    <h1><span>A Classic Choice:</span><br>Diamind Stud Earrings</h1>

                </div>
                <div class="wow bounceInUp">
                    <p>Alienum phaedrum torquatu pericus nihil <br> expet in mei. Mei ula with touch markers <br>Alienum phaedrum torquat pericus nihil <br> expet in mei.</p>
                    <div>
                        <a href=" " class="btn btn-warning bannersss " style="color: rgb(10, 0, 0); ">SHOP DIAMOND STUDS</i></a>
                    </div>
                    <div>
                        <a href=" ">CONTACT BUILD YOUR OWN EARRINGS </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 bannerww ">
            <div class="bannerwws ">
                <div>
                    <p>LIMITED TIME ONLY</p>
                    <div>
                        <div class="limitd">
                            <div>
                                <h1 class="wow bounceInLeft">70</h1>
                            </div>
                            <div>
                                <p class="wow bounceInRight">% <span>OFF</span></p>
                            </div>
                        </div>
                        <div>
                            <h1 class="ffffa wow bounceInUp">GOLD</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href=" " class="btn btn-warning bannersss ">SHOP ALL GOLD</i></a>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
            <img style="width: 100%;height: 100%; " src="{{url('assert')}}/images/banner6.jpg " alt=" ">
        </div>
    </div>
</div>

<div class="Searchsssss " style="width:100%; ">
    <div class="container p-0 ">
        <div class="row no-gutters ">
            <div class="col-xl-3 Searchtext ">
                <h3>Search Foor Diamonds</h3>
                <a class="wow bounceInLeft" href=" ">START SHOPPING</a>
            </div>
            <div class="col-xl-9 ">
                <div class="owl-carousel owl-theme ">
                    <div class="item ">
                        <img style="width: 100%; " src="{{url('assert')}}/images/ring_slider_1.jpg" alt=" ">
                    </div>
                    <div class="item ">
                        <img style="width: 100%; " src="{{url('assert')}}/images/ring_slider_2.jpg" alt=" ">
                    </div>
                    <div class="item ">
                        <img style="width: 100%; " src="{{url('assert')}}/images/ring_slider_3.jpg" alt=" ">
                    </div>
                    <div class="item ">
                        <img style="width: 100%; " src="{{url('assert')}}/images/ring_slider_4.jpg" alt=" ">
                    </div>
                    <div class="item ">
                        <img style="width: 100%; " src="{{url('assert')}}/images/ring_slider_5.jpg" alt=" ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container p-0 ">
    <div class="row mb500 ">
        <div class="col-xl-12 ">
            <div class="arrivals ">
                <h2>LUXURY JEWELLERY</h2>
                <span>exclusive styles only available at Facty</span>
                <div>
                    <span><i class="fas fa-gem "></i></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 p-0 ">
            <div class="productNew " style="background-image: url({{url('assert')}}/images/banner8.jpg) ">
                <div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 ">
            <div class="row ">
                @foreach ($Products as $value)
                <div class="col-6 col-sm-6 col-md-4 col-xl-4">
                    <div>
                        <div class="products">
                            <div>
                                <a href="{{route('View',$value->slug)}}">
                                    <img style="width: 100%; " src="{{url('uploads')}}/{{$value->image}}" alt=" ">
                                </a>
                            </div>
                            <div class="pppw">
                                <span class="badge badge-pill badge-success ">New</span>
                            </div>
                            <div class="carrt ">
                                <a href="" id="ss" class="btn "><i class="fas fa-shopping-basket "></i></a>
                            </div>
                        </div>
                        <div class="prossss">
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
    </div>
</div>

<div class="container p-0 mttt ">
    <div class="row imagesssf " style="background-image: url({{url('assert')}}/images/banner7.jpg); ">
        <div class="aooooo "></div>
        <div class="col-md-6 offset-md-6 col-lg-6 offset-lg-6 col-xl-6 offset-xl-6 ">
            <div class="word ">
                <h1 class="wow bounceInRight"> JEWELLERY AROUND <br> THE WORLD</h1>
                <p class="wow bounceInRight">90 boutiques & Shops in 23 countries</p>
                <div class="wow bounceInUp">
                    <a href=" " class="btn btn-warning bannersss ">SHOP ALL GOLD</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container " style="margin-bottom:70px; ">
    <div class="row ">
        <div class="col-xl-12 ">
            <div class="arrivals ">
                <h2>LATEST NEWS</h2>
                <span>exclusive styles only available at Facty</span>
                <div>
                    <span><i class="fas fa-gem "></i></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 ">
            <a href=" ">
                <figure class="snip0042 blue ">
                    <figcaption>
                        <h2>Jill <span>Masterton</span></h2>
                        <p>If you couldn't find any weirdness, maybe we 'll just have to make some!</p>
                        <div class="icons ">
                            <a href="# "><i class="ion-ios-home "></i></a>
                            <a href="# "><i class="ion-ios-email "></i></a>
                        </div>
                    </figcaption>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample6.jpg " alt="sample6 " />
                    <div class="position ">Human Resources</div>
                </figure>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 ">
            <a href=" ">
                <figure class="snip0042 blue ">
                    <figcaption>
                        <h2>Jill <span>Masterton</span></h2>
                        <p>If you couldn't find any weirdness, maybe we 'll just have to make some!</p>
                        <div class="icons ">
                            <a href="# "><i class="ion-ios-home "></i></a>
                            <a href="# "><i class="ion-ios-email "></i></a>
                        </div>
                    </figcaption>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample6.jpg " alt="sample6 " />
                    <div class="position ">Human Resources</div>
                </figure>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 ">
            <a href=" ">
                <figure class="snip0042 blue ">
                    <figcaption>
                        <h2>Jill <span>Masterton</span></h2>
                        <p>If you couldn't find any weirdness, maybe we 'll just have to make some!</p>
                        <div class="icons ">
                            <a href="# "><i class="ion-ios-home "></i></a>
                            <a href="# "><i class="ion-ios-email "></i></a>
                        </div>
                    </figcaption>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample6.jpg " alt="sample6 " />
                    <div class="position ">Human Resources</div>
                </figure>
            </a>
        </div>
    </div>
</div>
@stop
@section('Homejs')
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