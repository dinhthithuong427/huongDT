<?php
include 'config.php';
include 'class/class.db.theloai.php';
if(isset($_GET['id'])){
    $db_theloai = new DB_TheLoai();
    $theloai_arr = $db_theloai->get_theloai($_GET['id']);
    $ten_theloai = $theloai_arr[0]['TenTL'];
    $thu_tu = $theloai_arr[0]['ThuTu'];
    $an_hien = $theloai_arr[0]['AnHien'];
    
    if(isset($_POST['submit'])){
        $id = (isset($_POST['id']))? $_POST['id'] : -1;
        $ten_theloai = (isset($_POST['ten_theloai']))? $_POST['ten_theloai'] : "";
        $thu_tu = (isset($_POST['thu_tu']))? $_POST['thu_tu'] : 0;
        $an_hien = (isset($_POST['an_hien']))? $_POST['an_hien'] : "";
        
        $result = $db_theloai->sua_theloai($id, $ten_theloai, $thu_tu, $an_hien);
        if($result){
            echo '<script>alert("Cập nhật thành công!"); window.location="theloai.php";</script>';
        }else{
            echo '<script>alert("Cập nhật không thành công!"); window.location="theloai.php";</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>CẬP NHẬT THỂ LOẠI</title>
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
                        <div class="card-header bg-warning text-dark font-weight-bold">
                            <h4 class="mb-0 text-center">Cập Nhật Thể Loại</h4>
                        </div>
                        <div class="card-body">
                            <form name="sua_theloai" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tên thể loại:</label>
                                    <input type="text" class="form-control" name="ten_theloai" value="<?php echo $ten_theloai; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Thứ tự:</label>
                                    <input type="number" class="form-control" name="thu_tu" value="<?php echo $thu_tu; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Trạng thái (Ẩn/Hiện):</label>
                                    <select class="form-control" name="an_hien">
                                        <option value="1">Hiện</option>
                                        <option value="0" <?php echo ($an_hien == 0)?'selected="selected"':''; ?>>Ẩn</option>
                                    </select>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-warning px-4 font-weight-bold" name="submit">Lưu Thay Đổi</button>
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