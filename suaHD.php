<?php
$connect = new mysqli("localhost", "root", "", "qlnhanvien1");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT hopdongld.mahd, nhanvien.ten,
    hopdongld.loaihd, hopdongld.thoigianki,
    hopdongld.thoigiankt FROM hopdongld,
    nhanvien WHERE nhanvien.manv=hopdongld.manv 
    AND nhanvien.ten LIKE '%".$search."%'
    OR loaihd LIKE '%".$search."%'
    OR thoigianki LIKE'%".$search."%'
    OR thoigiankt LIKE '%".$search."%'; 
    ";
    $result = $connect->query($query);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {   
            $output .= '
            <div>
                <h4>Thông tin hợp đồng</h4>
                <form method="POST">
                    <div class="form-row form-group col-xl-12">
                        <input readonly type="text" readonly class="form-control" placeholder="mã hợp đồng" name="mahd" required value="'.$row['mahd'].'">
                    </div>
                    <div class="form-row form-group col-xl-12">
                        <input type="text" class="form-control" readonly placeholder="Tên nhân viên" name="tennvhd" required value="'.$row['ten'].'">
                    </div>
                    <div class="form-group form-row col-xl-12">
                        <input type="text" class="form-control" placeholder="Loại hợp đồng" name="lhdong" required value="'.$row['loaihd'].'">
                    </div>
                    <div class="form-row form-group col-xl-12">
                        <input type="date" class="form-control" placeholder="Thời gian kí" name="tgianki" required value="'.$row['thoigianki'].'">
                    </div>
                    <div class="form-row col-xl-12">
                        <input type="date" class="form-control" placeholder="Thời giann kết thúc" name="tgiankt" required value="'.$row['thoigiankt'].'">
                    </div>
                <br>
                <div class="form-row form-group col-xl-12 text-center">
                    <input type="submit" value="Sửa hợp đồng" name="btnsuahd">
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

