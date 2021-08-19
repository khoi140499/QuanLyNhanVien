<?php
$connect = new mysqli("localhost", "root", "", "qlnhanvien1");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT * FROM phongban 
    WHERE tenphongban LIKE '%".$search."%'
    OR sdt LIKE '%".$search."%' 
    ";
    $result = $connect->query($query);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {   
            $output .= '
            <div>
                <h4>Thông tin phòng ban</h4>
                <form method="POST">
                    <div class="form-row form-group col-xl-12">
                        <input readonly type="text" class="form-control" placeholder="mã phòng ban" name="maps" required value="'.$row['maphongban'].'">
                    </div>
                    <div class="form-row form-group col-xl-12">
                        <input type="text" class="form-control" placeholder="Tên phòng ban" name="tenphongbans" required value="'.$row['tenphongban'].'">
                    </div>
                    <div class="form-row col-xl-12">
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="sdtpb" required value="'.$row['sdt'].'">
                    </div>
                <br>
                <div class="form-row form-group col-xl-12 text-center">
                    <input type="submit" value="Sửa phòng ban" name="btnsuapb">
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

