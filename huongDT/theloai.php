<?php
include 'config.php';
include 'class/class.db.theloai.php';

$db_theloai = new DB_TheLoai();
$theloai_arr = $db_theloai->get_theloai();
$theloai_html = "";

if(count($theloai_arr) == 0){
    $theloai_html = '<div class="alert alert-warning mt-4 text-center">
                        <p>Không có thể loại nào trong cơ sở dữ liệu.</p>
                        <a href="theloai_them.php" class="btn btn-primary"> + THÊM THỂ LOẠI</a>
                     </div>';
}else{
    $theloai_html = '<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                        <h2 class="text-primary font-weight-bold">QUẢN TRỊ THỂ LOẠI</h2>
                        <a href="theloai_them.php" class="btn btn-success">+ Thêm Thể Loại Mới</a>
                     </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Tên thể loại</th>
                    <th class="text-center">Thứ tự</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center" colspan="2">Thao tác</th>
                </tr>
            </thead>
            <tbody>';
    
    foreach($theloai_arr as $item){
        // Xử lý hiển thị trạng thái Ẩn/Hiện cho đẹp
        $trang_thai = ($item['AnHien'] == 1) ? '<span class="badge badge-success">Đang hiện</span>' : '<span class="badge badge-secondary">Đang ẩn</span>';
        
        $theloai_html .= '<tr>';
        $theloai_html .= '<td class="align-middle font-weight-bold">'.$item['TenTL'].'</td>';
        $theloai_html .= '<td class="align-middle text-center">'.$item['ThuTu'].'</td>';
        $theloai_html .= '<td class="align-middle text-center">'.$trang_thai.'</td>';
        $theloai_html .= '<td class="align-middle text-center">
                            <a href="sua_theloai.php?id='.$item['idTL'].'" class="btn btn-warning btn-sm">Sửa</a>
                          </td>';
        $theloai_html .= '<td class="align-middle text-center">
                            <a href="delete.php?id='.$item['idTL'].'" onclick="return confirm(\'Bạn có thực sự muốn xóa thể loại này không?\');" class="btn btn-danger btn-sm">Xóa</a>
                          </td>';
        $theloai_html .= '</tr>';
    }
    $theloai_html .= '</tbody></table></div>';
}
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>THỂ LOẠI | QUẢN TRỊ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Tải thư viện giao diện Bootstrap 4 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            body { background-color: #f8f9fa; }
            .container { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-top: 30px; }
        </style>
    </head>
    <body>
        <div class="container">
            <?php echo $theloai_html; ?>
        </div>
        
        <!-- Các thư viện script hỗ trợ cho giao diện (nếu cần) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>