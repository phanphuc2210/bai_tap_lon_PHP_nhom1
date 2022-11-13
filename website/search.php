<?php # Script 3.4 - index.php
$page_title = 'Tìm kiếm sản phẩm!';
include ('../includes/header_webdemo.php');
require_once ('../database/connect.php');

// Phải đăng nhập thì mới có thể truy cập
if($isLogin == false) {
    header("Location: ../login.php");
}
?>
<style>
    p {
        margin-bottom: 0;
    } 

    td {
        padding-bottom: 8px;
    }
</style>
<div class="container mb-4">
    <a href="./">Quay lại</a>
    <h3>Tìm kiếm sản phẩm</h3>
    <hr class="mt-2">

    
        <?php
        $ketqua = "";
        $ma_loai_sp = isset($_GET['ma_san_pham'])? $_GET['ma_san_pham'] : "";
        $ten_sp = isset($_GET['ten_sp'])? $_GET['ten_sp'] : "";
        

        $sql = "SELECT Ma_loai_sp,Ten_loai_sp FROM loai_sp";
        $loai_sp = mysqli_query($conn, $sql);

        if(isset($_GET['search'])) {
            if(empty($_GET['from']) && empty($_GET['to'])){
                $sql = "SELECT san_pham.Ten_sp,san_pham.Hinh_anh, san_pham.Ma_loai_sp, san_pham.Don_gia, loai_sp.Ten_loai_sp,san_pham.Ma_sp,san_pham.So_luong_ton, san_pham.Mo_ta
                    FROM san_pham JOIN loai_sp ON san_pham.Ma_loai_sp = loai_sp.Ma_loai_sp
                    WHERE 
                        san_pham.Ma_loai_sp LIKE '%$ma_loai_sp%' AND
                        san_pham.Ten_sp LIKE '%$ten_sp%'
                    ";
            } else {
                $from = $_GET['from'];
                $to = $_GET['to'];
                $sql = "SELECT san_pham.Ten_sp,san_pham.Hinh_anh, san_pham.Ma_loai_sp, san_pham.Don_gia, loai_sp.Ten_loai_sp,san_pham.Ma_sp,san_pham.So_luong_ton, san_pham.Mo_ta
                FROM san_pham JOIN loai_sp ON san_pham.Ma_loai_sp = loai_sp.Ma_loai_sp
                WHERE 
                    san_pham.Ma_loai_sp LIKE '%$ma_loai_sp%' AND
                    san_pham.Ten_sp LIKE '%$ten_sp%' AND
                    (san_pham.Don_gia BETWEEN $from AND $to)
                ";
            }
            $result = mysqli_query($conn, $sql);
            

            if(mysqli_num_rows($result) > 0) {
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                                <b>Có ". mysqli_num_rows($result) ." sản phẩm được tìm thấy</b>
                            </p>";
                while($rows = mysqli_fetch_array($result)){
                    $ketqua .= "<div class='col-3 '>
                                    <div class='card w-100 product-item' style='width: 18rem;'>
                                        <a href='#'>
                                            <img src='../Images/{$rows['Hinh_anh']}' class='card-img-top' style='height: 250px' alt='sản phẩm'>
                                        </a>
                                    <div class='card-body'>
                                            <a href='#' class='text-decoration-none text-dark'>
                                                <h5 class='card-title'>{$rows['Ten_sp']}</h5>
                                            </a>
                                            <p class='mb-1'>Mã sản phẩm: {$rows['Ma_sp']}</p>
                                            <p class='mb-1'><span class='me-4'>Loại sản phẩm: {$rows['Ten_loai_sp']}</span> <span>Còn lại: {$rows['So_luong_ton']}</spanc></p>
                                            <p class='card-text'>Giá bán: <span class='text-danger'>".number_format($rows['Don_gia'], 0, '', '.')." vnđ</span></p>
                                            <div class='text-center'>
                                                <a class='btn btn-dark' style='width: 49%;' href='./edit.php?masp=". $rows['Ma_sp'] ."'>Sửa <i class='bi bi-pencil-square ms-1'></i></a>
                                                <a class='btn btn-danger' style='width: 49%;' href='./delete.php?masp=". $rows['Ma_sp'] ."'>Xóa <i class='bi bi-trash-fill ms-1'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                }
            } else {
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                                <b>Không tìm thấy sản phẩm này</b>
                            </p>";
            }
        }

        ?>

        <div class="w-50 mx-auto">
            <form action="" method="GET">
                
                <table class="w-100 mx-auto">
                    <tr>
                        <td>
                            <b>Tên sản phẩm: </b>
                            <input class="w-50" type="text" name="ten_sp" value="<?php echo isset($_GET['ten_sp'])? $_GET['ten_sp'] : ''; ?>">
                        </td>
                        <td>
                            <b>Loại sản phẩm: </b>
                            <select name="ma_san_pham" class="w-50">
                                <option value="">= Tất cả =</option>
                                <?php 
                                if(mysqli_num_rows($loai_sp) > 0) {
                                    while($row = mysqli_fetch_array($loai_sp)){
                                        $selected = isset($_GET['ma_san_pham']) && $_GET['ma_san_pham'] == $row['Ma_loai_sp'] ? "selected" : "";
                                        echo "<option value='". $row['Ma_loai_sp'] ."' $selected>".$row['Ten_loai_sp']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <b>Giá từ: </b>
                            <input class="w-30" type="text" name="from" value="<?php echo isset($_GET['from'])? $_GET['from'] : ''; ?>">
                        
                            <b>đến: </b>
                            <input class="w-30" type="text" name="to" value="<?php echo isset($_GET['to'])? $_GET['to'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="search" class="btn btn-dark" style="width: 100px;" value="Tìm kiếm"/>
                            <input type="reset" class="btn btn-outline-dark" style="width: 100px;" value="Reset"/>
                        </td>
                    </tr>
                </table>
            </form>
            <hr class="w-50 mx-auto">
        </div>
    <div class="row mt-3 gy-4">
        <?php echo $ketqua; ?>
    </div>
</div>

<?php
include ('../includes/footer.html');
?>