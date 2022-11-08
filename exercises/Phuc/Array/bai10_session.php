<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xếp hạng bài hát</title>
</head>
<style type="text/css">
	table{
		color: #000;
		background-color: #d0ddd3;	
		padding: 4px;	
	}

	table th{
		background-color: #329998;
		font-style: vni-times;
		color: white;
	}

    #ds {
        padding: 8px;
        background-color: #fdffd5;
        width: 400px;
        height: 200px;
        overflow-y: scroll;
    }

    p {
        margin: 4px 0;
    }
</style>    
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 10:</u> Tạo Form sắp xếp bài hát</a></h2>
    <?php
    $ds = "";
    $mang_baihat = isset($_SESSION['dsBaiHat'])? $_SESSION['dsBaiHat'] : [];
    $tenbh = isset($_POST['tenbh'])? $_POST['tenbh'] : "";
    $thuhang = isset($_POST['thuhang'])? $_POST['thuhang'] : "";

    if(isset($_POST['them']) && $tenbh != "" && $thuhang != "") {
        $mang_baihat[$thuhang] = $tenbh;
        $_SESSION['dsBaiHat'] = $mang_baihat;

        $tenbh = "";
        $thuhang = "";

        foreach($mang_baihat as $key => $baihat) {
            $ds .= "$key. $baihat"."<br>";
        }
    } 

    if(isset($_POST['xephang'])) {
        ksort($mang_baihat);
        foreach($mang_baihat as $key => $baihat) {
            $ds .= "$key. $baihat"."<br>";
        }
    }
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <th colspan="2" align="center"><h2>Xếp hạng bài hát</h2></th>
            </tr>
            <tr>
                <td>Tên bài hát: </td>
                <td><input type="text" name="tenbh" size="45" value="<?php echo $tenbh; ?>"></td>
            </tr>
            <tr>
                <td>Thứ hạng: </td>
                <td><input type="text" name="thuhang" size="10" value="<?php echo $thuhang; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="them" value="Thêm bài hát">
                    <input type="submit" name="xephang" value="Hiển thị bảng xếp hạng">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div name="ds" id="ds">
                        <?php echo $ds; ?>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>