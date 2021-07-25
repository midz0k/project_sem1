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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{url('assert')}}/css/Admin.css">
    <!-- //jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function(){
          $("#delete").click(function(){
            alert("Liên Quan Khóa Ngoại. Bạn Có Chắc Muốn Xóa Không?");
          });
        });
    </script> --}}
    <script>
        setTimeout(function() {$('#hide').hide()}, 4000);
    </script>
    {{-- <script>
        function Dong_ho() {
            var gio = document.getElementById("gio");
            var phut = document.getElementById("phut");
            var giay = document.getElementById("giay");
            var Gio_hien_tai = new Date().getHours();
            var Phut_hien_tai = new Date().getMinutes();
            var Giay_hien_tai = new Date().getSeconds();
            gio.innerHTML = Gio_hien_tai;
            phut.innerHTML = Phut_hien_tai;
            giay.innerHTML = Giay_hien_tai;
        }
       var Dem_gio = setInterval(Dong_ho, 1000);
    </script> --}}
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Bootstrap Admin Sidebar</h4>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="#"><i style='font-size:24px' class='fas'>&#xf2bd;</i> Account</a>
                </li>
            </ul>
            <ul class="list-unstyled components">
                <li>
                    <a href="{{route('Home')}}">- Home</a>
                </li>
                <li>
                    <a href="#Category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">- Category</a>
                    <ul class="collapse list-unstyled" id="Category">
                        <li>
                            <a href="{{route('TableCategory')}}">Danh Sách</a>
                        </li>
                        <li>
                            <a href="{{route('Create')}}">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#brand" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">- Brand</a>
                    <ul class="collapse list-unstyled" id="brand">
                        <li>
                            <a href="{{route('TableBrand')}}">Danh Sách</a>
                        </li>
                        <li>
                            <a href="{{route('CreateBrand')}}">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#brand_Cate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">- Brand_Category</a>
                    <ul class="collapse list-unstyled" id="brand_Cate">
                        <li>
                            <a href="{{route('Table-Brand-Category')}}">Danh Sách</a>
                        </li>
                        <li>
                            <a href="{{route('Create-Brand')}}">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#color" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">- Color</a>
                    <ul class="collapse list-unstyled" id="color">
                        <li>
                            <a href="{{route('TableColor')}}">Danh Sách</a>
                        </li>
                        <li>
                            <a href="{{route('CreateColor')}}">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#promotions" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">- Promotion</a>
                    <ul class="collapse list-unstyled" id="promotions">
                        <li>
                            <a href="{{route('TablePromotion')}}">Danh Sách</a>
                        </li>
                        <li>
                            <a href="{{route('CreatePromotion')}}">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#Product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">- Product</a>
                    <ul class="collapse list-unstyled" id="Product">
                        <li>
                            <a href="{{route('TableProduct')}}">Danh Sách</a>
                        </li>
                        <li>
                            <a href="{{route('CreateProduct')}}">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#Banner" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">+ Banner</a>
                    <ul class="collapse list-unstyled" id="Banner">
                        <li>
                            <a href="">Danh Sách</a>
                        </li>
                        <li>
                            <a href="">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#BlogCate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">+ Blog Category</a>
                    <ul class="collapse list-unstyled" id="BlogCate">
                        <li>
                            <a href="">Danh Sách</a>
                        </li>
                        <li>
                            <a href="">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#Blog" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">+ Blog</a>
                    <ul class="collapse list-unstyled" id="Blog">
                        <li>
                            <a href="">Danh Sách</a>
                        </li>
                        <li>
                            <a href="">Thêm Mới</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('Home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('TableCategory')}}">Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('TableProduct')}}">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('TableUrer')}}">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" ><i style="font-size:24px" class="fa">&#xf0e6;</i><span class="badge badge-light">2</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" ><i style='font-size:24px' class='fas'>&#xf2bd;</i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid" script="margin-bottom: 150px;">
                @yield('Home')
                {{-- Category --}}
                @yield('CreateCategory')
                @yield('TableCategory')
                @yield('EditeCategory')
                {{-- Brand --}}
                @yield('TableBrand')
                @yield('CreateBrand')
                @yield('EditBrand')
                {{-- Color --}}
                @yield('TableColor')
                @yield('CreateColor')
                @yield('EditColor')
                {{-- Promotion --}}
                @yield('CreatePromotion')
                @yield('TablePomotion')
                @yield('EditPromotion')
                {{-- Product --}}
                @yield('CreateProduct')
                @yield('EditProduct')
                @yield('TableProduct')
                {{-- Users --}}
                @yield('TableUsers')
                @yield('CreateBrand_Category')
                @yield('TableBrand-Categor')
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(`#sort`).on (`change`,function(){
                var url = $(this).val();
                if(url) {
                    window.location = url;
                }
                return false;
           });
        });
    </script>
    <script type="text/javascript">
        function ChangeToSlug()
            {
                var slug;
             
                //Lấy text từ thẻ input title 
                slug = document.getElementById("slug").value;
                slug = slug.toLowerCase();
                //Đổi ký tự có dấu thành không dấu
                    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slug = slug.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slug = slug.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                document.getElementById('convert_slug').value = slug;
            }
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    @yield('script')
    @yield('Search')
</body>

</html>