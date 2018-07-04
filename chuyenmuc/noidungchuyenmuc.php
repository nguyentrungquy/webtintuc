
<?php
	$idchuyenmuc = $_GET['idchuyenmuc'];
	$chuyenmuc = mysqli_query($conn, "Select idchuyenmuc,tenchuyenmuc from chuyenmuc order by idchuyenmuc ASC");
	$row = mysqli_fetch_array($chuyenmuc,MYSQLI_BOTH);
	
	$baiviet = mysqli_query($conn, "Select idbaiviet,tenbaiviet,tomtat,anh from baiviet where idchuyenmuc=$idchuyenmuc order by idbaiviet DESC Limit 4");
	$r = mysqli_fetch_array($baiviet,MYSQLI_BOTH);
?>

<div class='box no-border' style="margin-top:10px;">
	
	<div class="box-left">
		<img src="../images/<?php echo $r['anh'];?> " />
		<a href="../chitietbaiviet/index.php?idbaiviet=<?php echo $r['idbaiviet'];?>" ><p class="Tieudetin"> <?php echo $r['tenbaiviet'];?></p> </a>
		<p class="Tomtattin"><?php echo $r['tomtat'];?>
		</p>
	</div>	
	<?php
		 while($r = mysqli_fetch_array($baiviet,MYSQLI_BOTH))
		 {
		
			echo "<div class='box-right border-bottom'>";
			echo "<img src='../images/{$r['anh']}' style='margin-right:5px;' />";
			echo "<a href='../chitietbaiviet/index.php?idbaiviet={$r['idbaiviet']}' <p class='Noidungtin' style='padding-top:0px;'>{$r['tenbaiviet']}</p> </a>";				
			echo "</div>";	
		 }
	?>
	<div class="clear"></div>
</div>

