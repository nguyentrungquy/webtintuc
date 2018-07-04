<?php
    session_start();
    //session_register("tendangnhap");
	//session_register("matkhau");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>		
	
	<div class="form-bg">
		<form action="" method="post">
			<h2><center> Đăng nhập </center> </h2>
			<p><input type="text" name="tendangnhap" placeholder="Tên đăng nhập" value="<?php if(isset($_COOKIE['tendangnhap'])) echo $_COOKIE['tendangnhap']; ?>"></p>
				<p><input type="password" name="matkhau" placeholder="Mật khẩu" value="<?php if(isset($_COOKIE['matkhau'])) echo $_COOKIE['matkhau']; ?>"></p>
			<label for="remember">
			  <input type="checkbox" checked name="remember" value="remember" />
			  <span>Nhớ tên đăng nhập và mật khẩu</span>
			</label>
			<br>
			<button type="submit"></button>
		</form>
	</div>	
	<?php
		require("modules/connectdb.php");
		if(isset($_POST['tendangnhap']) && isset($_POST['matkhau']))
		{
			$nguoidung = mysqli_query($conn,"Select tendangnhap, matkhau, vaitro from nguoidung where tendangnhap='{$_POST['tendangnhap']}' and matkhau='{$_POST['matkhau']}'");
			$row = mysqli_fetch_array($nguoidung, MYSQLI_BOTH);
			if(isset($row['tendangnhap']))
			{			
				//echo 	$row['tendangnhap'];
				$_SESSION['tendangnhap']=$_POST['tendangnhap'];
				$_SESSION['matkhau']=$_POST['matkhau'];	
				$_SESSION['vaitro']= $row['vaitro'];	
				if(isset($_POST['remember']))
				{
					setcookie("tendangnhap",$_POST['tendangnhap']);
					setcookie("matkhau",$_POST['matkhau']);
				}
				else
				{
					setcookie("tendangnhap");
					setcookie("matkhau");
				}
				header("Location: home/index.php");
			}
			else
			{
				echo "<div class='pw-wrong'> <h3> Sai tên đăng nhập hoặc mật khẩu</h3></div>"; 
			}		 
		}
		else
		{
			session_unset();
		}		 
		
	
	?>	
</body>
</html>