<!DOCTYPE html>
<html>
<style>
form {
    width: 50%;
    text-align: left;
    background-color: white;
    padding: 20px;
    border-radius: 2%;

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
    @include('partials/header')
    <div>
        <center>  
        <center><h3>Cập nhật thông tin tài khoản</h3></center> 
        <form action="{{'/admin/users/'.$edit->id}}" method="post" enctype="multipart/form-data">
       
            @csrf
            @method("PATCH")
            <label for="username">Tên tài khoản</label>
            <input type="text" id="username" name="username" value = "{{$edit->username}}" placeholder="Nhập tên tài khoản">

            <label for="password">Mật khẩu</label>
            <input type="text" id="password" name="password" value = "{{$edit->password}}" placeholder="Nhập mật khẩu">

            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" value = "0{{$edit->phone}}" placeholder="Nhập số điện thoại">

            <label for="image">Hình ảnh</label>
            <input type="file" id="image" name="image">



            <input type="submit" value="Cập nhật">
        </form>
        </center>
    </div>
    @include('partials/footer')
</body>

</html>