<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Trang quản lý</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/admin/admin.css">
    </head>
    <body>
        @include('partials/header')
        <center>
         <div class = "dashboard" style = "padding-top: 80px;">
             <h3>hệ thống quản lý</h3>
             <form class = "button" action="/admin/users">
             <button type = "submit">quản lý người dùng</button>  <span>|</span>
             </form>
             <form class = "button" action="/admin/watches">
             <button type = "submit">quản lý sản phẩm </button>  
             </form>
             </center>     
             
             
         </div>
        @include('partials/footer')
    </body>
</html>