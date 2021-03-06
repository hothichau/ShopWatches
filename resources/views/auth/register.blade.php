<!DOCTYPE html>

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng ký</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/auth/register.css">
</head>

<body>
    <!------ Include the above in your HEAD tag ---------->
    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tạo tài khoản</h3>
                    </div>
                    <div class="panel-body">
                    <form role = "form" action="/auth/register" method="POST" enctype="multipart/form-data">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" class="form-control input-sm"
                                            placeholder="Tên đăng nhập">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone"
                                            class="form-control input-sm" placeholder="Số điện thoại">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" id="image" class="form-control input-sm"
                                    placeholder="Ảnh đại diện">
                            </div>

                            <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control input-sm"
                                    placeholder="Nhập xã/phường, quận/huyện, tỉnh/thành phố">
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control input-sm" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control input-sm" placeholder="Xác nhận mật khẩu">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Đăng ký" class="btn btn-info btn-block">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>