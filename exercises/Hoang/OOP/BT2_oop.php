<?php # Script 3.4 - index.php
$page_title = 'Quản lý thông tin nhân viên';
include ('../../includes/header.php');
?>
<style>
    form {
        display: inline-block;
        padding: 4px;
        background-color: #d24dff;
    }

    legend {
        text-align: center;
    }

    table {
        background: #ffd94d;
        padding: 12px;
        border: 0 solid yellow;
    }

    th, td {
        padding: 4px;
    }

    th {
        background-color: white;
    }

    td {
        padding-right: 24px;
    }
</style>

<div class="d-flex">
     
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2:</u>Quản lý thông tin nhân viên</a></h2>
<?php

abstract class NhanVien {
    protected $hoTen;
    protected $gioiTinh;
    protected $ngaysinh;
    protected $ngayvaolam;
    protected $hsluong;
    protected $socon;
    const luongCB = 5000;
    function __construct($hoTen, $ngaysinh, $gioiTinh, $ngayvaolam, $hsluong, $socon) {
        $this->hoTen = $hoTen;
        $this->ngaysinh = $ngaysinh;
        $this->gioiTinh = $gioiTinh;
        $this->ngayvaolam = $ngayvaolam;
        $this->hsluong = $hsluong;
        $this->socon = $socon;
    }

    abstract function tinhTienLuong();
    abstract function tinhTienTroCap();
    abstract function tinhTienThuong();
}

class NVVanPhong extends NhanVien {
    private $songayvang;
    const dinhmucvang = 4 ;
    const dongiaphat = 100;
    
    function __construct($hoTen,$ngaysinh, $gioiTinh, $ngayvaolam, $hsluong, $socon, $songayvang) {
        parent::__construct($hoTen,$ngaysinh, $gioiTinh, $ngayvaolam, $hsluong, $socon);
        $this->songayvang = $songayvang;
    }
    
    public function tinhTienLuong()
    {
        return self::luongCB * $this->hsluong - $this->tinhTienPhat();   
    }

    public function tinhTienTroCap()
    {
        if($this->gioiTinh == 'Nữ'){
            return 200 * $this->socon * 1.5;
        }   
        else{
            return 200 * $this->socon;
        }
    }

    public function tinhTienPhat(){
        if($this->songayvang > self::dinhmucvang){
            return $this->songayvang * self::dongiaphat;
        }
        return 0;
    }

    public function tinhTienThuong()
    {
        $now = new DateTime("now");
        $date = new DateTime($this->ngayvaolam);
        $interval = $now->diff($date);
        return $interval->y * 1000;
    }
}

class NVSanXuat extends NhanVien {
    private $soSP;
    const dinhmucSP = 50;
    const dongiaSP = 100;

    function __construct($hoTen, $ngaysinh, $gioiTinh, $ngayvaolam, $hsluong, $socon, $soSP) {
        parent::__construct($hoTen, $ngaysinh, $gioiTinh, $ngayvaolam, $hsluong, $socon);
        $this->soSP = $soSP;
    }

    function tinhTienTroCap()
    {
        return $this->socon * 120;
    }

    function tinhTienThuong()
    {
        if($this->soSP > self::dinhmucSP){
            return ($this->soSP - $this->dinhmucSP) * self::dongiaSP * 0.03; 
        }
    }

    function tinhTienLuong()
    {
        return ($this->soSP > $this->dongiaSP) + $this->tinhTienThuong();   
    }
}

$name ='';
$con ='';
$ns='';
$nvl='';
$hsl='';
$snv='';
$ssp='';
$luong = 0;
$tc = 0;
$tt = 0;
$tp = 0;
$tl = 0;
$gender ='';
if(isset($_POST['tinh'])){

	if(isset($_POST['NV']) && ($_POST['NV'])=="vp"){

        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['con'])){
            $con=$_POST['con'];
        }
        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        if(isset($_POST['ns'])){
            $ns=$_POST['ns'];
        }
        if(isset($_POST['nvl'])){
            $nvl=$_POST['nvl'];
        }
        if(isset($_POST['hsl'])){
            $hsl=$_POST['hsl'];
        }
        if(isset($_POST['snv'])){
            $snv=$_POST['snv'];
        }
		$nv=new NVVanPhong($name,$ns,$gender,$nvl,$hsl,$con,$snv);
        $luong = $nv->tinhTienLuong();
        $tc = $nv->tinhTienTroCap();
        $tt = $nv->tinhTienThuong();
        $tp = $nv->tinhTienPhat();
        $tl = $luong + $tc + $tt ;
	}

	if(isset($_POST['NV']) && ($_POST['NV'])=="sx"){
        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['con'])){
            $con=$_POST['con'];
        }
        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        if(isset($_POST['ns'])){
            $ns=$_POST['ns'];
        }
        if(isset($_POST['nvl'])){
            $nvl=$_POST['nvl'];
        }
        if(isset($_POST['hsl'])){
            $hsl=$_POST['hsl'];
        }
        if(isset($_POST['ssp'])){
            $ssp=$_POST['ssp'];
        }

		$sx=new NVSanXuat($name,$ns,$gender,$nvl,$hsl,$con,$ssp);
        $luong = $sx->tinhTienLuong();
        $tc = $sx->tinhTienTroCap();
        $tt = $sx->tinhTienThuong();
        $tl = $luong + $tc + $tt ;
	}

}

