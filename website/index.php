<?php # Script 3.4 - index.php
$page_title = 'Welcome to MộcPhúc.!';
include ('../includes/header.php');
include ('../includes/header_webdemo.php');
?>

<div class="container">
    <div class="my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Danh sách sản phẩm</h3>
            <span>số lượng sản phẩm (20)</span>
        </div>

        <hr class="mt-2">

        <div class="sanpham">
            <div class="row mt-3 gy-3">

                <!-- Bắt đầu 1 thẻ sản phẩm -->
                <div class="col-3 ">
                    <div class="card w-100 product-item" style="width: 18rem;">
                        <a href="#">
                            <img src="/Images/imgban.jpg" class="card-img-top" style="height: 250px" alt="sản phẩm">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">Tên sản phẩm</h5>
                            </a>
                            <p class="mb-1">Mã sản phẩm: SP001</p>
                            <p class="mb-1"><span class="me-4">Loại sản phẩm: Bàn</span> <span>Còn lại: 20</spanc></p>
                            <p class="card-text">Giá bán: <span class="text-danger">300.000 vnđ</span></p>
                            <div class="text-center">
                                <a class="btn btn-dark" style="width: 49%;" href="#">Sửa <i class="bi bi-pencil-square ms-1"></i></a>
                                <a class="btn btn-danger" style="width: 49%;" href="#">Xóa <i class="bi bi-trash-fill ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kết thúc 1 thẻ sản phẩm -->
                

                <!-- Dữ liệu mẫu (xóa đi rồi dùng vòng lặp) -->
                <div class="col-3 ">
                    <div class="card w-100 product-item" style="width: 18rem;">
                        <a href="#">
                            <img src="/Images/imgban.jpg" class="card-img-top" style="height: 250px" alt="sản phẩm">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">Tên sản phẩm</h5>
                            </a>
                            <p class="mb-1">Mã sản phẩm: SP001</p>
                            <p class="mb-1"><span class="me-4">Loại sản phẩm: Bàn</span> <span>Còn lại: 20</spanc></p>
                            <p class="card-text">Giá bán: <span class="text-danger">300.000 vnđ</span></p>
                            <div class="text-center">
                                <a class="btn btn-dark" style="width: 49%;" href="#">Sửa <i class="bi bi-pencil-square ms-1"></i></a>
                                <a class="btn btn-danger" style="width: 49%;" href="#">Xóa <i class="bi bi-trash-fill ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <div class="card w-100 product-item" style="width: 18rem;">
                        <a href="#">
                            <img src="/Images/imgban.jpg" class="card-img-top" style="height: 250px" alt="sản phẩm">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">Tên sản phẩm</h5>
                            </a>
                            <p class="mb-1">Mã sản phẩm: SP001</p>
                            <p class="mb-1"><span class="me-4">Loại sản phẩm: Bàn</span> <span>Còn lại: 20</spanc></p>
                            <p class="card-text">Giá bán: <span class="text-danger">300.000 vnđ</span></p>
                            <div class="text-center">
                                <a class="btn btn-dark" style="width: 49%;" href="#">Sửa <i class="bi bi-pencil-square ms-1"></i></a>
                                <a class="btn btn-danger" style="width: 49%;" href="#">Xóa <i class="bi bi-trash-fill ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <div class="card w-100 product-item" style="width: 18rem;">
                        <a href="#">
                            <img src="/Images/imgban.jpg" class="card-img-top" style="height: 250px" alt="sản phẩm">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">Tên sản phẩm</h5>
                            </a>
                            <p class="mb-1">Mã sản phẩm: SP001</p>
                            <p class="mb-1"><span class="me-4">Loại sản phẩm: Bàn</span> <span>Còn lại: 20</spanc></p>
                            <p class="card-text">Giá bán: <span class="text-danger">300.000 vnđ</span></p>
                            <div class="text-center">
                                <a class="btn btn-dark" style="width: 49%;" href="#">Sửa <i class="bi bi-pencil-square ms-1"></i></a>
                                <a class="btn btn-danger" style="width: 49%;" href="#">Xóa <i class="bi bi-trash-fill ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <div class="card w-100 product-item" style="width: 18rem;">
                        <a href="#">
                            <img src="/Images/imgban.jpg" class="card-img-top" style="height: 250px" alt="sản phẩm">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">Tên sản phẩm</h5>
                            </a>
                            <p class="mb-1">Mã sản phẩm: SP001</p>
                            <p class="mb-1"><span class="me-4">Loại sản phẩm: Bàn</span> <span>Còn lại: 20</spanc></p>
                            <p class="card-text">Giá bán: <span class="text-danger">300.000 vnđ</span></p>
                            <div class="text-center">
                                <a class="btn btn-dark" style="width: 49%;" href="#">Sửa <i class="bi bi-pencil-square ms-1"></i></a>
                                <a class="btn btn-danger" style="width: 49%;" href="#">Xóa <i class="bi bi-trash-fill ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <div class="card w-100 product-item" style="width: 18rem;">
                        <a href="#">
                            <img src="/Images/imgban.jpg" class="card-img-top" style="height: 250px" alt="sản phẩm">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">Tên sản phẩm</h5>
                            </a>
                            <p class="mb-1">Mã sản phẩm: SP001</p>
                            <p class="mb-1"><span class="me-4">Loại sản phẩm: Bàn</span> <span>Còn lại: 20</spanc></p>
                            <p class="card-text">Giá bán: <span class="text-danger">300.000 vnđ</span></p>
                            <div class="text-center">
                                <a class="btn btn-dark" style="width: 49%;" href="#">Sửa <i class="bi bi-pencil-square ms-1"></i></a>
                                <a class="btn btn-danger" style="width: 49%;" href="#">Xóa <i class="bi bi-trash-fill ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <div class="card w-100 product-item" style="width: 18rem;">
                        <a href="#">
                            <img src="/Images/imgban.jpg" class="card-img-top" style="height: 250px" alt="sản phẩm">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">Tên sản phẩm</h5>
                            </a>
                            <p class="mb-1">Mã sản phẩm: SP001</p>
                            <p class="mb-1"><span class="me-4">Loại sản phẩm: Bàn</span> <span>Còn lại: 20</spanc></p>
                            <p class="card-text">Giá bán: <span class="text-danger">300.000 vnđ</span></p>
                            <div class="text-center">
                                <a class="btn btn-dark" style="width: 49%;" href="#">Sửa <i class="bi bi-pencil-square ms-1"></i></a>
                                <a class="btn btn-danger" style="width: 49%;" href="#">Xóa <i class="bi bi-trash-fill ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <div class="card w-100 product-item" style="width: 18rem;">
                        <a href="#">
                            <img src="/Images/imgban.jpg" class="card-img-top" style="height: 250px" alt="sản phẩm">
                        </a>
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="card-title">Tên sản phẩm</h5>
                            </a>
                            <p class="mb-1">Mã sản phẩm: SP001</p>
                            <p class="mb-1"><span class="me-4">Loại sản phẩm: Bàn</span> <span>Còn lại: 20</spanc></p>
                            <p class="card-text">Giá bán: <span class="text-danger">300.000 vnđ</span></p>
                            <div class="text-center">
                                <a class="btn btn-dark" style="width: 49%;" href="#">Sửa <i class="bi bi-pencil-square ms-1"></i></a>
                                <a class="btn btn-danger" style="width: 49%;" href="#">Xóa <i class="bi bi-trash-fill ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Xóa đến đây là xong rồi -->
            </div>
        </div>
    </div>
</div>


<?php
include ('../includes/footer.html');
?>