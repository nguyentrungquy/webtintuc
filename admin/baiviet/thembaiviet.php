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
	$chuyenmuc = mysqli_query($conn, "Select * from chuyenmuc");
	
?>
<div id="content">
	<div class="formbaiviet">
		<p class="titleform"> THÊM MỚI BÀI VIẾT </p>	
			<table cellspacing="5px" border="0" width="100%">
			<form action="xulybaiviet.php?action=themmoi" method="post" enctype="multipart/form-data">				
				<tr class="formLabel">
					<td width="20%">Chuyên mục</td>
					<td width="80%"> 
						<select name = "idchuyenmuc">
						<?php
							while($r = mysqli_fetch_array($chuyenmuc,MYSQLI_BOTH))								
								echo "<option value= {$r['idchuyenmuc']}> {$r['tenchuyenmuc']}</option>";		
						?>
						</select>
					</td>
				</tr>
				<tr class="formLabel">
					<td> Tiêu đề </td>
					<td>	<input type="text" name="tenbaiviet" value="" size="100" > </td>
				</tr>
				<tr class="formLabel">
					<td colspan="2">
						 Tóm tắt 
					 </td>
				</tr>
				<tr class="formLabel">
					 <td colspan="2">				 
						<textarea name="tomtat" cols="140" rows="5" value=""> </textarea>
					 </td>
				</tr>
				<tr class="formLabel">
					<td colspan="2"> Nội dung </td>
				</tr>
				<tr class="formLabel">
					<td colspan="2">
						<textarea name="noidung" cols="140" rows="20" value=""></textarea>
					</td>
				</tr>
				<tr class="formLabel">
					<td> </td>
					<td></td>
				</tr>
				<tr class="formLabel">
					<td> Ảnh minh họa:</td>
					<td><input type="file" name="img" value=""></td>
				</tr>			
				
			<tr class="formLabel">
				<td><input type="submit" value="     Thêm mới   "> 	</td>
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
