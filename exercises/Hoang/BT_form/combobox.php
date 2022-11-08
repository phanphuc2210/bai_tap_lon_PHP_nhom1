<html>
<body>
	<form method="POST" action="combobox.php">
		<!-- <select name="lunch">
			<option value="pork" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='pork') echo 'selected';?>>
				BBQ Pork Bun
			</option>
			<option value="chicken" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='chicken') echo 'selected';?>>
				Chicken Bun
			</option>
			<option value="lotus" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='lotus') echo 'selected';?>>
				Lotus Seed Bun
			</option>
		</select> -->
		<select name="trinhdo">
			<option value="Cử nhân" <?php if(isset($_POST['trinhdo'])&& $_POST['trinhdo']=='Cử nhân') echo 'selected';?>>
				Cử nhân
			</option>
			<option value="Thạc sĩ" <?php if(isset($_POST['trinhdo'])&& $_POST['trinhdo']=='Thạc sĩ') echo 'selected';?>>
				Thạc sĩ
			</option>
			<option value="Tiến sĩ" <?php if(isset($_POST['trinhdo'])&& $_POST['trinhdo']=='Tiến sĩ') echo 'selected';?>>
				Tiến sĩ
			</option>
		</select>
		<input type="submit" name="submit" value="Submit your order">
	</form>
	Selected buns:<br/>
	<?php
		if (isset($_POST['trinhdo'])){
			print 'You want a ' . $_POST["trinhdo"] . ' bun. <br/>';
		}
	?>
</body>

</html>