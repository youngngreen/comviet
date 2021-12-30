<?php 
// Gio hang
if(empty($_SESSION['id_gio'])){
	$sql_gio = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM gio_hang ORDER BY id_gio DESC LIMIT 1"));
	if(isset($sql_gio['id_gio'])) $id_gio = $sql_gio['id_gio']+1; else $id_gio =1;
	$_SESSION['id_gio'] = $id_gio;
} else $id_gio = $_SESSION['id_gio'];
// So ban
if(isset($_GET['so_ban'])) {
	$so_ban=$_GET['so_ban'];
	$_SESSION['so_ban']=$so_ban;
}else $so_ban=$_SESSION['so_ban'];

if(isset($_POST['hoan_tat'])) {
	$_SESSION['hoan_tat'] = 1;    	
	$ghi_chu=$_POST['ghi_chu'];
	$sql_id_gio = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM don_hang WHERE id_gio ='$id_gio'"));
	if(isset($sql_id_gio['id_gio']))
		$sql_don_hang= mysqli_query($con,"UPDATE don_hang SET ghi_chu='$ghi_chu' WHERE id_gio ='$id_gio'");
	else $sql_don_hang= mysqli_query($con,"INSERT INTO don_hang (id_gio,so_ban,ghi_chu,trang_thai) VALUES ('$id_gio','$so_ban','$ghi_chu','0') ");
}

if(isset($_POST['chinh_sua'])){
	unset($_SESSION['hoan_tat']);
}

if(isset($_POST['thanh_toan'])){
	unset($_SESSION['hoan_tat']);
	$_SESSION['thanh_toan'] = 1;    
	$ten_khach=$_POST['ten_khach'];
	$_SESSION['ten_khach'] = $ten_khach;
	$id_gio = $_SESSION['id_gio'];
	$sql_don_hang= mysqli_query($con,"UPDATE don_hang SET ten_khach='$ten_khach' WHERE id_gio ='$id_gio'");
	
	//Cập nhật số lượng còn
	$sql = mysqli_query($con,"SELECT * FROM gio_hang WHERE id_gio ='$id_gio'");
	while($row = mysqli_fetch_array($sql)){ 
		$id_mon=$row['id_mon'];
		$sql_so_luong = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE id_mon='$id_mon'"));
		$so_luong_con = $sql_so_luong['so_luong_con']- $row['so_luong'];
		$sql_cap_nhat_sl= mysqli_query($con,"UPDATE menu SET so_luong_con='$so_luong_con' WHERE id_mon='$id_mon'");
	}
}

if(isset($_POST['send_feedback'])) {
	unset($_SESSION['thanh_toan']);
	$_SESSION['feedback'] = 1;   
	$loai_danh_gia = $_POST['feedback'];
	$chi_tiet= $_POST['detail_feedback'];
	$ten_khach = $_SESSION['ten_khach'];
	$id_gio = $_SESSION['id_gio'];
	$sql_id_don = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM don_hang WHERE id_gio = '$id_gio' LIMIT 1"));
	$id_don=$sql_id_don['id_don'];
	mysqli_query($con,"INSERT INTO danh_gia (ten_khach, id_don,loai_danh_gia,chi_tiet) VALUES ('$ten_khach','$id_don','$loai_danh_gia','$chi_tiet') ");
}

if(isset($_POST['reset'])) {
	unset($_SESSION['thanh_toan']);
	unset($_SESSION['feedback']);
	$sql_gio = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM gio_hang ORDER BY id_gio DESC LIMIT 1"));
	$id_gio = $sql_gio['id_gio']+1;
	$_SESSION['id_gio'] = $id_gio;
}


if(isset($_SESSION['hoan_tat'])){ ?>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-8"><?php include('menu.php');?></div>
			<div class="col-md-4"><?php include('hoantat.php');?></div>
		</div>
	</div>
<?php } elseif (isset($_SESSION['thanh_toan'])){ ?>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-8"><?php include('menu.php');?></div>
			<div class="col-md-4"><?php include('danhgia.php');?></div>
		</div>
	</div>
<?php } elseif (isset($_SESSION['feedback'])){ ?>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-8"><?php include('menu.php');?></div>
			<div class="col-md-4"><?php include('ketthuc.php');?></div>
		</div>
	</div>   
<?php }	else {?>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-8"><?php include('menu.php');?></div>
			<div class="col-md-4" id="gio_hang"></div>
		</div>
	</div>
<?php } ?>