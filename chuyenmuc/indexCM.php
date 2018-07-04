
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/reset.css" rel="stylesheet" type="text/css" />
<title>Tin tuc online</title>

</head>

<body bgcolor="#FBFBFB">
<div id="wrapper">
	<?php
			require("../admin/modules/connectdb.php");
			require("menu.php"); 
	?>
	<div id="content">
  	<?php 
		require("noidungchuyenmuc.php");
		// require("right-content.php");
	?>
  	</div> <!-- End div content -->
  	<div class="clear"></div>
 	<?php
		require("../modules/footer.php");
	?> 
</div>
</body>
</html>
