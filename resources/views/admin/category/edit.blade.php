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
    
    <div>
        <center>
            <center>
                <h3>Sửa thông tin loại sản phẩm</h3>
            </center>
            <form action="{{'/admin/categories/'.$cate->id}}" method="post" enctype="multipart/form-data">

                @csrf
                @method("PATCH")
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter name" name="name" id="name" value="{{$cate->name}}" required>
                <input type="submit" value="Cập nhật">
            </form>
        </center>
    </div>
    
</body>

</html>