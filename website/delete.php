<?php # Script 3.4 - index.php
$page_title = 'Xóa sản phẩm!';
include ('../includes/header.php');
include ('../includes/header_webdemo.php');
require_once ('../database/connect.php');

$masp = isset($_GET['masp'])? $_GET['masp'] : '';
$ketqua = '';
$success = false;

if(isset($_POST['delete'])) {
    // Kiểm tra sản phẩm đã được mua chưa, chưa thì xóa
    $sql = "SELECT So_hoa_don FROM cthd WHERE Ma_sp = '$masp'";
    $hoa_don = mysqli_query($conn, $sql);
    if(mysqli_num_rows($hoa_don) == 0) {
        $sql = "DELETE FROM san_pham WHERE Ma_sp = '$masp'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $ketqua .= "Xóa thành công!!!";
            $success = true;
        } else {
            $ketqua.= "Lỗi khi sản phẩm. Vui lòng kiểm tra lại!!!";
        }
    } else {
        $ketqua .= "Sản phẩm đã được mua nên không thể xóa được!!!";
    }
} else {
    $sql = "SELECT * 
        FROM san_pham 
        join loai_sp on san_pham.Ma_loai_sp = loai_sp.Ma_loai_sp 
        WHERE Ma_sp = '$masp'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            $ten_sp = $row['Ten_sp'];
            $ten_loai = $row['Ten_loai_sp'];
            $so_luong_ton = $row['So_luong_ton'];
            $hinh_anh = $row['Hinh_anh'];
            $don_gia = $row['Don_gia'];
            $mo_ta = $row['Mo_ta'];
        }
    }
}
?>

<?php if(!isset($_POST['delete'])) { ?>
<div class="container">
    <form action="" method="POST" class="row mt-4">
        <div class="col-4">
            <div class="card w-100 product-item">
                <a href="#">
                    <img src="/Images/<?php echo $hinh_anh;?>" class="card-img-top" alt="sản phẩm">
                </a>
                <div class="card-body">
                    <a href="#" class="text-decoration-none text-dark">
                        <h5 class="card-title"><?php echo $ten_sp; ?></h5>
                    </a>
                    <p class="mb-1">Mã sản phẩm: <?php echo $masp; ?></p>
                    <p class="mb-1"><span class="me-4">Loại sản phẩm: <?php echo $ten_loai; ?></span> <span>Còn lại: <?php echo $so_luong_ton; ?></span></p>
                    <p class="card-text">Giá bán: <span class="text-danger"><?php echo number_format($don_gia, 0, '', '.') ?> vnđ</span></p>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="w-100 p-3 bg-warning bg-gradient rounded-3 mb-4">
                <i class="bi bi-exclamation-circle-fill me-1"></i>
                Bạn thật sự muốn xóa sản phẩm này. Hành động này sẽ xóa sản phẩm vĩnh viễn!
            </div>
            <div class="w-100">
                <button onclick="history.back()" class="btn btn-dark py-2" style="width: 49%;">
                    Quay lại trang sản phẩm
                </button>
                <button class="btn btn-danger py-2" name="delete" style="width: 49%;">
                    Xóa sản phẩm
                </button>
            </div>
        </div>
    </div>
</div>
<?php } else {
    echo "<div class='container mt-4'>";
    $bg_color = $success? "bg-success" : "bg-danger";
    echo "<div class='w-100 p-3 $bg_color bg-gradient rounded-3 mb-4'>";
    echo $ketqua;
    echo "</div>";   
    echo "</div>"; 
} ?>

<?php
include ('../includes/footer.html');
?>