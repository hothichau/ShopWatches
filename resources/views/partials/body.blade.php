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
if(isset($_GET['addCart'])){
    echo "<script> alert('".$_GET['addCart']."');</script>";
}
if(isset($_GET['toLogin'])){
    echo "<script> alert('".$_GET['toLogin']."');</script>";
}
if(isset($_GET['order'])){
    echo "<script> alert('".$_GET['order']."');</script>";
}
if(isset($_GET['noLogin'])){
    echo "<script> alert('".$_GET['noLogin']."');</script>";
}
if(isset($_GET['noAdmin'])){
    echo "<script> alert('".$_GET['noAdmin']."');</script>";
}
?>
    <div class="container">
        <h3 class="h3" style = "color: white;">Tất cả sản phẩm </h3> 
        <div style = "display: inline-flex;">
            <span style = "color: white; margin-right: 5px;"> Sắp xếp theo giá:  </span> 
            <form action="{{'/ascPrice'}}" method = "GET">
                <button type="submit" class="btn btn-success" style = "margin-right: 5px;">Tăng dần</button> 
            </form>
            <form action="{{'/descPrice'}}" method = "GET">
                <button type="submit" class="btn btn-success">Giảm dần</button>
            </form>
        </div>
        <hr>
        <div class="row">
            @foreach ($product as $watches)
            <?php 
            $discount = 0;
            if($watches->getDisplayoldPrice() > 0){
                $discount = 100-($watches->new_price*100)/$watches->old_price;
           }
           $giamgia = round($discount, 0, PHP_ROUND_HALF_UP)."%";
           ?>
            
            <div class="col-md-3 col-sm-6" >
                <div class="product-grid6" style = "border: 1px solid white; height: auto; margin-bottom: 15px;">
                    <span class="product-new-label" style = "border: solid 1px white; height: auto; background-color: white; float: left;"><b>SALE</b></span>
                    <span class="product-discount-label" style = "border: solid 1px white; height: auto; background-color: white; float:right;"><b><?php echo $giamgia; ?></b></span>
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
            <div class="pagination">
                <a style="margin: 7px;" href="/user/home/?page={{$page-1}}"><i style="color: white"
                        class="fas fa-backward" title="Previous"></i></a>
                <a style="margin: 7px;" href="/user/home/?page={{$page+1}}"><i style="color: white"
                        class="fas fa-forward" title="Next"></i></a>
            </div>
        </center>

    </div>
</body>

</html>