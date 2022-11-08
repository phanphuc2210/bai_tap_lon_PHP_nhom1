
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1.7:</u> Tạo form nhập liệu với danh sách dạng list box</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<form method="POST" action="bai1_7.php">
	<select name="lunch[]" multiple>
		<option value="pork"  selected>
			BBQ Pork Bun
		</option>
		<option value="chicken">
			Chicken Bun
		</option>
		<option value="lotus">
			Lotus Seed Bun
		</option>
	</select>
	<br>
	<input type="submit" name="submit" value="Submit your order">
</form>

Selected buns:<br/>
<?php
	if (isset($_POST['lunch'])) {
		foreach ($_POST['lunch'] as $choice) {
			print "You want a $choice bun. <br/>";
		}			
	}
?>