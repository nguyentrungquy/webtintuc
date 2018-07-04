<?php
	require("../modules/connectdb.php");
	$tendangnhap = $_REQUEST['tendangnhap']; //or $_GET["q"];
	$sql = "Select count(*) as songuoidung from nguoidung where tendangnhap='$tendangnhap'";
	$count = mysqli_query($conn, $sql);
	$result = mysqli_fetch_array($count, MYSQLI_BOTH);
	$songuoidung = $result['songuoidung'];
	if($songuoidung==0)
	   echo "<font color=blue>good</font>";
	 else
	 	echo "<font color=red>Tên đăng nhập đã có</font>";
?>
