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
		header("Location:../Error.php");
	}
	if($action=="xoa")
	{
		$idchuyenmuc = $_GET['idchuyenmuc'];
		$sql = "delete from chuyenmuc where idchuyenmuc='{$idchuyenmuc}'";
		mysqli_query($conn,$sql);
		header("Location: listchuyenmuc.php");
		echo "Xoa thành công";		
	}
	else
	{
		$idchuyenmuc = $_POST['idchuyenmuc'];		
		$tenchuyenmuc = $_POST['tenchuyenmuc'];
		$trangthai = $_POST['trangthai'];
		
		if ($action=="themmoi")
		{
			//Kiểm tra chuyên mục đã tồn tại chưa? Nếu chưa thì thêm vào csdl
			$sql = "insert into chuyenmuc (tenchuyenmuc, trangthai) values('{$tenchuyenmuc}','{$trangthai}')";
			$result = mysqli_query($conn,$sql) or die("Query: {$sql} <br> Error:". mysqli_error($conn));
			if(mysqli_affected_rows($conn)==1)
			{
			
				echo "Thêm mới thành công";
				header('Location: listchuyenmuc.php');
			}
				
			else
			{
				echo "Thêm mới không thành công. <br>";		
				echo "<a href = listchuyenmuc.php> Quay lại danh sách</a>";
			}
					
			
		}
		else	
		{
			//Cập nhật, lưu ý không cho phép đổi tên đăng nhập
			$sql = "update chuyenmuc set tenchuyenmuc='{$tenchuyenmuc}', trangthai='{$trangthai}' where idchuyenmuc = '{$idchuyenmuc}'";
			$result = mysqli_query($conn,$sql) or die("Query: {$sql} <br> Error:". mysqli_error($conn));
			if(mysqli_affected_rows($conn)==1)
			{
			
				echo "Cập  nhật thành công";
				header('Location: listchuyenmuc.php');
			}
				
			else
			{
				echo "Cậ nhật không thành công. <br>";		
				echo "<a href = listchuyenmuc.php> Quay lại danh sách</a>";
			}
		}
	}
	mysqli_close($conn);
	
	
?>
