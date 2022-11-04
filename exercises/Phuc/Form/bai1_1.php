
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1.1:</u> Tạo form nhập liệu với text field (dạng 1)</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<form action="" name="myform" method="post">
	Your Name: <input type="test" name="Name" size=20 value="<?php if(isset($_POST['Name'])) echo $_POST['Name'];?>" />
	<br>
	<input type="submit" value="Submit">
</form>

<?php
	if (isset($_POST["Name"]))
		print "Hello " . $_POST["Name"];
?>