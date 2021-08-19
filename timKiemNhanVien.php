<?php
$connect = new mysqli("localhost", "root", "", "qlnhanvien1");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT nhanvien.ten, nhanvien.ngaysinh,
           nhanvien.gioitinh, nhanvien.chucvu,
           nhanvien.luong, nhanvien.cmnd,
           nhanvien.sdt, nhanvien.email,
           nhanvien.diachi, nhanvien.hinhanh,
           phongban.tenphongban
    FROM nhanvien, phongban
    WHERE nhanvien.maphongban=phongban.maphongban
    AND nhanvien.ten LIKE '%".$search."%'
    ";
    $result = $connect->query($query);
if($result->num_rows > 0)
{
    $output .= '<div class="table-responsive">
    <table class="table table-hover">
    <thead class="thead-dark">
        <tr style="font-size: 11px;">
            <th>Ảnh</th>
            <th>Tên nhân viên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Chức vụ</th>
            <th>Lương</th>
            <th>CMND</th>
            <th>SDT</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Phòng ban</th>
        </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc())
    {
        $output .= '
        <tr style="font-size: 11px;">
            <td> <img src="img/'.$row["hinhanh"].'" style="width: 60px;"></td>
            <td>'.$row["ten"].'</td>
            <td>'.$row["gioitinh"].'</td>
            <td>'.$row["ngaysinh"].'</td>
            <td>'.$row["chucvu"].'</td>
            <td>'.$row["luong"].'</td>
            <td>'.$row["cmnd"].'</td>
            <td>'.$row["sdt"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["diachi"].'</td>
            <td>'.$row["tenphongban"].'</td>
        </tr>
    </tbody>';
    }
    echo $output;
}
else
{
    echo 'Không có kết quả phù hợp';
}
}

?>