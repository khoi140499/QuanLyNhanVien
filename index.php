<?php
    $conn=new mysqli('localhost', 'root', '', 'qlnhanvien1');
    if(!$conn){
        die("Không thể kết nối");
    }
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="fontawesome-free-5.12.1-web/css/all.css">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="mn">
        <div class="container">
            <div class="danhnhap">
                <ul class="list-group">
                    <li class="list-group-item text-center">
                        <h1><i class="fab fa-reddit" style="color: blue; font-size: 65px"></i></h1>
                    </li>
                    <li class="list-group-item">
                        <form action="index.php" method="post">
                            <div class="form-group cs">
								<input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập" name="username" required>
							</div>
							<div class="form-group cs">
								<input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="password" required>
							</div>
							<input type="submit" class="bt" name="btngui" value="Đăng nhập">
                            <?php 
                                if(isset($_POST['btngui'])){
                                    $username=$_POST['username'];
                                    $pass=$_POST['password'];
                                
                                    $pass=md5($pass);

                                    $sql="select username, pass from users where username='$username'";
                                    $result = $conn->query($sql);
                                    if($result->num_rows == 0){
                                        echo '<script language="javascript"> alert("Sai tên đăng nhập") </script>';
                                        exit;
                                    }
                                    $row = $result->fetch_assoc(); 
                                    if($pass != $row['pass']){
                                        echo '<script language="javascript"> alert("Sai mật khẩu") </script>';
                                    }
                                    else{
                                        $_SESSION['username']=$username;
                                        $_SESSION['pass']=$pass;
                                        header('location:home.php');
                                    }
                                }
                            ?>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>