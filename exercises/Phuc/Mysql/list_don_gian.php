
<style>
    #title {
        background-color: #ffeee4;
    }

    h2 {
        color: #fe6500;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 4px 12px 4px 4px;
    }
</style>

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 5:</u> List đơn giản</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<?php 
require_once "connect.php";

$sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, loai_sua.Ten_loai,sua.Trong_luong,sua.Don_gia 
        FROM sua,hang_sua,loai_sua
        WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
$result = mysqli_query($conn, $sql);
?>

<table align="center">
    <tr>
        <td colspan="2" align="center" id="title"><h2>THÔNG TIN CÁC SẢN PHẨM</h2></td>
    </tr>
    <?php 
    if(mysqli_num_rows($result)!=0) {
        while($row = mysqli_fetch_array($result)){
            $hinh_anh = "../../Hinh_sua/".$row['Hinh'];
            echo "<tr style='height: 150px'>";
            echo "<td align='center' style='width: 200px'><img src= $hinh_anh width='100px'/></td>";
            echo "<td style='width: 350px'>
                <p class='fw-bold'>".$row['Ten_sua']."</p>
                <span>Nhà sản xuất: ".$row['Ten_hang_sua']."</span>
                <br>
                <span>".$row['Ten_loai']. " - " . $row['Trong_luong'] . "gr - ". $row['Don_gia'] . "VND" ."</span>
            </td>";
            echo "</tr>";
        }
    }
    ?>
</table>