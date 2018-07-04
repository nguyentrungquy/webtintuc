<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quan tri trang tin tuc online</title>
<link rel="stylesheet" href="../css/style.css">
<script >
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
				//document.getElementsByTagName("abc").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "checkUsername.php?tendangnhap=" + str, true);
        xmlhttp.send();
    }
}
function CheckForm(){
	if(document.forms[0].tendangnhap.value =="")
		alert("Hay nhap ten dang nhap");
	else
		document.forms[0].submit();		

}
</script>
</head>
<div id="wrapper">
<body bgcolor="#F4F4F4">

<div id="content">

	<div class="form">
		<p class="titleform"> THÊM MỚI NGƯỜI DÙNG </p>	
		<table cellspacing="5px" border="0">
			<form action="xulynguoidung.php?action=themmoi" method="post">
			<tr class="formLabel">
				<td width="150">Tên đăng nhập</td>
				<td width="200" align="left"><input type="text" name="tendangnhap" onkeyup="showHint(this.value)" value="" size="30" id="tendangnhap"> <span name="abc" id="txtHint"></span></td>
			</tr>
			<tr class="formLabel">
				<td>Mật khẩu</td>
				<td align="left"><input type="password" name="matkhau" value="" size="30"></td>
			</tr>
			<tr class="formLabel">
				<td>Vai trò</td>
				<td align="left"><select name="vaitro">
						<option value="Admin"> Admin</option>
						<option value="Phóng viên"> Phóng viên</option>					
					</select>
				</td>
			</tr>
			<tr class="formLabel">
				<td>Họ tên</td>
				<td align="left"><input type="text" name="hoten" value="" size="50"></td>
			</tr>
			<tr class="formLabel">
				<td> Ngày sinh</td>
				<td align="left"><input type="text" name="ngaysinh" value="" size="30"></td>
			</tr>
			<tr class="formLabel">
				<td> Giới tính</td>
				<td align="left">
					<select name="gioitinh">
						<option value="Nam"> Nam</option>
						<option value="Nữ"> Nữ</option>					
					</select>
				</td>
			</tr>
			<tr class="formLabel">
				<td> Email </td>
				<td align="left"><input type="text" name="email" value="" size="50"></td>
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
				<td> <input type="button" value="     Thêm   " onClick="CheckForm();"> </td>
			</tr>
			</form>	
		</table>
	</div>
</div> <!-- end div content -->
<?php
	require("../modules/footer.php");
?>
