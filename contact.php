<?php # Script 3.4 - index.php
$page_title = 'Liên hệ!';
include ('includes/header.php');

$ketqua = '';
$success = false;

$name = isset($_POST['name'])? $_POST['name'] : '';
$email = isset($_POST['email'])? $_POST['email'] : '';
$comment = isset($_POST['comment'])? $_POST['comment'] : '';

require_once('./exercises/Phuc/SendMail/PHPMailer/class.phpmailer.php'); //gọi thư viện phpmailer

if(isset($_POST['send']) && isset($_POST['email']) && isset($_POST['comment'])){
    $mail= new PHPMailer(); //khởi tạo đối tượng PHPMailer

	//Cấu hình mail
	$mail->IsSMTP(); // khai báo gửi email qua SMTP

	$mail->SMTPDebug  = 2;
	$mail->CharSet = 'UTF-8';
	$mail->Debugoutput = "html"; // 
	$mail->Host       = "smtp.gmail.com"; //server gửi smtp
	$mail->Port       = 465; // thiết lập cổng mail
	$mail->SMTPSecure = "ssl"; //Phương thức mã hóa dữ liệu - ssl: 465 hoặc tls:587
	$mail->SMTPAuth   = true; //Xác thực SMTP

	//Cấu hình bắt đầu phần gửi mail
	$mFrom = "phucpth2001@gmail.com"; // Địa chỉ email của người gửi
	$nFrom = $name; //mail được từ đâu, thường để tên cơ quan/công ty
	$mPass = "ayzcffojvyzwdpce"; //mật khẩu email của người gửi


	$mTo = "phuc.pth.61cntt@ntu.edu.vn"; //địa chỉ email của người nhận
	$nTo = ''; //tên người nhận

	$body = $comment;
	$title = "Liên hệ từ khách hàng"; //tiêu đề email
	$mail->Username   = $mFrom; //khai báo địa chỉ email
	$mail->Password   = $mPass;  //khai báo mật khẩu
	$mail->SetFrom($mFrom, $nFrom); //thông tin người gửi
	$mail->AddReplyTo($email,"Email Reply");// khi người dùng phản hồi sẽ gửi đến email này
	$mail->AddAddress($mTo,$nTo);//Email của người nhận
	$mail->Subject    = $title; 
	$mail->MsgHTML($body); //Nội dung chính của email được đặt ở đây
	// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
	$mail->AltBody = "This is a plain-text message body";
	//$mail->AddAttachment("images/s_abbott_ganiq.jpg");//tập tin đính kèm
	
	//Tiến hành gửi mail và thông báo lỗi
	if(!$mail->Send()) 
		$ketqua = "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
	else 
		$ketqua = "Gửi mail thành công!";
        $success = true;
	}
?>

<div class="container mb-4">
    <iframe class="mt-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.706224032141!2d109.20018721475309!3d12.268148933241923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067ed3a052f11%3A0xd464ee0a6e53e8b7!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBOaGEgVHJhbmc!5e0!3m2!1svi!2s!4v1650799611926!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div class="row gx-5 mt-5">
        <div class="col-lg-6">
            <form action="" method="POST">
                <h3>Liên hệ với chúng tôi</h3>

                <?php
                if(isset($_POST['send']) && isset($_POST['email']) && isset($_POST['comment'])) {
                    $bg_color = $success? "bg-success" : "bg-danger";
                    echo "<div class='w-100 p-3 $bg_color bg-gradient rounded-3 mt-4'>
                            $ketqua
                        </div>";
                }
                ?>

                <div class="mb-3 mt-2">
                    <label for="name" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="vd: Nguyễn Văn A" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Viết bình luận <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="comment" rows="3" required><?php echo $comment; ?></textarea>
                </div>

                <button class="btn btn-dark" type="submit" name="send">Gửi liên hệ</button>
            </form>
        </div>
        <div class="col-lg-6">
            <p class="fs-1 fw-bolder text-origin">MộcPhúc.</p>
            <p class="text-justify">
                Mộc Phúc là một trong những trại mộc cung cấp sản phẩm nội thất gỗ chất lượng và uy tín nhất tại Nha Trang
                với hơn 17 năm kinh nghiệm trong lĩnh vực làm mộc.
            </p>
            <ul class="p-0">
                <li class="d-flex">
                    <span class="me-2"><i class="bi bi-geo-alt-fill"></i></span>
                    <span class="mb-3">
                        Số 40 ngõ Ngọc Sơn<br />
                        Tổ 20 Hòn Nghê 2, Nha Trang<br />
                        Việt Nam
                    </span>
                </li>
                <li class="d-flex">
                    <span class="me-2"><i class="bi bi-telephone-fill"></i></span>
                    <p>
                        <a href="#" class="text-decoration-none text-dark">+84 708 488 401</a>
                        <br />
                        <a href="#" class="text-decoration-none text-dark">+84 935 703 414</a>
                    </p>
                </li>
                <li class="d-flex">
                    <span class="me-2"><i class="bi bi-envelope-fill"></i></span>
                    <p><a href="mailto:phucpth2001@gmail.com" class="text-decoration-none text-dark">mocphuc@gmail.com</a></p>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
include ('includes/footer.html');
?>