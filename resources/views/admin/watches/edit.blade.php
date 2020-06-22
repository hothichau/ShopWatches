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
            <center>
                <h3>Sửa thông tin sản phẩm</h3>
            </center>
            <form action="{{'/admin/watches/'.$edit->id}}" method="post" enctype="multipart/form-data">

                @csrf
                @method("PATCH")
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter name" name="name" id="name" value="{{$edit->name}}" required>

                <label for="oldPrice"><b>Old Price</b></label>
                <input type="text" placeholder="Enter oldPrice" name="oldPrice" id="oldPrice"
                    value="{{$edit->oldPrice}}" required>

                <label for="newPrice"><b>New Price</b></label>
                <input type="text" placeholder="Enter newPrice" name="newPrice" id="newPrice"
                    value="{{$edit->newPrice}}" required>

                <label for="description"><b>Description</b></label>
                <input type="text" placeholder="Enter description" name="description" id="description"
                    value="{{$edit->description}}" required>

                <label for="image">Photo</label>
                <input type="file" id="image" name="image">
                <input type="submit" value="Cập nhật">
            </form>
        </center>
    </div>
    @include('partials/footer')
</body>

</html>