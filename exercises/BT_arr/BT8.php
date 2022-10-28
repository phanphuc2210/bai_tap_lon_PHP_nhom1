<?php # Script 3.4 - index.php
$page_title = 'Thiết kế Form Sắp xếp mảng';
include ('../../includes/header.html');
?>
<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 8:</u>Thiết kế Form Sắp xếp mảng</a></h2>
    <?php
        $arr = array();
        $chuoi ="";
        $mang_tang="";
        $mang_giam="";
        $in_chuoi_tang="";
        $in_chuoi_giam="";
        function hoan_vi(&$a, &$b){
            $temp = $a;
            $a = $b;
            $b = $temp;
        }
        function sap_xep_tang($arr){
            for($i=0; $i<(count($arr) -1);$i++){
                for($j=$i; $j<count($arr); $j++){
                    if($arr[$i] > $arr[$j]){
                        hoan_vi($arr[$i], $arr[$j]);
                    }
                }
            }
            return $arr;
        }

        function sap_xep_giam($arr){
            for($i=0; $i<(count($arr)-1);$i++){
                for($j=$i; $j<count($arr); $j++){
                    if($arr[$i] < $arr[$j]){
                        hoan_vi($arr[$i], $arr[$j]);
                    }
                }
            }
            return $arr;
        }
        if(isset($_POST['mang']))
            $chuoi = trim($_POST['mang']);
        else $chuoi ="";

        if(isset($_POST['btnSapXep'])){
            $arr = explode(",",$chuoi);
            $mang_tang = sap_xep_tang($arr);
            $in_chuoi_tang = implode(",",$mang_tang);
            $mang_giam = sap_xep_giam($arr);
            $in_chuoi_giam = implode(",", $mang_giam);
        }
    ?>
    <form action="" method="post">
        <table style="width:500px;" align="center" bgcolor="#20B2AA" cellpadding="2" cellspacing="2">
            <tr bgcolor="#008080">
    	        <th colspan="3" align="center"><h3><i><font color="white">SẮP XẾP MẢNG</font></i></h3></th>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td>
                    <input type="text" name="mang" value="<?php 
                    echo $chuoi;
                ?>" size="40"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnSapXep" value="Sắp xếp tăng/giảm" style="width:200px;"/></td>
            </tr>
            <tr>
                <td><b><font color="red">Sau khi sắp xếp:</font></b></td>
            </tr>
            <tr>
                <td>Tăng dần:</td>
                <td><input type="text" name="td" value="<?php echo $in_chuoi_tang; ?>" disabled="disabled" size="40"/></td>
            </tr>
            <tr>
                <td>Giảm dần:</td>
                <td><input type="text" name="gd" value="<?php echo $in_chuoi_giam; ?>" disabled="disabled" size="40"/></td>
            </tr>
            <tr >
                <td colspan="2" align="center" ><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
            </tr>
        </table>
    </form>
    </div>
</div>
<?php
include ('../../includes/footer.html');
?>