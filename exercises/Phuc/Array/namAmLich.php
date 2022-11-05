<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Năm âm lịch</title>
</head>
<style type="text/css">
	table{
		color: #000;
		background-color: #d0ddd3;		
	}

	table th{
		background-color: #329998;
		font-style: vni-times;
		color: white;
	}
</style>
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 3:</u> Thiết kế Form tìm năm âm lịch</a></h2>
    <?php
    $mang_can = ["Qúy", "Giáp", "Ất", "Binh", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm"];
    $mang_chi = ["Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất"];
    $mang_hinh = ["hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.gif", "ran.jpg", "ngo.jpg",
                "mui.jpg", "than.gif", "dau.jpg", "tuat.jpg"];

    $nam_al = "";
    $hinh_anh = "<img src='' width='150px'/>";

    if(isset($_POST['xuly']) && isset($_POST['duonglich'])) {
        $nam = $_POST['duonglich'];
        $nam = $nam - 3;
        $can = $nam%10;
        $chi = $nam%12;
        $nam_al = $mang_can[$can];
        $nam_al = $nam_al." ".$mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
        $hinh_anh = "<img src='./images/$hinh' width='150px'/>";
    }
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <th colspan="3" align="center"><h1>TÍNH NĂM ÂM LỊCH</h1></th>
            </tr>
            <tr>
                <td align="center">Năm dương lịch</td>
                <td></td>
                <td align="center">Năm âm lịch</td>
            </tr>
            <tr>
                <td><input type="text" name="duonglich" value="<?php if (isset($_POST['duonglich'])) echo $_POST['duonglich']; ?>" size="20"></td>
                <td style="padding: 0 26px;"><input type="submit" name="xuly" value="=>"></td>
                <td><input type="text" name="amlich" value="<?php echo $nam_al; ?>" size="20" disabled></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <?php echo $hinh_anh; ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>