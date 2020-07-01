<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/partials/body.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="container">
        <h5><a href="/user/home" style = "text-decoration: none;"><< Quay lại trang chủ</a></h5>
        <h3 class="h5">Kết quả tìm kiếm trùng với từ khóa <span style = "color: red;">{{$search}}</span> </h3>
        <hr>
        <div class="row">
        @foreach($product as $watches)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid6" style = "border: 1px solid black; height: auto; margin-bottom: 15px;">
                    <div class="product-image6">
                        <a href="#">
                            <img class="pic-1" src="{{'/storage/'.$watches->image}}">
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a style = "color: black;" href="#">{{$watches->name}}</a></h3>
                        <div class="price" style = "color: black;" >{{$watches->getDisplayoldPrice()}}
                            <span style = "color: black; ">{{$watches->getDisplaynewPrice()}}</span>
                        </div>
                    </div>
                    <ul class="social">
                    <li><a href="/user/watches/{{$watches->id}}/show" data-tip="View detail"><i class="fa fa-shopping-bag"></i></a></li>
                        
                        <li><a href="/user/cart/{{$watches->id}}/cart" data-tip="Add to Cart" value = ""><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <hr>
</body>

</html>