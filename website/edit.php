<?php # Script 3.4 - index.php
$page_title = 'Edit sản phẩm!';
include ('../includes/header.php');
include ('../includes/header_webdemo.php');
require_once ('../database/connect.php');

// Lấy danh sách loại sản phẩm từ CSDL để load lên giao diện
$sql = "SELECT * FROM loai_sp";
$ds_loaiSP = mysqli_query($conn, $sql);

$ketqua = '';
$masp = isset($_GET['masp'])? $_GET['masp'] : '';

if(isset($_POST['update'])) {
    $ten_sp = isset($_POST['ten_sp'])? $_POST['ten_sp'] : '';
    $ma_loai = isset($_POST['ma_loai'])? $_POST['ma_loai'] : '';
    $so_luong_ton = isset($_POST['so_luong_ton'])? $_POST['so_luong_ton'] : '';
    $don_gia = isset($_POST['don_gia'])? $_POST['don_gia'] : '';
    $mo_ta = isset($_POST['mo_ta'])? $_POST['mo_ta'] : '';
    $pre_img = isset($_POST['pre_img'])? $_POST['pre_img'] : '';
    $hinh_anh = isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['name'] != ''? $_FILES['hinh_anh']['name'] : $pre_img;

    // thêm hình vào server
    if($hinh_anh != '') {
        move_uploaded_file($_FILES["hinh_anh"]["tmp_name"],"..\\Images\\".$hinh_anh);
    } 

    $sql = "UPDATE san_pham
            SET Ten_sp = '$ten_sp',
                Ma_loai_sp = '$ma_loai',
                So_luong_ton = '$so_luong_ton',
                Hinh_anh = '$hinh_anh',  
                Don_gia = '$don_gia',
                Mo_ta = '$mo_ta'
            WHERE Ma_sp = '$masp'
    ";

    $result = mysqli_query($conn, $sql);

    if($result) {
        $ketqua .= "Cập nhật thành công!!!";
    } else {
        $ketqua .= "Kiểm tra lại thông tin!!!";
    }
} else {
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
}


?>
<script src="../../assets/ckeditor/ckeditor.js"></script>

<div class="container mb-4">
    <h3 class="mt-4">Cập nhật thông tin sản phẩm</h3>
    <hr class="mt-2">

    <?php 
    if($ketqua != '') {
        echo "<div class='w-100 p-3 bg-primary bg-gradient opacity-75 rounded-3 mb-4'>";
        echo $ketqua;
        echo "</div>";
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row mt-2">
            <div class="col-5">
                <img src="/Images/<?php echo $hinh_anh; ?>" class="w-100 mb-2" alt="<?php echo $ten_sp; ?>">
                <input type="file" name="hinh_anh">
                <input type="text" name="pre_img" value="<?php echo $hinh_anh; ?>" hidden>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">Mã sản phẩm:</label>
                    <input type="text" name="masp" value="<?php echo $masp; ?>" disabled class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm:</label>
                    <input type="text" name="ten_sp" value="<?php echo $ten_sp; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Loại sản phẩm:</label>
                    <select class="form-select" name="ma_loai">
                        <?php 
                        if(mysqli_num_rows($ds_loaiSP) > 0) {
                            while($row = mysqli_fetch_array($ds_loaiSP)){
                                $selected = isset($ma_loai) && $ma_loai == $row['Ma_loai_sp'] ? "selected" : "";
                                echo "<option value='". $row['Ma_loai_sp'] ."' $selected>".$row['Ten_loai_sp']."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Số lượng tồn:</label>
                    <input type="number" name="so_luong_ton" value="<?php echo $so_luong_ton; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Đơn giá:</label>
                    <input type="number" name="don_gia" value="<?php echo $don_gia; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả:</label>
                    <textarea class="form-control" name="mo_ta" id="mo_ta" rows="3"><?php echo $mo_ta; ?></textarea>
                </div>

                <div class="mb-3">
                    <button class="btn btn-dark px-5" name="update">Lưu</button>
                </div>
            </div>
        </div>
    </form>
    <a href="/website" class="my-3" class="text-decoration-none"> < Quay lại</a>
</div>

<script>
    CKEDITOR.replace('mo_ta');
</script>

<?php
include ('../includes/footer.html');
?>