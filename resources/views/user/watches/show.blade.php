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
    <div class="container" style = "padding-top: 100px; color : black">
        <div class="row">
            <div class="col-xs-4 item-photo">
                <img style="max-width:100%;"
                    src="{{'/storage/'.$show->image}}" />
            </div>
            <div class="col-xs-5" style="border:0px solid gray">
                <!-- Datos del vendedor y titulo del producto -->
                <h3 style="color:#000">Tên sản phẩm: {{$show->name}}</h3>
                <h5 style="color:#337ab7"> <a href="#">Lượt xem</a> · <small style="color:#337ab7">(5054
                        ventas)</small></h5>
                <!-- Precios -->
                <h6 class="title-price"><small>Giá</small></h6>
                <h3 style="color:#000" style="margin-top:0px;">{{$show->newPrice}}</h3>

                <div class="section" style="padding-bottom:20px;">
                    <h6 class="title-attr"><small>Số lượng</small></h6>
                    <div>
                        <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                        <input value="1" />
                        <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                    </div>
                </div>

                <!-- Botones de compra -->
                <div class="section" style="padding-bottom:20px;">
                    <button class="btn btn-success"><span style="margin-right:20px"
                            class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Thêm vào giỏ
                        hàng</button>
                    
                </div>
            </div>
        </div>


        </div>
       
        @include('/partials/footer')
</body>

</html>