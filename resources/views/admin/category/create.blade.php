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

<h3>Thêm loại sản phẩm</h3>

<div>
    <center>
<form action="/admin/categories" method="POST" enctype="multipart/form-data">
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
    <label for="name">Tên loại sản phẩm</label>
    <input type="text" id="name" name="name">

    <button type="submit" value="Submit">Thêm</button>
  </form>
  </center>
</div>

</body>
</html>
