
<style>
  table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

	<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1:</u>Hiển thị thông tin khách hàng</a></h2>
<?php
// 1. Ket noi CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
$sql = "SELECT * FROM Khach_hang";
$result = mysqli_query($conn, $sql);
// 4.Xu ly du lieu tra ve
echo "
<table class='mx-auto'>
    <tr>
        <td>mã Khách Hàng</td>
        <td>tên Khách Hàng</td>
        <td>Địa chỉ</td>
        <td>phái</td>
        <td>SĐT</td>
        <td>mail</td>
    </tr>
";
if(mysqli_num_rows($result)!=0){
while ($row = mysqli_fetch_array($result))
{ 
    echo "
    <tr>
        <td>$row[Ma_khach_hang]</td>
        <td>$row[Ten_khach_hang]</td>
        <td>$row[Dia_chi]</td>
        <td>";
          if($row['Phai'] == 1){
            echo "<img width='50px' src='exercises/Hinh_sua/man.jpg' />";
          } else {
            echo "<img width='50px' src='exercises/Hinh_sua/nu.jpg' />";
          }  
    echo "</td>
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

