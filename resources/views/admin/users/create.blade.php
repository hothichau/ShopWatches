<!DOCTYPE html>
<html>
<style>
    form{
        width: 50%;
        text-align: left;
         background-color: #f2f2f2; 
    }
input[type=text], select {
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

div {
  border-radius: 5px;
  
  padding: 20px;
}

h3{
    text-align: center;
    font-size: 30px;
    text-transform: uppercase;
}
</style>
<body>

<h3>Thêm admin</h3>

<div>
    <center>
<form action="/admin/users/create" method="POST" enctype="multipart/form-data">
     @csrf
    <label for="username">Tên tài khoản</label>
    <input type="text" id="username" name="username">

    <label for="password">Mật khẩu</label>
    <input type="text" id="password" name="password">

    <label for="phone">Số điện thoại</label>
    <input type="text" id="phone" name="phone">

    <label for="image">Hình ảnh</label>
    <input type="file" id="image" name="image" >

    <label for="address">Địa chỉ</label>
    <input type="text" id="address" name="address" placeholder = " Nhập xã/phường, quận/huyện, tỉnh/thành phố">
  
    <button type="submit" value="Submit">Thêm</button>
  </form>
  </center>
</div>

</body>
</html>
