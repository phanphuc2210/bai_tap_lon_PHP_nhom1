

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1.2:</u> Tạo form nhập liệu với text field (dạng 2)</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<form action="bai1_2.php" name="myform" method="post">
	First Name: <input type="text" name="Name[]" size=20 value="<?php if(isset($_POST['Name'])) echo $_POST['Name'][0];?>"/><br>
	Last Name: <input type="text" name="Name[]" size=20 value="<?php if(isset($_POST['Name'])) echo $_POST['Name'][1];?>"/><br>
	<input type="submit" value="Submit">
</form>

<?php
	if (isset($_POST['Name'])){
		echo "Chào bạn " . $_POST['Name'][0] . " " . $_POST['Name'][1];
	}
?>
