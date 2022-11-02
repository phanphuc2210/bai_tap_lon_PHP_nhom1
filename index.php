<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include ('includes/header.php');
?>
<div class="index d-flex flex-column justify-content-center align-items-center text-white">
    <h1 class="fw-bold text-origin">Bài tập lớn Phần Mềm Mã Nguồn Mở (Thi cuối kỳ) - Nhóm 1</h1>
    <h3>Phan Trần Hữu Phúc</h3>
    <h3>Phạm Minh Hoàng</h4>
</div>

<div class="container mt-3 mb-5">
    <h1 class="fw-bold text-origin text-center mb-5">Thông tin thành viên nhóm</h1>

    <div class="row">
        <div class="col-4" data-aos="fade-right" style="width: 500px; height: 500px;">
            <img src="/Images/phanphuc.jpg" class="anh-cn" alt="phanphuc">
        </div>
        <div class="col-7" data-aos="fade-left">
            <p class="fs-5 mb-1">MSSV: 61136382</p>
            <p class="fs-5 mb-1">Họ tên: Phan Trần Hữu Phúc</p>
            <p class="fs-5 mb-1">Lớp: 61.CNTT-1</p>
            <p class="fs-5 mb-1">Email: <a href="mailto:phuc.pth.61cntt@ntu.edu.vn">phuc.pth.61cntt@ntu.edu.vn</a></p>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-4 order-2" data-aos="fade-up-right" style="width: 500px; height: 500px;">
            <img src="/Images/phanphuc.jpg" class="anh-cn" alt="phanphuc">
        </div>
        <div class="col-7 order-1" data-aos="fade-up-left">
            <p class="fs-5 mb-1">MSSV: 61131788</p>
            <p class="fs-5 mb-1">Họ tên: Phạm Minh Hoàng</p>
            <p class="fs-5 mb-1">Lớp: 61.CNTT-1</p>
            <p class="fs-5 mb-1">Email: <a href="mailto:hoang.pm.61cntt@ntu.edu.vn">hoang.pm.61cntt@ntu.edu.vn</a></p>
        </div>
    </div>
</div>
<?php
include ('includes/footer.html');
?>