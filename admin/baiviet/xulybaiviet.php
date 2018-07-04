<?php
	require("../modules/checklogin.php");
?>
<?php	
	session_start();
	require("../modules/connectdb.php");
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}
	else
	{
		header("Location:../error.php");
	}
	if($action=="xoa")
	{
		$idbaiviet = $_GET['idbaiviet'];
		$sql = "delete from baiviet where idbaiviet='{$idbaiviet}'";
		mysqli_query($conn,$sql);		
		echo "Xóa thành công";
		header('Location: listbaiviet.php');
	}
	else
	{		
		$idchuyenmuc = $_POST['idchuyenmuc'];
		$tenbaiviet = $_POST['tenbaiviet'];
		$tomtat = $_POST['tomtat'];
		$noidung = $_POST['noidung'];
		if (isset($_FILES['img']) &&  $_FILES['img']['tmp_name']!=NULL)
			$anh = $_FILES['img']['name'];
		else
			$anh = $_POST['anhcu'];	
		
		if ($action=="themmoi")
		{
			//Kiểm tra người dùng đã tồn tại chưa? Nếu chưa thì thêm vào csdl
			$sql = "insert into baiviet (idchuyenmuc,tenbaiviet, tomtat, noidung, anh, idtacgia, trangthai)";
			$sql = $sql." values('{$idchuyenmuc}', '{$tenbaiviet}','{$tomtat}','{$noidung}','{$anh}','{$_SESSION['tendangnhap']}','inactive')";
			$result = mysqli_query($conn,$sql) or die("Query: {$sql} <br> Error:". mysqli_error($conn));
			
			if(mysqli_affected_rows($conn)==1)
				echo "Thêm mới thành công!";
			else
				echo "Thêm mới không thành công!";
				
			if ($_FILES['img']['tmp_name']!=NULL)
			{
				if ($_FILES['img']['error'] > 0)
				{
					echo 'File Upload Bị Lỗi';
				}
				else{
					// Upload file
					move_uploaded_file($_FILES['img']['tmp_name'], "../../images/{$_FILES['img']['name']}");
					echo 'File Uploaded';
				}
			}
			
			
			header('Location: listbaiviet.php');
		}
		else	
		{
			//Cập nhật, lưu ý không cho phép đổi tên đăng nhập
			$idbaiviet = $_POST['idbaiviet'];
			$sql = "update baiviet set  idchuyenmuc ='{$idchuyenmuc}', tenbaiviet='{$tenbaiviet}', tomtat='{$tomtat}', noidung='{$noidung}', anh='{$anh}' where idbaiviet = '{$idbaiviet}'";
			$result = mysqli_query($conn,$sql) or die("Query: {$sql} <br> Error:". mysqli_error($conn));
			if(mysqli_affected_rows($conn)==1)
				echo "Cập nhật thành công";
			else
				echo "Cập nhật không thành công";
			
			if (isset($_FILES['img']) && $_FILES['img']['tmp_name']!=NULL) 
			{
				if ($_FILES['img']['error'] > 0)
				{
					echo 'File Upload Bị Lỗi';
				}
				else{
					// Upload file
					move_uploaded_file($_FILES['img']['tmp_name'], "../../images/{$_FILES['img']['name']}");
					echo 'File Uploaded';
				}
			}
			
			
			header('Location: listbaiviet.php');
		}
	}
	mysqli_close($conn);
	
	
?>
