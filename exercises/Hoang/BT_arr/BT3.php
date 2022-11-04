<?php # Script 3.4 - index.php
$page_title = 'Thiết kế Form tìm năm âm lịch';
include ('../../includes/header.php');
?>
<style>
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
<div class="d-flex">
     
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 3:</u>Thiết kế Form tìm năm âm lịch</a></h2>
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
    <table>
            <tr>
                <th colspan="3" align="center"><h2 style="text-align: center;">TÍNH NĂM ÂM LỊCH</h2></th>
            </tr>
            <tr>
                <td align="center">Năm dương lịch</td>
                <td></td>
                <td align="center">Năm âm lịch</td>
            </tr>
            <tr>
                <td><input type="text" name="dl" value="<?php if (isset($_POST['dl'])) echo $_POST['dl']; ?>" size="20"></td>
                <td style="padding: 0 26px;"><input type="submit" name="btnXacNhan" value="=>"></td>
                <td><input type="text" name="al" value="<?php echo $al; ?>" size="20" disabled></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <?php echo $hinh_anh; ?>
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>
<?php
include ('../../includes/footer.html');
?>