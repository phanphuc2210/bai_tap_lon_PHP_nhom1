
<script src="assets/ckeditor/ckeditor.js"></script>


<h3 class="mb-4"><u class="fw-bold text-origin">Bài tập:</u> Gửi Mail</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<form action="exercise.php?name=Phuc&loai=SendMail&ten_bai=sendmail_PHP_Mailer.php" method="POST">
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

<script>
    CKEDITOR.replace('content-mail');
</script>
