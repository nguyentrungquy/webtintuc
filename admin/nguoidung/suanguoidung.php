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
	$tendangnhap = $_GET['tendangnhap'];
	$nguoidung = mysqli_query($conn, "Select * from nguoidung where tendangnhap='{$tendangnhap}'");
	$row = mysqli_fetch_array($nguoidung,MYSQLI_BOTH);
	
?>
<div id="content">
	<div class="form">
		<p class="titleform"> CẬP NHẬT THÔNG TIN NGƯỜI DÙNG </p>	
		<table cellspacing="5px" border="0">
			<form action="xulynguoidung.php?action=sua" method="post">
			<tr class="formLabel">
				<td width="150">Tên đăng nhập</td>
				<td width="200" align="left"> <font color="#FF0000"> <?php echo $row['tendangnhap'];?></font>     
					<input type="hidden" name="tendangnhap" value="<?php echo $row['tendangnhap'];?>" size="50">
				</td>
			</tr>
			<tr class="formLabel">
				<td>Mật khẩu</td>
				<td align="left"><input type="password" name="matkhau" value="<?php echo $row['matkhau'];?>" size="30"></td>
			</tr>
			<tr class="formLabel">
				<td>Vai trò</td>
				<td align="left"><select name="vaitro">
					<?php 
						if($row['vaitro']=="Admin")
						{
							echo "<option value='admin' selected='selected'> Admin</option>";
							echo "<option value='Phóng viên'> Phóng viên</option>";
						}
						else
						{
							echo "<option value='admin' > Admin</option>";
							echo "<option value='Phóng viên' selected='selected'> Phóng viên</option>";
						}
									
					 ?>		
					</select>
				</td>
			</tr>
			<tr class="formLabel">
				<td>Họ tên</td>
				<td align="left"><input type="text" name="hoten" value="<?php echo $row['hoten'];?>" size="50"></td>
			</tr>
			<tr class="formLabel">
				<td> Ngày sinh</td>
				<td align="left"><input type="text" name="ngaysinh" value="<?php echo $row['ngaysinh'];?>" size="30"></td>
			</tr>
			<tr class="formLabel">
				<td> Giới tính</td>
				<td align="left">
					<select name="gioitinh">
					<?php 
						if($row['gioitinh']=="Nam")
						{
							echo "<option value='Nam' selected='selected'> Nam</option>";
							echo "<option value='Nữ'> Nữ</option>";
						}
						else
						{
							echo "<option value='Nam' > Nam</option>";
							echo "<option value='Nữ' selected='selected'> Nữ</option>";
						}
					?>
											
					</select>
				</td>
			</tr>
			<tr class="formLabel">
				<td> Email </td>
				<td align="left"><input type="text" name="email" value="<?php echo $row['email'];?>" size="50"></td>
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
		<p>  Chú ý: Hệ thống không cho phép thay đổi tên đăng nhập</p>
	</div>
	
</div>
<?php	
	mysqli_close($conn);
	
?>
</div>
</body>
</html>
