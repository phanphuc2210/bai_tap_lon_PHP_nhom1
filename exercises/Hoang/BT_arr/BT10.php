<?php
session_start();
$str ='';
        if (isset($_POST['rank']) && isset($_POST['namesong']) && isset($_POST['add'])){
            $_SESSION["arr"][$_POST['rank']] = $_POST['namesong'];
        }
        if(isset($_SESSION['arr'])){
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
        }
?>

<style>
    td{
        padding: 4px;
    }
</style>


<h3 class="mb-4"><u class="fw-bold text-origin">Bài 10:</u>Tạo form xếp hạng bài hát</a></h2>
<form action="" method="post">
    <table style="width:500px;" align="center" bgcolor="#20B2AA" cellpadding="2" cellspacing="2">
        <tr bgcolor="#008080">
            <th colspan="2" align="center"><h3><i><font color="white">Xếp hạng bài hát</font></i></h3></th>
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
            <td colspan="2" align="center">
                <input type="submit" name="add" value="Thêm bài hát"/>
                <input type="submit" name="show" value="Hiển thị danh sách"/>
            </td>
        </tr>
        <tr>
            <td colspan="2"><textarea id="kq" name="kq" id="" cols="70" rows="10"><?php if(isset($str)) echo trim($str) ?></textarea></td>
            
        </tr>
    </table>
</form>
    