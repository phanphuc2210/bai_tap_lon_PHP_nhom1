<?php # Script 3.4 - index.php
$page_title = 'Tạo và hiển thị ma trận số nguyên';
include ('../../includes/header.html');
?>
<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 10:</u>Tạo và hiển thị ma trận số nguyên</a></h2>
    <?php
        if(isset($_POST['txtSTN']))
            $first = trim($_POST['txtGBD']);
        else $first=0;
        if(isset($_POST['txtSTH']))  
            $second=trim($_POST['txtSTH']); 
        else $second=0;
    ?>
    <form action="" method="POST">
        <table align="center">
            <tr>
                <th colspan="5" align="center"><h3><font color="blue">MA TRẬN</font></h3></th>
            </tr>
            <tr>
        <td>Nhập số dòng: </td>
        <td>
            <input type="text" name="col" value="" placeholder="0"/>
        </td>
        <td><span id='error1'>(2 <= cột <= 5)</span></td>
        </tr>
        <tr>
            <td>Nhập số cột: </td>
            <td>
                <input type="text" name="one" value="" placeholder="0"/>
            </td>
            <td><span id='error1'>(2 <= dòng <= 5)</span></td>
        </tr>
        <tr>
            <td colspan = "2" align="center"><input type="submit" name="btnTinh" value="Tính"/></td>
        </tr>
        </table>
    </form>
    </div>
</div>
<?php
include ('../../includes/footer.html');
?>