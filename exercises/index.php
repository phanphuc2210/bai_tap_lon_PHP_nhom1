<?php # Script 3.4 - index.php
$page_title = 'Trang bài tập!';
include ('../includes/header.html');
?>
<div class="container-fluid">
    <div class="row">
        <?php 
        include ('./sidebar.html');
        ?>
        <div class="index col-10 d-flex flex-column justify-content-center align-items-center text-white">
            <h1 class="text-center fw-bold text-origin">Trang bài tập</h1>
            <h4>Chứa những bài tập đã làm khi đi thực hành và làm ở nhà</h4>
        </div>
    </div>
</div>


<?php
include ('../includes/footer.html');
?>