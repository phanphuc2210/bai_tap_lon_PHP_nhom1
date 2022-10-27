<?php # Script 3.4 - index.php
$page_title = 'Hiển thị thông tin khách hàng';
include ('../../includes/header.html');
?>
<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
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
<table border=1>
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
            echo "<img width='50px' src='./img/female.jpg' />";
          } else {
            echo "<img width='50px' src='./img/Male.png' />";
            
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
</div>
</div>
<?php
include ('../../includes/footer.html');
?>
