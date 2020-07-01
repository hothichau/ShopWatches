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

    <link rel="stylesheet" href="/css/admin/users.css">
</head>

<body>

    <center>
        <h3> Quản lý người dùng </h3>
        <a href="/user/home"><i class="fas fa-arrow-circle-left" style="width: 5em;"></i></a>
        <a href="/admin/watches"><i class="fas fa-arrow-circle-right" style="width: 5em;"></i></a>
    </center>

    <!-- <h2> Thêm tài khoản admin </h2>
    <form action="/admin/users/create" method="get">
        <button type="submit" class="button button1 " name="add">Add </button>
    </form> -->
    <table id="table">
        <center>

            <center>
                <tr>
                    <th>Id</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Hình ảnh</th>
                    <th>Vai trò</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                    @foreach ($index as $users)
                <tr>
                    <td> {{$users->id}}</td>
                    <td> {{$users->username}} </td>
                    <td> {{$users->password}} </td>
                    <td> {{$users->phone}} </td>
                    <td> {{$users->address}} </td>
                    <td>
                        <image src="{{'/storage/'.$users->image}} " style="height: 100px; width: 80px;">
                    </td>
                    <td> {{$users->role}} </td>  
                        @if(Auth::user())
                            @if(Auth::user()->role == $users->role )
                            <form action='{{"/admin/users/".$users->id."/edit"}}' method="get">
                                <td> <button type="submit" class="button button1"><i class="far fa-edit"></i></button></td>
                            </form>
                            @elseif(Auth::user()->role != $users->role )
                                <td> <button type="submit" class="button button1" title = "Can not edit"><i class="fas fa-ban" ></i></button></td>
                            @endif
                        @endif
                    
                    
                   
                    
                    <form action='{{"/admin/users/".$users->id}}' method="POST">
                        @csrf
                        @method("DELETE")
                        <td> <button type="submit" class="button button1"><i class="far fa-calendar-times"></i></button> </td>
                    </form>
                </tr>
                @endforeach

    </table>
</body>
</html>