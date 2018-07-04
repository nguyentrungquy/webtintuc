<div id="menu">
	<div>
		<ul>
		<?php 
			if(isset($_SESSION['vaitro']) && $_SESSION['vaitro']=="Admin")
			{
		?>
				<li> <a href="../nguoidung/listuser.php" >Người dùng </a></li>
				<li> <a href="../chuyenmuc/listchuyenmuc.php" >Chuyên mục </a></li>
				<li> <a href="../baiviet/listbaiviet.php"> Bài viết </a></li>	
				
		<?php
			}
			else
				echo "<li> <a href='../baiviet/listbaiviet.php'> Bài viết </a></li>";
				
		?>
			
		</ul>
	</div>
	<div >
		<p> <?php 
			if (isset($_SESSION['tendangnhap']))
				echo "Người dùng: {$_SESSION['tendangnhap']}";
			?> 
			| <a href="../login.php" > Logout</a> </p>
	</div>
	<div class="clear"></div>

</div>
