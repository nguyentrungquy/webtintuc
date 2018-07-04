<?php
	$idbaiviet = $_GET['idbaiviet'];
	$baiviet = mysqli_query($conn, "Select idbaiviet,tenbaiviet,tomtat,noidung, anh from baiviet where idbaiviet={$idbaiviet}");
	$row = mysqli_fetch_array($baiviet, MYSQLI_BOTH);	
	mysqli_query($conn, "update baiviet set soluotdoc=soluotdoc+1 where idbaiviet={$idbaiviet}");
?>
<div id="content-left">
	<div class="box no-border">		
		<p class='Tieudetin'> <?php echo $row['tenbaiviet'];?> </p> 
		<p class="tomtattin-chitiet"><?php echo $row['tomtat']; ?>	</p>
		<br />
		<center><img src="../images/<?php echo $row['anh']; ?>"/></center>
		<br />			
		<p class='noidungbaiviet'> <?php echo $row['noidung'] ?> </p>		
	</div>
</div> <!--End div content-left -->