<?php # Script 3.4 - index.php
$page_title = 'Trang bài tập!';
include ('includes/header.php');
?>

<div class="d-flex">
    <?php 
    include ('includes/sidebar_exercises.php');
    ?>
    <?php if(isset($_GET['name']) && isset($_GET['loai']) && $_GET['ten_bai']) { ?>
        <!-- <div class='d-flex w-100'> -->
            <!-- include ("exercises/" . $_GET['name'] . "/" . $_GET['loai'] . "/" . $_GET['ten_bai']); -->
            <iframe src="./exercises/<?php echo $_GET['name'] . "/" . $_GET['loai'] . "/" . $_GET['ten_bai'] ?>" class='d-flex w-100'>";
            </iframe>
        <!-- </div>"; -->

    <?php } else {  $page_title = 'hellio';?>
    <div class="index w-80 d-flex flex-column justify-content-center align-items-center text-white">
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <h1 class="text-center fw-bold text-origin">Trang bài tập</h1>
        <h4>Chứa những bài tập đã làm khi đi thực hành và làm ở nhà</h4>
    </div>
    <?php } ?>
</div>



<?php
include ('includes/footer.html');
?>