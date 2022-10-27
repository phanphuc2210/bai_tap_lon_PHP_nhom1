<?php # Script 3.4 - index.php
$page_title = 'Form nhập liệu với hộp kiểm radio button';
include ('../../includes/header.php');
?>

<div class="d-flex">
    <?php 
    include ('../../includes/sidebar_exercises.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1.5:</u> Tạo form nhập liệu với hộp kiểm radio button</a></a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <form action="" name="myform" method="post">
			<input type="radio" name="radGT" value="Nam"<?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nam') echo 'checked="checked"';?> checked/>		Nam<br>
			<input type="radio" name="radGT" value="Nu" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nu') echo 'checked="checked"';?>/>
					N&#7919;<br>

			<input type="submit" value="Submit">
		</form>
			
		<?php
			if (isset($_POST['radGT'])){
				echo "Gioi tinh : " . $_POST['radGT'];
			}
		?>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>