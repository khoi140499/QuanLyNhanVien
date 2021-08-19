<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn=new mysqli('localhost','root','','qlnhanvien1');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gửi email</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		.sendmail{
			position: absolute;
			width: 500px;
			height: 500px;
			background: #252526;
			margin-left: 500px;
			margin-top: 100px;
			z-index: 21;
			border: 1px solid white;
			border-radius: 10px;
			display: block;
			margin-top: 100px;
			transition: 0.5s;
		}
		.nenden{
			width: 100%;
			height: 100%;
			position: absolute;
			background: black;
			opacity: 0.4;
			z-index: 20;
			display: block;
		}
		.btnmail{
			width: 100%;
			height: 50px;
			text-align: left;
			border: 0px;
			background: white;
		}
		.sendmail a{
			color: white;
			margin-left: 11px;
		}
		.sendmail a:hover{
			text-decoration: none;
		}
		.bun{
			width: 60px;
		}
	</style>
</head>
<body>
	<!-- guir email -->
	<div class="sendmail">
		<div class="form-group">
			<br>
			<div class="form-row form-group col-xl-12">
				<div class="col-xl-1">
					<a href="home.php">
						<img src="img/back_to_48px.png" style="width: 20px;margin-top: 10px;">
					</a>
				</div>
				<div class="col-xl-11">
					<input type="text" name="guiemail" id="guiemail" placeholder="Nhập tên nhân viên để gửi email" class="form-control" />
				</div>
			</div>
		</div>
		<br>
		<div id="formguiemail"></div>
	</div>
	<?php
		if(isset($_POST['btnguiemail'])){
			$tennguoigui=$_SESSION['username'];
			$tieude=$_POST['tieude'];
			$noidung=$_POST['ndemail'];
			$email=$_POST['em'];
			$tennguoinhan=$_POST['tnv'];

			$mail = new PHPMailer();
			$mail->IsSMTP(); // sử dụng phương thức SMTP
			$mail->Host = "ssl://smtp.gmail.com"; // dùng google làm máy chủ gửi thư
			$mail->Port = 465; 
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Username = "khoidanghoang144@gmail.com"; //tên đăng nhập gmail
			$mail->Password = "jbrojzecgjycszoa"; // mật khẩu smtp của tk gmail
			$from = "khoidanghoang144@gmail.com"; 
			$to=$email; // email nhận
			$name=$tennguoinhan; //tên người nhận 
			$mail->From = $from;
			$mail->FromName = $tennguoigui; // tên người gửi
			$mail->AddAddress($to,$name);
			$mail->AddReplyTo($from,$tennguoigui);
			$mail->WordWrap = 50;
			$mail->IsHTML(true); // bật html cho nội dung
			$mail->Subject = $tieude;
			$mail->Body = $noidung; //html on
			$mail->AltBody = $noidung;

			if (!$mail->send()) {
    			$error = "Lỗi: " . $mail->ErrorInfo;
    			echo '<script> window.alert("'.$error.'"); </script>';
  				}
  			else {
    			echo '<script> window.alert("Gửi thành công"); </script>';
  				}
			}
		?>
	<!-- nen den -->
	<div class="nenden"></div>
</body>
</html>

<!-- ajax xử lí gửi email -->
<script>
	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
				url:"guiEmail.php",
				method:"post",
				data:{query:query},
				success:function(data)
				{
					$('#formguiemail').html(data);
				}
			});
		}

		$('#guiemail').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				load_data(search);
			}
			else
			{
				load_data();            
			}
		});
	});
</script>