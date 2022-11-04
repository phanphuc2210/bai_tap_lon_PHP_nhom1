
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 4:</u>Hiển thị thông tin sữa dạng list</a></h2><?php
// Ket noi CSDL
//require("connect.php");
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());
mysqli_set_charset($conn, 'UTF8');
// $sql = 'select Ma_sua,ten_sua,Trong_luong,Don_gia from sua';
$rowsPerPage = 10; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
// $result = mysqli_query($conn, 'SELECT Ma_sua, ten_sua, Trong_luong,
//         Don_gia FROM sua LIMIT ' . $offset . ', ' . $rowsPerPage);
// echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif' size='5'> THÔNG TIN SỮA</font></P>";


$result = mysqli_query($conn, 'SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai, sua.Trong_luong, sua.Don_gia, sua.hinh FROM sua, hang_sua,loai_sua
WHERE sua.Ma_loai_sua = loai_sua.Ma_loai_sua and sua.Ma_hang_sua = hang_sua.Ma_hang_sua LIMIT ' . $offset . ', ' . $rowsPerPage);
echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif' size='5'> THÔNG TIN SỮA</font></P>";


// $result = mysqli_query($conn, $sql);
// echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";
echo "<table class='mx-auto' width='700' border='1' cellpadding='2'  cellspacing='2' style='border-collapse:collapse'>";
echo '<tr>
        
        <th width="100">Ảnh sản phẩm</th>
        <th width="150">Thông tin sản phẩm</th>
        
    </tr>';

$bg = "#eee";
if (mysqli_num_rows($result) <> 0) {
    $stt = 1;

    while ($rows = mysqli_fetch_row($result)) {
        $bg = (($stt % 2 == 0) ? "#fff" : "#eee");

        $rows[4] = number_format($rows[4],0,',','.')." VNĐ";
        
        echo "<tr bgcolor = '$bg'>";
        echo "<td align='center'>  <img width='100px' src='exercises/Hinh_sua//$rows[5]' /></td>";
        echo " <td> <p > <b>$rows[0]</b> </p>
                    <p> Nhà sản xuất: $rows[1]</p>
                    <p>$rows[2] - $rows[3] gram - $rows[4]</p> 
                </td>";
        echo "</tr>";
        $stt += 1;
    }
}

echo "</table>";

$re = mysqli_query($conn, 'select * from sua');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows / $rowsPerPage) + 1;

echo '<p align="center"> ';
echo "<a href=" . $_SERVER['PHP_SELF'] . "?name=Hoang&loai=Mysql&ten_bai=TTsualist.php&page="
    . ($_GET['page'] - 1) . "><</a> ";
for ($i = 1; $i <= $maxPage; $i++) {
    if ($i == $_GET['page']) {
        echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
    } else
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?name=Hoang&loai=Mysql&ten_bai=TTsualist.php&page="
            . $i . ">" . $i . "</a> ";
}
echo "<a href=" . $_SERVER['PHP_SELF'] . "?name=Hoang&loai=Mysql&ten_bai=TTsualist.php&page="
    . ($_GET['page'] + 1) . ">></a>";
echo '</p>';
// echo 'Tong so trang la: ' . $maxPage;

?>
       