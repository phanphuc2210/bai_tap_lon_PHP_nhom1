<?php # Script 3.4 - index.php
$page_title = 'Phép tính trên 2 số';
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
        padding: 0 8px;
    }

    td:first-child {
        color: blue;
        text-align: right;
    }
</style>

<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
    <h3 class="mb-4"><u class="fw-bold text-origin">Bài 2.3:</u> Tạo trang web thực hiện phép tính trên 2 số</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <?php
        $ketqua = 0;

        if(isset($_POST['tinh'])){
            if (isset($_POST['so1']))
                $so1 = trim($_POST['so1']);
            else {
                $so1 = "";
            }

            if (isset($_POST['so2']))
                $so2 = trim($_POST['so2']);
            else {
                $so2 = "";
            }

            if(empty($so1) && empty($so2)){
                echo "<p style='color: red;'>Vui lòng nhập vào hai số cần tính! </p>";
            }
            elseif(empty($so1)){
                echo "<p style='color: red;'>Vui lòng nhập vào số thứ nhất! </p>";
            }
            elseif(empty($so2)){
                echo "<p style='color: red;'>Vui lòng nhập vào số thứ hai! </p>";
            }
            elseif (is_numeric($so1) && is_numeric($so2)) {
                switch($_POST['pheptinh']){
                    case 'Cộng':
                        $ketqua = $so1 + $so2;
                        break;
                    case 'Trừ':
                        $ketqua = $so1 - $so2;
                        break;
                    case 'Nhân':
                        $ketqua = $so1 * $so2;
                        break;
                    case 'Chia':
                        $ketqua = $so1 / $so2;
                        break;
                    default:
                        $ketqua = 0;    
                }
            } else {
                echo "<p style='color: red;'>Vui lòng nhập vào số! </p>";
            }
        }
        ?>
        <form align='center'>
            <table>
                <thead>
                    <th colspan="2" style="padding: 4px;">
                        <h5 class="text-center">Phép tính trên hai số</h5>
                    </th>
                </thead>
                <tr>
                    <td style="color: red;">Chọn phép tính:</td>
                    <td style="color: red;">
                        <?php 
                        echo $_POST['pheptinh'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Số 1:</td>
                    <td><input type="text" name="so1" disabled value="<?php echo $so1; ?> " /></td>
                </tr>
                <tr>
                    <td>Số 2:</td>
                    <td><input type="text" name="so2" disabled value="<?php echo $so2; ?> " /></td>
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><input type='text' disabled  value='<?php echo $ketqua?>' /></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><a href="./pheptinh.php"><i>Quay lại trang trước</i></a></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>