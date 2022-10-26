<?php # Script 3.4 - index.php
$page_title = 'Form nhập liệu với text field (dạng 1)';
include ('../../includes/header.php');
?>

<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
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
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>