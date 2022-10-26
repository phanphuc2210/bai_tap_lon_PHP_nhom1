<?php # Script 3.4 - index.php
$page_title = 'Login';
include ('includes/header.php');
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
            <input type="text" class="form-control" id="tenDN" name="tenDN" placeholder="vd: nv001">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label text-origin fw-bold">Mật khẩu</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="showPass">
            <label class="form-check-label text-white" for="showPass">
                Hiển thị mật khẩu.
            </label>
        </div>

        <button class="btn btn-dark mx-auto mt-3" type="submit"><span class="text-origin fw-bold">ĐĂNG NHẬP</span></button>
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