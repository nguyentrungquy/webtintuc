<?php
		$conn = mysqli_connect('localhost','root','','tintuconline') or die('Không kết nối được với CSDL');
		
		if(mysqli_connect_errno())
		{
			echo 'Kết nối không thành công!';
			exit();			
		}
		else
		{
			mysqli_set_charset($conn,'utf-8');
		}		
?>
		
		
