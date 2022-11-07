<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Năm Nhuận</title>
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

    #ketqua {
        padding: 8px;
        background-color: #fdffd5;
        width: 400px;
        min-height: 50px;
        text-align: center;
    }
</style>
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2:</u> Thiết kế Form tìm năm nhuận</a></h2>
    <?php
    $ketqua = "";
    $nam = isset($_POST['nam'])? $_POST['nam'] : "";

    function namNhuan($nam) {
        if($nam % 400 == 0 || $nam % 4 == 0 ) {
            return 1;
        }

        if($nam % 100 != 0) {
            return 0;
        }
    }

    if(isset($_POST['tim'])) {
        foreach(range(2000, $nam) as $year) {
            if(namNhuan($year) == 1) {
                $ketqua .= $year . "   ";
            }
        }

        if($ketqua != ""){
            $ketqua .= "là năm nhuận";
        } else {
            $ketqua .= "Không có năm nhuận";
        }
    }

    ?>
    <form action="" method="post">
        <table>
            <tr>
                <th colspan="2"><h2>Tìm Năm Nhuận</h2></th>
            </tr>
            <tr>
                <td align="right">Năm:</td>
                <td align="center"><input type="text" name="nam" value="<?php echo $nam ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div name="ketqua" id="ketqua">
                        <?php echo $ketqua; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="tim" value="Tìm năm nhuận">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>