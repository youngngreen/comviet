<?php
	if(isset($_GET['id_loai'])){
		$id = $_GET['id_loai'];
	}
	$sql_mon = mysqli_query($con,"SELECT * FROM menu WHERE id_loai='$id' ORDER BY id_mon ASC");	
	$sql_tilte = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM loai_hang WHERE id_loai='$id' LIMIT 1"));		
	$title = $sql_tilte['ten_loai'];		
	
	include('trangthai.php');
?>
