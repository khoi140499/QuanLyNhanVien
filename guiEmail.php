<?php
$connect = new mysqli("localhost", "root", "", "qlnhanvien1");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT * FROM nhanvien 
    WHERE ten LIKE '%".$search."%'";
    $result = $connect->query($query);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {   
            $output = '
            <div>
                <form method="POST" accept-charset=”utf-8” id="fm">
                    <div class="form-row form-group col-xl-12">
                        <h4 style="color: white;">Thông tin email</h4>
                    </div>
                    <div class="form-row form-group col-xl-12">
                        <input type="text" class="form-control" placeholder="Tiêu đề Email" name="tieude" required value="">
                    </div>
                    <div class="form-row form-group col-xl-12">
                        <input type="text" class="form-control" placeholder="Nội dung Email" name="ndemail" required value="">
                    </div>
                    <div class="form-row col-xl-12">
                        <div class="form-group col-xl-12">
                            <input type="text" class="form-control" placeholder="Tên nhân viên" name="tnv" required value="'.$row['ten'].'">
                        </div>
                    </div>
                    <div class="form-row col-xl-12">
                        <div class="form-group col-xl-12">
                            <input type="text" class="form-control" placeholder="Email" name="em" required value="'.$row['email'].'">
                        </div>
                    </div>
                <div class="form-row form-group col-xl-12 text-center">
                    <input type="submit" value="Gửi email" class="btn btn-primary" name="btnguiemail">
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

