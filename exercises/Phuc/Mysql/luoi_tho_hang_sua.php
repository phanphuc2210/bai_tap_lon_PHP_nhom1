
<style>
    h2 {
        color: #2a80ad;
        text-align: center;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 0 12px 0 4px;
    }

</style>

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1:</u> Hiển thị lưới</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
    <?php 
require_once "connect.php";

$sql = "SELECT * FROM hang_sua";
$result = mysqli_query($conn, $sql);
?>

<h2>THÔNG TIN HÃNG SỮA</h2>
<table border="1" class="mx-auto">
    <tr>
        <th>Mã HS</th>
        <th>Tên hãng sữa</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result)!=0) {
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>". $row['Ma_hang_sua'] ."</td>";
            echo "<td>". $row['Ten_hang_sua'] ."</td>";
            echo "<td>". $row['Dia_chi'] ."</td>";
            echo "<td>". $row['Dien_thoai'] ."</td>";
            echo "<td>". $row['Email'] ."</td>";
            echo "</tr>";
        }
    }
    ?>
</table>