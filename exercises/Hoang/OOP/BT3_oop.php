
<style>
    form {
        display: inline-block;
        padding: 4px;
        background-color: #d24dff;
    }

    table {
        background: #ffd94d;
        padding: 12px;
        border: 0 solid yellow;
    }

    th {
        color: purple;
    }

    td {
        padding: 8px 0;
    }
</style>

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 3:</u>Phép tính trên phân số</a></h2>
<?php

function UCLN($a, $b){
    if($a%$b==0){
        return $b;
    } else {
        return UCLN($b,$a % $b);
    }
}

class PhanSo {
    private $Tu;
    private $Mau;
    function __construct($Tu, $Mau) {
        $this->Tu = $Tu;
        if($Mau != 0){
            $this->Mau = $Mau;
        }
    }

    function inPS(){
        return $this->Tu.'/'. $this->Mau;
    }

    function rutGon(){
        $uc = UCLN($this->Tu,$this->Mau);
        $this->Tu /= $uc;
        $this->Mau /= $uc;
    }
    
    function Cong(PhanSo $c){
        $this->rutGon();
        $t = $this->Tu * $c->Mau + $c->Tu * $this->Mau;
        $m = $this->Mau * $c->Mau;
        $c = new PhanSo($t,$m);
        $c->RutGon();  
        return $c;
    }

    function Tru(PhanSo $c){
        $this->rutGon();
        $t = $this->Tu * $c->Mau - $c->Tu * $this->Mau;
        $m = $this->Mau * $c->Mau;
        $c = new PhanSo($t,$m); 
        $c->RutGon(); 
        return $c;
    }

    function Nhan(PhanSo $c){
        $this->rutGon();
        $t = $this->Tu *  $c->Tu ;
        $m = $this->Mau * $c->Mau;
        $c = new PhanSo($t,$m); 
        $c->RutGon(); 
        return $c;
    }

    function Chia(PhanSo $c){
        $this->rutGon();
        $t = $this->Tu *  $c->Mau ;
        $m = $this->Mau * $c->Tu;
        $c = new PhanSo($t,$m);
        $c->RutGon(); 
        return $c;
    }
}

$tu ='';
$mau ='';
$tu1 ='';
$mau1 ='';
$str = '';
$kq;
if(isset($_POST['tinh']) && isset($_POST['cal'])){
    if(isset($_POST['tu'])){
        $tu=$_POST['tu'];
    }
    if(isset($_POST['mau'])){
        $mau=$_POST['mau'];
    }
    if(isset($_POST['tu1'])){
        $tu1=$_POST['tu1'];
    }
    if(isset($_POST['mau1'])){
        $mau1=$_POST['mau1'];
    }
    
    $ps1 = new PhanSo($tu,$mau);
    $ps2 = new PhanSo($tu1,$mau1);
    switch($_POST['cal']){
        case 'plus':
            $kq = $ps1->Cong($ps2);
            $str = 'Phép cộng là: '.$ps1->inPS().' + '.$ps2->inPS() .'='.$kq->inPS();
            break;
        case 'minus':
            $kq = $ps1->Tru($ps2);
            $str = 'Phép Trừ là: '.$ps1->inPS().' - '.$ps2->inPS() .'='.$kq->inPS();
            break;
        case 'times':
            $kq = $ps1->Nhan($ps2);
            $str = 'Phép nhân là; '.$ps1->inPS().' * '.$ps2->inPS() .'='.$kq->inPS();
            break;
        case 'divide':
            $kq = $ps1->Chia($ps2);
            $str = 'Phép chia là: '.$ps1->inPS().' / '.$ps2->inPS() .'='.$kq->inPS();
            break;
    }
    
}


?>

<form action="" method="post">

<fieldset>

	<legend>Chọn các phép tính trên phân số</legend>

	<table border='0'>

        <tr>
            <td>Nhập phân số 1:</td>
            <td>
                Tử số: 
                <input type="text"  name="tu" value="<?php if(isset($_POST['tu'])) echo $_POST['tu'];?>"/>
            </td>
            <td>
                mẫu số: 
                <input type="text"  name="mau" value="<?php if(isset($_POST['mau'])) echo $_POST['mau'];?>"/>
            </td>
        </tr>
        <tr>
            <td>Nhập phân số 2:</td>
            <td>
                Tử số: 
                <input type="text"  name="tu1" value="<?php if(isset($_POST['tu1'])) echo $_POST['tu1'];?>"/>
            </td>
            <td>
                mẫu số: 
                <input type="text"  name="mau1" value="<?php if(isset($_POST['mau1'])) echo $_POST['mau1'];?>"/>
            </td>
        </tr>
        <tr>
            <td>Chọn phép tính:</td>
            <td>
                <input type="radio"  name="cal" value="plus"<?php if(isset($_POST['cal'])&&$_POST['cal']=='plus') echo 'checked="checked"';?>/>
                <label for="">Cộng</label>
                <input type="radio"  name="cal" value="minus"<?php if(isset($_POST['cal'])&&$_POST['cal']=='minus') echo 'checked="checked"';?>/>
                <label for="">Trừ</label>
                <input type="radio"  name="cal" value="times"<?php if(isset($_POST['cal'])&&$_POST['cal']=='times') echo 'checked="checked"';?>/>
                <label for="">Nhân</label>
                <input type="radio"  name="cal" value="divide"<?php if(isset($_POST['cal'])&&$_POST['cal']=='divide') echo 'checked="checked"';?>/>
                <label for="">Chia</label>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="tinh" value="Kết quả"/></td>
        </tr>
        <tr>
            <td><?php if(isset($str)) echo $str; ?></td>
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
