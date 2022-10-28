<?php # Script 3.4 - index.php
$page_title = 'Quản Lý Nhân Viên';
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
    <?php 
    include ('../../includes/sidebar_exercises.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 4:</u>Quản Lý Nhân Viên</a></h2>
<?php
abstract class Nguoi {
    protected $Maso;
    protected $hoTen;
    protected $ngaysinh;
    protected $gioiTinh;
    function __construct($Maso, $hoTen, $ngaysinh, $gioiTinh){
        $this->Maso = $Maso;
        $this->hoTen = $hoTen;
        $this->ngaysinh = $ngaysinh;
        $this->gioiTinh = $gioiTinh;
    }
    abstract public function tinhThuong();
}

class NVVanPhong extends Nguoi {
    const luongCB = 5000;
    private $sonamCT;
    function __construct($Maso, $hoTen, $ngaysinh, $gioiTinh,$sonamCT)
    {
        parent::__construct($Maso, $hoTen, $ngaysinh, $gioiTinh);
        $this->sonamCT = $sonamCT;
    }
    function tinhThuong() {
        $now = new DateTime("now");
        $date = new DateTime($this->ngaysinh);
        $interval = $now->diff($date);
        echo $interval->y;
        if($interval->y >= 18 || $interval->y <= 25){
            return self::luongCB * $this->sonamCT * 1.1;
        }
        if($interval->y >= 26 || $interval->y <= 35){
            return self::luongCB * $this->sonamCT * 1.2;
        }
        if($interval->y > 35){
            return self::luongCB * $this->sonamCT;
        }
    }
    public function xuat(){
        return 'Mã số: '.$this->Maso.', Tên Nhân Viên: '.$this->hoTen.', Ngày sinh: '.$this->ngaysinh.', Giới tính: '.$this->gioiTinh.', Số năm công tác: '.$this->sonamCT.', Tiền Thưởng: '.$this->tinhThuong();
    }
}

class NVPhucVu extends Nguoi {
    private $chucvu;
    private $songaycong;
    function __construct($Maso, $hoTen, $ngaysinh, $gioiTinh,$chucvu,$songaycong)
    {
        parent::__construct($Maso, $hoTen, $ngaysinh, $gioiTinh);
        $this->chucvu = $chucvu;
        $this->songaycong = $songaycong;
    }
    function tinhThuong(){
        if($this->songaycong == 28 ){
            return 100;
        } else if($this->songaycong < 28){
            return 70;
        }
    }
    public function xuat(){
        return 'Mã số: '.$this->Maso.', Tên Nhân Viên: '.$this->hoTen.', Ngày sinh: '.$this->ngaysinh.', Giới tính: '.$this->gioiTinh.', Chức vụ: '.$this->chucvu .', Số ngày công: '.$this->songaycong.', Tiền Thưởng: '.$this->tinhThuong();
    }
}
?>
<form action="" method="post">
<fieldset>
	<legend>Quản lý Nhân Viên</legend>
	<table border='0'>
        <tr>
            <td>Mã số:</td><td><input type="text" required  name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id'];?>"/></td>
            <td>Nhập tên:<input type="text"  name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"/></td>
        </tr>
        <tr>
            <td>Ngày sinh:</td><td><input type="date" required  name="ns" value="<?php if(isset($_POST['ns'])) echo $_POST['ns'];?>"/></td>
            <td>Chức vụ:<input type="text" id='cv' name="cv" value="<?php if(isset($_POST['cv'])) echo $_POST['cv'];?>"/></td>
        </tr>
        <tr>
            <td>Giới tính:</td>
            <td>
                <input type="radio"  name="gender" id="nam" required value="Nam"<?php if(isset($_POST['gender'])&&$_POST['gender']=='Nam') echo 'checked="checked"';?>/>
                <label for="nam">Nam</label>
                <input type="radio"  name="gender" id="nu" required value="Nữ"<?php if(isset($_POST['gender'])&&$_POST['gender']=='Nữ') echo 'checked="checked"';?>/>
                <label for="nu">Nữ</label>
            </td>
        </tr>
		<tr>
            <td>Loại nhân viên: </td>
            <td>
                <input id="vp" type="radio" name="NV" required value="vp" <?php if(isset($_POST['NV'])&&($_POST['NV'])=="vp") echo 'checked="checked"'?>/>Văn phòng
			    <input id="pv" type="radio" name="NV" required value="pv"<?php if(isset($_POST['NV'])&&($_POST['NV'])=="pv") echo 'checked="checked"'?>/>Phục Vụ
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Số năm công tác:
            <input type="text" id='nv'  name="snct" required value="<?php if(isset($_POST['snct'])) echo $_POST['snct'];?>"/>
            </td>
            <td>Số ngày công:
            <input type="text" id='sp'  name="snc" required value="<?php if(isset($_POST['snc'])) echo $_POST['snc'];?>"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" align="center"><input type="submit" name="tinh" value="Lưu thông tin"/></td></tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <?php 
                    $name ='';
                    $id ='';
                    $ns='';
                    $nvl='';
                    $cv='';
                    $snct='';
                    $snc='';
                    $gender ='';
                    if(isset($_POST['tinh'])){
                    
                        if(isset($_POST['NV']) && ($_POST['NV'])=="vp"){
                            $pathVP = 'NVVP.txt';
                            if(isset($_POST['name'])){
                                $name=$_POST['name'];
                            }
                            if(isset($_POST['id'])){
                                $id=$_POST['id'];
                            }
                            if(isset($_POST['gender'])){
                                $gender=$_POST['gender'];
                            }
                            if(isset($_POST['ns'])){
                                $ns=$_POST['ns'];
                            }
                            if(isset($_POST['snct'])){
                                $snct=$_POST['snct'];
                            }
                            $fp = @fopen($pathVP, 'w+');
                            if (!$fp){
                                echo 'mo k file thanh cong';
                            } else {
                                $nv = new NVVanPhong($id,$name,$ns,$gender,$snct);
                                $out = $nv->xuat();
                                echo $out;
                                fwrite($fp,$out);
                            }
                        }
                    
                        if(isset($_POST['NV']) && ($_POST['NV'])=="pv"){
                            $pathPV = 'NVPV.txt';
                            if(isset($_POST['name'])){
                                $name=$_POST['name'];
                            }
                            if(isset($_POST['id'])){
                                $id=$_POST['id'];
                            }
                            if(isset($_POST['gender'])){
                                $gender=$_POST['gender'];
                            }
                            if(isset($_POST['ns'])){
                                $ns=$_POST['ns'];
                            }
                            if(isset($_POST['cv'])){
                                $cv=$_POST['cv'];
                            }
                            if(isset($_POST['snc'])){
                                $snc=$_POST['snc'];
                            }
                            $fp = @fopen($pathPV, 'w+');
                            if (!$fp){
                                echo 'mo k file thanh cong';
                            } else {
                                $pv = new NVPhucVu($id,$name,$ns,$gender,$cv,$snc);
                                $out = $pv->xuat();
                                echo $out;
                                fwrite($fp,$out);
                            }
                        }
                    }
                ?>
            </td>
        </tr>
	</table>

</fieldset>

</form>

<script>
    var vp = document.querySelector('#vp');
    var pv = document.querySelector('#pv');
    var nv = document.querySelector('#nv');
    var sp = document.querySelector('#sp');
    var cv = document.querySelector('#cv');
    vp.addEventListener('change', function(e) {
        sp.setAttribute('disabled', 'disabled');
        cv.setAttribute('disabled', 'disabled');
        nv.removeAttribute('disabled');
    })
    pv.addEventListener('change', function(e) {
        nv.setAttribute('disabled', 'disabled');
        sp.removeAttribute('disabled');
        cv.removeAttribute('disabled');
    })
</script>
</div>
</div>
<?php
include ('../../includes/footer.html');
?>