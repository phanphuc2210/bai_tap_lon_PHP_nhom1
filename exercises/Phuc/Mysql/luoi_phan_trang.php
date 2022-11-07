
<style>
    h2 {
        color: #c62d0f;
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
        text-align: center;
        color: #c62d0f;
    }

    #phantrang {
        display: flex;
        margin-top: 18px;
        justify-content: center;
        align-items: center;
        gap: 12px;
        cursor: pointer;
    }

    /* a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        color: #c62d0f;
    } */
</style>


<h3 class="mb-4"><u class="fw-bold text-origin">Bài 4:</u> Lưới phân trang</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<?php 
require_once "connect.php";

//số mẩu tin trên mỗi trang
$rowsPerPage = 10;
if(!isset($_GET['page'])) {
    $_GET['page'] = 1;
}

//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset = ($_GET['page'] - 1) * $rowsPerPage;

$sql = "SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai,sua.Trong_luong,sua.Don_gia 
        FROM sua,hang_sua,loai_sua
        WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua
        LIMIT $offset, $rowsPerPage";
$result = mysqli_query($conn, $sql);


//tổng số mẫu tin cần hiển thị
$rows = mysqli_query($conn, "SELECT * FROM sua");
$numRows = mysqli_num_rows($rows);

//tổng số trang
$maxPage = ceil($numRows/$rowsPerPage);
?>

<h2>THÔNG TIN SỮA</h2>
<table align="center">
    <tr>
        <th>STT</th>
        <th>Tên sữa</th>
        <th>Hãng sữa</th>
        <th>Loại sữa</th>
        <th>Trọng lượng</th>
        <th>Đơn giá</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result)!=0) {
        $stt = 1;
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>". $stt ."</td>";
            echo "<td style='width: 270px'>". $row['Ten_sua'] ."</td>";
            echo "<td style='width: 120px'>". $row['Ten_hang_sua'] ."</td>";
            echo "<td style='width: 100px'>". $row['Ten_loai'] ."</td>";
            echo "<td align='center'>". $row['Trong_luong'] ."gram</td>";
            echo "<td align='center'>". number_format($row['Don_gia'], 0, '', '.') ."VND</td>";
            echo "</tr>";
            $stt++;
        }
    }
    ?>
</table>
<p style="text-align: center;"><?php echo "Tổng số trang: ". $maxPage; ?></p>
<div id="phantrang">
    <?php 
    //gắn thêm nút Back
    if($_GET['page'] > 1) {
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=1><<</a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."><</a> ";
    }
    //tạo link tương ứng tới các trang
    for ($i=1 ; $i<=$maxPage ; $i++) { 
        if ($i == $_GET['page']) { 
            echo '<b style="color: #c62d0f">'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        } else
            echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a>";
    }
    //gắn thêm nút Next
    if($_GET['page'] < $maxPage) {
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">></a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".$maxPage.">>></a> ";
    }
    ?>
</div>