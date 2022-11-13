<?php # Script 3.4 - index.php
$page_title = 'Welcome to MộcPhúc.!';
include ('../includes/header_webdemo.php');
require_once ('../database/connect.php');
?>

<?php 
	// Phải đăng nhập thì mới có thể truy cập
	if($isLogin == false) {
		header("Location: ../login.php");
	}
?>

<div class="container">
    <div class="mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Danh sách sản phẩm</h3>
            <?php 
                $re = mysqli_query($conn, 'select * from san_pham');
                //tổng số mẩu tin cần hiển thị
                $numRows = mysqli_num_rows($re);
                echo "<span>số lượng sản phẩm ($numRows)</span>"
            ?>
            
        </div>

        <hr class="mt-2">

        <div class="sanpham">
            <div class="row mt-3 gy-4">
                <?php 
                $rowsPerPage = 8;
                if (!isset($_GET['page'])){
                     $_GET['page'] = 1;
                }
                //vị trí của mẩu tin đầu tiên trên mỗi trang
                $offset =($_GET['page']-1)* $rowsPerPage;
                //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
                $result = mysqli_query($conn, 'SELECT san_pham.Ma_sp,san_pham.Ten_sp,san_pham.So_luong_ton,san_pham.Hinh_anh,san_pham.Don_gia ,loai_sp.Ten_loai_sp
                FROM san_pham join loai_sp on san_pham.Ma_loai_sp = loai_sp.Ma_loai_sp
                LIMIT '. $offset . ', ' .$rowsPerPage);
                
                    if(mysqli_num_rows($result)<>0)
                    {
                        while($rows=mysqli_fetch_row($result))
                        {   
                        echo "<div class='col-3 '>
                                <div class='card w-100 product-item' style='width: 18rem;'>
                                    <a href='./details.php?masp={$rows[0]}'>
                                        <img src='../Images/{$rows[3]}' class='card-img-top' style='height: 250px' alt='sản phẩm'>
                                    </a>
                                <div class='card-body'>
                                        <a href='#' class='text-decoration-none text-dark'>
                                            <h5 class='card-title'>{$rows[1]}</h5>
                                        </a>
                                        <p class='mb-1'>Mã sản phẩm: {$rows[0]}</p>
                                        <p class='mb-1'><span class='me-4'>Loại sản phẩm: {$rows[5]}</span> <span>Còn lại: {$rows[2]}</spanc></p>
                                        <p class='card-text'>Giá bán: <span class='text-danger'>".number_format($rows[4], 0, '', '.')." vnđ</span></p>
                                        <div class='text-center'>
                                            <a class='btn btn-dark' style='width: 49%;' href='./edit.php?masp=". $rows[0] ."'>Sửa <i class='bi bi-pencil-square ms-1'></i></a>
                                            <a class='btn btn-danger' style='width: 49%;' href='./delete.php?masp=". $rows[0] ."'>Xóa <i class='bi bi-trash-fill ms-1'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            
                        }
                    }
                    //tổng số trang
                    $maxPage = ceil($numRows/$rowsPerPage);
                    // echo 'Tong so trang la: '.$maxPage;
                    //gắn thêm nút Back
                    echo "<div class='my-4 py-1' align='center' >";
                    if ($_GET['page'] > 1){
                        echo "<a class='mx-1' href=" .$_SERVER['PHP_SELF']."?page=".(1)."><<</a> ";
                        echo "<a class='mx-1' href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."> < </a> ";
                    }
                    for ($i=1 ; $i<=$maxPage ; $i++) {//tạo link tương ứng tới các trang
                        if ($i == $_GET['page'])
                            echo '<b class="mx-2 text-origin">Trang '. $i. '</b> '; //trang hiện tại sẽ được bôi đậm
                        else
                            echo "<a class='mx-2' href=".$_SERVER['PHP_SELF']."?page=".$i.">Trang ".$i."</a> ";
                    }
                    //gắn thêm nút Next
                    if ($_GET['page'] < $maxPage){ 
                        echo "<a class='mx-1' href = ". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1)."> > </a>";
                        echo "<a class='mx-1' href=" .$_SERVER['PHP_SELF']."?page=".$maxPage."> >> </a> ";
                    }
                    echo "</div>";
                ?>
                <!-- Bắt đầu 1 thẻ sản phẩm -->
                <!-- <div class="col-3 ">
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
                </div> -->
                <!-- Kết thúc 1 thẻ sản phẩm -->
            </div>
        </div>
    </div>
</div>


<?php
include ('../includes/footer.html');
?>