?>

<form action="" method="post">

<fieldset>

	<legend>Quản lý Nhân Viên</legend>

	<table border='0'>

        <tr>
            <td>Nhập tên:</td><td><input type="text"  name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"/></td>
            <td>Số con:</td><td><input type="text"  name="con" value="<?php if(isset($_POST['con'])) echo $_POST['con'];?>"/></td>
        </tr>
        <tr>
            <td>Ngày sinh:</td><td><input type="date"  name="ns" value="<?php if(isset($_POST['ns'])) echo $_POST['ns'];?>"/></td>
            <td>Ngày vào làm:</td><td><input type="date"  name="nvl" value="<?php if(isset($_POST['nvl'])) echo $_POST['nvl'];?>"/></td>
        </tr>
        <tr>
            <td>Giới tính:</td>
            <td>
                <input type="radio"  name="gender" value="Nam"<?php if(isset($_POST['gender'])&&$_POST['gender']=='Nam') echo 'checked="checked"';?>/>
                <label for="">Nam</label>
                <input type="radio"  name="gender" value="Nữ"<?php if(isset($_POST['gender'])&&$_POST['gender']=='Nữ') echo 'checked="checked"';?>/>
                <label for="">Nữ</label>
            </td>
            <td>Hệ số lương:</td>
            <td>
            <input type="text"  name="hsl" value="<?php if(isset($_POST['hsl'])) echo $_POST['hsl'];?>"/>
            </td>
        </tr>
		<tr>
            <td>Loại nhân viên: </td>
            <td>
                <input id="vp" type="radio" name="NV" value="vp" <?php if(isset($_POST['NV'])&&($_POST['NV'])=="vp") echo 'checked="checked"'?>/>Văn phòng
			    <input id="sx" type="radio" name="NV" value="sx"<?php if(isset($_POST['NV'])&&($_POST['NV'])=="sx") echo 'checked="checked"'?>/>Sản xuất
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Số ngày vắng:
            <input type="text" id='nv'  name="snv" value="<?php if(isset($_POST['snv'])) echo $_POST['snv'];?>"/>
            </td>
            <td>Số sản phẩm:
            <input type="text" id='sp'  name="ssp" value="<?php if(isset($_POST['ssp'])) echo $_POST['ssp'];?>"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" align="center"><input type="submit" name="tinh" value="Tính Lương"/></td></tr>
        <tr>
            <td>Tiền lương:</td><td><input type="text"  name="luong" value="<?php if(isset($luong)) echo $luong;?>" disabled/></td>
            <td>Trợ cấp:</td><td><input type="text"  name="tc" value="<?php if(isset($tc)) echo $tc;?>" disabled/></td>
        </tr>
        <tr>
            <td>Tiền thưởng:</td><td><input type="text"  name="tt" value="<?php if(isset($tt)) echo $tt;;?>" disabled/></td>
            <td>Tiền phạt:</td><td><input type="text"  name="tp" value="<?php if(isset($tp)) echo $tp;;?>" disabled/></td>
        </tr>
        <tr>
            <td></td>
            <td>Thực lĩnh:</td><td><input type="text"  name="tl" value="<?php if(isset($tl)) echo $tl;;?>" disabled/></td>
        </tr>
	</table>

</fieldset>

</form>

<script>
    var vp = document.querySelector('#vp');
    var sx = document.querySelector('#sx');
    var nv = document.querySelector('#nv');
    var sp = document.querySelector('#sp');
    vp.addEventListener('change', function(e) {
        console.log(sp);
        sp.setAttribute('disabled', 'disabled');
        nv.removeAttribute('disabled');
    })
    sx.addEventListener('change', function(e) {
        nv.setAttribute('disabled', 'disabled');
        sp.removeAttribute('disabled');
    })
</script>
</div>
</div>
<?php
include ('../../includes/footer.html');
?>