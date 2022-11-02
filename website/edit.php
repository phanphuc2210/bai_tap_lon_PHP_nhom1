<?php # Script 3.4 - index.php
$page_title = 'Edit sản phẩm!';
include ('../includes/header.php');
include ('../includes/header_webdemo.php');
require_once ('../database/connect.php');

$masp = isset($_GET['masp'])? $_GET['masp'] : '';

$sql = "SELECT * FROM san_pham WHERE Ma_san_pham = '$masp'";
$result = mysqli_query($conn, $sql);
            
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
        $ten_sp = $row['Ten_sp'];
        $ma_loai = $row['Ma_loai_sp'];
        $so_luong_ton = $row['So_luong_ton'];
        $hinh_anh = $row['Hinh_anh'];
        $don_gia = $row['Don_gia'];
        $mo_ta = $row['Mo_ta'];
    }
}
?>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-horizontal w-50">
            <h3 class="mt-3">Chỉnh sửa sản phẩm</h3>
            <hr />

            

            
        </div>
    </form>
    <a href="/website" class="text-decoration-none">Quay lại</a>
</div>

<?php
include ('../includes/footer.html');
?>