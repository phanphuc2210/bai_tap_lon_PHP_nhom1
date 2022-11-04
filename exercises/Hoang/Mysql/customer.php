
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 7:</u>Hiển thị, Xóa, Sửa thông tin khách hàng</a></h2>
<?php
  // Ket noi CSDL
require("connect.php");
$rowsPerPage = 10;
if (!isset($_GET['page']))
{ $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset =($_GET['page']-1)* $rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
// $result = mysqli_query($conn, $sql);
$result = mysqli_query($conn, 'SELECT Ma_khach_hang, Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email 
FROM khach_hang
LIMIT '. $offset . ', ' .$rowsPerPage);
echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif'
size='5'> THÔNG TIN KHÁCH HÀNG</font></P>";
// echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";
 echo "<table class='mx-auto' width='1000' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
 echo '<tr>
    <th width="50">Mã KH</th>
     <th width="250">Tên Khách Hàng</th>
    <th width="50">Giới tính</th>
    <th width="250">Địa chỉ</th>
    <th width="100">Số Điện thoại</th>
    <th width="50">Email</th>
    <th width="20">Email</th>
    <th width="20">Email</th>
</tr>';

    if(mysqli_num_rows($result)<>0)
    {
        $stt=1;
        while($rows=mysqli_fetch_row($result))
        {       
            echo "<tr>";
                echo "<td>{$rows[0]}</td>";
                echo "<td>{$rows[1]}</td>";
                if($rows[2] == 1){
                    echo "<td>Nữ</td>";
                } else echo "<td>Nam</td>";
                echo "<td>{$rows[3]}</td>";
                echo "<td>{$rows[4]}</td>";
                echo "<td>{$rows[5]}</td>";
                echo '<td> <a href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=deleteCustomer.php&page='.$rows[0].'" ><i class="fa-solid fa-trash"></i></a> </td>';
                echo '<td> <a href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=editCustomer.php&page='.$rows[0].'" ><i class="fa-solid fa-pen-to-square"></i></a></td>';
                echo "</tr>";
        }
    }
    echo"</table>";
    $re = mysqli_query($conn, 'select * from sua');
    //tổng số mẩu tin cần hiển thị
    $numRows = mysqli_num_rows($re);
    //tổng số trang
    $maxPage = ceil($numRows/$rowsPerPage);
    // echo 'Tong so trang la: '.$maxPage;
    //gắn thêm nút Back
    echo "<div align='center' >";
    if ($_GET['page'] > 1){
        echo "<a href=" .$_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=customer.php&page=".(1)."><<</a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=customer.php&page=".($_GET['page']-1)."> < </a> ";
    }
    for ($i=1 ; $i<=$maxPage ; $i++) //tạo link tương ứng tới các trang
    { if ($i == $_GET['page'])
    echo '<b>Trang '. $i. '</b> '; //trang hiện tại sẽ được bôi đậm
    else
    echo "<a href=".$_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=customer.php&page=".$i.">Trang".$i."</a> ";
    }
    //gắn thêm nút Next
    if ($_GET['page'] < $maxPage)
    { 
        echo "<a href = ". $_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=customer.php&page=".($_GET['page']+1)."> > </a>";
        echo "<a href=" .$_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=customer.php&page=".$maxPage."> >> </a> ";
    echo "</div>";

}
?>
<script src="https://kit.fontawesome.com/8973f61f8c.js" crossorigin="anonymous"></script>
