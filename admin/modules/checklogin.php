<?php	
	session_start();    
	if(!isset($_SESSION['tendangnhap']))
	{
		header("Location: ../login.php");
		exit();
	}
?>
