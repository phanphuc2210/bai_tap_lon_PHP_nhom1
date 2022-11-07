<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
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
        background-color: white;
    }

    td {
        padding-right: 24px;
    }
</style>
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2:</u> Quản lý thông tin nhân viên</a></h2>
    <?php
    $tienluong = "";
    $trocap = "";
    $tienthuong = "";
    $tienphat = "";
    $thuclinh = "";

    abstract class NhanVien {
        protected $hoten, $gioitinh, $ngayvaolam;
        protected $hesoluong, $socon;
        const luongCB = 1500000;

        public function setHoTen($hoten) {
            $this->hoten = $hoten;
        }
        public function setGioiTinh($gioitinh) {
            $this->gioitinh = $gioitinh;
        } 
        public function setNgayVaoLam($ngayvaolam) {
            $this->ngayvaolam = $ngayvaolam;
        } 
        public function setHeSoLuong($hesoluong) {
            $this->hesoluong = $hesoluong;
        } 
        public function setSoCon($socon) {
            $this->socon = $socon;
        } 

        abstract public function tinhLuong();
        abstract public function tinhTroCap();

        public function tinhTienThuong() {
            $namBatDau = substr($this->ngayvaolam, 0, 4);
            $namHienTai = getdate()['year'];
            $soNamLamViec = $namHienTai - $namBatDau;

            return $soNamLamViec * 1000000;
        }
    }

    class NVVanPhong extends NhanVien {
        private $songayvang;
        const dinhmucvang = 4;
        const dongiaphat = 500000;

        public function setSoNgayVang($songayvang) {
            $this->songayvang = $songayvang;
        }

        public function tinhTienPhat() {
            if($this->songayvang > self::dinhmucvang)
                return $this->songayvang*self::dinhmucvang;
        }

        public function tinhTroCap() {
            if($this->gioitinh == "nu") {
                return 200000 * $this->socon * 1.5;
            } else {
                return 200000 * $this->socon;
            }
        }

        public function tinhLuong() {
            return self::luongCB * $this->hesoluong - $this->tinhTienPhat();
        }
    }

    class NVSanXuat extends NhanVien {
        private $sosp;
        const dinhmucsp = 10;
        const dongiasp = 600000;

        public function setSoSP($sosp) {
            $this->sosp = $sosp;
        }

        public function tinhTienThuong() {
            if($this->sosp > self::dinhmucsp) 
                return ($this->sosp - self::dinhmucsp) * self::dongiasp * 0.03;
        }

        public function tinhTroCap() {
            return $this->socon * 120000;
        }
        
        public function tinhLuong() {
            return ($this->sosp * self::dongiasp) + $this->tinhTienThuong();
        }
    }

    if(isset($_POST['tinhluong'])) {
        if(isset($_POST['loainv']) && $_POST['loainv'] == "vanphong") {
            $nv = new NVVanPhong();
            $nv->setHoTen($_POST['hoten']);
            $nv->setGioiTinh($_POST['gioitinh']);
            $nv->setNgayVaoLam($_POST['ngayvaolam']);
            $nv->setHeSoLuong($_POST['hesoluong']);
            $nv->setSoCon($_POST['socon']);
            $nv->setSoNgayVang($_POST['songayvang']);
            
            $tienluong = number_format($nv->tinhLuong(), 0, "", ".") . "VNĐ";
            $trocap = number_format($nv->tinhTroCap(), 0, "", ".") . "VNĐ";
            $tienthuong = number_format($nv->tinhTienThuong(), 0, "", ".") . "VNĐ";
            $tienphat = number_format($nv->tinhTienPhat(), 0, "", ".") . "VNĐ";
            $thuclinh = $nv->tinhLuong() + $nv->tinhTroCap() + $nv->tinhTienThuong() + $nv->tinhTienPhat();
            $thuclinh = number_format($thuclinh, 0, "", ".") . "VNĐ";
        }

        if(isset($_POST['loainv']) && $_POST['loainv'] == "sanxuat") {
            $nv = new NVSanXuat();
            $nv->setHoTen($_POST['hoten']);
            $nv->setGioiTinh($_POST['gioitinh']);
            $nv->setNgayVaoLam($_POST['ngayvaolam']);
            $nv->setHeSoLuong($_POST['hesoluong']);
            $nv->setSoCon($_POST['socon']);
            $nv->setSoSP($_POST['sosp']);
            
            $tienluong = number_format($nv->tinhLuong(), 0, "", ".") . "VNĐ";
            $trocap = number_format($nv->tinhTroCap(), 0, "", ".") . "VNĐ";
            $tienthuong = number_format($nv->tinhTienThuong(), 0, "", ".") . "VNĐ";
            $thuclinh = $nv->tinhLuong() + $nv->tinhTroCap() + $nv->tinhTienThuong();
            $thuclinh = number_format($thuclinh, 0, "", ".") . "VNĐ";
        }
    }
    ?>

    <form action="" method="POST">
        <table>
            <tr>
                <th colspan="4"><h2>QUẢN LÝ NHÂN VIÊN</h2></th>
            </tr>
            <tr>
                <td>Họ và tên:</td>
                <td><input type="text" required name="hoten" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>" size="35"></td>
                <td>Số con:</td>
                <td><input type="text" required name="socon" value="<?php if (isset($_POST['socon'])) echo $_POST['socon']; ?>" size="10"></td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" required name="ngaysinh" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST['ngaysinh']; ?>"></td>
                <td>Ngày vào làm:</td>
                <td><input type="date" required name="ngayvaolam" placeholder="dd/mm/yyyy" value="<?php if (isset($_POST['ngayvaolam'])) echo $_POST['ngayvaolam']; ?>"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <input type="radio" name="gioitinh" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "nam") echo 'checked="checked"' ?> value="nam" checked/> Nam
                    <input type="radio" name="gioitinh" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "nu") echo 'checked="checked"' ?> value="nu"/> Nữ
                </td>
                <td>Hệ số lương:</td>
                <td><input type="text" required name="hesoluong" value="<?php if (isset($_POST['hesoluong'])) echo $_POST['hesoluong']; ?>" size="10"></td>
            </tr>
            <tr>
                <td>Loại nhân viên:</td>
                <td><input type="radio" class="loainv" name="loainv" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "vanphong") echo 'checked="checked"' ?> value="vanphong" checked> Văn phòng</td>
                <td colspan="2"><input type="radio" class="loainv" name="loainv" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "sanxuat") echo 'checked="checked"' ?> value="sanxuat"> Sản xuất</td>
            </tr>
            <tr>
                <td>Số ngày vắng:</td>
                <td><input type="text" required id="songayvang" name="songayvang"
                    <?php if (isset($_POST['loainv']) && ($_POST['loainv']) != "vanphong") echo 'disabled';
                        else echo ''
                     ?> 
                    value="<?php if (isset($_POST['songayvang'])) echo $_POST['songayvang']; ?> " size="10">
                </td>
                <td>Số sản phẩm:</td>
                <td><input type="text" required id="sosp" name="sosp" 
                    <?php if (isset($_POST['loainv']) && ($_POST['loainv']) != "sanxuat") echo 'disabled';
                        else echo '';

                        if(!isset($_POST['loainv'])) echo 'disabled';
                     ?>
                    value="<?php if (isset($_POST['sosp'])) echo $_POST['sosp']; ?>"  size="10">
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <input type="submit" value="Tính lương" name="tinhluong">
                </td>
            </tr>
            <tr>
                <td>Tiền lương:</td>
                <td><input type="text" name="tienluong" disabled value="<?php echo $tienluong; ?>" size="25"></td>
                <td>Trợ cấp:</td>
                <td><input type="text" name="trocap" disabled value="<?php echo $trocap; ?>" size="25"></td>
            </tr>
            <tr>
                <td>Tiền thưởng:</td>
                <td><input type="text" name="tienthuong" disabled value="<?php echo $tienthuong; ?>" size="25"></td>
                <td>Tiền phạt:</td>
                <td><input type="text" name="tienphat" disabled value="<?php echo $tienphat; ?>" size="25"></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    Thực lĩnh: <input type="text" name="thuclinh" disabled value="<?php echo $thuclinh; ?>" size="35">
                </td>
            </tr>
        </table>
    </form>

    <script>
        const radio_loainv = document.querySelectorAll(".loainv");
        const soNgayVang = document.querySelector("#songayvang");
        const soSP = document.querySelector("#sosp");

        radio_loainv.forEach((loainv) => {
            loainv.addEventListener("change", () => {
                if(loainv.value == "vanphong") {
                    soNgayVang.toggleAttribute("disabled", false);
                    soSP.toggleAttribute("disabled", true);
                }

                if(loainv.value == "sanxuat") {
                    soNgayVang.toggleAttribute("disabled", true);
                    soSP.toggleAttribute("disabled", false);
                }
            });
        });
    </script>
</body>
</html>