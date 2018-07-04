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
	$chuyenmuc = mysqli_query($conn, "Select * from nguoidung");
?>
<div id="content">
	
	 <a href="themnguoidung.php"><p>Thêm mới</p>	</a> 
	
	<div>
		<table cellspacing="0px" border="1px" bordercolor="#E5E5E5" width="100%">
			<tr class="headerrow">
				<td width="10%" >Tên đăng nhập</td>
				<td width="10%"> Vai trò </td>
				<td width="20%"> Họ tên</td>
				<td width="10%"> Ngay sinh</td>
				<td width="10%"> Giới tính</td>
				<td width="20%"> Email</td>
				<td width="10%"> Trạng thái</td>
				<td width="5%"> Sửa </td>
				<td width="5%"> Xóa </td>
			</tr>
		
		<?php
			$count =1;
			while($row = mysqli_fetch_array($chuyenmuc,MYSQLI_BOTH))
			{
				if ($count%2==0)
					echo "<tr class='datarow1'>";
				else
					echo "<tr class='datarow2'>";
				echo"<td> {$row['tendangnhap']}</td>";
				echo "<td align='center'> {$row['vaitro']} </td>";
				echo "<td> {$row['hoten']}</td>";
				echo "<td align='center'> {$row['ngaysinh']}</td>";
				echo "<td align='center'> {$row['gioitinh']}</td>";
				echo "<td> {$row['email']}</td>";
				echo "<td align='center'> {$row['trangthai']}</td>";
				echo "<td align='center'> <a href='suanguoidung.php?tendangnhap={$row['tendangnhap']}'>Sửa </a></td>";
				echo "<td align='center'> <a onclick='return confirmAction()' href='xulynguoidung.php?action=xoa&tendangnhap={$row['tendangnhap']}'> Xóa </a></td>";
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
