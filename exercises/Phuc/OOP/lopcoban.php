<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thông tin</title>
</head>
<style>
    body {
        background-image: linear-gradient(to right, #FF99FF, #CC99CC);
    }

    form {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    table {
        background: #ffd94d;
        padding: 12px;
        border: 0 solid yellow;
        border-radius: 20px;
    }

    legend {
        background-color: #d24dff;
        font-weight: bold;
    }

    .hide {
        display: none;
    }

</style>
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 1:</u> Tạo các lớp cơ bản</a></h2>
    <?php
    class Nguoi {
        protected $hoten, $diachi, $gioitinh;

        public function setTen($hoten){
            $this->hoten = $hoten;
        }

        public function getTen(){

            return $this->hoten;
        }

        public function setDiaChi($diachi){
            $this->diachi = $diachi;
        }

        public function getDiaChi(){

            return $this->diachi;
        }

        public function setGioiTinh($gioitinh){
            $this->gioitinh = $gioitinh;
        }

        public function getGioiTinh(){

            return $this->gioitinh;
        }
        
    }

    class SinhVien extends Nguoi {
        private $lophoc, $nganh;

        public function setLop($lop){
            $this->lophoc = $lop;
        }

        public function getLop(){

            return $this->lophoc;
        }

        public function setNganh($nganh){
            $this->nganh = $nganh;
        }

        public function getNganh(){

            return $this->nganh;
        }

        public function tinhDiemThuong() {
            if($this->nganh == "CNTT"){
                return 1;
            } else if($this->nganh == "Kinh tế") {
                return 1.5;
            } else {
                return 0;
            }
        }
    }

    class GiangVien extends Nguoi {
        private $trinhdo;
        const luongcb = 1500000;

        public function setTrinhDo($trinhdo){
            $this->trinhdo = $trinhdo;
        }

        public function getTrinhDo(){

            return $this->trinhdo;
        }

        public function tinhLuong() {
            if($this->trinhdo == "Cử nhân"){
                return self::luongcb * 2.34;
            } else if($this->trinhdo == "Thạc sĩ") {
                return self::luongcb *3.67;
            } else {
                return self::luongcb * 5.66;
            }
        }
    }

    $ketqua = "";
    $luongcb = number_format(GiangVien::luongcb, 0,"",".");

    if(isset($_POST["xuly"])) {
        if(isset($_POST["doituong"]) && $_POST["doituong"] == "gv") {
            $gv = new GiangVien();
            $gv->setTen($_POST["hoten"]);
            $gv->setDiaChi($_POST["diachi"]);
            $gv->setGioiTinh($_POST["gioitinh"]);
            $gv->setTrinhDo($_POST["trinhdo"]);
            $luong = $gv->tinhLuong();

            $ketqua = "Họ tên: " . $gv->getTen() . " \n" .
                    "Địa chỉ: " . $gv->getDiaChi() . "\n" . 
                    "Giới tính: " . $gv->getGioiTinh() . "\n" . 
                    "Trình độ: " . $gv->getTrinhDo() . "\n" . 
                    "Lương: " . number_format($luong, 0,"",".") . " vnđ";
        }

        if(isset($_POST["doituong"]) && $_POST["doituong"] == "sv") {
            $sv = new SinhVien();
            $sv->setTen($_POST["hoten"]);
            $sv->setDiaChi($_POST["diachi"]);
            $sv->setGioiTinh($_POST["gioitinh"]);
            $sv->setLop($_POST["lophoc"]);
            $sv->setNganh($_POST["nganh"]);
            $diemThuong = $sv->tinhDiemThuong();

            $ketqua = "Họ tên: " . $sv->getTen() . " \n" .
                    "Địa chỉ: " . $sv->getDiaChi() . "\n" . 
                    "Giới tính: " . $sv->getGioiTinh() . "\n" . 
                    "Lớp: " . $sv->getLop() . "\n" . 
                    "Ngành: " . $sv->getNganh() . "\n" . 
                    "Điểm thưởng: " . $diemThuong . " điểm";
        }
    }

    ?>
    <form action="" method="post">
        <table>
            <tr>
                <th colspan="2"><h2>Quản lý thông tin GV-SV</h2></th>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" required name="hoten" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>" size="40"></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" required name="diachi" value="<?php if (isset($_POST['diachi'])) echo $_POST['diachi']; ?>" size="40"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <input type="radio" name="gioitinh" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "Nam") echo 'checked="checked"' ?> value="Nam" checked/> Nam
                    <input type="radio" name="gioitinh" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "Nữ") echo 'checked="checked"' ?> value="Nữ"/> Nữ
                </td>
            </tr>
            <tr>
                <td>Chọn đối tượng:</td>
                <td>
                    <input type="radio" name="doituong" class="doituong" <?php if (isset($_POST['doituong']) && ($_POST['doituong']) == "gv") echo 'checked="checked"' ?> value="gv" checked/> GV
                    <input type="radio" name="doituong" class="doituong" <?php if (isset($_POST['doituong']) && ($_POST['doituong']) == "sv") echo 'checked="checked"' ?> value="sv"/> SV
                </td>
            </tr>
            <tr>
                <td colspan="2" id="gv_fieldset" class="<?php 
                    if(isset($_POST['doituong']) && $_POST['doituong'] != 'gv') {
                        echo 'hide';
                    }
                ?>">
                    <fieldset >
                        <legend>Giảng viên</legend>
                        <table>
                            <tr>
                                <td>Trình độ:</td>
                                <td>
                                    <select name="trinhdo">
                                        <option value="Cử nhân" <?php if (isset($_POST['trinhdo']) && ($_POST['trinhdo']) == "Cử nhân") echo 'checked="checked"' ?>>Cử nhân</option>
                                        <option value="Thạc sĩ" <?php if (isset($_POST['trinhdo']) && ($_POST['trinhdo']) == "Thạc sĩ") echo 'checked="checked"' ?>>Thạc sĩ</option>
                                        <option value="Tiến sĩ" <?php if (isset($_POST['trinhdo']) && ($_POST['trinhdo']) == "Tiến sĩ") echo 'checked="checked"' ?>>Tiến sĩ</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Lương cơ bản:</td>
                                <td><input type="text" disabled value="<?php echo $luongcb ?>"  name="luongcb"></td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td  id="sv_fieldset" colspan="2" class="<?php 
                    if(isset($_POST['doituong'])){
                        if($_POST['doituong'] != 'sv') {
                            echo 'hide';
                        }
                    } else {
                        echo 'hide';
                    }
                ?>">
                    <fieldset>
                        <legend>Sinh viên</legend>
                        <table>
                            <tr>
                                <td>Lớp học:</td>
                                <td>
                                    <input type="text" value="<?php if (isset($_POST['lophoc'])) echo $_POST['lophoc']; ?>" name="lophoc">
                                </td>
                            </tr>
                            <tr>
                                <td>Ngành học:</td>
                                <td>
                                    <select name="nganh">
                                        <option value="CNTT" <?php if (isset($_POST['nganh']) && ($_POST['nganh']) == "CNTT") echo 'checked="checked"' ?>>CNTT</option>
                                        <option value="Kinh tế" <?php if (isset($_POST['nganh']) && ($_POST['nganh']) == "Kinh tế") echo 'checked="checked"' ?>>Kinh tế</option>
                                        <option value="Khác" <?php if (isset($_POST['nganh']) && ($_POST['nganh']) == "Khác") echo 'checked="checked"' ?>>Khác</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" name="xuly" style="padding: 4px 12px;">
                        Xư lý
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="2">Kết quả:</td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="ketqua" style="width: 100%;" rows="10"><?php echo $ketqua; ?></textarea>
                </td>
            </tr>
        </table>
    </form>

    <script>
        const radio_doituong = document.querySelectorAll(".doituong");
        const gv_fieldset = document.querySelector("#gv_fieldset");
        const sv_fieldset = document.querySelector("#sv_fieldset");

        radio_doituong.forEach((doituong) => {
            doituong.addEventListener("change", () => {
                gv_fieldset.classList.toggle("hide");
                sv_fieldset.classList.toggle("hide");
                
            });
        });
    </script>
</body>
</html>