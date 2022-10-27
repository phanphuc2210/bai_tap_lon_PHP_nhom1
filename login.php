<?php # Script 3.4 - index.php
$page_title = 'Login';
include ('includes/header.php');
?>

<?php 
require_once './database.php';
$errors = [];
$tenDN = isset($_POST['tenDN'])? $_POST['tenDN'] : '';
$pass = isset($_POST['pass'])? $_POST['pass'] : '';

if(isset($_POST['login'])) {
    if($tenDN != '' && $pass != '') {
        $sql = "SELECT Ma_nhan_vien , Ten_nhan_vien
                FROM nhan_vien 
                WHERE Tai_khoan = '$tenDN' AND Password = '$pass'
            ";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            $_SESSION['isLogin'] = true;
            $_SESSION['Username'] = mysqli_fetch_array($result)['Ten_nhan_vien'];
            header("Location: /");
        } else {
            echo "Đăng nhập thất bại";
        }
    } 
}
?>

<div class="index d-flex flex-column align-items-center justify-content-center">
    <form class="d-flex bg-transparent-50 rounded-3 flex-column w-30 p-4" method="post" action="">
        <h1 class="text-center fw-bold text-origin mb-3">Đăng nhập tài khoản</h3>

        <!-- @if (ViewBag.error != null)
        {
            <p class="text-center text-danger fw-bold">@ViewBag.error</p>
        } -->

        <div class="mb-3">
            <label for="tenDN" class="form-label text-origin fw-bold">Tên đăng nhập</label>
            <input required type="text" class="form-control" id="tenDN" name="tenDN" value="<?php echo $tenDN; ?>" placeholder="vd: nv001">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label text-origin fw-bold">Mật khẩu</label>
            <input required type="password" class="form-control" id="pass" name="pass">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="showPass">
            <label class="form-check-label text-white" for="showPass">
                Hiển thị mật khẩu.
            </label>
        </div>

        <button class="btn btn-dark mx-auto mt-3" name="login" type="submit"><span class="text-origin fw-bold">ĐĂNG NHẬP</span></button>
    </form>
</div>

<!-- Xử lý ẩn hiện mật khẩu -->
<script>
    var checkbox = document.querySelector('#showPass')
    var pass = document.querySelector('#pass')
    checkbox.addEventListener('change', (e) => {
        if(e.target.checked) {
            pass.type = "text"
        } else {
            pass.type = "password"
        }
    })
</script>
<?php
include ('includes/footer.html');
?>