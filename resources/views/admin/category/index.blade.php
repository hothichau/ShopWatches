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
        <h3> Quản lý loại sản phẩm </h3>
        <a href="/admin/watches"><i class="fas fa-arrow-circle-left" style="width: 5em;"></i></a>
    </center>

    <h2> Thêm loại sản phẩm </h2>
    <form action="/admin/categories/create" method="get">
        <button type="submit" class="button button1 " name="add">Thêm </button>
    </form>
    <table id="table">
        <center>

            <center>
                <tr>
                    <th>Id</th>
                    <th>Tên loại sản phẩm</th>                   
                    <th>Sửa</th>
                    <th>Xóa</th>
                    @foreach ($categories as $category)
                <tr>
                    <td> {{$category->id}}</td>
                    <td> {{$category->name}} </td>
                    <form action='{{"/admin/categories/".$category->id."/edit"}}' method="get">
                        <td> <button type="submit" class="button button1"><i class="far fa-edit"></i> </button></td>
                    </form>
                    <form action='{{"/admin/categories/".$category->id}}' method="POST">
                        @csrf
                        @method("DELETE")
                        <td> <button type="submit" class="button button1"><i class="far fa-calendar-times"></i></button> </td>
                    </form>
                </tr>
                @endforeach

    </table>
   

</body>

</html>