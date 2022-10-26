<?php # Script 3.4 - index.php
$page_title = 'Gửi Mail';
include ('../../includes/header.php');
?>
<script src="./ckeditor/ckeditor.js"></script>

<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài tập:</u> Gửi Mail</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <form action="./sendmail_PHP_Mailer.php" method="POST">
            <div style="margin-bottom: 12px;">
                <label>Email nhận: </label>
                <input type="email" name="toMail" style="width: 250px;" required>
            </div>
            <textarea name="content-mail" id="content-mail" required>
                
            </textarea>
            <div style="margin-top: 12px;">
                <button class="btn btn-dark" type="submit" name="gui">
                    Gửi
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('content-mail');
</script>

<?php
include ('../../includes/footer.html');
?>