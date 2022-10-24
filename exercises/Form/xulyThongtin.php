

<?php # Script 3.4 - index.php
$page_title = 'Xử lý thông tin';
include ('../../includes/header.html');
?>

<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
    <h3 class="mb-4"><u class="fw-bold text-origin">Bài 2.4:</u> Tạo trang web nhận và xử lý thông tin người dùng</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <?php
        echo "<b>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</b>"."<br><br>";
        echo "Họ tên: ".$_POST['hoten']."<br>";
        echo "Giới tính: ".$_POST['gioitinh']."<br>";
        echo "Địa chỉ: ".$_POST['diachi']."<br>";
        echo "Điện thoại: ".$_POST['sdt']."<br>";
        echo "Quốc tịch: ".$_POST['quoctich']."<br>";
        echo "Môn học: ";
        foreach($_POST['monhoc'] as $mh){
            echo $mh.", ";
        }
        echo "<br>";
        echo "Ghi chú: ".$_POST['ghichu']."<br><br>";
        echo "<a class='text-primary' href='./nhapThongtin.php'>Trở về trang trước</a>";
        ?>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>
