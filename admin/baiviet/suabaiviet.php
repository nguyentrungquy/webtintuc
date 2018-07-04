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
	$idbaiviet = $_GET['idbaiviet'];
	$baiviet = mysqli_query($conn, "Select * from baiviet where idbaiviet='{$idbaiviet}'");
	$row = mysqli_fetch_array($baiviet,MYSQLI_BOTH);
	$chuyenmuc = mysqli_query($conn, "Select * from chuyenmuc");
	
?>
<div id="content">
	<div class="formbaiviet">
		<p class="titleform"> SỬA BÀI VIẾT </p>	
			<table cellspacing="5px" border="0" width="100%">
			<form action="xulybaiviet.php?action=sua" method="post" enctype="multipart/form-data">
				<input type="hidden" name="idbaiviet" value="<?php echo $row['idbaiviet'];?>">
				<tr class="formLabel">
					<td width="20%">Chuyên mục</td>
					<td width="80%"> 
						<select name = "idchuyenmuc">
						<?php
							while($r =  mysqli_fetch_array($chuyenmuc,MYSQLI_BOTH))
								if ($r['idchuyenmuc']==$row['idchuyenmuc'])
									echo "<option selected='selected' value= {$r['idchuyenmuc']}> {$r['tenchuyenmuc']}</option>";
								else
									echo "<option value= {$r['idchuyenmuc']}> {$r['tenchuyenmuc']}</option>";		
						?>
						</select>
					</td>
				</tr>
				<tr class="formLabel">
					<td> Tiêu đề </td>
					<td>	<input type="text" name="tenbaiviet" value="<?php echo $row['tenbaiviet'];?>" size="100"> </td>
				</tr>
				<tr class="formLabel">
					<td colspan="2">
						 Tóm tắt 
					 </td>
				</tr>
				<tr class="formLabel">
					 <td colspan="2">				 
						<textarea name="tomtat" cols="180" rows="5" value=""> <?php echo $row['tomtat'];?></textarea>
					 </td>
				</tr>
				<tr class="formLabel">
					<td colspan="2"> Nội dung </td>
				</tr>
				<tr class="formLabel">
					<td colspan="2">
						<textarea name="noidung" cols="180" rows="20" value=""><?php echo $row['noidung'];?></textarea>
					</td>
				</tr>
				<tr class="formLabel">
					<td> </td>
					<td></td>
				</tr>
				<tr class="formLabel">
					<td> Ảnh minh họa:<input type="text" name="anhcu" size="15" value="<?php echo $row['anh'];?>"> </td>
					<td><input type="file" name="img" value=""></td>
				</tr>				
				<tr class="formLabel">
					<td> Trạng thái </td>
					<td>
					
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
				<td><input type="submit" value="     Cập nhật   "> 	</td>
			</tr>
			</form>
		</table>		
	
	</div>
	
</div>
<?php	
	mysqli_close($conn);	
?>
</div>
</body>
</html>
