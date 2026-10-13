<?php
include 'config.php';
include 'class/class.db.theloai.php';
if(isset($_POST['submit'])){
    $db_theloai = new DB_TheLoai();
    $ten_theloai = (isset($_POST['ten_theloai']))? $_POST['ten_theloai'] : "";
    $thu_tu = (isset($_POST['thu_tu']))? $_POST['thu_tu'] : 0;
    $an_hien = (isset($_POST['an_hien']))? $_POST['an_hien'] : "";
    
    $result = $db_theloai->them_theloai($ten_theloai, $thu_tu, $an_hien);
    if($result){
        echo '<script>alert("Thêm thành công!"); window.location="theloai.php";</script>';
    }else{
        echo '<script>alert("Thêm không thành công!"); window.location="theloai.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>THÊM THỂ LOẠI</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            body { background-color: #f8f9fa; }
            .card { margin-top: 50px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border: none; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white font-weight-bold">
                            <h4 class="mb-0 text-center">Thêm Thể Loại Mới</h4>
                        </div>
                        <div class="card-body">
                            <form name="them_theloai" method="POST">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tên thể loại:</label>
                                    <input type="text" class="form-control" name="ten_theloai" required placeholder="Nhập tên thể loại...">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Thứ tự:</label>
                                    <input type="number" class="form-control" name="thu_tu" value="0">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Trạng thái (Ẩn/Hiện):</label>
                                    <select class="form-control" name="an_hien">
                                        <option value="1" selected="selected">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success px-4" name="submit">Lưu Thể Loại</button>
                                    <a href="theloai.php" class="btn btn-secondary px-4 ml-2">Quay lại</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>