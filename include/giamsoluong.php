<?php
    session_start();
	include_once('../db/connect.php');
    $id_gio = $_SESSION['id_gio'];
    $id_mon = $_POST['id_mon'];
    $sql_so_luong =  mysqli_fetch_array(mysqli_query($con,"SELECT * FROM gio_hang menu WHERE id_gio='$id_gio' AND id_mon='$id_mon'"));
    $so_luong = $sql_so_luong ['so_luong']-1;
    if ($so_luong==0) mysqli_query($con,"DELETE FROM gio_hang WHERE id_gio=' $id_gio' AND id_mon='$id_mon'");
    else mysqli_query($con,"UPDATE gio_hang SET so_luong = '$so_luong' WHERE id_gio=' $id_gio' AND id_mon='$id_mon'");
?>