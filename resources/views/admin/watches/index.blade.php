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
        <h3> Quản lý sản phẩm </h3>
        <a href="/admin/users"><i class="fas fa-arrow-circle-left" style="width: 5em;"></i></a>
        <a href="/admin/categories"><i class="fas fa-arrow-circle-right" style="width: 5em;"></i></a>
    </center>

    <h2> Thêm sản phẩm </h2>
    <form action="/admin/watches/create" method="get">
        <button type="submit" class="button button1 " name="add">Thêm </button>
    </form>
    <table id="table">
        <center>

            <center>
                <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá cũ</th>
                    <th>Giá mới</th>
                    
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Loại</th>
                    <th>Tên Loại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                    @foreach ($index as $watches)
                <tr>
                    <td> {{$watches->id}}</td>
                    <td> {{$watches->name}} </td>
                    <td> {{$watches->old_price}} </td>
                    <td> {{$watches->new_price}} </td>
                    <td> {{$watches->description}} </td>

                    <td>
                        <image src="{{'/storage/'.$watches->image}} " style="height: 100px; width: 80px;">
                    </td>
                    <td> {{$watches->category_id}} </td>
                    <td> {{$watches->category->name}} </td>
                    <form action='{{"/admin/watches/".$watches->id."/edit"}}' method="get">
                        <td> <button type="submit" class="button button1"><i class="far fa-edit"></i> </button></td>
                    </form>
                    <form action='{{"/admin/watches/".$watches->id}}' method="POST">
                        @csrf
                        @method("DELETE")
                        <td> <button type="submit" class="button button1"><i class="far fa-calendar-times"></i></button> </td>
                    </form>
                </tr>
                @endforeach

    </table>
  

</body>

</html>