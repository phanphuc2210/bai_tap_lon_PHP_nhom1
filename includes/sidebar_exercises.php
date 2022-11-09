<div class="sidebar-bt w-20 px-3 bg-dark text-light" style="min-height: 100vh;">
    <a href="./exercise.php"><h3 class="mt-3 fw-bold text-center text-origin">Bài tập PHP</h3></a>
    <hr>
    <p class="fs-5 fw-bold text-origin mb-0">Phan Trần Hữu Phúc</p>
    <ul class="exercises">
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" data-bs-toggle="collapse" href="#form" aria-expanded="false" aria-controls="form">
                Form (Phúc)
            </a>
            <ul class="collapse <?php echo $_GET['name'] == 'Phuc' && $_GET['loai'] == 'Form'? 'show' : ''; ?>" id="form">
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai1_1.php"><u class="fw-bold text-origin">Bài 1.1:</u> Tạo form nhập liệu với text field (dạng 1)</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai1_2.php"><u class="fw-bold text-origin">Bài 1.2:</u> Tạo form nhập liệu với text field (dạng 2)</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai1_3.php"><u class="fw-bold text-origin">Bài 1.3:</u> Tạo form nhập liệu với multipleline text (textarea)</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai1_4.php"><u class="fw-bold text-origin">Bài 1.4:</u> Tạo form nhập liệu với hộp kiểm checkbox</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai1_5.php"><u class="fw-bold text-origin">Bài 1.5:</u> Tạo form nhập liệu với hộp kiểm radio button</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai1_6.php"><u class="fw-bold text-origin">Bài 1.6:</u> Tạo form nhập liệu với danh sách dạng combo box</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai1_7.php"><u class="fw-bold text-origin">Bài 1.7:</u> Tạo form nhập liệu với danh sách dạng list box</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai2_1.php"><u class="fw-bold text-origin">Bài 2.1:</u> Thiết kế form tính diện tích hình chữ nhật</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=bai2_2.php"><u class="fw-bold text-origin">Bài 2.2:</u> Thiết kế form tính tiền điện</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=pheptinh.php"><u class="fw-bold text-origin">Bài 2.3:</u> Tạo trang web thực hiện phép tính trên 2 số</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Form&ten_bai=nhapThongTin.php"><u class="fw-bold text-origin">Bài 2.4:</u> Tạo trang web nhận và xử lý thông tin người dùng</a></li>
            </ul>
        </li>
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" data-bs-toggle="collapse" href="#arr_phuc" aria-expanded="false" aria-controls="arr_phuc">
                Array & String (Phúc)
            </a>
            <ul class="collapse <?php echo $_GET['name'] == 'Phuc' && $_GET['loai'] == 'Array'? 'show' : ''; ?>" id="arr_phuc">
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=bai1.php"><u class="fw-bold text-origin">Bài 1:</u> Một số thao tác trên mảng số nguyên</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=mangNamNhuan.php"><u class="fw-bold text-origin">Bài 2:</u> Thiết kế Form tìm năm nhuận</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=namAmLich.php"><u class="fw-bold text-origin">Bài 3:</u> Thiết kế Form tìm năm âm lịch</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=bai4.php"><u class="fw-bold text-origin">Bài 4:</u> Thiết kế Form nhập và tính trên dãy số</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=bai5.php"><u class="fw-bold text-origin">Bài 5:</u> Thiết kế Form Phát sinh mảng và tính toán</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=bai6.php"><u class="fw-bold text-origin">Bài 6:</u> Thiết kế Form Tìm kiếm</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=bai7.php"><u class="fw-bold text-origin">Bài 7:</u> Thiết kế Form Thay thế</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=bai8.php"><u class="fw-bold text-origin">Bài 8:</u> Thiết kế Form Sắp xếp mảng</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=bai9.php"><u class="fw-bold text-origin">Bài 9:</u> Thiết kế Form Đếm phần tử, ghép mảng và sắp xếp</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=bai10_session.php"><u class="fw-bold text-origin">Bài 10:</u> Tạo form xếp hạng bài hát</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Array&ten_bai=mang2Chieu.php"><u class="fw-bold text-origin">Bài tập:</u> Tạo và hiển thị ma trận số nguyên</a></li>
            </ul>
        </li>
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" data-bs-toggle="collapse" href="#oop_phuc" aria-expanded="false" aria-controls="oop_phuc">
                OOP (Phúc)
            </a>
            <ul class="collapse <?php echo $_GET['name'] == 'Phuc' && $_GET['loai'] == 'OOP'? 'show' : ''; ?>" id="oop_phuc">
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=OOP&ten_bai=lopcoban.php"><u class="fw-bold text-origin">Bài 1:</u> Tạo các lớp đơn giản</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=OOP&ten_bai=quanlynhanvien.php"><u class="fw-bold text-origin">Bài 2:</u> Quản lý thông tin nhân viên</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=OOP&ten_bai=phanso.php"><u class="fw-bold text-origin">Bài 3:</u> Phép tính trên phân số</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=OOP&ten_bai=chuvi_dientich.php"><u class="fw-bold text-origin">Bài 4:</u> Tính chu vi diện tích</a></li>
            </ul>
        </li>
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" data-bs-toggle="collapse" href="#db" aria-expanded="false" aria-controls="db">
                Database (Phúc)
            </a>
            <ul class="collapse <?php echo $_GET['name'] == 'Phuc' && $_GET['loai'] == 'Mysql'? 'show' : ''; ?>" id="db">
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=luoi_tho_hang_sua.php"><u class="fw-bold text-origin">Bài 1:</u> Hiển thị lưới</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=luoi_dinh_dang.php"><u class="fw-bold text-origin">Bài 2:</u> Lưới định dạng</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=luoi_tuy_bien.php"><u class="fw-bold text-origin">Bài 3:</u> Lưới tùy biến</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=luoi_phan_trang.php"><u class="fw-bold text-origin">Bài 4:</u> Lưới phân trang</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=list_don_gian.php"><u class="fw-bold text-origin">Bài 5:</u> List đơn giản</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=list_dang_cot.php"><u class="fw-bold text-origin">Bài 6:</u> List dạng cột</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=list_dang_cot_co_link.php"><u class="fw-bold text-origin">Bài 7:</u> List dạng cột có link</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=list_phan_trang.php"><u class="fw-bold text-origin">Bài 8:</u> List chi tiết có phân trang</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=tim_kiem_don_gian.php"><u class="fw-bold text-origin">Bài 9:</u> Tìm kiếm đơn giản</a></li>    
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=tim_kiem_nang_cao.php"><u class="fw-bold text-origin">Bài 10:</u> Tìm kiếm nâng cao</a></li>    
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=them_moi.php"><u class="fw-bold text-origin">Bài 11:</u> Thêm mới</a></li>    
                <li><a class="link-origin" href="./exercise.php?name=Phuc&loai=Mysql&ten_bai=thong_tin_khach_hang.php"><u class="fw-bold text-origin">Bài 12:</u> Xóa-Sửa</a></li>     
            </ul>
        </li>
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" href="./exercise.php?name=Phuc&loai=SendMail&ten_bai=form.php">
                Send mail (Phúc)
            </a>
        </li> 
    </ul>

    <hr>
    <p class="fs-5 fw-bold text-origin mb-0">Phạm Minh Hoàng</p>
    <ul class="exercises">
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" data-bs-toggle="collapse" href="#form_H" aria-expanded="false" aria-controls="form_H">
                Form (Hoàng)
            </a>
            <ul class="collapse <?php echo $_GET['name'] == 'Hoang' && $_GET['loai'] == 'BT_form'? 'show' : ''; ?>" id="form_H">
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=input_xuly.php"><u class="fw-bold text-origin">Bài 1.1:</u> Tạo form nhập liệu với text field (dạng 1)</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=names.php"><u class="fw-bold text-origin">Bài 1.2:</u> Tạo form nhập liệu với text field (dạng 2)</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=textarea.php"><u class="fw-bold text-origin">Bài 1.3:</u> Tạo form nhập liệu với multipleline text (textarea)</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=checkbox.php"><u class="fw-bold text-origin">Bài 1.4:</u> Tạo form nhập liệu với hộp kiểm checkbox</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=radio.php"><u class="fw-bold text-origin">Bài 1.5:</u> Tạo form nhập liệu với hộp kiểm radio button</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=combobox.php"><u class="fw-bold text-origin">Bài 1.6:</u> Tạo form nhập liệu với danh sách dạng combo box</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=listbox.php"><u class="fw-bold text-origin">Bài 1.7:</u> Tạo form nhập liệu với danh sách dạng list box</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=Rectangle.php"><u class="fw-bold text-origin">Bài 2.1:</u> Thiết kế form tính diện tích hình chữ nhật</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=electric.php"><u class="fw-bold text-origin">Bài 2.2:</u> Thiết kế form tính tiền điện</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=pheptinh.php"><u class="fw-bold text-origin">Bài 2.3:</u> Tạo trang web thực hiện phép tính trên 2 số</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_form&ten_bai=thongtin.php"><u class="fw-bold text-origin">Bài 2.4:</u> Tạo trang web nhận và xử lý thông tin người dùng</a></li>
            </ul>
        </li>
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" data-bs-toggle="collapse" href="#arr" aria-expanded="false" aria-controls="arr">
                Array & String (Hoàng)
            </a>
            <ul class="collapse <?php echo $_GET['name'] == 'Hoang' && $_GET['loai'] == 'BT_arr'? 'show' : ''; ?>" id="arr">
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT1.php"><u class="fw-bold text-origin">Bài 1:</u> Một số thao tác trên mảng số nguyên</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT2.php"><u class="fw-bold text-origin">Bài 2:</u> Thiết kế Form tìm năm nhuận</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT3.php"><u class="fw-bold text-origin">Bài 3:</u> Thiết kế Form tìm năm âm lịch</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT4.php"><u class="fw-bold text-origin">Bài 4:</u> Thiết kế Form nhập và tính trên dãy số</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT5.php"><u class="fw-bold text-origin">Bài 5:</u> Thiết kế Form Phát sinh mảng và tính toán</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT6.php"><u class="fw-bold text-origin">Bài 6:</u> Thiết kế Form Tìm kiếm</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT7.php"><u class="fw-bold text-origin">Bài 7:</u> Thiết kế Form Thay thế</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT8.php"><u class="fw-bold text-origin">Bài 8:</u> Thiết kế Form Sắp xếp mảng</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT9.php"><u class="fw-bold text-origin">Bài 9:</u> Thiết kế Form Đếm phần tử, ghép mảng và sắp xếp</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BT10.php"><u class="fw-bold text-origin">Bài 10:</u> Tạo form xếp hạng bài hát</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=BT_arr&ten_bai=BTarr.php"><u class="fw-bold text-origin">Bài tập:</u> Tạo và hiển thị ma trận số nguyên</a></li>
            </ul>
        </li>
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" data-bs-toggle="collapse" href="#oop" aria-expanded="false" aria-controls="oop">
                OOP (Hoàng)
            </a>
            <ul class="collapse <?php echo $_GET['name'] == 'Hoang' && $_GET['loai'] == 'OOP'? 'show' : ''; ?>" id="oop">
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=OOP&ten_bai=BT1_oop.php"><u class="fw-bold text-origin">Bài 1:</u> Tạo các lớp đơn giản</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=OOP&ten_bai=BT2_oop.php"><u class="fw-bold text-origin">Bài 2:</u> Quản lý thông tin nhân viên</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=OOP&ten_bai=BT3_oop.php"><u class="fw-bold text-origin">Bài 3:</u> Phép tính trên phân số</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=OOP&ten_bai=QLNV.php"><u class="fw-bold text-origin">Bài 4:</u> Quản Lý Nhân Viên</a></li>
            </ul>
        </li>
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" data-bs-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data">
                Database (Hoàng)
            </a>
            <ul class="collapse <?php echo $_GET['name'] == 'Hoang' && $_GET['loai'] == 'Mysql'? 'show' : ''; ?>" id="data">
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=demo.php"><u class="fw-bold text-origin">Bài 1:</u>Hiển thị thông tin khách hàng</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=TTHang_sua.php"><u class="fw-bold text-origin">Bài 2:</u> Hiển Thị Thông Tin Hãng Sữa</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=thongtinsua.php"><u class="fw-bold text-origin">Bài 3:</u> Hiển thị thông tin sữa</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=TTsualist.php"><u class="fw-bold text-origin">Bài 4:</u> Hiển thị thông tin sữa dạng list</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=BT2_5.php"><u class="fw-bold text-origin">Bài 5:</u> Hiển thị thông tin sữa dạng list</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=add.php"><u class="fw-bold text-origin">Bài 6:</u> Thêm sữa mới</a></li>
                <li><a class="link-origin" href="./exercise.php?name=Hoang&loai=Mysql&ten_bai=customer.php"><u class="fw-bold text-origin">Bài 7:</u> Hiển thị, Xóa, Sửa thông tin khách hàng</a></li>
            </ul>
        </li>
        <li class="py-1"> 
            <a class="fs-6 fw-bold text-white" href="./exercise.php?name=Hoang&loai=SendMail&ten_bai=form.php">
                Send mail (Hoàng)
            </a>
        </li>
    </ul>
</div>