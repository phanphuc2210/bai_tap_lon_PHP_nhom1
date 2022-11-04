<?php # Script 3.4 - index.php
$page_title = ' Một số thao tác trên mảng số nguyên';
include ('../../includes/header.php');
?>
<style>
    fieldset {
            display: inline-block;
            background-color: #d0ddd3;
        }

        legend {
            background-color: #329998;
            padding: 5px 10px;
        }

        input {
            margin: 5px;
        }
</style>

<div class="d-flex">
     
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1:</u> Một số thao tác trên mảng số nguyên</a></h2>
        <?php 
        if(isset($_POST['num'])) {
            $num=trim($_POST['num']);
            $n = $_POST['num'];
        }
        else $num=0;
            if(isset($_POST['gui'])){
                if(empty($n)){
                    echo "<font color='red'>Mời nhập số tự nhiên n</font>";
                    $n = 0;
                } else {
                    if (is_numeric($n))  {
                        $arr = array();
                        for($i=0;$i<$n;$i++){
                            $arr[$i] = rand(-100,200);
                        }
                    }
                    else {
                        echo "<font color='red'>Vui lòng nhập đúng số liệu! </font>";
                        $n='';
                    }
                }
            }
            else $n='';
        ?>
        <?php 
            function sochan($arr){
                if(!empty($arr)){
                    $result = 'Các phần tử của mảng là: '.implode(', ',$arr)."&#13;&#10;";
                    $count = 0;
                    foreach($arr as $item){
                        if($item % 2 == 0 && $item > 0){
                            $count++;
                        }
                    }
                    $result.= "Có $count số chẵn > 0 trong mảng"."\n";
                    return $result;
                }
            }
            function lastLe($arr, $n){
                if(!empty($arr)){
                    echo "Các số < $n có chữ số cuối là số lẻ là: "."&#13;&#10;";
                    $le = '';
                    foreach($arr as $i){
                        $last = $i % 10;
                        if ($last % 2 != 0){
                        $le.=$i." ";
                        }
                    }
                    echo $le;
                }
            }
        function small100($arr){
            if(!empty($arr)){
                $count = 0;
                foreach($arr as $i){
                    if ($i < 100){
                        $count++;
                    }
                }
                echo "Có $count phần tử trong mảng có giá trị nhỏ hơn 100 ";
            }
        }
        function sumam($arr){
                $T = 0;
                foreach($arr as $i){
                    if($i < 0){
                        $T += $i;
                    }
                }
                echo "Tổng các phần tử số âm là: $T";
        }
        function posi($arr){
            echo "Các vị trí có chữ số kề cuối = 0 là: ";
            $kq = '';
            foreach($arr as $key=>$value){
                if($value > 10){
                    $last = $value / 10;
                    $last = $last % 10;
                    if ($last == 0){
                        $kq.=$key." ";
                    }
                }
            }
            echo $kq;
        }
        function sx($arr){
            sort($arr); 
            echo implode(', ',$arr);
        }
            if(!empty($arr)){
                $result = '';
                echo '<br/>';
                
            }
        ?>
        <fieldset>
            <legend>Nhập số tự nhiên n</legend>
        <form align='center' action="" method="post">
        <table>
            <tr>
                <td>Nhập n:</td>
                <td>
                    <input type="text" name="num" value=" <?php echo trim($n); ?> " required placeholder="0" />
                </td>
                <td>
                    <input type="submit" value="Xử lý" name="gui" />
                </td>
            </tr>
            <tr>
                
            </tr>
        </table>
        </form>

        </fieldset>
        <?php
        if(!empty($arr)){
            echo '<br/>';
            echo sochan($arr);
            echo '<br/>';
            lastLe($arr,$n);
            echo '<br/>';
            small100($arr);
            echo '<br/>';
            sumam($arr);
            echo '<br/>';
            posi($arr);
            echo '<br/>';
            sx($arr);
        }
        ?>
    </div>
</div>
<?php
include ('../../includes/footer.html');
?>