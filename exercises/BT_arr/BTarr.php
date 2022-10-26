<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Trận</title>
</head>
<body>
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
</body>
</html>