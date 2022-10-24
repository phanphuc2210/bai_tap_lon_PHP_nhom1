<?php # Script 3.4 - index.php
$page_title = 'Thiết kế form tính diện tích hình chữ nhật';
include ('../../includes/header.html');
?>
<style type="text/css">
    /* body {
        background-color: #d24dff;
    } */
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
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2.1:</u> Thiết kế form tính diện tích hình chữ nhật</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <?php
        if (isset($_POST['chieudai']))
            $chieudai = trim($_POST['chieudai']);
        else $chieudai = 0;

        if (isset($_POST['chieurong']))
            $chieurong = trim($_POST['chieurong']);
        else $chieurong = 0;

        if (isset($_POST['tinh']))
            if (is_numeric($chieudai) && is_numeric($chieurong))
                $dientich = $chieudai * $chieurong;
            else {
                echo "<p style='color: red;'>Vui lòng nhập vào số! </p>";
                $dientich = "";
            }
        else $dientich = 0;
        ?>
        <form align='center' action="" method="post">
            <table>
                <thead>
                    <th colspan="2" style="padding: 4px;">
                        <h5 class="text-center">DIỆN TÍCH HÌNH CHỮ NHẬT</h5>
                    </th>
                </thead>
                <tr>
                    <td>Chiều dài:</td>
                    <td><input type="text" name="chieudai" value="<?php echo $chieudai; ?> " /></td>
                </tr>
                <tr>
                    <td>Chiều rộng:</td>
                    <td><input type="text" name="chieurong" value="<?php echo $chieurong; ?> " /></td>
                </tr>

                <tr>
                    <td>Diện tích:</td>
                    <td><input type="text" name="dientich" disabled="disabled" value="<?php echo $dientich; ?> " /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>