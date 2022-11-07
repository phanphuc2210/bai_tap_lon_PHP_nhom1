<?php # Script 3.4 - index.php
$page_title = 'Detail sản phẩm!';
include ('../includes/header_webdemo.php');
require_once ('../database/connect.php');

// Lấy danh sách loại sản phẩm từ CSDL để load lên giao diện
$sql = "SELECT * FROM loai_sp";
$ds_loaiSP = mysqli_query($conn, $sql);

$ketqua = '';
$error_upload = false;
$success = false;
$masp = isset($_GET['masp'])? $_GET['masp'] : '';
    $sql = "SELECT * FROM san_pham WHERE Ma_sp = '$masp'";
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
<div class="container mb-4">
    <h3 class="mt-4">Chi tiết thông tin sản phẩm</h3>
    <hr class="mt-2">

    <?php 
    if($ketqua != '') {
        $bg_color = $success? "bg-success" : "bg-danger";
        echo "<div class='w-100 p-3 $bg_color bg-gradient opacity-75 rounded-3 mb-4'>";
        echo $ketqua;
        echo "</div>";
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row mt-2">
            <div class="col-5">
                <img src="../Images/<?php echo $hinh_anh; ?>" class="w-100 mb-2" alt="<?php echo $ten_sp; ?>">
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">Mã sản phẩm:</label>
                    <input disabled type="text" name="masp" value="<?php echo $masp; ?>" disabled class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm:</label>
                    <input disabled type="text" name="ten_sp" value="<?php echo $ten_sp; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Loại sản phẩm:</label>
                    <input disabled type="text" name="ma_loai" value="<?php if(mysqli_num_rows($ds_loaiSP) > 0) {
                            while($row = mysqli_fetch_array($ds_loaiSP)){
                                if($ma_loai == $row['Ma_loai_sp']) {
                                    echo $row['Ten_loai_sp'] ; 
                                }
                            }
                        } ; ?>" class="form-control">

                </div>

                <div class="mb-3">
                    <label class="form-label">Số lượng tồn:</label>
                    <input disabled type="text" name="so_luong_ton" value="<?php echo $so_luong_ton; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Đơn giá:</label>
                    <input disabled type="text" name="don_gia" value="<?php echo $don_gia; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả:</label>
                    <textarea class="form-control" disabled name="mo_ta" id="mo_ta" rows="3"><?php echo $mo_ta; ?></textarea>
                </div>
            </div>
        </div>
    </form>
    <a href="./" class="my-3 pointer" class="text-decoration-none"> < Quay lại</a>
</div>

<?php
include ('../includes/footer.html');
?>