<?php
	$tinmoinhat = mysqli_query($conn, "Select idbaiviet,tenbaiviet,tomtat,noidung, anh from baiviet order by idbaiviet DESC Limit 1");
	$row = mysqli_fetch_array($tinmoinhat, MYSQLI_BOTH);
	$tinnoibat = mysqli_query($conn, "Select idbaiviet,tenbaiviet,tomtat from baiviet order by idbaiviet DESC Limit 6");
	
?>

<div id="content-left">
		<div class="box">
			<div class="box-left">
				<img src="images/<?php echo $row['anh']; ?>"/>
				
				<?php echo "<a href='chitietbaiviet/index.php?idbaiviet={$row['idbaiviet']}'> <p class='Tieudetin'> {$row['tenbaiviet']} </p> </a>"?>
				
				<p class="Tomtattin"><?php echo $row['tomtat']; ?>	</p>
			</div>
			<div class="box-right">
				<div class="box-right-news">
					<p class="Tinmoi" align="center"> TIN MỚI </p>
				</div>
				<div style="margin-top:10px">
					<ul>
					<?php 
						 while ($rows = mysqli_fetch_array($tinnoibat, MYSQLI_BOTH))
						 	echo " <li><a href='chitietbaiviet/index.php?idbaiviet={$rows['idbaiviet']}'> {$rows['tenbaiviet']} </a></li>"; 
					?>						
					</ul>				
				
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?php
	$chuyenmuc = mysqli_query($conn, "Select idchuyenmuc,tenchuyenmuc from chuyenmuc order by idchuyenmuc ASC");
	while($row = mysqli_fetch_array($chuyenmuc,MYSQLI_BOTH))
	{
		$baiviet = mysqli_query($conn, "Select idbaiviet,tenbaiviet,tomtat,anh from baiviet where idchuyenmuc={$row['idchuyenmuc']} order by idbaiviet DESC Limit 4");
		$r = mysqli_fetch_array($baiviet,MYSQLI_BOTH);
		
	
?>
		<div class='box no-border' style="margin-top:10px;">
			<div class ="box-tentheloai" style="width:100%">
		    	<p> <?php echo $row['tenchuyenmuc']; ?><p>		
			</div>
			<div class="box-left">
				<img src="images/<?php echo $r['anh'];?> " />
				<a href="chitietbaiviet/index.php?idbaiviet=<?php echo $r['idbaiviet'];?>" ><p class="Tieudetin"> <?php echo $r['tenbaiviet'];?></p> </a>
				<p class="Tomtattin"><?php echo $r['tomtat'];?>
				</p>
			</div>	
			<?php
				 while($r = mysqli_fetch_array($baiviet,MYSQLI_BOTH))
				 {
				
					echo "<div class='box-right border-bottom'>";
					echo "<img src='images/{$r['anh']}' style='margin-right:5px;' />";
					echo "<a href='chitietbaiviet/index.php?idbaiviet={$r['idbaiviet']}' <p class='Noidungtin' style='padding-top:0px;'>{$r['tenbaiviet']}</p> </a>";				
					echo "</div>";	
				 }
			?>
			<div class="clear"></div>
			
		</div>
<?php 
	}
?>
</div>