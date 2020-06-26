<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag -------- -->
<link href="/css/user/show.css" type="stylesheet">
<link href="/js/detail.js" type="javascript">
<!DOCTYPE html>
<html>

<body>
    @include('/partials/header')
    <hr>
    <div class="container" style="padding-top: 100px; color : black">
        <div class="row">
            <div class="col-xs-4 item-photo">
                <img style="max-width:100%;" src="{{'/storage/'.$show->image}}" />
            </div>
            <div class="col-xs-5" style="border:0px solid gray">
                <!-- Datos del vendedor y titulo del producto -->
                <h3 style="color:#337ab7">Tên sản phẩm: <span style="color:#000">{{$show->name}}</span></h3>
                <h5 style="color:#337ab7"> <a href="#">Lượt xem: </a><small style="color:#337ab7"></small></h5>
                <!-- Precios -->
                <h6 style="color:#337ab7" class="title-price">Giá: <span style="color:#000">{{$show->getDisplaynewPrice()}}</span></h6>
                <h6 style="color:#337ab7">Mô tả: <span style="color:#000">{{$show->description}}<span></h6>
                <!-- Botones de compra -->
                <div class="section" style="padding-bottom:20px;">
                <form action="/addToCart/".{{$show->id}}" method = "get">
                    <button class="btn btn-success"><span style="margin-right:20px"
                            class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Thêm vào giỏ
                        hàng</button>
                    </form>

                </div>
            </div>
        </div>


    </div>

    @include('/partials/footer')
</body>

</html>