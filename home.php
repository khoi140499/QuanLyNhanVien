<?php
$conn=new mysqli('localhost', 'root', '', 'QLNhanVien1');
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
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="fontawesome-free-5.12.1-web/css/all.css">
    <title>Quản lí nhân viên</title>
    <style type="text/css">
        .m3_header{
            float: left;
            width: 100%;
            background: #252526;
            height: 50px;
        }
        .m3_header a:hover{
            color: #7FBA00;
        }
        .m3_main{
            float: left;
            width: 100%;
        }
        .m3_them{
            float: left;
            width: 50%;
            color: white;
            padding-top: 8px;
        }
        .m3_sua{
            float: left;
            width: 50%;
            color: white;
            padding-top: 8px;
        }
        .message{
            width: 85%;
            background: white;
            border-radius: 10px;
            border: 1px solid #F78F8F;
            margin-top: 20px;
        }
        .xuatexcel{
            width: 85%;
            background: white;
            border-radius: 5px 5px 0px 0px;
            border: 1px solid #C1C1C1;
            margin-top: 20px;
        }
        
        .mail{
            width: 85%;
            background: white;
            border-radius: 0px 0px 5px 5px;
            border-right: 1px solid #C1C1C1; 
            border-left: 1px solid #C1C1C1; 
            border-bottom: 1px solid #C1C1C1;  
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="main_header">
            <div class="contai text-left">
                <div class="col1 text-left">
                    <i class="fas fa-user-cog" style="color:white"></i><span style="color:white">Quản lí nhân viên</span>
                </div>
                <div class="col2 text-right">
                    <form action="home.php" method="post">
                        <input type="submit" class="btn btn-primary" name="dx" value="Đăng xuất"></button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['dx'])){
            if(isset($_SESSION['username']) && isset($_SESSION['pass'])){
                unset($_SESSION['username']);
                unset($_SESSION['pass']);
            }
            header('location:index.php');
        }
        ?>
        <!--        trang chu-->
        <div class="main_m">
            <div class="contai">
                <!-- Bảng điều khiển bên trái -->
                <div class="m_left">
                    <div class="m_tittle">
                        <span>Bảng điều khiển</span>
                    </div>
                    <div class="m_main">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <button type="button" class="byn1 text-left">Nhân viên</button>
                            </li>
                            <li class="list-group-item">
                                <button type="button" class="byn2 text-left">Phòng ban</button>
                            </li>
                            <li class="list-group-item">
                                <button type="button" class="byn3 text-left">Hợp đồng lao động</button>
                            </li>
                        </ul>
                    </div>
                    <!-- thông báo sinh nhật -->
                    <div class="message">
                        <div class="mess_header col-xl-12 text-center" style="margin-top: 10px;margin-bottom: 20px;">
                           <span>Nhân viên có sinh nhật</span>
                       </div>
                       <div class="form-row form-group col-xl-12">
                        <table>
                            <?php
                            $thang=date("m");
                            $ngay=date("d");
                            $sql="SELECT * 
                            FROM nhanvien 
                            WHERE MONTH(ngaysinh) = '$thang'
                            AND DAY(ngaysinh)='$ngay';";
                            $result=$conn->query($sql);
                            if($result->num_rows>0){
                                while ($row=$result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><i class="fas fa-birthday-cake" style="margin-right: 10px;"></i><?php echo $row['ten'] ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>

                <!-- xuất excel -->
                    <div class="xuatexcel">
                        <div class="form-group col-xl-12">
                            <a class="btn" data-toggle="collapse" data-target="#lissp100">Xuất Excel</a>
                        </div>
                        <div class="collapse" id="lissp100">
                                <a class="btn" href="xuatExcelNV.php" style="color: #E38035">Nhân viên</a>
                                <a class="btn" href="xuatExcelPB.php" style="color: #E38035">Phòng ban</a>
                                <a class="btn" href="xuatExcelHD.php" style="color: #E38035">Hợp đồng</a>
                        </div>
                    </div>
                    <div class="mail">
                        <div class="form-group col-xl-12">
                            <a class="btn" class="btnmail" href="gdMail.php">Gửi thông báo</a>
                        </div>
                    </div>
            </div>
            <!-- Các chức năng -->
            <div class="m_right">
                <!-- trang chur -->
                <div class="m1">
                    <div class="mright_header">
                        <span>Tổng quan</span>
                    </div>
                    <div class="mright_main">
                        <div class="mnhanvien">
                            <div class="mnv1 text-center">
                                <h3>
                                    <?php
                                    $sql="select count(manv) as tong from nhanvien";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    echo $row['tong'];
                                    ?>
                                </h3>
                                <h3>Nhân viên</h3>
                            </div>
                            <div class="mnv2">
                                <img src="img/people_100px.png">
                            </div>
                        </div>
                        <div class="mphongban">
                            <div class="mnv1 text-center">
                                <h3>
                                    <?php
                                    $sql="select count(maphongban) as tong from phongban";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    echo $row['tong'];
                                    ?>
                                </h3>
                                <h3>Phòng ban</h3>
                            </div>
                            <div class="mnv2">
                                <img src="img/department_100px.png">
                            </div>
                        </div>
                        <div class="mhopdong">
                            <div class="mnv1 text-center">
                                <h3>
                                    <?php
                                    $sql="select count(mahd) as tong from hopdongld";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    echo $row['tong'];
                                    ?>
                                </h3>
                                <h3>Hợp đồng LĐ</h3>
                            </div>
                            <div class="mnv2">
                                <img src="img/contract_100px.png">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- trang chức năng nhân viên -->
                <div class="m2">
                    <!-- các chức năng  -->
                    <div class="m2_header">
                       <!-- button thêm nhân viên -->
                       <div class="m2_them text-center">
                        <div class="form-group">
                            <a class="btn" data-toggle="collapse" data-target="#lissp1">Thêm nhân viên</a>
                        </div>
                    </div>
                    <!-- button sửa nhân viên -->
                    <div class="m2_sua text-center">
                        <div class="form-group">
                            <a class="btn" data-toggle="collapse" data-target="#lissp2">Sửa nhân viên</a>
                        </div>
                    </div>
                    <!-- button xóa nhân viên -->
                    <div class="m2_xoa text-center">
                        <div class="form-group">
                            <a class="btn" data-toggle="collapse" data-target="#lissp3">Xóa nhân viên</a>
                        </div>
                    </div>
                    <!-- button tìm kiếm -->
                    <div class="m2_timkiem text-center">
                        <div class="form-group">
                            <a class="btn bynsearch" data-toggle="collapse" data-target="#lissp4">Tìm kiếm</a>
                        </div>
                    </div>
                </div>
                <div class="m2_main">
                    <!--                            Them nhan vien-->
                    <div class="collapse" id="lissp1">
                        <form method="POST" action="home.php">
                            <br>
                            <div class="form-row form-group col-xl-12">
                                <input type="text" class="form-control" placeholder="Tên nhân viên" name="tennv" required>
                            </div>
                            <div class="form-row col-xl-12">
                                <div class="form-group col-xl-4">
                                    <input type="date" class="form-control" placeholder="Ngày sinh" name="ns" required>
                                </div>
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="Giới tính" name="gioitinh" required>
                                </div>
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="Chức vụ" name="chucvu" required>
                                </div>
                            </div>
                            <div class="form-row col-xl-12">
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="Lương" name="luong" required>
                                </div>
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="CMND" name="cmnd" required>
                                </div>
                                <div class="form-group col-xl-4">
                                    <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt" required>
                                </div>
                            </div>
                            <div class="form-row col-xl-12">
                                <div class="form-group col-xl-6">
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group col-xl-6">
                                    <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" required>
                                </div>
                            </div>
                            <div class="form-row form-group col-xl-12">
                                <div class="form-group col-xl-6">
                                    <input type="file" class="form-control" placeholder="Địa chỉ" name="hinhanh" required>
                                </div>
                                <div class="form-group col-xl-6">
                                    <select class="form-control" name="mpb">
                                        <?php
                                        $sql="select * from phongban";
                                        $result=$conn->query($sql);
                                        if($result->num_rows>0){
                                            while($row=$result->fetch_assoc()){
                                                ?>
                                                <option>
                                                    <?php echo $row['tenphongban'].'-'.$row['maphongban']; ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row form-group col-xl-12 text-center">
                                <input type="submit" value="Thêm nhân viên" name="btnthem">
                            </div>
                            <?php
                            if(isset($_POST['btnthem'])){
                                $tennv=$_POST['tennv'];
                                $ngaysinh=$_POST['ns'];
                                $gioitinh=$_POST['gioitinh'];
                                $chucvu=$_POST['chucvu'];
                                $luong=$_POST['luong'];
                                $cmnd=$_POST['cmnd'];
                                $sdt=$_POST['sdt'];
                                $email=$_POST['email'];
                                $diachi=$_POST['diachi'];
                                $hinhanh=$_POST['hinhanh'];
                                $mapb=$_POST['mpb'];
                                $n1=strstr($mapb,"-");;
                                $chuoi1=ltrim($n1, "-");
                                $sql1="INSERT INTO nhanvien(ten, ngaysinh, gioitinh, chucvu, luong, cmnd, sdt, email, diachi, hinhanh, maphongban)
                                VALUES ('$tennv','$ngaysinh','$gioitinh','$chucvu','$luong','$cmnd','$sdt','$email','$diachi','$hinhanh','$chuoi1');";
                                if($conn->query($sql1) ===true){
                                    echo '<script> window.alert("Thêm thành công"); </script>';
                                    unset($_POST['tennv']);
                                }
                                else{
                                    echo 'them that bai'.$conn->error;
                                }
                            }
                            ?>
                        </form>
                    </div>
                    <!--                            Sua nhan vien-->
                    <div class="collapse" id="lissp2">
                        <br>
                        <div class="form-group">
                            <div class="form-row form-group col-xl-12">
                                <input type="text" name="suanv" id="suanv" placeholder="Nhập tên nhân viên để sửa" class="form-control" />
                            </div>
                        </div>
                        <br>
                        <div id="formsuanv"></div>
                        <?php
                        if(isset($_POST['btnsua'])){
                            $manv1=$_POST['manv1'];
                            $tennv1=$_POST['tennv1'];
                            $ngaysinh1=$_POST['ns1'];
                            $gioitinh1=$_POST['gioitinh1'];
                            $chucvu1=$_POST['chucvu1'];
                            $luong1=$_POST['luong1'];
                            $cmnd1=$_POST['cmnd1'];
                            $sdt1=$_POST['sdt1'];
                            $email1=$_POST['email1'];
                            $diachi1=$_POST['diachi1'];
                            $hinhanh1=$_POST['hinhanh1'];
                            $mapb1=$_POST['phongban1'];
                            $sql="UPDATE nhanvien
                            SET ten='$tennv1', ngaysinh='$ngaysinh1', gioitinh='$gioitinh1',
                            chucvu='$chucvu1', luong='$luong1', cmnd='$cmnd1',
                            sdt='$sdt1', email='$email1', diachi='$diachi1',
                            hinhanh='$hinhanh1', maphongban='$mapb1'
                            WHERE manv='$manv1'";
                            if($conn->query($sql) === true){
                                echo '<script> window.alert("Cập nhật thành công") </script>';
                            }
                            else{
                                echo "Cập nhật thất bại".$conn->error;
                            }
                        }
                        ?>
                    </div>
                    <!--                            Xoa nhan vien-->
                    <div class="collapse" id="lissp3">
                        <br>
                        <form action="home.php" method="post">
                            <div class="form-row form-group col-xl-12">
                                <div class="form-group col-xl-10">
                                    <select class="form-control" name="tennvxoa">
                                        <?php
                                        $sql="select ten from nhanvien";
                                        $result=$conn->query($sql);
                                        if($result->num_rows>0){
                                            while($row=$result->fetch_assoc()){
                                                ?>
                                                <option>
                                                    <?php echo $row['ten']; ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-xl-2">
                                    <input type="submit" class="form-control" name="btnxoa" value="Xóa nhân viên">
                                </div>
                            </div>
                            <?php
                            if(isset($_POST['btnxoa'])){
                                $ten=$_POST['tennvxoa'];
                                $sql="delete from nhanvien where ten='$ten';";
                                $result=$conn->query($sql);
                                if($result === true){
                                    echo '<script> window.alert("Xóa thành công") </script>';
                                }
                                else{
                                    echo "Xoá thất bại".$conn->error;
                                }
                            }
                            ?>
                        </form>
                    </div>
                    <!-- tim kiem nhan vien-->
                    <div class="collapse" id="lissp4">
                        <br>
                        <div class="form-group">
                            <div class="input-group form-row col-xl-12">
                                <input type="text" name="search_text" id="search_text" placeholder="Nhập để tìm kiếm" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <div id="result"></div>

                        <br>
                    </div>
                    <!--  hien thi danh sach nhan vien-->
                    <div class="hienthi">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr style="font-size: 11px;">
                                    <th>Ảnh</th>
                                    <th>Tên nhân viên</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Chức vụ</th>
                                    <th>Lương</th>
                                    <th>CMND</th>
                                    <th>SDT</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Phòng ban</th>
                                </tr>
                            </thead>
                            <?php
                            $sql="SELECT nhanvien.ten, nhanvien.ngaysinh, nhanvien.gioitinh, nhanvien.chucvu, nhanvien.luong, nhanvien.cmnd,
                            nhanvien.sdt, nhanvien.email, nhanvien.diachi, nhanvien.hinhanh, phongban.tenphongban
                            FROM nhanvien, phongban WHERE nhanvien.maphongban=phongban.maphongban;";
                            $result = $conn->query($sql);
                            ?>
                            <tbody>
                                <?php
                                if($result->num_rows>0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr style="font-size: 11px;">
                                            <td>
                                                <img src="img/<?php echo $row['hinhanh']; ?>" style="width: 60px;">
                                            </td>
                                            <td><?php echo $row['ten']; ?></td>
                                            <td><?php echo $row['ngaysinh']; ?></td>
                                            <td><?php echo $row['gioitinh']; ?></td>
                                            <td><?php echo $row['chucvu']; ?></td>
                                            <td><?php echo $row['luong']; ?></td>
                                            <td><?php echo $row['cmnd']; ?></td>
                                            <td><?php echo $row['sdt']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['diachi']; ?></td>
                                            <td><?php echo $row['tenphongban']; ?></td>
                                        </tr>
                                    <?php }
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- trang chức năng của phòng ban -->
            <div class="m3">
                <!-- các chức năng  -->
                <div class="m3_header">
                   <!-- button thêm phòng ban -->
                   <div class="m3_them text-center">
                    <div class="form-group">
                        <a class="btn" data-toggle="collapse" data-target="#lissp01">Thêm phòng ban</a>
                    </div>
                </div>
                <!-- button sửa phòng ban -->
                <div class="m3_sua text-center">
                    <div class="form-group">
                        <a class="btn" data-toggle="collapse" data-target="#lissp02">Sửa phòng ban</a>
                    </div>
                </div>
            </div>
            <div class="m3_main">
                <!--Them phòng ban-->
                <div class="collapse" id="lissp01">
                    <form method="POST" action="home.php">
                        <br>
                        <div class="form-row form-group col-xl-12">
                            <input type="text" class="form-control" placeholder="Tên phòng ban" name="tenpb" required>
                        </div>
                        <div class="form-row col-xl-12">
                            <input type="text" class="form-control" placeholder="Số điện thoại" name="sdtpb" required>
                        </div>
                        <div class="form-group col-xl-12 text-center">
                            <br>
                            <input type="submit" value="Thêm phòng ban" name="btnthempb">
                        </div>
                        <?php
                        if(isset($_POST['btnthempb'])){
                            $tennv=$_POST['tenpb'];
                            $sdtpb=$_POST['sdtpb'];
                            $sql1="INSERT INTO phongban(tenphongban, sdt) VALUES ('$tennv','$sdtpb');";
                            if($conn->query($sql1) ===true){
                                echo '<script> window.alert("Thêm thành công"); </script>';
                            }
                            else{
                                echo 'Thêm thất bại'.$conn->error;
                            }
                        }
                        ?>
                    </form>
                </div>
                <!--Sửa phòng ban-->
                <div class="collapse" id="lissp02">
                    <br>
                    <div class="form-group">
                        <div class="form-row form-group col-xl-12">
                            <input type="text" name="suapb" id="suapb" placeholder="Nhập tên phòng ban để sửa" class="form-control" />
                        </div>
                    </div>
                    <br>
                    <div id="formsuapb"></div>
                    <?php
                    if(isset($_POST['btnsuapb'])){
                        $mapbs=$_POST['maps'];
                        $tenpbs=$_POST['tenphongbans'];
                        $sdtpb=$_POST['sdtpb']; 
                        $sql3="UPDATE phongban SET tenphongban='$tenpbs', sdt='$sdtpb' WHERE maphongban='$mapbs'";
                        if($conn->query($sql3) === true){
                            echo '<script> window.alert("Cập nhật thành công") </script>';
                        }
                        else{
                            echo "Cập nhật thất bại".$conn->error;
                        }
                    } 
                    ?>
                </div>
                <!--hien thi danh sach nhan vien-->
                <div class="hienthi">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr style="font-size: 13px;">
                                <th>Mã phòng ban</th>
                                <th>Tên phòng ban</th>
                                <th>Số điện thoại</th>
                            </tr>
                        </thead>
                        <?php
                        $sql="SELECT * FROM phongban;";
                        $result = $conn->query($sql);
                        ?>
                        <tbody>
                            <?php
                            if($result->num_rows>0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr style="font-size: 13px;">
                                        <td><?php echo $row['maphongban']; ?></td>
                                        <td><?php echo $row['tenphongban']; ?></td>
                                        <td><?php echo $row['sdt']; ?></td>
                                    </tr>
                                <?php }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- trang chức năng của hợp đồng lao động -->
        <div class="m4">
            <div class="m3_header">
               <!-- button thêm hợp đồng -->
               <div class="m3_them text-center">
                <div class="form-group">
                    <a class="btn" data-toggle="collapse" data-target="#lissp001">Thêm hợp đồng</a>
                </div>
            </div>
            <!-- button sửa phòng ban -->
            <div class="m3_sua text-center">
                <div class="form-group">
                    <a class="btn" data-toggle="collapse" data-target="#lissp002">Sửa hợp đồng</a>
                </div>
            </div>
        </div>
        <div class="m3_main">
            <!--Thêm hợp đồng-->
            <div class="collapse" id="lissp001">
                <form method="POST" action="home.php">
                    <br>
                    <div class="form-row form-group col-xl-12">
                        <select class="form-control" name="mnvien">
                            <?php
                            $sql="select * from nhanvien";
                            $result=$conn->query($sql);
                            if($result->num_rows>0){
                               while($row=$result->fetch_assoc()){
                                  ?>
                                  <option>
                                   <?php echo $row['ten'].'-'.$row['manv']; ?>
                               </option>
                               <?php
                           }
                       }
                       ?>
                   </select>
               </div>
               <div class="form-row form-group col-xl-12">
                <input type="text" class="form-control" placeholder="Loại hợp đồng" name="lhd" required>
            </div>
            <div class="form-row form-group col-xl-12">
                <input type="date" class="form-control" placeholder="Thời gian kí" name="tgki" required>
            </div>
            <div class="form-row col-xl-12">
                <input type="date" class="form-control" placeholder="Thời gian kết thúc" name="tgkt" required>
            </div>
            <div class="form-group col-xl-12 text-center">
                <br>
                <input type="submit" value="Thêm hợp đồng" name="btnthemhopdong">
            </div>
            <?php
            if(isset($_POST['btnthemhopdong'])){
                $manvi=$_POST['mnvien'];
                $n=strstr($manvi,"-");;
                $chuoi=ltrim($n, "-");
                $tgk=$_POST['tgki'];
                $tkkt=$_POST['tgkt'];
                $lhd=$_POST['lhd'];
                $sql1="INSERT INTO hopdongld(manv, loaihd, thoigianki, thoigiankt)
                VALUES ('$chuoi','$lhd','$tgk','$tkkt');";
                if($conn->query($sql1) ===true){
                    echo '<script> window.alert("Thêm thành công"); </script>';
                }
                else{
                    echo 'Thêm thất bại'.$conn->error;
                }
            }
            ?>
        </form>
    </div>
    <!-- Sửa hợp đồng-->
    <div class="collapse" id="lissp002">
        <br>
        <div class="form-group">
            <div class="form-row form-group col-xl-12">
                <input type="text" name="suahd" id="suahd" placeholder="Nhập hợp đồng cần sửa" class="form-control" />
            </div>
        </div>
        <br>
        <div id="formsuahd"></div>
        <?php
        if(isset($_POST['btnsuahd'])){
            $mahdd=$_POST['mahd'];
            $lhd=$_POST['lhdong'];
            $tgianki=$_POST['tgianki'];
            $tgiankt=$_POST['tgiankt']; 
            $sql3="UPDATE hopdongld SET loaihd='$lhd', thoigianki='$tgianki',
            thoigiankt='$tgiankt' WHERE mahd='$mahdd';";
            if($conn->query($sql3) === true){
                echo '<script> window.alert("Cập nhật thành công") </script>';
            }
            else{
                echo "Cập nhật thất bại".$conn->error;
            }
        } 
        ?>
    </div>
    <!-- hien thi hợp đồng nhân viên-->
    <div class="hienthi">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr style="font-size: 13px;">
                    <th>Mã hợp đồng</th>
                    <th>Tên nhân viên</th>
                    <th>Loại hợp đồng</th>
                    <th>Thời gian kí</th>
                    <th>Thời gian kết thúc</th>
                </tr>
            </thead>
            <?php
            $sql="SELECT hopdongld.mahd, nhanvien.ten,
            hopdongld.loaihd, hopdongld.thoigianki,
            hopdongld.thoigiankt FROM hopdongld, nhanvien
            where nhanvien.manv=hopdongld.manv;";
            $result = $conn->query($sql);
            ?>
            <tbody>
                <?php
                if($result->num_rows>0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr style="font-size: 13px;">
                            <td><?php echo $row['mahd']; ?></td>
                            <td><?php echo $row['ten']; ?></td>
                            <td><?php echo $row['loaihd']; ?></td>
                            <td><?php echo $row['thoigianki']; ?></td>
                            <td><?php echo $row['thoigiankt']; ?></td>
                        </tr>
                    <?php }
                }?>
            </tbody>
        </table>
    </div>
</div>                 
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="js/home.js"></script>
</body>
</html>
<!-- ajax xử lí tìm kiếm -->
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"timKiemNhanVien.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
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

<!-- ajax xử lí sửa nhân viên -->
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"suaNhanVien.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#formsuanv').html(data);
                }
            });
        }

        $('#suanv').keyup(function(){
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

<!-- ajax xử li sửa phòng ban -->
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"suaPhongBan.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#formsuapb').html(data);
                }
            });
        }

        $('#suapb').keyup(function(){
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
<!-- ajax xử lí sửa hợp đồng -->
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"suaHD.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#formsuahd').html(data);
                }
            });
        }
        $('#suahd').keyup(function(){
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
