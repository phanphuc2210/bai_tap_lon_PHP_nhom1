<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính trên phân số</title>
</head>
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
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 3:</u> Phép tính trên phân số</a></h2>
    <?php
    class PhanSo {
        private $tuso, $mauso;

        public function setTuSo($tuso) {
            $this->tuso = $tuso;
        }

        public function getTuSo() {
            return $this->tuso;
        }

        public function setMauSo($mauso) {
            $this->mauso = $mauso;
        }

        public function getMauSo() {
            return $this->mauso;
        }

        public function timThuaSoChung($a, $b) {
            if ($a == 0 || $b == 0){
                return $a + $b;
            }
            while ($a != $b){
                if ($a > $b){
                    $a -= $b;
                }else{
                    $b -= $a;
                }
            }
            return $a;
        }

        public function rutGon() {
            $thuaSoChung = $this->timThuaSoChung(abs($this->tuso), abs($this->mauso));
            $this->tuso = $this->tuso / $thuaSoChung;
            $this->mauso = $this->mauso / $thuaSoChung;
        }

        public function hienthi() {
            if($this->mauso == 1) {
                return "$this->tuso";
            }

            return "$this->tuso/$this->mauso";
        }
    }

    class TinhToan {
        private $pheptinh;

        public function setPhepTinh($pheptinh) {
            $this->pheptinh = $pheptinh;
        }

        public function hienPhepTinh(PhanSo $a, PhanSo $b) {
            switch ($this->pheptinh) {
                case 'cong':
                    return "Phép công là: ".$a->hienthi() ." + ". $b->hienthi() . " = ";
                    
                case 'tru':
                    return "Phép trừ là: ".$a->hienthi() ." - ". $b->hienthi() . " = ";
                    
                case 'nhan':
                    return "Phép nhân là: ".$a->hienthi() ." * ". $b->hienthi() . " = ";
                    
                case 'chia':
                    return "Phép chia là: ".$a->hienthi() ." / ". $b->hienthi() . " = ";
                    
                default:
                    break;
            }
        }

        public function tinh(PhanSo $a, PhanSo $b) {
            $phanso = new PhanSo();
            switch ($this->pheptinh) {
                case 'cong':                
                    $phanso->setTuSo(($a->getTuSo() * $b->getMauSo()) + ($b->getTuSo() * $a->getMauSo()));
                    $phanso->setMauSo($a->getMauSo() * $b->getMauSo());
                    $phanso->rutGon();
                    return $this->hienPhepTinh($a, $b). $phanso->hienthi();
                    
                case 'tru':
                    $phanso->setTuSo($a->getTuSo() * $b->getMauSo() - $b->getTuSo() * $a->getMauSo());
                    $phanso->setMauSo($a->getMauSo() * $b->getMauSo());
                    $phanso->rutGon();
                    return $this->hienPhepTinh($a, $b). $phanso->hienthi();
                    
                case 'nhan':
                    $phanso->setTuSo($a->getTuSo() * $b->getTuSo());
                    $phanso->setMauSo($a->getMauSo() * $b->getMauSo());
                    $phanso->rutGon();
                    return $this->hienPhepTinh($a, $b). $phanso->hienthi();
                    
                case 'chia':
                    $phanso->setTuSo($a->getTuSo() * $b->getMauSo());
                    $phanso->setMauSo($a->getMauSo() * $b->getTuSo());
                    $phanso->rutGon();
                    return $this->hienPhepTinh($a, $b). $phanso->hienthi();
                    
                default:
                    break;
            }
        }
    }

    $ketqua = "";
    if(isset($_POST['tinh']) && $_POST['mauso1'] != 0 && $_POST['mauso2'] != 0) {
        $phanso1 = new PhanSo();
        $phanso1->setTuSo($_POST['tuso1']);
        $phanso1->setMauSo($_POST['mauso1']);
        $phanso2 = new PhanSo();
        $phanso2->setTuSo($_POST['tuso2']);
        $phanso2->setMauSo($_POST['mauso2']);

        $tinhtoan = new TinhToan();
        $tinhtoan->setPhepTinh($_POST['pheptinh']);
        $ketqua = $tinhtoan->tinh($phanso1, $phanso2);
    }
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <th colspan="3" align="left">Chọn các phép tính trên phân số</th>
            </tr>
            
            <tr>
                <td>Nhập phân số thứ 1:</td>
                <td>Tử số: <input type="text" name="tuso1" value="<?php if (isset($_POST['tuso1'])) echo $_POST['tuso1']; ?>" size="10"></td>
                <td>Mẫu số: <input type="text" name="mauso1" value="<?php if (isset($_POST['mauso1'])) echo $_POST['mauso1']; ?>" size="10"></td>
            </tr>
            <tr>
                <td>Nhập phân số thứ 2:</td>
                <td>Tử số: <input type="text" name="tuso2" value="<?php if (isset($_POST['tuso2'])) echo $_POST['tuso2']; ?>" size="10"></td>
                <td>Mẫu số: <input type="text" name="mauso2" value="<?php if (isset($_POST['mauso2'])) echo $_POST['mauso2']; ?>" size="10"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <fieldset style="width: 400px;">
                        <legend>Chọn phép tính</legend>
                        <input type="radio" name="pheptinh" value="cong" <?php if (isset($_POST['pheptinh']) && ($_POST['pheptinh']) == "cong") echo 'checked="checked"' ?> checked/> Cộng
                        <input type="radio" name="pheptinh" value="tru" <?php if (isset($_POST['pheptinh']) && ($_POST['pheptinh']) == "tru") echo 'checked="checked"' ?> /> Trừ
                        <input type="radio" name="pheptinh" value="nhan" <?php if (isset($_POST['pheptinh']) && ($_POST['pheptinh']) == "nhan") echo 'checked="checked"' ?> /> Nhân
                        <input type="radio" name="pheptinh" value="chia" <?php if (isset($_POST['pheptinh']) && ($_POST['pheptinh']) == "chia") echo 'checked="checked"' ?>/> Chia
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="tinh" value="Kết quả">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php echo $ketqua ?>
                    <?php 
                    if(isset($_POST['mauso1']) && $_POST['mauso1'] == 0) {
                        echo "<p style='color: red;'>Mẫu số của phân số 1 không được là 0</p>";
                    }
                    if(isset($_POST['mauso2']) && $_POST['mauso2'] == 0) {
                        echo "<p style='color: red;'>Mẫu số của phân số 2 không được là 0</p>";
                    }
                    ?>
                </td>
            </tr>
        </table>
        
    </form>
</body>
</html>