<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tìm kiếm sữa</title>
</head>
<body>
    <?php
$ketqua = "";     require_once "./connect.php";
$sql = "SELECT Ma_loai_sua,Ten_loai FROM loai_sua";
$loai_sua_sql = mysqli_query($conn, $sql);

$sql = "SELECT Ma_hang_sua,Ten_hang_sua FROM hang_sua";
$hang_sua_sql = mysqli_query($conn, $sql);

$ma_sua = isset($_POST['ma_sua'])? $_POST['ma_sua'] : '';
$ten_sua = isset($_POST['ten_sua'])? $_POST['ten_sua'] : '';
$hang_sua = isset($_POST['hang_sua'])? $_POST['hang_sua'] : '';
$loai_sua = isset($_POST['loai_sua'])? $_POST['loai_sua'] : '';
$trong_luong = isset($_POST['trong_luong'])? (int)$_POST['trong_luong'] : '';
$don_gia = isset($_POST['don_gia'])? (int)$_POST['don_gia'] : '';
$tp_dinh_duong = isset($_POST['tp_dinh_duong'])? $_POST['tp_dinh_duong'] : '';
$loi_ich = isset($_POST['loi_ich'])? $_POST['loi_ich'] : '';
$hinh = isset($_FILES['hinh'])? $_FILES['hinh']['name'] : '';

if(isset($_POST['add'])) {
    if(isset($_POST['name']))  
        $name=trim($_POST['name']);
    else $name="";
    if(isset($_POST['hang']))  
        $hang=trim($_POST['hang']);
    else $hang="";
    if(isset($_POST['loai']))  
        $loai=trim($_POST['loai']);
    else $loai="";
    $sql =  "SELECT Ten_sua, Ma_hang_sua, Ma_loai_sua FROM sua WHERE Ten_sua = '$name' OR Ma_hang_sua = '$hang' OR Ma_loai_sua = '$loai'";
    $result = mysqli_query($conn, $sql);
    //=============================
    
    if($result) {
        $sql = "SELECT sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, sua.TP_Dinh_Duong, sua.Loi_ich,sua.Trong_luong,sua.Don_gia 
                FROM sua JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                WHERE sua.Ten_sua = '$name' OR sua.Ma_hang_sua = '$hang' OR sua.Ma_loai_sua = '$loai'
        ";
        $sua = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($sua);
        if($rows > 0){
            $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;'>
                        <b>Có $rows sản phẩm tìm thấy</b>
                    </p>";
            while($row = mysqli_fetch_array($sua)){
                $hinh_anh = "../Hinh_sua//".$row['Hinh'];
                $ketqua .= "<table id='tb_ketqua' align='center'>
                            <tr>
                                <th colspan='2' align='center'>
                                    <h2>" . $row['Ten_sua']. " - " . $row['Ten_hang_sua'] . "</h2>   
                                </th>
                            </tr>
                            <tr>
                                <td align='center' style='width: 200px'><img src= $hinh_anh width='150px'/></td>
                                <td style='width: 450px' >
                                    <h4><i>Thành phần dinh dưỡng:</i></h4>
                                    <span>". $row['TP_Dinh_Duong'] ."</span>
                                    <h4><i>Lợi ích:</i></h4>
                                    <span>". $row['Loi_ich'] ."</span>
                                    <p>
                                        <b><i>Trọng lượng: </i></b> <span class='origin'>". $row['Trong_luong'] ." gr</span> - 
                                        <b><i>Đơn giá: </i></b> <span class='origin'>". number_format($row['Don_gia'], 0, '', '.') ." VNĐ</span>
                                    </p>
                                </td>
                            </tr>
                            </table>";
            }
        }
    } else 
        $ketqua .= "<p style='margin: 2px 0 8px 0; text-align: center;color: red;'>Kiểm tra lại thông tin nhập vào !!!!!</p>";
    
}
?>
<form action="" method="post" enctype="multipart/form-data">
        <table style="width:500px;" align="center" bgcolor="#20B2AA" cellpadding="2" cellspacing="2">
            <tr bgcolor="#008080">
    	        <th colspan="3" align="center"><h3><i><font color="white">TÌM KIẾM THÔNG TIN SỮA</font></i></h3></th>
            </tr>
            <tr>
                <td>Tên sữa:</td>
                <td><input id="name" type="text" name="name" value="" size="30"/></td>
            </tr>
            <tr>
                <td>Hãng sữa:</td>
                <td>
                    <?php
                        $result = mysqli_query($conn, 'SELECT Ma_hang_sua, Ten_hang_sua 
                        FROM hang_sua');
                        echo '<select name="hang">';
                        if(mysqli_num_rows($result)<>0)
                        {
                            while($rows=mysqli_fetch_row($result))
                            {       
                                echo "<option value='$rows[0]'>
                                $rows[1]
                            </option>";
                            }
                        }
                        echo '</select>';
                    ?>
                </td>
            </tr>
            <tr>
                <td>Loại sữa:</td>
                <td>
                <?php
                        $result = mysqli_query($conn, 'SELECT Ma_loai_sua, Ten_loai 
                        FROM loai_sua');
                        echo '<select name="loai">';
                        if(mysqli_num_rows($result)<>0)
                        {
                            while($rows=mysqli_fetch_row($result))
                            {       
                                echo "<option value='$rows[0]'>
                                $rows[1]
                            </option>";
                            }
                        }
                        echo '</select>';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="add" value="Tìm kiếm"/>
                </td>
            </tr>

        </table>
        <?php
            if(isset($ketqua)) echo $ketqua; 
            
        ?>
    </form>
</body>
</html>