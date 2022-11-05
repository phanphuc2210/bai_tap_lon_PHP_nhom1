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
    <?php
    $fp = @fopen('baihat.txt', 'a+');
    $ds = "";
    $mang_baihat = [];
    $tenbh = isset($_POST['tenbh'])? $_POST['tenbh'] : "";
    $thuhang = isset($_POST['thuhang'])? $_POST['thuhang'] : "";

    if(isset($_POST['them']) && $tenbh != "" && $thuhang != "") {
        $ds = "";
        if(!$fp) {
            echo "Mở file thất bại";
        } else {
            // Hiển thị bài hát ra màn hình
            while(!feof($fp)) {
                $data = fgets($fp);
                $th = substr($data, 0, strpos($data, "-"));
                $bh = substr($data, strpos($data, "-") + 1);
                
                if($data != "")
                    $mang_baihat[$th] = $bh;
            }
            $mang_baihat[$thuhang] = $tenbh;

            foreach($mang_baihat as $key => $baihat) {
                $ds .= "<p>$key. $baihat</p>";
            }

            // ghi bài hát vào filr
            $data = "$thuhang-$tenbh"."\n";
            fwrite($fp, $data);
            fclose($fp);
        }
    } 

    if(isset($_POST['xephang'])) {
        $ds = "";
        if(!$fp) {
            echo "Mở file thất bại";
        } else {
            // Hiển thị bài hát ra màn hình
            while(!feof($fp)) {
                $data = fgets($fp);
                $th = substr($data, 0, strpos($data, "-"));
                $bh = substr($data, strpos($data, "-") + 1);
                
                if($data != "")
                    $mang_baihat[$th] = $bh;
            }

            ksort($mang_baihat);
            foreach($mang_baihat as $key => $baihat) {
                $ds .= "<p>$key. $baihat</p>";
            }

            fclose($fp);
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