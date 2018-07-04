<?php
	require("../modules/checklogin.php");
?>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Bạn có muốn xóa không?")
    }
</SCRIPT>
<?php
	require("../modules/connectdb.php");
	require("../modules/logo.php");
	require("../modules/menu.php");
	$chuyenmuc = mysqli_query($conn, "Select * from chuyenmuc order by idchuyenmuc DESC");
?>
<div id="content">
	
	 <a href="themchuyenmuc.php"><p>Thêm mới</p>	</a> 
	
	<div class="list">
		<table cellspacing="0px" border="1px" bordercolor="#E5E5E5" width="100%">
			<tr class="headerrow">
				<td width="10%" > ID </td>	
				<td width="50%" >Tên chuyên mục</td>				
				<td width="20%"> Trạng thái</td>
				<td width="10%"> Sửa </td>
				<td width="10%"> Xóa </td>
			</tr>
		
		<?php
			$count =1;
			while($row = mysqli_fetch_array($chuyenmuc,MYSQLI_BOTH))
			{
				if ($count%2==0)
					echo "<tr class='datarow1'>";
				else
					echo "<tr class='datarow2'>";
				echo"<td align='center'> {$row['idchuyenmuc']}</td>";		
				echo"<td> {$row['tenchuyenmuc']}</td>";				
				echo "<td align='center'> {$row['trangthai']}</td>";
				echo "<td align='center'> <a href='suachuyenmuc.php?idchuyenmuc={$row['idchuyenmuc']}'>Sửa </a></td>";
				echo "<td align='center'> <a onclick='return confirmAction()' href='xulychuyenmuc.php?action=xoa&idchuyenmuc={$row['idchuyenmuc']}'> Xóa </a></td>";
				echo "</tr>";		
				$count++;
			}			
				
		?>
		</table>
	</div>
</div>
<?php	
	
	require("../modules/footer.php");
?>
