
<?php
  // Ket noi CSDL
require("connect.php");
$result = mysqli_query($conn, 'SELECT Ma_khach_hang, Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email 
FROM khach_hang
WHERE Ma_khach_hang = "'.$_GET['page'].'"');
echo "<form action='' method='post' enctype='multipart/form-data'>";
echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif'
size='5'>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</font></p>";
 echo "<table align='center' width='700' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
    if(mysqli_num_rows($result)<>0)
    {
        while($rows=mysqli_fetch_row($result))
        {       
            echo "<tr>";
            echo '<td>Mã KH</td>';
            echo "<td><input disabled type='text' value='$rows[0]' /></td>";
            echo "</tr>";
            echo "<tr>";
            echo ' <td>Tên Khách Hàng</td>';
            echo "<td><input type='text' name='name' value='$rows[1]' /></td>";
            echo "</tr>";
            echo "<tr>";
            echo '<td>Giới tính</td>';
            echo "<td><input type='radio'  name='gender' value='Nam'";
                if($rows[2] == 0) echo "checked = checked />";
            echo "<label>Nam</label>";
            echo "<input type='radio'  name='gender' value='Nữ'";
                if($rows[2] == 1) echo 'checked=checked />';
            echo "<label>Nữ</label></td>";
            echo "</tr>";
            echo "<tr>";
            echo '<td>Địa chỉ</td>';
            echo "<td><input type='text' name='dc' value='$rows[3]' /></td>";
            echo "</tr>";
            echo "<tr>";
            echo '<td>Số Điện thoại</td>';
            echo "<td><input type='text' name='sdt' value='$rows[4]' /></td>";
            echo "</tr>";
            echo "<tr>";
            echo '<td>Email</td>';
            echo "<td><input type='text' name='email' value='$rows[5]' /></td>";
            echo "</tr>";
        }
    }
    echo "<tr>
    <td><input type='submit' name='update' Value='Cập nhật' /></td>
    </tr>
    </form>
    ";

    if(isset($_POST['update'])){
        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        if(isset($_POST['dc'])){
            $dc=$_POST['dc'];
        }
        if(isset($_POST['sdt'])){
            $sdt=$_POST['sdt'];
        }
        if(isset($_POST['email'])){
            $email=$_POST['email'];
        }
        $sql =  "UPDATE khach_hang 
        SET Ten_khach_hang = '".$_POST['name']."',
        Phai = '".$_POST['gender']."',
        Dia_chi = '".$_POST['dc']."',
        Dien_thoai = '".$_POST['sdt']."',
        Email = '".$_POST['email']."'
        WHERE Ma_khach_hang = '".$_GET['page']."'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "Error SQL";
        } else {
            echo "Cập nhật thành công"."<br>";
            echo "<a href='./exercise.php?name=Hoang&loai=Mysql&ten_bai=customer.php'>Quay lại</a>";
            // header("Location: ./exercise.php?name=Hoang&loai=Mysql&ten_bai=customer.php");
        }
    }
?>
