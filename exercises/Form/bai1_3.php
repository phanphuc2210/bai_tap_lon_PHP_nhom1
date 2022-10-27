<?php # Script 3.4 - index.php
$page_title = 'Form nhập liệu với multipleline text (textarea)';
include ('../../includes/header.php');
?>

<div class="d-flex">
    <?php 
    include ('../../includes/sidebar_exercises.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1.3:</u> Tạo form nhập liệu với multipleline text (textarea)</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <form action="" name="myform" method="post">
			Your comment: 
			<br>
			<textarea name="comment" rows="3" cols="40"><?php if(isset($_POST['comment'])) echo $_POST['comment']; ?></textarea>
			<br>
			<input type="submit" value="Submit">
		</form>

		<?php
			if (isset($_POST["comment"]))
				print "Your comment: " . $_POST["comment"];
		?>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>