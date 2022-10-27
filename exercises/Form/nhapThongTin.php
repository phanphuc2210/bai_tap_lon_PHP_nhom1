<?php # Script 3.4 - index.php
$page_title = 'Nhập thông tin';
include ('../../includes/header.php');
?>
<style>
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

    input[type='text'], textarea{
        width: 320px;
    } 
    
    td {
        padding: 4px;
    }
</style>

<div class="d-flex">
    <?php 
    include ('../../includes/sidebar_exercises.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2.4:</u> Tạo trang web nhận và xử lý thông tin người dùng</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <form align='center' action="" method="post">
            <table>
                <thead>
                    <th colspan="2" style="padding: 4px;">
                        <h5 class="text-center">Enter your information</h5>
                    </th>
                </thead>
                <tr>
                    <td>Họ tên:</td>
                    <td>
                        <input required type="text" name="hoten" require/>
                        
                    </td>
                </tr>
    
                <tr>
                    <td>Địa chỉ:</td>
                    <td>
                        <input required type="text" name="diachi" re/>
                    </td>
                </tr>

                <tr>
                    <td>Số điện thoại:</td>
                    <td>
                        <input required type="text" name="sdt"/>
                    </td> 
                </tr>

                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <input type="radio" name="gioitinh" value="Nam" checked/> Nam
                        <input type="radio" name="gioitinh" value="Nữ"/> Nữ
                    </td>
                </tr>

                <tr>
                    <td>Quốc tịch:</td>
                    <td>
                        <select name="quoctich">
                            <option value="Việt Nam">Việt Nam</option>
                            <option value="Anh Quốc">Anh Quốc</option>
                            <option value="Thái Lan">Thái Lan</option>
                            <option value="Singapore">Singapore</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Các môn đã học:</td>
                    <td>
                        <input type="checkbox" name="monhoc[]" value="PHP & MySql"/>PHP & MySql
                        <input type="checkbox" name="monhoc[]" value="C#"/> C#
                        <input type="checkbox" name="monhoc[]" value="XML"/> XML
                        <input type="checkbox" name="monhoc[]" value="Python"/> Python
                    </td>
                </tr>

                <tr>
                    <td>Ghi chú:</td>
                    <td>
                        <textarea name="ghichu"></textarea>
                    </td>
                </tr>
    
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" formaction="./xulyThongtin.php" value="Gửi" name="gui" />
                        <input type="reset" value="Hủy"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>