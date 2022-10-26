<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mang ghep</title>
</head>
<body>
    <?php
        
        if(isset($_POST['mangA']) && isset($_POST['mangB'])){
            $mangA = $_POST['mangA'];
            $arrA = explode(", ", $mangA);
            $sptA = count($arrA);

            $mangB = $_POST['mangB'];
            $arrB = explode(", ", $mangB);
            $sptB = count($arrB);

            $mangC = array_merge($arrA,$arrB);
            $arrC = implode(", ",$mangC);

            sort($mangC);
            $tdC = implode(", ",$mangC);

            rsort($mangC);
            $gdC = implode(", ", $mangC);
        }
        else {
            $mangA="";
            $mangB="";
            $sptA="";
            $sptB="";
            $arrC ="";
            $tdC="";
            $gdC="";
        }

    ?>
    <form action="" method="post">
        <table style="width:500px;" align="center" bgcolor="#20B2AA" cellpadding="2" cellspacing="2">
            <tr bgcolor="#008080">
    	        <th colspan="3" align="center"><h3><i><font color="white">ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</font></i></h3></th>
            </tr>
            <tr>
                <td>Mảng A:</td>
                <td><input type="text" name="mangA" value="<?php echo $mangA; ?>" size="30"/></td>
            </tr>
            <tr>
                <td>Mảng B:</td>
                <td><input type="text" name="mangB" value="<?php echo $mangB; ?>" size="30"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnThucHien" value="Thực hiện"/></td>
            </tr>
            <tr>
                <td>Số phẩn tử mảng A:</td>
                <td><input type="text" name="sptA" value="<?php echo $sptA; ?>" disabled="disabled" size="6"/></td>
            </tr>
            <tr>
                <td>Số phẩn tử mảng B:</td>
                <td><input type="text" name="sptB" value="<?php echo $sptB; ?>" disabled="disabled" size="6"/></td>
            </tr>
            <tr>
                <td>Mảng C:</td>
                <td><input type="text" name="mangC" value="<?php echo $arrC; ?>" disabled="disabled" size="40"/></td>
            </tr>
            <tr>
                <td>Mảng C tăng dần:</td>
                <td><input type="text" name="tdC" value="<?php echo $tdC; ?>" disabled="disabled" size="40"/></td>
            </tr>
            <tr>
                <td>Mảng C giảm dần:</td>
                <td><input type="text" name="gdC" value="<?php echo $gdC; ?>" disabled="disabled" size="40"/></td>
            </tr>
            <tr >
                <td colspan="2" align="center" ><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ", ")</label></td>
            </tr>
        </table>
    </form>
</body>
</html>