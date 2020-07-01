<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shop Watches</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/admin/users.css">
</head>

<body>

    <center>
        <h3> Quản lý người dùng </h3>
        <a href="/user/home"><i class="fas fa-arrow-circle-left" style="width: 5em;"></i></a>
        <a href="/admin/watches"><i class="fas fa-arrow-circle-right" style="width: 5em;"></i></a>
    </center>
    <table id="table">
        <center>
            <center>
                <?php $model_id = 0; ?>
                <tr>
                    <th>Id</th>
                    <th>Tên người dùng</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Chi tiết sản phẩm</th>
                    <th>Giảm giá</th>
                    <th>Tổng giá</th>
                    <th>Trạng thái</th>
                    <th>Xóa</th>
                </tr>
                @foreach ($index as $bill)
                <tr>
                    <td> {{$bill->id}}</td>
                    <td> {{$bill->username}} </td>
                    <td> {{$bill->phone}} </td>
                    <td> {{$bill->address}} </td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#myModal{{$model_id}}" class = "btn btn-success">View Detail</button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal{{$model_id}}" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Chi tiết đơn hàng</h4>
                                    </div>
                                    <div class="modal-body">
                                        @foreach (json_decode($bill->product) as $p)
                                        <p>Name product: {{$p->name}}</p>
                                        <p>Quantity: {{$p->quantity}}</p>
                                        <p>Price: {{$p->price}}</p>
                                        <br>
                                        <hr>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </td>

                    <td> {{$bill->promote_value}} % </td>
                    <td> {{$bill->total_price}} </td>
                    <td> {{$bill->status}} </td>
                </tr>
                <?php $model_id++; ?>
                @endforeach

    </table>

</body>

</html>