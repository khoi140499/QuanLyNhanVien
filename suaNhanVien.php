<?php
$connect = new mysqli("localhost", "root", "", "qlnhanvien1");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT * FROM nhanvien 
    WHERE ten LIKE '%".$search."%'
    OR gioitinh LIKE '%".$search."%' 
    OR ngaysinh LIKE '%".$search."%' 
    OR chucvu LIKE '%".$search."%' 
    OR luong LIKE '%".$search."%'
    ";
    $result = $connect->query($query);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {   
            $output .= '
            <div>
                <h4>Thông tin nhân viên</h4>
                <form method="POST" action="home.php">
                    <div class="form-row form-group col-xl-12">
                        <input type="text" readonly class="form-control" placeholder="Mã nhân viên" name="manv1" required value="'.$row['manv'].'">
                    </div>
                    <div class="form-row form-group col-xl-12">
                        <input type="text" class="form-control" placeholder="Tên nhân viên" name="tennv1" required value="'.$row['ten'].'">
                    </div>
                    <div class="form-row col-xl-12">
                        <div class="form-group col-xl-4">
                            <input type="date" class="form-control" placeholder="Ngày sinh" name="ns1" required value="'.$row['ngaysinh'].'">
                        </div>
                        <div class="form-group col-xl-4">
                            <input type="text" class="form-control" placeholder="Giới tính" name="gioitinh1" required value="'.$row['gioitinh'].'">
                        </div>
                        <div class="form-group col-xl-4">
                            <input type="text" class="form-control" placeholder="Chức vụ" name="chucvu1" required value="'.$row['chucvu'].'">
                        </div>
                    </div>
                    <div class="form-row col-xl-12">
                        <div class="form-group col-xl-4">
                            <input type="text" class="form-control" placeholder="Lương" name="luong1" required value="'.$row['luong'].'">
                        </div>
                        <div class="form-group col-xl-4">
                            <input type="text" class="form-control" placeholder="CMND" name="cmnd1" required value="'.$row['cmnd'].'">
                        </div>
                        <div class="form-group col-xl-4">
                            <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt1" required value="'.$row['sdt'].'">
                        </div>
                    </div>
                    <div class="form-row col-xl-12">
                        <div class="form-group col-xl-6">
                            <input type="text" class="form-control" placeholder="Email" name="email1" required value="'.$row['email'].'">
                        </div>
                        <div class="form-group col-xl-6">
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi1" required value="'.$row['diachi'].'">
                        </div>
                    </div>
                    <div class="form-row form-group col-xl-12">
                        <div class="form-group col-xl-6">
                            <input type="file" class="form-control" placeholder="Địa chỉ" name="hinhanh1" required value="'.$row['hinhanh'].'">
                        </div>
                        <div class="form-group col-xl-6">
                            <input type="text" class="form-control" placeholder="Mã phòng ban" name="phongban1" required value="'.$row['maphongban'].'">
                        </div>
                    </div>
                <div class="form-row form-group col-xl-12 text-center">
                    <input type="submit" value="Sửa nhân viên" name="btnsua">
                </div>
                </form>
            </div>
            ';
        }
        echo $output;
    }
    else
    {
        echo 'Nhập sai nhập lại';
    }
}   
?>

