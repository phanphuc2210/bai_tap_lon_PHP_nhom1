<?php
// 1. Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
$sql = "SELECT * FROM Khach_hang";
$result = mysqli_query($conn, $sql);
// 4.Xu ly du lieu tra ve
echo "
<table border=1>
    <tr>
        <td>mã Khách Hàng</td>
        <td>tên Khách Hàng</td>
        <td>Địa chỉ</td>
        <td>phái</td>
        <td>SĐT</td>
        <td>meo</td>
    </tr>
";
if(mysqli_num_rows($result)!=0){
while ($row = mysqli_fetch_array($result))
{ 
    // for ($i=0; $i<mysqli_num_fields($result); $i++)
    // echo $row[$i] . " ";
    echo "
    <tr>
        <td>$row[Ma_khach_hang]</td>
        <td>$row[Ten_khach_hang]</td>
        <td>$row[Dia_chi]</td>
        <td>
            
        </td>
        <td>$row[Dien_thoai]</td>
        <td>$row[Email]</td>
    </tr>";
}
}

echo "</table>";
// 5. Xoa ket qua khoi vung nho va Dong ket noi
mysqli_free_result($result);
mysqli_close($conn);
?>
