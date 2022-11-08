<?php # Script 3.4 - index.php
$page_title = 'Tìm kiếm sản phẩm!';
include ('../includes/header.php');
include ('../includes/header_webdemo.php');
require_once ('../database/connect.php');

$ketqua = '';
?>
<style>
    .wrap {
        margin: 4px auto;
        width: 700px;
        background-color: #fdfef0;
    }

    h1, h2, p {
        margin: 0;
    }

    h1 {
        color: #f43d56;
        background-color: #fecccd;
        text-align: center;
    }

    form {
        margin-top: 2px;
        text-align: center;
        
    }

    .section_search {
        margin-top: 2px;
        background-color: #fecccd;
    }

    table {
        margin: 0 auto;
    }

    h2 {
        color: #f5590b;
        text-align: center;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th {
        background-color: #ffeee6;
    }

    td {
        padding: 4px 8px;
    }

    .origin {
        color: #f44363;
    }
</style>
<div class="d-flex">
    <div class="w-80 p-3">
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
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
                $to = $_GET['to'];
                $from = $_GET['from'];
                if(empty($_GET['to'])){ 
                    $sql = "SELECT san_pham.Ten_sp,san_pham.Hinh_anh, san_pham.Ma_loai_sp, san_pham.Don_gia, loai_sp.Ten_loai_sp,san_pham.Ma_sp,san_pham.So_luong_ton, san_pham.Mo_ta
                    FROM san_pham JOIN loai_sp ON san_pham.Ma_loai_sp = loai_sp.Ma_loai_sp
                    WHERE 
                        san_pham.Ma_loai_sp LIKE '%$ma_loai_sp%' AND
                        san_pham.Ten_sp LIKE '%$ten_sp%' AND
                        (san_pham.Don_gia >= $from )
                    ";
                } else {
                    if(empty($_GET['from'])){ 
                        $sql = "SELECT san_pham.Ten_sp,san_pham.Hinh_anh, san_pham.Ma_loai_sp, san_pham.Don_gia, loai_sp.Ten_loai_sp,san_pham.Ma_sp,san_pham.So_luong_ton, san_pham.Mo_ta
                        FROM san_pham JOIN loai_sp ON san_pham.Ma_loai_sp = loai_sp.Ma_loai_sp
                        WHERE 
                            san_pham.Ma_loai_sp LIKE '%$ma_loai_sp%' AND
                            san_pham.Ten_sp LIKE '%$ten_sp%' AND
                            (san_pham.Don_gia <= $to )
                        ";
                    } else {
                        $sql = "SELECT san_pham.Ten_sp,san_pham.Hinh_anh, san_pham.Ma_loai_sp, san_pham.Don_gia, loai_sp.Ten_loai_sp,san_pham.Ma_sp,san_pham.So_luong_ton, san_pham.Mo_ta
                        FROM san_pham JOIN loai_sp ON san_pham.Ma_loai_sp = loai_sp.Ma_loai_sp
                        WHERE 
                            san_pham.Ma_loai_sp LIKE '%$ma_loai_sp%' AND
                            san_pham.Ten_sp LIKE '%$ten_sp%' AND
                            (san_pham.Don_gia BETWEEN $from AND $to)
                        ";
                    }
                }
                
            }
            $result = mysqli_query($conn, $sql);
            

            if(mysqli_num_rows($result) > 0) {
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                                <b>Có ". mysqli_num_rows($result) ." sản phẩm được tìm thấy</b>
                            </p>";
                while($row = mysqli_fetch_array($result)){
                    $hinh_anh = "../Images/".$row['Hinh_anh'];
                    $ketqua .= "<table align='center'>
                                <tr>
                                    <th colspan='2' align='center'>
                                        <h2>" . $row['Ten_sp']. " - " . $row['Ten_loai_sp'] . "</h2>   
                                    </th>
                                </tr>
                                <tr>
                                    <td align='center' style='width: 200px'><img src= $hinh_anh width='150px'/></td>
                                    <td style='width: 450px' >
                                        <p class='fw-bold'><i>Mã sản phẩm:</i></p>
                                        <span>". $row['Ma_sp'] ."</span>
                                        <p class='fw-bold'><i>Mô tả:</i></p>
                                        <span>". $row['Mo_ta'] ."</span>
                                        <p>
                                            <b><i>Số lượng tồn: </i></b> <span class='origin'>". $row['So_luong_ton'] ." </span> - 
                                            <b><i>Đơn giá: </i></b> <span class='origin'>". number_format($row['Don_gia'], 0, '', '.') ." VNĐ</span>
                                        </p>
                                    </td>
                                </tr>
                                </table>";
                }
            } else {
                $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                                <b>Không tìm thấy sản phẩm này</b>
                            </p>";
            }
        }

        ?>

        <div class="wrap">
            <h1>TÌM KIẾM THÔNG TIN SẢN PHẨM</h1>
            <form action="" method="GET">
                <p class="section_search">
                    <b style="color: red;">Loại sản phẩm: </b>
                    <select name="ma_san_pham">
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
                </p>
                <p class="section_search">
                    <b style="color: red;">Tên sản phẩm: </b>
                    <input class="w-30" type="text" name="ten_sp" value="<?php echo isset($_GET['ten_sp'])? $_GET['ten_sp'] : ''; ?>">
                    
                </p>
                <p class="section_search">
                    <b style="color: red;">Giá từ: </b>
                    <input class="w-30" type="text" name="from" value="<?php echo isset($_GET['from'])? $_GET['from'] : ''; ?>">
                    <b style="color: red;">đến: </b>
                    <input class="w-30" type="text" name="to" value="<?php echo isset($_GET['to'])? $_GET['to'] : ''; ?>">
                </p>
                <input type="submit" name="search" value="Tìm kiếm" width="100px">
            </form>
            <div id="ketqua">
                <?php echo $ketqua; ?>
            </div>
        </div>
    </div>
</div>

<?php
include ('../includes/footer.html');
?>