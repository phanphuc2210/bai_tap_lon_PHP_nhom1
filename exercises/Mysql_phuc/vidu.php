<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    div {
        display: inline-block;
    }
</style>
<body>
<?php
// 1. Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
mysqli_set_charset($conn, 'UTF8');

// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
$sql = "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM Khach_hang";
$result = mysqli_query($conn, $sql);

// 4.Xu ly du lieu tra ve
echo "<div>";
echo "<h2>THÔNG TIN KHÁCH HÀNG</h2>";
echo "<table border=1>";
echo "<tr>
    <th>Mã KH</th>
    <th>Tên khách hàng</th>
    <th>Giới tính</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
</tr>";
if(mysqli_num_rows($result)!=0) {
    while ($row = mysqli_fetch_array($result)) { 
        echo "<tr>";
        for ($i=0; $i<mysqli_num_fields($result); $i++)
            echo "<td>$row[$i]</td>";
        echo "</tr>";
    }
}
echo "</table>";
echo "</div>";

// 5. Xoa ket qua khoi vung nho va Dong ket noi
mysqli_free_result($result);
mysqli_close($conn);
?>
</body>
</html>