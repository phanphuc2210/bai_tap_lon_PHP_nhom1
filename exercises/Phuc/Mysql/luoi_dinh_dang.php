
<style>
    h2 {
        text-align: center;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    tr:nth-child(even) {
        background-color: #fee0c1;
    }

    th, td {
        padding: 4px 12px 4px 4px;
    }

    th {
        color: #c62d0f;
        text-align: center;
    }
</style>


<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2:</u> Lưới định dạng</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<?php 
require_once "connect.php";

$sql = "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM Khach_hang";
$result = mysqli_query($conn, $sql);
?>

<h2>THÔNG TIN KHÁCH HÀNG</h2>
<table class="mx-auto">
    <tr>
        <th>Mã KH</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result)!=0) {
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>". $row['Ma_khach_hang'] ."</td>";
            echo "<td>". $row['Ten_khach_hang'] ."</td>";
            echo "<td align='center'>". $row['Phai'] ."</td>";
            echo "<td>". $row['Dia_chi'] ."</td>";
            echo "<td>". $row['Dien_thoai'] ."</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
