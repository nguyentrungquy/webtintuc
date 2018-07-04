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

<div id="content">
	<div class="form">
		<p class="titleform"> THÊM MỚI CHUYÊN MỤC </p>	
		<table cellspacing="5px" border="0">
			<form action="xulychuyenmuc.php?action=themmoi" method="post">
			<tr class="formLabel">
				<td width="150">Tên chuyên mục</td>
				<td width="200" align="left"><input type="text" name="tenchuyenmuc" value="" size="30"></td>
			</tr>			
			<tr class="formLabel">
				<td> Trạng thái</td>
				<td align="left">
					<select name="trangthai">
						<option value="active"> Active</option>
						<option value="inactive"> Inactive</option>					
					</select>
				</td>
			</tr>
			<tr class="formLabel">
				<td></td>	
				<td> <input type="submit" value="     Thêm   "> </td>		
				
			</tr>
			</form>	
		</table>
	</div>
</div>
<?php	
	
	require("../modules/footer.php");
?>
