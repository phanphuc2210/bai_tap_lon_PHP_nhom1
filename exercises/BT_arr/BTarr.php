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
    // Kiểm soát giá trị nhập vào
    if (isset($_POST['col']))
        $col = trim($_POST['col']);
    else $col = 0;
    if (isset($_POST['row']))
        $row = trim($_POST['row']);
    else $row = 0;
    if (isset($_POST['kq']))
        $kq = trim($_POST['kq']);
    else $kq = "";
    function show($col, $row, $arr){
        $result = 'các phần tử thuộc dòng chẵn cột lẻ là: ';
        for ($i = 0; $i < $col; $i++) {
            if($i % 2 == 0){
                for ($j = 0; $j < $row; $j++) {
                 if($j % 2 == 1){
                    $result .= $arr[$i][$j].' ';
                 }   
                }
            }
        }
        return $result;
    }
    function Boi10($col, $row, $arr){
        $T = 0;
        for ($i = 0; $i < $col; $i++) {
            for ($j = 0; $j < $row; $j++) { 
                if($arr[$i][$j] % 10 == 0){
                    $T += $arr[$i][$j];
                }
            }
        }
        return $T;
    }
    if (isset($_POST['thuchien'])) {
        if ((is_numeric($col) && is_numeric($row))) {
            if ($col >= 2 && $col <= 5) {
                if ($row >= 2 && $row <= 5) {
                    // tạo giá trị cho các pt mảng
                    $arr = array(array());
                    $tmp = "";
                    for ($i = 0; $i < $col; $i++) {
                        for ($j = 0; $j < $row; $j++) {
                            $x = rand(1, 9);
                            $arr[$i][$j] = $x;
                        }
                    }
                    // in ra mảng vừa tạo
                    for ($i = 0; $i < $col; $i++) {
                        for ($j = 0; $j < $row; $j++) {
                            //echo ($arr[$i][$j] . " ");
                            $tmp .= ($arr[$i][$j] . " ");
                        }

                        // $a.="<br/>";
                        $tmp .= "\n";
                    }
                    $kq = "Ma trận được tạo là : \n" . $tmp;
                    $kq .= show($col, $row, $arr);
                    $kq .= "\n";
                    $kq.= 'Tổng các phần tử là bội của 10 là: '.Boi10($col, $row, $arr);
                } else echo "Số cột trong khoảng [2-5] !";
            } else echo "Số dòng trong khoảng [2-5] !";
        } else {
            echo "Vui lòng nhập số!";
        }
    }
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
                <input type="text" name="row" value="" placeholder="0"/>
            </td>
            <td><span id='error1'>(2 <= dòng <= 5)</span></td>
        </tr>
        <tr>
            <td colspan = "2" align="center"><input type="submit" name="thuchien" value="Tính"/></td>
        </tr>
        <tr>
            <td><textarea name="kq" id="" cols="30" rows="10" readonly="true" style="resize: none;"><?php echo $kq  ?></textarea></td>
        </tr>
        </table>
    </form>
    </div>
</div>
<?php
include ('../../includes/footer.html');
?>