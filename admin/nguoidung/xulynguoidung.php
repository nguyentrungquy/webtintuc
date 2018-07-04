<?php
	require("../modules/checklogin.php");
?>
<?php
	require("../modules/connectdb.php");
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}
	else
	{
		header("../Error.php");
	}
	if($action=="xoa")
	{
		$tendangnhap = $_GET['tendangnhap'];
		$sql = "delete from nguoidung where tendangnhap='{$tendangnhap}'";
		mysqli_query($conn,$sql);
		header("listuser.php");
		echo "Xoa thành công";
		header('Location: listuser.php');
	}
	else
	{
		$tendangnhap = $_POST['tendangnhap'];
		$matkhau = $_POST['matkhau'];
		$vaitro = $_POST['vaitro'];
		$hoten = $_POST['hoten'];
		$ngaysinh = $_POST['ngaysinh'];
		$gioitinh = $_POST['gioitinh'];
		$email = $_POST['email'];
		$trangthai = $_POST['trangthai'];
		
		if ($action=="themmoi")
		{
			//Kiểm tra người dùng đã tồn tại chưa? Nếu chưa thì thêm vào csdl
			$sql = "insert into nguoidung (tendangnhap, matkhau, vaitro, hoten, ngaysinh, gioitinh, email, trangthai)";
			$sql = $sql." values('{$tendangnhap}', '{$matkhau}','{$vaitro}','{$hoten}','{$ngaysinh}','{$gioitinh}','{$email}','{$trangthai}')";
			$result = mysqli_query($conn,$sql) or die("Query: {$sql} <br> Error:". mysqli_error($conn));
			if(mysqli_affected_rows($conn)==1)
				echo "Thêm mới thành công";
			else
				echo "Thêm mới không thành công";
			
			header('Location: listuser.php');
		}
		else	
		{
			//Cập nhật, lưu ý không cho phép đổi tên đăng nhập
			$sql = "update nguoidung set  matkhau ='{$matkhau}', vaitro='{$vaitro}', hoten='{$hoten}', ngaysinh='{$ngaysinh}', gioitinh='{$gioitinh}', email='{$email}', trangthai='{$trangthai}' where tendangnhap = '{$tendangnhap}'";
			mysqli_query($conn,$sql);
			header('Location: listuser.php');
		}
	}
	mysqli_close($conn);
	
	
?>
