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
			<td>Mã phòng ban</td>
			<td>Tên phòng ban</td>
			<td>Số điện thoại</td>
		</tr>
	</thead>
	<tbody>
	<?php 
		$conn=new mysqli('localhost','root','','qlnhanvien1');
		$sql="select * from phongban";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
			?> 
	    	<tr>
				<td><?php echo $row['maphongban']?></td>
				<td><?php echo $row['tenphongban']?></td>
				<td><?php echo $row['sdt']?></td>
			</tr>
		<?php }
		} ?>
	</tbody>
</table>