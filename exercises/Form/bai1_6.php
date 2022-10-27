<?php # Script 3.4 - index.php
$page_title = 'Form nhập liệu với danh sách dạng combo box';
include ('../../includes/header.php');
?>

<div class="d-flex">
    <?php 
    include ('../../includes/sidebar_exercises.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1.6:</u> Tạo form nhập liệu với danh sách dạng combo box</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <form method="POST" action="bai1_6.php">
			<select name="lunch">
				<option value="pork" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='pork') echo 'selected';?>>
					BBQ Pork Bun
				</option>
				<option value="chicken" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='chicken') echo 'selected';?>>
					Chicken Bun
				</option>
				<option value="lotus" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='lotus') echo 'selected';?>>
					Lotus Seed Bun
				</option>
			</select>
			<input type="submit" name="submit" value="Submit your order">
		</form>

		Selected buns:<br/>
		<?php
			if (isset($_POST['lunch'])){
				print 'You want a ' . $_POST["lunch"] . ' bun. <br/>';
			}
		?>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>