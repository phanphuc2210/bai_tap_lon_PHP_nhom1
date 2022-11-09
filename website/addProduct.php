<?php # Script 3.4 - index.php
$page_title = 'Welcome to MộcPhúc.!';
include ('../includes/header_webdemo.php');
require_once ('../database/connect.php');

$sql = "SELECT * FROM loai_sp";
$ds_loaiSP = mysqli_query($conn, $sql);  
$ketqua = '';
$masp = isset($_GET['masp'])? $_GET['masp'] : '';
?>

<?php
if(isset($_POST['Add'])) {
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

    $sql="SELECT max(MA_sp) FROM san_pham";
   
    $result = mysqli_query($conn, $sql); 
    
    if(mysqli_num_rows($result)<>0)
    { 
        
        while($rows=mysqli_fetch_row($result))
        {  
            $masp_max =  $rows['0'];
        }
    }
    $tmp  = substr($masp_max, 3,5);
    $stt = (int)$tmp+1;
    if($stt > 100){
        $masp_new =substr($masp_max, 0,2) . $stt;
    }else if($stt > 10){
        $masp_new =substr($masp_max, 0,3) . $stt;
    }
    else {
        $masp_new =substr($masp_max, 0,4) . $stt;
    }

    
    $now  = date("Y/m/d");
    $sql = "INSERT INTO san_pham VALUES('$masp_new','$ten_sp','$ma_loai','$so_luong_ton','$hinh_anh','$don_gia','$mo_ta','$now')
    ";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $ketqua .= "Thêm thành công!!!";
        // header('Location: ./index.php');
    } else {
        $ketqua .= "Kiểm tra lại thông tin!!!";
    }
} 


?>
<div class="container">
    <div class="my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Thêm sản phẩm mới</h3>
        </div>
        <hr class="mt-2">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row mt-2">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Mã sản phẩm:</label>
                    <input type="text" name="masp" value="" disabled class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm:</label>
                    <input type="text" name="ten_sp" value="" class="form-control">
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
                    <textarea class="form-control" name="mo_ta" id="mo_ta" rows="3"></textarea>
                </div>

                <div class="mb-3">
                <img src="" class="w-100 mb-2" alt="">
                <input type="file" name="hinh_anh">
                <input type="text" name="pre_img" value="" hidden>
                </div>
                <div class="mb-3">
                    <button class="btn btn-dark px-5" name="Add">Lưu</button>
                </div>
            </div>
        </div>
    </form>
    <a href="/website" class="my-3" class="text-decoration-none"> < Quay lại</a>
        <hr class="mt-2">

        <div class="sanpham">
            <div class="row mt-3 gy-3">
            </div>
        </div>
    </div>
</div>


<?php
include ('../includes/footer.html');
?>
