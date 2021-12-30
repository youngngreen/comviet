<?php
    session_start();
	include_once('../db/connect.php');
    $id_gio = $_SESSION['id_gio'];
    $so_ban = $_SESSION['so_ban'];
    $id_mon = $_POST['id_mon'];
    $check=mysqli_query($con,"SELECT * FROM gio_hang WHERE id_gio ='$id_gio' AND id_mon='$id_mon'");
    if ($check->num_rows==0)
        $them_mon= mysqli_query($con,"INSERT INTO gio_hang (id_gio,id_mon,so_luong) VALUES ('$id_gio','$id_mon','1') ");
    else{
        $sql_mon = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE id_mon='$id_mon'"));
        $so_luong_con = $sql_mon['so_luong_con'];
        $so_luong = (mysqli_fetch_array($check))['so_luong']+1;
        if($so_luong<=$so_luong_con) $them_mon= mysqli_query($con,"UPDATE gio_hang SET so_luong = '$so_luong'WHERE id_gio ='$id_gio' AND id_mon='$id_mon'");
    }
?>