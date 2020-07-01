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

    <div class="wrapper">
        <nav class="menu">
            <ul class="clearfix">
                <li class="logo"> <img
                        src="http://mauweb.monamedia.net/gwatch/wp-content/uploads/2018/11/logo-mwatch-02.png" alt=""
                        style="height: 40px; width: auto;padding: 5px;"> </li>
                <li><a href="{{ url('/user/home') }}">Trang chủ</a></li>
                <li>
                    <a href="#">Sản phẩm<span class="arrow">&#9660;</span></a>

                    <ul class="sub-menu">
                    <?php $cate = Session::get('categories'); ?>
                    @foreach($cate as $category)
                        <li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
                    @endforeach    
                    </ul>
                </li>
                @if(Auth::user())
                    @if(Auth::user()->role == "admin")
                        <li><a href="{{ url('/admin/dashboard') }}">Quản lý</a></li>
                    @elseif(Auth::user()->role == "" || Auth::user()->role == "user")
                    <li><a href="">Liên hệ</a></li>
                    @endif
                @endif
                <li class="search-icon">
                    <form class="form-inline md-form mr-auto mb-4" action="/search" method="post">
                        @csrf
                        <input class="form-control mr-sm-2" name = "search" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    </form>
                </li>
                <li>
                @if(Session::has('totalQuantity'))
                <?php $quantity = Session::get('totalQuantity'); ?>
                <a style = "font-size: 18px;color: white;" class="cart" href="{{ url('/cart') }}">Giỏ hàng <span> / </span> <i class="fas fa-cart-plus"><sup>( <?php echo $quantity; ?>  )</sup></i> </a>
                @else
                <a style = "font-size: 18px;color: white;" class="cart" href="{{ url('/cart') }}">Giỏ hàng <span> / </span> <i class="fas fa-cart-plus"><sup>(0)</sup></i> </a>
                @endif
                </li>    
            </ul>
        </nav>
    </div>


</body>

</html>