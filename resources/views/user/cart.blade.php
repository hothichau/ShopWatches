<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Tổng</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object"
                                        src="{{'/storage/'.$cart->image}}" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$cart->name}}</a></h4>
                                    <h5 class="media-heading"><a href="#">Thương hiệu: Avior</a></h5>
                                    <span>Trạng thái: </span><span class="text-success"><strong>Còn hàng</strong></span>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="number" class="form-control" name="quantity" value="1">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$cart->oldPrice}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong> </strong></td>
                        <td class="col-sm-1 col-md-1">
                            <form action='{{"/cart/watches/".$cart->id}}' method="POST">
                                @csrf
                                @method("DELETE")
                        <td> <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Xóa
                            </button></td>
                        </form>

                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <h5>Tạm tính</h5>
                        </td>
                        <td class="text-right">
                            <h5><strong></strong></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <h5>Phí ship</h5>
                        </td>
                        <td class="text-right">
                            <h5><strong></strong></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <h3>Tổng</h3>
                        </td>
                        <td class="text-right">
                            <h3><strong></strong></h3>
                        </td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> <a href="/user/home">Tiếp tục
                                    mua </a>
                            </button></td>
                        <td>
                            <button type="button" class="btn btn-success">
                                Đến bước tiếp theo <span class="glyphicon glyphicon-play"></span>
                            </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>