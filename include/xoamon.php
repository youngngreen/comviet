<?php
    session_start();
	include_once('../db/connect.php');
    $id_gio = $_SESSION['id_gio'];
    $id_mon = $_POST['id_mon'];
    mysqli_query($con,"DELETE FROM gio_hang WHERE id_gio=' $id_gio' AND id_mon='$id_mon'");
?>