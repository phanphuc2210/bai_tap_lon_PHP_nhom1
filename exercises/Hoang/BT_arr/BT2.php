<?php # Script 3.4 - index.php
$page_title = 'Thiết kế Form tìm năm nhuận';
include ('../../includes/header.php');
?>

<div class="d-flex">
     
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2:</u>Thiết kế Form tìm năm nhuận</a></h2>
        <?php 
        function nam_nhuan($nam){
            if($nam % 4 == 0 && $nam % 100 != 0){
                return 0;
            } else { return 1; } 
        }
        if(isset($_POST['smaller'])) {
            $smaller=trim($_POST['smaller']);
            $s = $_POST['smaller'];
        }
        if(isset($_POST['bigger'])) {
            $b = $_POST['bigger'];
            $bigger=trim($_POST['bigger']);
        }
        $kq = '';
            if(isset($_POST['small'])){
                if(empty($s) || !is_numeric($s) || $s > 2000){
                    echo "<font color='red'>Mời nhập số tự nhiên nhỏ hơn 2000</font>";
                    $s = '';
                } else {
                    $dem = 0;
                    foreach(range(2000,$s) as $year){
                        if(nam_nhuan($year) == 0){
                            $kq.=$year.' ';
                            $dem ++;
                        }
                    }
                    if($dem != 0){
                        $kq.=' là năm nhuận';
                    } else {
                        $kq.='không có năm nhuận trong khoảng từ'.$s.' đến 2000';
                    }
                }
            }
            $kq1 = '';
            if(isset($_POST['big'])){
                if(empty($b)){
                    echo "<font color='red'>Mời nhập số tự nhiên lớn hơn 2000</font>";
                    $n = 0;
                } else {
                    $dem = 0;
                    foreach(range($b,2000) as $year){
                        if(nam_nhuan($year) == 0){
                            $kq1.=$year.' ';
                            $dem ++;
                        }
                    }
                    if($dem != 0){
                        $kq1.=' là năm nhuận';
                    } else {
                        $kq1.='không có năm nhuận trong khoảng từ 2000 đến '.$b;
                    }
                }
            }
        ?>
        <form align='center' action="" method="post">
            <h5>Năm nhập vào nhỏ hơn năm 2000</h5>
            <h5>Tìm Năm Nhuận</h5>
        <label for="year">Năm: </label>
        <input type="text" name="smaller" value=" <?php if(isset($s)) { echo trim($s);}; ?> " required placeholder="0" />
        <p>
            <?php echo $kq;  ?>
        </p>
        <input type="submit" value="Tìm năm nhuận" name="small">
        <h5 style="margin-top: 32px;">Năm nhập vào lớn hơn năm 2000</h5>
        <h5>Tìm Năm Nhuận</h5>
        <label for="year">Năm: </label>
        <input type="text" name="bigger" value=" <?php if(isset($b)) { echo trim($b);}; ?>" required placeholder="0">
        <p>
            <?php echo $kq1; ?>
        </p>
        <input type="submit" value="Tìm năm nhuận" name="big">
        </form>
    </div>
</div>
<?php
include ('../../includes/footer.html');
?>