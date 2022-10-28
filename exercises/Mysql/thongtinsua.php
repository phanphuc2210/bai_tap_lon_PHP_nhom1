<?php # Script 3.4 - index.php
$page_title = 'Hiển Thị Thông Tin Sữa';
include ('../../includes/header.php');
?>
<style>
	table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<div class="d-flex">
    <?php 
    include ('../../includes/sidebar_exercises.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 3:</u>Hiển Thị Thông Tin Sữa</a></h2>
<?php
  // Ket noi CSDL
require("connect.php");
$sql = 'select Ma_sua,ten_sua,Trong_luong,Don_gia from sua';
// $sql = 'select Ma_hang_sua,Ten_hang_sua,Dia_chi,Dien_thoai,Email from hang_sua';
// $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang';
$rowsPerPage = 10;
if (!isset($_GET['page']))
{ $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset =($_GET['page']-1)* $rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
// $result = mysqli_query($conn, $sql);
$result = mysqli_query($conn, 'SELECT sua.ten_sua,hang_sua.Ten_hang_sua,loai_sua.Ten_loai, sua.Trong_luong,sua.Don_gia 
FROM sua join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
LIMIT '. $offset . ', ' .$rowsPerPage);
echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif'
size='5'> THÔNG TIN SỮA</font></P>";
// echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";
 echo "<table class='mx-auto' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
 echo '<tr>
    <th width="50">STT</th>
     <th width="200">Tên sữa</th>
    <th width="200">Hãng sữa</th>
    <th width="200">Loại sữa</th>
    <th width="50">Trọng lượng</th>
    <th width="50">Đơn giá</th>
</tr>';
// echo '<tr>
// <th width="150">Mã Khách hàng</th>

// <th width="150">Tên khách hàng</th>

// <th width="100">Giới tính</th>

// <th width="300">Địa chỉ</th>

// <th width="100">Điện thoại</th>

// <th width="200">Email</th>

// </tr>';

    // if(mysqli_num_rows($result)<>0)
    // {	 $stt=1;
    //     while($rows=mysqli_fetch_row($result))
    //     {          echo "<tr>";
    //             echo "<td>$stt</td>";
    //             echo "<td>$rows[0]</td>";
    //             echo "<td>$rows[1]</td>";
    //             echo "<td>$rows[2]</td>";
    //             echo "</tr>";
    //                 $stt+=1;
    //     }
    // }

    if(mysqli_num_rows($result)<>0)
    {
        $stt=1;
        while($rows=mysqli_fetch_row($result))
        {       
            echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>{$rows[0]}</td>";
                echo "<td>{$rows[1]}</td>";
                echo "<td>{$rows[2]}</td>";
                echo "<td>{$rows[3]}</td>";
                echo "<td>{$rows[4]}</td>";
                echo "</tr>";
                    $stt+=1;
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
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".(1)."><<</a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."> < </a> ";
    }
    for ($i=1 ; $i<=$maxPage ; $i++) //tạo link tương ứng tới các trang
    { if ($i == $_GET['page'])
    echo '<b>Trang '. $i. '</b> '; //trang hiện tại sẽ được bôi đậm
    else
    echo "<a href=".$_SERVER['PHP_SELF']."?page=".$i.">Trang".$i."</a> ";
    }
    //gắn thêm nút Next
    if ($_GET['page'] < $maxPage)
    { 
        echo "<a href = ". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1)."> > </a>";
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".$maxPage."> >> </a> ";
    echo "</div>";

}
// if(mysqli_num_rows($result)<>0)
// {
// 	while($rows=mysqli_fetch_row($result))
// 	{       
//             echo "<tr>";
// 		     echo "<td>$rows[0]</td>";
// 		     echo "<td>$rows[1]</td>";
// 		     echo "<td>";
//              if($rows[2] == 1){
//                  echo "<img src='./img/female.jpg' width='60px'>";
//             }else {
//                 echo "<img src='./img/male.png' width='60px'>";
//              }
//              echo "</td>";
// 		     echo "<td>$rows[3]</td>";
// 		     echo "<td>$rows[4]</td>";
// 		     echo "<td>$rows[5]</td>";
// 		     echo "</tr>";
// 	}
// }
// echo"</table>";
?>
    </div>
</div>
<?php
include ('../../includes/footer.html');
?>