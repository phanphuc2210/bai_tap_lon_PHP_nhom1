<!DOCTYPE html>
<?php
session_start();
$str ='';
        if (isset($_POST['rank']) && isset($_POST['namesong']) && isset($_POST['add'])){
            $_SESSION["arr"][$_POST['rank']] = $_POST['namesong'];
        }
        foreach ($_SESSION['arr'] as $key => $value){
            $str .= $key.'. '. $value."\n";
        }

        if(isset($_POST['show']) ){
            ksort($_SESSION['arr']);
            $str = '';
            foreach ($_SESSION['arr'] as $key => $value){
                $str .= $key.'. '. $value."\n";
            }
            session_reset();
        }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Song</title>
</head>
<body>
    <form action="" method="post">
        <table style="width:500px;" align="center" bgcolor="#20B2AA" cellpadding="2" cellspacing="2">
            <tr bgcolor="#008080">
    	        <th colspan="3" align="center"><h3><i><font color="white">Xếp hạng bài hát</font></i></h3></th>
            </tr>
            <tr>
                <td>Tên Bài Hát:</td>
                <td><input id='namesong' type="text" name="namesong" value="" size="30"/></td>
            </tr>
            <tr>
                <td>Thứ hạng:</td>
                <td><input id="rank" type="text" name="rank" value="" size="30"/></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="add" value="Thêm bài hát"/>
                </td>
                <td>
                    <input type="submit" name="show" value="Hiển thị danh sách"/>
                </td>
            </tr>
            <tr>
                <td><textarea id="kq" name="kq" id="" cols="30" rows="10"><?php if(isset($str)) echo trim($str) ?></textarea></td>
                
            </tr>
        </table>
    </form>
</body>
</html>
