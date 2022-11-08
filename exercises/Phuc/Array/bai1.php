<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Xử lý n</title>
</head>
<body>

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1:</u> Một số thao tác trên mảng số nguyên</a></h2>
<?php
	require_once "bai1_ham.php";

	if(isset($_POST['n'])) 
        $n=trim($_POST['n']);
	else $n=0;

	$ketqua="";

	if(isset($_POST['hthi'])) 
	{	
		if(is_int((int)$n) && (int)$n > 0) {
		//tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
		$arr = taoMang($n);

		//In ra mảng vừa tạo
		$ketqua="Mảng được tạo là:" .implode(" ",$arr)."&#13;&#10;";

		//Đếm các số chẵn trong mảng dùng hàm foreach
		$slSoChan = demSoChan($arr);

		$ketqua.="Có $slSoChan số chẵn trong mảng". "&#13;&#10;";

		//Đếm các số < 100 trong mảng dùng hàm foreach
		$count1=0;

		foreach($arr as $v){
			if($v < 100)
				$count1++;
		}

		$ketqua.="Có $count1 số < 100 trong mảng". "&#13;&#10;";

		//Tính tổng các các số âm có trong mảng
		$sum = 0;
		foreach($arr as $v){
			if($v < 0)
				$sum += $v;
		}

		$ketqua.="Tổng các số âm có trong mảng là: $sum". "&#13;&#10;";

		//In ra vị trí của các thành phần trong mảng có chữ số kề cuối là 0.
		$ketqua .="vị trí của các thành phần trong mảng có chữ số kề cuối là 0: ";
		$daySo = "";

		foreach($arr as $key => $i) {
			if($i <= -100 || $i >= 100) {
				$i = $i/10;
				$soKeCuoi = $i%10;
				if($soKeCuoi == 0)
					$daySo .= "$key  ";
			}
		}

		$ketqua .= $daySo."&#13;&#10;";

		//In ra mảng với sắp xếp tăng dần
		sort($arr);
		$ketqua.="Mảng được sắp xếp tăng dần:" .implode(" ",$arr)."&#13;&#10;";
		}
		else {
			echo "<p>Vui lòng nhập số nguyên > 0</p>";
		}

	}
?>

    <form action="" method="post">
        Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
        <input type="submit" name="hthi" value="Hiển thị"/><br>
        Kết quả: <br>
        <textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>

    </form>
</body>
</html>