<?php
$sql_mon = mysqli_query($con,"SELECT * FROM menu WHERE ban_chay='1' ORDER BY id_mon ASC");	
$title = 'Bán chạy!!!';
include('trangthai.php');?>