<?php # Script 3.4 - index.php
$page_title = 'Thiết kế form tính tiền điện';
include ('../../includes/header.php');
?>

<style type="text/css">
    form {
        display: inline-block;
        padding: 4px;
        background-color: #d24dff;
    }

    table {
        background: #ffd94d;
        border: 0 solid yellow;
    }

    thead {
        background: #fff14d;
    }

    td {
        color: blue;
        padding: 0 4px;
    }
</style>

<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2.2:</u> Thiết kế form tính tiền điện</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <?php
        if (isset($_POST['name']))
            $name = trim($_POST['name']);
        else {
            $name = "";
        }
            
        if (isset($_POST['old']))
            $old = trim($_POST['old']);
        else $old = 0;

        if (isset($_POST['new']))
            $new = trim($_POST['new']);
        else $new = 0;

        if (isset($_POST['price']))
            $price = trim($_POST['price']);
        else $price = 20000;

        if (isset($_POST['tinh'])) {
            $pay = 0;
            if(empty($name)){
                echo "<p style='color: red;'>Tên chủ hộ không được trống! </p>";
            } elseif (is_numeric($old) && is_numeric($new) && is_numeric($price))
                if($old >= $new){
                    echo "<p style='color: red;'>Chỉ số mới phải lớn hơn chỉ số cũ! </p>";
                } else
                    $pay = ($new - $old) * $price;
            else {
                echo "<p style='color: red;'>Vui lòng nhập vào số! </p>";
            } 
        }
        
        else $pay = 0;
        ?>
        <form action="" method="post">
            <table>
                <thead>
                    <th colspan="3" style="padding: 4px;">
                        <h5 class="text-center">THANH TOÁN TIỀN ĐIỆN</h5>
                    </th>
                </thead>
                <tr>
                    <td>Tên chủ hộ:</td>
                    <td colspan="2"><input type="text" name="name" value="<?php echo $name; ?> " /></td>
                </tr>
                <tr>
                    <td>Chỉ số cũ:</td>
                    <td><input type="text" name="old" value="<?php echo $old; ?> " /></td>
                    <td>(Kw)</td>
                </tr>
                <tr>
                    <td>Chỉ số mới:</td>
                    <td><input type="text" name="new" value="<?php echo $new; ?> " /></td>
                    <td>(Kw)</td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input type="text" name="price" value="<?php echo $price; ?> " /></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán:</td>
                    <td><input type="text" name="pay" disabled="disabled" value="<?php echo number_format($pay, 0, '', '.'); ?> " /></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" value="Tính" name="tinh" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>