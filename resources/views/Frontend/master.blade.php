<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Css -->
    <link rel="stylesheet" href="{{url('assert')}}/css/home.css">
    <link rel="stylesheet" href="{{url('assert')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('assert')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('assert')}}/css/WOW-master/css/libs/animate.css">
    <script src="{{url('assert')}}/css/WOW-master/dist/wow.min.js"></script>
    @yield('HomeCss')
    @yield('ProductCss')
    @yield('ViewCss')
    @yield('Cartcss')
    @yield('checkoutcss')
    <!-- //jquery -->
    <script>
        new WOW().init();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Title</title>
</head>

<body>
    <header style="background-color: #eeeeee4d;">
        <div class="container p-0 mat">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div style="display:none; ">
                    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarSupportedContent " aria-controls="navbarSupportedContent " aria-expanded="false " aria-label="Toggle navigation ">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse " id="navbarSupportedContent ">
                    <div style="width: 100%; ">
                        <ul class="navbar-nav ">
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m16" style="color: #ffc107; " href="# ">Healpline: <span style="color: #494747; font-size: 15px;">0868442465</span></a>
                            </li>
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m16" href="# ">Chat</a>
                            </li>
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m16" href="# ">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div style="width: 100%; ">
                        <ul class="navbar-nav justify-content-end ">
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m16 {{!Auth::check()? '': 'disabled'}}" href="{{route('SignUp')}}">Register</a>
                            </li>
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m16" href="# ">Order Status</a>
                            </li>
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m16" href="# ">Find A Location</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container p-0 mat">
            <nav class="navbar navbar-expand-xl navbar-light " style="width: 100%; margin-bottom: 10px; ">
                <div class="collapse navbar-collapse ">
                    <div class="row no-gutters " style="width: 100%; ">
                        <div class="col-xl-4 ">
                            <div>
                                <ul class="navbar-nav ">
                                    <span class="sp "><i class="fas fa-shipping-fast "></i></span>
                                    <li class="nav-item sile ">
                                        <a class="nav-link " href="# ">
                                            <h5>PREE SHIPPING EVERY DAY</h5>
                                            <span>to your door with any purchase of $149</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 " style="text-align: center; ">
                            <div>
                                <img class="wow bounceInDown" style="width: 55% " src="{{url('assert')}}/images/logo.png " alt=" ">
                            </div>
                        </div>
                        <div class="col-xl-4 ">
                            <div>
                                <div class="input-group ">
                                    <input type="search " class="form-controls " placeholder="search enter store here.... " aria-label="Search " aria-describedby="search-addon " />
                                    <span class="input-group-texts border-0 " id="search-addon ">
                                        <i class="fas fa-search "></i>
                                    </span>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div style="background-color: #afadad5e!important;">
            <div class="container p-0 ">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarsss" aria-controls="navbarsss" aria-expanded="false " aria-label="Toggle navigation ">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarsss">
                        <ul class="navbar-nav">
                            <li class="nav-item active ">
                                <a id="jjjjjjj" class="nav-link m15 " href="{{route('Homes')}}">Home</a>
                            </li>
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m15 " href="# ">About</a>
                            </li>
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m15 " href="{{route('Product')}}">Product</a>
                            </li>
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m15 " href="# ">Blog</a>
                            </li>
                            <li class="nav-item ">
                                <a id="jjjjjjj" class="nav-link m15 " href="# "> contact</a>
                            </li>
                        </ul> 
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle m15" href="#" id="navbardrop" data-toggle="dropdown">
                                    @if (!Auth::check())
                                        Account
                                     @else
                                        {{Auth::user()->name}}
                                    @endif
                                </a>
                                <div class="dropdown-menu">
                                    @if (!Auth::check())
                                        <a class="dropdown-item" href="{{route('Signin')}}">Log in</a>
                                        <a class="dropdown-item" href="{{route('SignUp')}}">Register</a>  
                                    @else
                                        <a class="dropdown-item" href="#">Information</a>
                                        <a class="dropdown-item" href="{{route('logout')}}">Log out</a>
                                    @endif                
                                </div>
                            </li>
                            <li class="nav-item">
                                <a id="jjjjjjj" class="nav-link m15 ssasasa" href="{{route('Show_cart')}}" ><i style="font-size:24px" class="fas fa-shopping-bag"></i>
                                    <span>({{$Cart->get_Total_quantity()}})</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('Products')
    @yield('Home')
    @yield('Product_Category')
    @yield('Product_Brand')
    @yield('Product_Promotion')
    @yield('Product_View')
    @yield('ShowCart')
    @yield('CheckOut')
    <div id="footer " style="background-image: url('{{url('assert')}}/images/footer_jew.jpg '); ">
        <div class="container-fluid ">
            <section>
                <div class="container " style="padding: 50px; ">
                    <div class="row text-center " style="text-align: center; ">
                        <div class="col-xs-12 col-sm-4 col-md-12 col-xl-12 " style="padding: 20px; ">
                            <img style="width: 20%; " src="{{url('assert')}}/images/logo2.png " alt=" ">
                            <div style="color:white; padding-top: 20px; ">
                                <p>Alienum phaedrum torquatu pe us nihil expet in mei. Mei ula <br> wit touch markersi m phaedrum tor lorim uilmes ilmes..</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                            <ul class="list-unstyled quick-links ">
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Investor Center</a></li>
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Check Order Startus</a id="adasas"></li>
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Professional Care Plan</a id="adasas"></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                            <ul class="list-unstyled quick-links ">
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Website Terms</a id="adasas"></li>
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Website Terms</a id="adasas"></li>
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Refund Policy</a id="adasas"></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                            <ul class="list-unstyled quick-links ">
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Privacy Statement</a id="adasas"></li>
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Privacy Disclaimers</a id="adasas"></li>
                                <li><a id="adasas" href="javascript:void(); "><i class="fa fa-angle-double-right "></i>Sitemap</a id="adasas"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 mt-2 mt-sm-5 ">
                            <ul class="list-unstyled list-inline social text-center ">
                                <li class="list-inline-item "><a id="adasas" href="javascript:void(); "><i class="fab fa-facebook-square "></i></a id="adasas"></li>
                                <li class="list-inline-item "><a id="adasas" href="javascript:void(); "><i class="fab fa-instagram "></i></a id="adasas"></li>
                                <li class="list-inline-item "><a id="adasas" href="javascript:void(); "><i class="fab fa-youtube "></i></a id="adasas"></li>
                                <li class="list-inline-item "><a id="adasas" href="javascript:void(); " target="_blank "><i class="fa fa-envelope "></i></a id="adasas"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 mt-2 mt-sm-2 text-center text-white ">
                            <p class="h6 ">Fatcy - Copyright 2020.<a id="adasas" class="text-green ml-2 " href=" " target="_blank ">Design JWSTHEMES.</a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    @yield('ProductJs')
    @yield('Homejs')
    @yield('ViewJs')
</body>

</html>