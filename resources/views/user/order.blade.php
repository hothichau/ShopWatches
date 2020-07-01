<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<style>
form {
    width: 50%;
    text-align: left;
    background-color: white;
    padding: 20px;
    border-radius: 2%;
	margin-left: 15px;

}

input[type=text],
select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

body {
    background-image: url('https://donghosk.com/wp-content/uploads/2019/09/2-dong-ho-rado-silver-star-rdss02tr-600-600.jpg');
}
</style>
<body>
<form action="/order" method="get" enctype="multipart/form-data">
    <div>
        
        <center><h3>Cập nhật thông tin tài khoản</h3></center> 
       
            @csrf
            @method("PATCH")
			@if(Auth::user())
			<?php $user=Auth::user();?>
            <label for="name">Tên người nhận</label>
            <input type="text" id="name" name="username" value = "{{$user->username}}" >

            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" value = "{{$user->address}}"  required>

            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" value = "{{$user->phone}}">

			@endif
        
	</div>
	
	<div class="" style = " position: absolute;margin-top: -315px; margin-left: 750px;">

		<div class="col-xs-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-6">
								<button type="button" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span><a href="/user/home" style = "color: white;text-decoration: none;">Continue shopping</a>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
				<?php $total = 0 ?>
					@foreach($carts as $cart)
					@foreach($cart->product as $pro)
					<div class="row" style = "border-bottom: 0.3px solid black;">
						<div class="col-xs-2"><img class="img-responsive" src="{{'/storage/'.$pro->image }}">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong>{{ $pro->name}}</strong></h4><h6>Quantity: <small>{{ $cart->quantity}}</small></h6>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6>Price: <strong><?php
                                    echo number_format($pro->new_price * $cart->quantity,0,',','.')." vnđ";
                                ?></strong></h6>
							</div>
							<?php $total += $pro->new_price * $cart->quantity ?>
							
						</div>
					</div>
					@endforeach
					@endforeach
					<div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								<h6 class="text-right">Thêm hàng</h6>
							</div>
							<div class="col-xs-3">
								<button type="button" class="btn btn-default btn-sm btn-block"><a href="/cart" style = "color: black;text-decoration: none;">Cập nhật giỏ hàng</a>
								</button>
							</div>
						</div>
						<div class="text-center">
							<div class="col-xs-9">
								<h6 class="text-right" name = "code">Nhập mã giảm giá</h6>
							</div>
							<div class="col-xs-3">
							<input type="text">
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
						<?php $fee = 35000; ?>
						<h5 class="text-right">Fee ship: <small><?php echo number_format($fee,0,',','.')." vnđ" ?></small></h5>
						<h5 class="text-right">Promotion code: <small><?php echo number_format(0,0,',','.')." vnđ" ?></small></h5>
						<?php $total += $pro->new_price * $cart->quantity + $fee ?>
							<h4 class="text-right">Total: <strong><?php echo number_format($total,0,',','.')." vnđ" ?></strong></h4>
						</div>
						<div class="col-xs-3">
						<button type="submit" class="btn btn-success">
							Thanh toán
						</button>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<form>
</body>	
