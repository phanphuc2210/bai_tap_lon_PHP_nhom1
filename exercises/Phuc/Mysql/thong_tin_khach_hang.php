
<style>
    h1 {
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
        padding: 6px 12px 6px 4px;
    }

    th {
        color: #c62d0f;
        text-align: center;
    }
</style>


<h3 class="mb-4"><u class="fw-bold text-origin">Bài 12:</u> Xóa-Sửa</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<?php 
require_once "connect.php";

$sql = "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai, Email FROM Khach_hang";
$result = mysqli_query($conn, $sql);
?>

<h1>THÔNG TIN KHÁCH HÀNG</h1>
<table align="center">
    <tr>
        <th>Mã KH</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th><img src="../../Hinh_sua/edit.jpg" width="20px" alt="edit"/></th>
        <th><img src="../../Hinh_sua/delete.png" width="20px" alt="delete"/></th>
    </tr>
    <?php 
    if(mysqli_num_rows($result)!=0) {
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>". $row['Ma_khach_hang'] ."</td>";
            echo "<td>". $row['Ten_khach_hang'] ."</td>";
            if($row['Phai'] == 0) {
                echo "<td align='center'>
                        Nam
                    </td>";
            }else {
                echo "<td align='center'> 
                        Nữ
                    </td>";
            } 
            echo "<td>". $row['Dia_chi'] ."</td>";
            echo "<td>". $row['Dien_thoai'] ."</td>";
            echo "<td>". $row['Email'] ."</td>";
            echo "<td>
                    <a href='cap_nhat_khach_hang.php?makh=". $row['Ma_khach_hang'] ."'>Sửa</a>
                </td>";
            echo "<td>
                    <a href='xoa_khach_hang.php?makh=". $row['Ma_khach_hang'] ."'>Xóa</a>
                </td>";
            echo "</tr>";
        }
    }
    ?>
</table>
    