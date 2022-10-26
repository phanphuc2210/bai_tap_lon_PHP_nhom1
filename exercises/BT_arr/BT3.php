<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính năm âm lịch</title>
</head>
<body>
    <?php
        if(isset($_POST['dl']))
            $dl = $_POST['dl'];
        else $dl = "";
        $mang_can = array("Quý","Giáp","Ất","Bính","Đinh","Mậu","Kỉ","Canh","Tân","Nhâm");
        $mang_chi = array("Hợi","Tý","Sửu","Dần","Mão","Thìn","Tỵ","Ngọ","Mùi","Thân","Dậu","Tuất");
        $mang_hinh = array("hoi.jpg","chuot.jpg","suu.jpg","dan.jpg","meo.jpg","thin.jpg","ty.jpg","ngo.jpg","mui.jpg","than.jpg","dau.jpg","tuat.jpg");
        $can = 0;
        $chi = 0;
        $hinh = 0;
        $hinh_anh = "";
        if(isset($_POST['btnXacNhan']))
            if(is_numeric($dl)){
                $dl = $dl -3;
                $can = $dl % 10;
                $chi = $dl % 12;
                $al = $mang_can[$can] ." ". $mang_chi[$chi];
                $dl = $dl +3;
                $hinh = $mang_hinh[$chi];
                $hinh_anh = "<img src='images/$hinh'>";
            }
            else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>";
                $al = "";
            }
        else $al = "";
    ?>
    <form action="" method="post">
        <table width="400" align="center">
            <tr>
                <td colspan="3" align="center">Tính năm âm lịch</td>
            </tr>
            <tr>
                <td align="center">Năm dương lịch</td>
                <td></td>
                <td align="center">Năm âm lịch</td>
            </tr>
            <tr>
                <td><input type="text" name="dl" value="<?php echo $dl; ?>"/></td>
                <td><input type="submit" name="btnXacNhan" value="=>"/></td>
                <td><input type="text" name="al" disabled="disabled" value="<?php echo $al; ?>"/></td>
            </tr>
            <tr>
                <td colspan="3" align="center"><?php echo $hinh_anh; ?></td>
            </tr>
        </table>
    </form>
</body>
</html>