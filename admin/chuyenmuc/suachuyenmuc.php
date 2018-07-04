<?php
	require("../modules/checklogin.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quan tri trang tin tuc online</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<div id="wrapper">
<body bgcolor="#F4F4F4">
<?php
	require("../modules/connectdb.php");
	$idchuyenmuc = $_GET['idchuyenmuc'];
	$chuyenmuc = mysqli_query($conn, "Select * from chuyenmuc where idchuyenmuc='{$idchuyenmuc}'");
	$row = mysqli_fetch_array($chuyenmuc,MYSQLI_BOTH);
	
?>
<div id="content">
	<div class="form">
		<p class="titleform"> CẬP NHẬT THÔNG TIN CHUYÊN MỤC </p>	
		<table cellspacing="5px" border="0">
			<form action="xulychuyenmuc.php?action=sua" method="post">
			<tr class="formLabel">
				<td width="150">ID</td>
				<td width="200" align="left"> <font color="#FF0000"> <?php echo $row['idchuyenmuc'];?></font>     
					<input type="hidden" name="idchuyenmuc" value="<?php echo $row['idchuyenmuc'];?>" size="50">
				</td>
			</tr>			
			<tr class="formLabel">
				<td>Họ tên</td>
				<td align="left"><input type="text" name="tenchuyenmuc" value="<?php echo $row['tenchuyenmuc'];?>" size="50"></td>
			</tr>			
			<tr class="formLabel">
				<td> Trạng thái</td>
				<td align="left">
					<select name="trangthai">
					<?php 
						if($row['trangthai']=="active")
						{			
							echo "<option value='active' selected='selected' > Active</option>";
							echo "<option value='inactive'> Inactive</option>";
						}
						else
						{
							echo "<option value='active' > Active</option>";
							echo "<option value='inactive' selected='selected'> Inactive</option>";
						}
							
					?>				
					</select>
				</td>
			</tr>
			<tr class="formLabel">
				<td></td>	
				<td> <input type="submit" value="     Cập nhật   "> </td>		
				
			</tr>
			</form>	
		</table>
		<br>
		<p>  Chú ý: Hệ thống không cho phép thay đổi ID</p>
	</div>
	
</div>
<?php	
	mysqli_close($conn);
	
?>
</div>
</body>
</html>
