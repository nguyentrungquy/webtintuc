<div id="banner">  </div>   
<?php
	$chuyenmuc = mysqli_query($conn, "Select * from chuyenmuc order by idchuyenmuc ASC");
?>
<div id="menu">
  	<div>
		<ul>
			<a href="../home.php"><li> Trang chủ </li></a>
<?php
			while($row = mysqli_fetch_array($chuyenmuc,MYSQLI_BOTH))
				echo " <a href='../chuyenmuc/indexCM.php?idchuyenmuc={$row['idchuyenmuc']}'><li>{$row['tenchuyenmuc']}</li></a>";
?>			
		</ul>
	  </div>
	<div>
		<form method="post" action="">				
			<input type="text" size="15" value=""/>
		</form>
	</div>		
</div>

