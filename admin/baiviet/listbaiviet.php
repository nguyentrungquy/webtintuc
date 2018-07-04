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
	$count = mysqli_query($conn, "SELECT count(*) as soluongbaiviet FROM baiviet where  idtacgia='{$_SESSION['tendangnhap']}'");
	$result = mysqli_fetch_array($count, MYSQLI_BOTH);
	$sobaiviet = $result['soluongbaiviet'];
	$numrows = 9; //Số row trên một pages
	
	$numpages = $sobaiviet / $numrows;
	
	if(($sobaiviet % $numrows) !=0)
		$numpages++;
		
	if(isset($_GET['curpage']))
		$curpage = $_GET['curpage'];
	else
		$curpage = 1;	
	
	$off = $numrows*($curpage-1);	
	if($_SESSION['vaitro']=="Admin") 
		$baiviet = mysqli_query($conn, "Select * from chuyenmuc, baiviet where chuyenmuc.idchuyenmuc = baiviet.idchuyenmuc order by 
									idbaiviet DESC  LIMIT {$numrows} OFFSET {$off}") or die ("Lối truy vấn dữ liệu". mysqli_errno($conn));
	else 
		$baiviet = mysqli_query($conn, "Select * from chuyenmuc, baiviet where chuyenmuc.idchuyenmuc = baiviet.idchuyenmuc  and idtacgia='{$_SESSION['tendangnhap']}' order by 
									idbaiviet DESC  LIMIT {$numrows} OFFSET {$off}") or die ("Lối truy vấn dữ liệu". mysqli_errno($conn));
	
?>	
<div id="content">
	
	 <a href="thembaiviet.php"><p>Thêm mới</p>	</a> 	
	 
	<div>
		<table cellspacing="0px" border="1px" bordercolor="#E5E5E5" width="100%">
			<tr class="headerrow">
				<td width="5%"> TT </td>
				<td width="7%" >Chuyên mục</td>
				<td width="25%"> Tiêu đề </td>				
				<td width="20%"> Anh</td>
				<td width="7%"> Tác giả</td>
				<td width="7%"> Trạng thái</td>
				<td width="7%"> Số đọc </td>
				<td width="5%"> Sửa </td>
				<td width="5%"> Xóa </td>
			</tr>
		
		<?php
			$i =1;
			$tt = $off+1;
			while($row = mysqli_fetch_array($baiviet,MYSQLI_BOTH))
			{
				if ($i%2==0)
					echo "<tr class='datarow1'>";
				else
					echo "<tr class='datarow2'>";
				echo"<td align='center'> {$tt}</td>";
				echo"<td align='center'> {$row['tenchuyenmuc']}</td>";
				echo "<td> {$row['tenbaiviet']} </td>";				
				//echo "<td> {$row['tomtat']}</td>";
				echo "<td > {$row['anh']}</td>";
				echo "<td> {$row['idtacgia']}</td>";
				echo "<td align='center'> {$row['trangthai']}</td>";
				echo "<td align='center'> {$row['soluotdoc']}</td>";
				echo "<td align='center'> <a href='suabaiviet.php?idbaiviet={$row['idbaiviet']}'>Sửa </a></td>";
				echo "<td align='center'> <a onclick='return confirmAction()' href='xulybaiviet.php?action=xoa&idbaiviet={$row['idbaiviet']}'> Xóa </a></td>";
				echo "</tr>";		
				$i++;
				$tt++;
			}			
				
		?>
		</table>
	</div>
	<div class= "pages">
	<?php
		if($numpages>1)
		{
			echo "<p>Trang:&nbsp; ";
			for($i=1; $i<=$numpages; $i++)
				echo "<a href='listbaiviet.php?curpage={$i}'>{$i}</a> &nbsp;";
			echo"</p>";
		}
	 ?>
	</div>
</div>
<?php	
	
	require("../modules/footer.php");
?>
