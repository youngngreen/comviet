 <?php
	if(isset($_POST['tim_kiem'])){

	$tukhoa = $_POST['tu_khoa'];
	
	$sql_mon = mysqli_query($con,"SELECT * FROM menu WHERE ten_mon LIKE '%$tukhoa%' ORDER BY id_mon ASC");		

	$title = "Món ".$tukhoa." gợi ý";
	}		
	
	include('trangthai.php');
?>