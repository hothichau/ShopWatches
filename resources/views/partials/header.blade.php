<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="/css/partials/header.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="w3-top">
            <div class="w3-bar">
                <span><i class="fab fa-google-plus-square"></i> </span>
                <span><i class="fab fa-facebook-square"></i></span>
                <span><i class="fab fa-twitter-square"></i></span>
                <span class="home"><i class="fas fa-home"></i></span> SHOP: 319 - C16 Lý Thường Kiệt, P.15, Q.11, Tp.HCM
                <span class="home"><i class="fas fa-phone-volume"></i> </span>HOTLINE: 076 922 0162
                <span class="w3-bar-right">
                    @if(Auth::user())
                    <span class="home"><i class="fas fa-user-shield"></i></i></span> {{Auth::user()->username}}
                    <span>|</span>
                    <span class="home"><i><i class="fas fa-sign-out-alt"></i></i></span><a
                        href="{{ url('/auth/logout') }}">Đăng xuất</a>
                    @else
                    <a href="{{ url('/auth/login') }}">Đăng nhập /</a>

                    <a href="{{ url('/auth/register') }}"> Đăng ký</a>
                    @endif
                </span>
                </span>
            </div>
        </div>
    </div>
    <ul class="ul">
        <li><a href="{{ url('/user/home') }}">Trang chủ</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Sản phẩm</a></li>
        @if( Auth::user())
           @if(Auth::user()->role == "admin")
            <li><a href="{{ url('/admin/dashboard') }}">Quản lý</a></li>
           @endif
        else
            @if(Auth::user()->role == "user")
            <li><a href="">Liên hệ</a></li>
           @endif
        @endif
        <li class="logo"> <img src="http://mauweb.monamedia.net/gwatch/wp-content/uploads/2018/11/logo-mwatch-02.png"
                alt="" style="height: 70px; width: auto;"> </li>

        <li class="search-icon">
        <form class="navbar-form navbar-left" action="/admin/watches/find" method="post">
        @csrf
            <input type="search" placeholder="Tìm kiếm"><button name="txtSearch" class="icon"><i
                    class="fas fa-search"></i></button>
        </form>
        </li>
        <span class="w3-bar-right">
            <a class="cart" href="#projects">Giỏ hàng <span> / </span> <i class="fas fa-cart-plus"></i> </a>
    </ul>


</body>

</html>