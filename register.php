<?php # Script 3.4 - index.php
$page_title = 'Register';
include ('includes/header.php');
?>

<?php 
require_once 'database/connect.php';
$errors = [];
$tenDN = isset($_POST['tenDN'])? $_POST['tenDN'] : '';
$tenNV = isset($_POST['tenNV'])? $_POST['tenNV'] : '';
$ns = isset($_POST['ns'])? $_POST['ns'] : '';
$gioitinh = isset($_POST['gioitinh'])? $_POST['gioitinh'] : '';
$dc = isset($_POST['dc'])? $_POST['dc'] : '';
$mail = isset($_POST['mail'])? $_POST['mail'] : '';
$sdt = isset($_POST['sdt'])? $_POST['sdt'] : '';
$pass = isset($_POST['pass'])? $_POST['pass'] : '';
$re_pass = isset($_POST['re_pass'])? $_POST['re_pass'] : '';
$phai=0;
if(isset($_POST['register'])) {
    if($tenDN == '') {
        $errors[] = "Tên đăng nhập không được trống.";
    }

    if($pass == '') {
        $errors[] = "Mật khẩu không được trống.";
    }

    $sql="SELECT max(Ma_nhan_vien) FROM nhan_vien";
   
    $result = mysqli_query($conn, $sql); 
    
    if(mysqli_num_rows($result)<>0)
    { 
        
        while($rows=mysqli_fetch_row($result))
        {  
            $manv_max =  $rows['0'];
        }
    }
    $tmp  = substr($manv_max, 3,5);
    $stt = (int)$tmp+1;
    if($stt > 100){
        $manv_new =substr($manv_max, 0,2) . $stt;
    }else if($stt > 10){
        $manv_new =substr($manv_max, 0,3) . $stt;
    }
    else {
        $manv_new =substr($manv_max, 0,4) . $stt;
    }
    if($gioitinh == 'nam'){
        $phai=0;
    } else {
        $phai = 1;
    }

    if($pass != $re_pass ){
        $error[] = 'Mặt khẩu không khớp!';
        $sql = "SELECT *
                FROM nhan_vien 
                WHERE Tai_khoan = '$tenDN'
            ";
        $result = mysqli_query($conn, $sql); 
    } else if(mysqli_num_rows($result) > 0){
        $errors[] = "Tên đăng nhập đã tồn tại.";
    } else {
        $sql = "INSERT INTO nhan_vien VALUES('$manv_new','$tenNV','$ns','$phai','$dc','$sdt','$mail','$tenDN','$pass')
        ";
            $result = mysqli_query($conn, $sql);
            header("Location: ./login.php");
    }
}
?>

<div class="index d-flex flex-column align-items-center justify-content-center">
    
    <?php 
    if(count($errors)) {
        echo "<div class='w-30 p-3 bg-danger opacity-75 rounded-3 mb-4'>";
        foreach($errors as $error) {
            echo "<p class='text-white mb-0'>$error</p>";
        }
        echo "</div>";
    }
    ?>
    
    <form class="d-flex bg-transparent-50 rounded-3 flex-column w-30 p-4 needs-validation" method="post" action="">
        <h1 class="text-center fw-bold text-origin mb-3">Đăng ký tài khoản</h3>
        <div class="mb-3">
            <label for="tenNV" class="form-label text-origin fw-bold">Tên nhân viên</label>
            <input required type="text" class="form-control" id="tenNV" name="tenNV" value="<?php echo $tenNV; ?>" placeholder="vd: Nguyễn Văn A">
        </div>

        <div class="mb-3">
            <label for="ns" class="form-label text-origin fw-bold">Ngày sinh</label>
            <input type="date" class="form-control" required name="ns" value="<?php if (isset($_POST['ns'])) echo $_POST['ns']; ?>">
        </div>
        
        <div class="mb-3">
            <label class="form-label text-origin fw-bold">Giới tính</label>
            <input type="radio" id='nam'  name="gioitinh" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "nam") echo 'checked="checked"' ?> value="nam" checked/>
            <label for="nam" class="form-label text-origin fw-bold">Nam</label> 
            <input type="radio" id='nu'  name="gioitinh" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "nu") echo 'checked="checked"' ?> value="nu"/>
            <label for="nu" class="form-label text-origin fw-bold">Nữ</label> 
        </div>

        <div class="mb-3">
            <label for="dc" class="form-label text-origin fw-bold">Địa chỉ</label>
            <input required type="text" class="form-control" id="dc" name="dc" value="<?php echo $dc; ?>" placeholder="vd: Cù Lao Chàm">
        </div>

        <div class="mb-3">
            <label for="sdt" class="form-label text-origin fw-bold">Điện thoại</label>
            <input required type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $sdt; ?>" placeholder="vd: 0947513678">
        </div>

        <div class="mb-3">
            <label for="mail" class="form-label text-origin fw-bold">Email</label>
            <input required type="text" class="form-control" id="mail" name="mail" value="<?php echo $mail; ?>" placeholder="vd: ntu@gmail.com">
        </div>

        <div class="mb-3">
            <label for="tenDN" class="form-label text-origin fw-bold">Tên đăng nhập</label>
            <input required type="text" class="form-control" id="tenDN" name="tenDN" value="<?php echo $tenDN; ?>" placeholder="vd: nv001">
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label text-origin fw-bold">Mật khẩu</label>
            <div class="form-input">
                <input required type="password" class="form-control" id="pass" name="pass">
                <i class="fa-solid fa-eye icon" id="showPass"></i>
            </div>
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label text-origin fw-bold">Nhập lại mật khẩu</label>
            <div class="form-input">
                <input required type="password" class="form-control" id="re_pass" name="re_pass">
                <i class="fa-solid fa-eye icon" id="showRepass" ></i>
            </div>
        </div>

        <button class="btn btn-dark mx-auto mt-3" name="register" type="submit"><span class="text-origin fw-bold">ĐĂNG KÝ</span></button>
    </form>
</div>

<!-- Xử lý ẩn hiện mật khẩu -->
<script>
    var icon = document.querySelector('#showPass')
    var icon1 = document.querySelector('#showRepass')
    var pass = document.querySelector('#pass')
    var re_pass = document.querySelector('#re_pass')
    console.log(re_pass);
    var show = false;
    
    icon.addEventListener('click', () => {
        show = !show
        if(show){
            pass.type = 'text';
        } else {
            pass.type = 'password';
        }
    })

    icon1.addEventListener('click', () => {
        show = !show
        if(show){
            re_pass.type = 'text';
        } else {
            re_pass.type = 'password';
        }
    })
</script>
<?php
include ('includes/footer.html');
?>