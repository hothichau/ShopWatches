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
    <?php
if (isset($_GET['error'])) {
echo "<script> alert('" . $_GET['error'] . "'); </script>";
}
if (isset($_GET['cart'])) {
echo "<script> alert('" . $_GET['cart'] . "'); </script>";
}
?>
    <div class="container">
        <h3 class="h3">Sản phẩm </h3>
        <hr>
        <div class="row">
            @foreach ($product as $watches)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid6">
                    <div class="product-image6">
                        <a href="#">
                            <img class="pic-1" src="{{'/storage/'.$watches->image}}">
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">{{$watches->name}}</a></h3>
                        <div class="price">{{$watches->getDisplayoldPrice()}}
                            <span>{{$watches->getDisplaynewPrice()}}</span>
                        </div>
                    </div>
                    <ul class="social">
                        <!-- <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li> -->
                        <li><a href="/user/watches/{{$watches->id}}/show" data-tip="View detail"><i
                                    class="fa fa-shopping-bag"></i></a></li>

                        <li><a href="/addToCart/{{$watches->id}}" data-tip="Add to Cart" value=""><i
                                    class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <center>
        <div class = "pagination">
            <a style = "margin: 7px;"href="/user/home/?page={{$page-1}}"><i style = "color: white" class="fas fa-backward" title = "Previous"></i></a>
           <a style = "margin: 7px;"href="/user/home/?page={{$page+1}}"><i style = "color: white" class="fas fa-forward" title = "Next"></i></a>
            
        </div>
        </center>
      
    </div>
</body>

</html>