<?php
    session_start();
	include_once('../db/connect.php');
    $id_gio = $_SESSION['id_gio'];
    $id_mon = $_POST['id_mon'];
    //Kiểm tra số lượng còn
    $sql_mon = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE id_mon='$id_mon'"));
    $so_luong_con = $sql_mon['so_luong_con'];
    //
    $sql_so_luong =  mysqli_fetch_array(mysqli_query($con,"SELECT * FROM gio_hang menu WHERE id_gio='$id_gio' AND id_mon='$id_mon'"));
    $so_luong = $sql_so_luong ['so_luong']+1;
    if ($so_luong<=$so_luong_con)
        mysqli_query($con,"UPDATE gio_hang SET so_luong = '$so_luong' WHERE id_gio=' $id_gio' AND id_mon='$id_mon'");
?>
