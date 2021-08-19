<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data.xls");
header("Pragma: no-cache");
header("Expires: 0");
?> 
<meta charset="utf-8" /> 
<table>
	<thead>
		<tr>
			<td>Mã hợp đồng</td>
			<td>Tên nhân viên</td>
			<td>Loại hợp đồng</td>
			<td>Thời gian kí</td>
			<td>Thời gian kết thúc</td>
		</tr>
	</thead>
	<tbody>
	<?php 
		$conn=new mysqli('localhost','root','','qlnhanvien1');
		$sql="SELECT hopdongld.mahd, nhanvien.ten,
		hopdongld.loaihd, hopdongld.thoigianki,
		hopdongld.thoigiankt 
		FROM nhanvien, hopdongld
		WHERE nhanvien.manv=hopdongld.manv";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
			?> 
	    	<tr>
				<td><?php echo $row['mahd']?></td>
				<td><?php echo $row['ten']?></td>
				<td><?php echo $row['loaihd']?></td>
				<td><?php echo $row['thoigianki']?></td>
				<td><?php echo $row['thoigiankt']?></td>
			</tr>
		<?php }
		} ?>
	</tbody>
</table>