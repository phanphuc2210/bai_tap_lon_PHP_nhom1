
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 5:</u>Hiển thị thông tin sữa dạng list</a></h2>
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
$result = mysqli_query($conn, 'SELECT sua.ten_sua,hang_sua.Ten_hang_sua,loai_sua.Ten_loai,sua.Trong_luong,sua.Don_gia ,sua.Hinh
FROM sua join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
LIMIT '. $offset . ', ' .$rowsPerPage);
echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif'
size='5'> THÔNG TIN CÁC SẢN PHẨM SỮA</font></P>";
// echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";
 echo "<table class='mx-auto' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
    if(mysqli_num_rows($result)<>0)
    {
        while($rows=mysqli_fetch_row($result))
        {   
            echo "<tr>";
                echo "<td width='150px' align='center'> 
                    <img src='exercises/Hinh_sua//{$rows[5]}' width='100px' height='100px' />
                </td>";
                echo "<td>
                    <p>{$rows[0]}</p>
                    <p>Nhà sản xuất: {$rows[1]}</p>
                    {$rows[2]} - {$rows[3]} - {$rows[4]}
                </td>";
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
        echo "<a href=" .$_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=BT2_5.php&page=".(1)."><<</a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=BT2_5.php&page=".($_GET['page']-1)."> < </a> ";
    }
    for ($i=1 ; $i<=$maxPage ; $i++) //tạo link tương ứng tới các trang
    { if ($i == $_GET['page'])
    echo '<b>Trang '. $i. '</b> '; //trang hiện tại sẽ được bôi đậm
    else
    echo "<a href=".$_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=BT2_5.php&page=".$i.">Trang".$i."</a> ";
    }
    //gắn thêm nút Next
    if ($_GET['page'] < $maxPage)
    { 
        echo "<a href = ". $_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=BT2_5.php&page=".($_GET['page']+1)."> > </a>";
        echo "<a href=" .$_SERVER['PHP_SELF']."?name=Hoang&loai=Mysql&ten_bai=BT2_5.php&page=".$maxPage."> >> </a> ";
    echo "</div>";

}
?>
