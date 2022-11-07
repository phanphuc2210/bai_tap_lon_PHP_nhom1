
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1.4:</u> Tạo form nhập liệu với hộp kiểm checkbox</a></h2>
<!-- ================== Phần thay đổi nằm ở đây =========================== -->
<form method="post" action="">
	<input type="checkbox" name="chk1" value="en" 
		<?php if(isset($_POST['chk1'])&& $_POST['chk1']=='en') echo 'checked'; else echo ""?>/>English <br> 
	<input type="checkbox" name="chk2" value="vn"
		<?php if(isset($_POST['chk2'])&& $_POST['chk2']=='vn') echo 'checked'; else echo ""?>/>Vietnam<br>
	
	<input type="submit" value="submit"><br>
</form>

<?php
	if(isset($_POST['chk1'])) echo "checkbox 1 : " . $_POST['chk1'] . "<br>";
	if(isset($_POST['chk2'])) echo "checkbox 2 : " . $_POST['chk2'];	
?>
