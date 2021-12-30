<?php
	session_start();
  include('../db/connect.php'); 
	if(!isset($_SESSION['dang_nhap'])){
		header('Location: index.php');
	} 
	if(isset($_GET['login'])){
 	$dang_xuat = $_GET['login'];
	 }else{
	 	$dang_xuat = '';
	 }
	 if($dang_xuat=='dang_xuat'){
	 	session_destroy();
	 	header('Location: index.php');
	 }
?>
	

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Dashboard</title>
    

  <script src="../js/jquery-3.3.1.min.js"></script>
	<link href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.15.4/css/all.css">
	<!-- script -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-2 me-0 px-3" href="#">Cơm Việt</a>
  <form class="d-flex w-100" action="#" method="POST">
    <input class="form-control form-control-dark " name="tu_khoa" type="search" placeholder="Tìm..." aria-label="Search">
    <button class="btn btn-outline-secondary" name="tim_kiem" type="submit">Tìm</button>
	</form>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="?login=dang_xuat">Đăng xuất</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="?quanly=">
              <span data-feather="menu"></span>
              Menu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?quanly=loaimon">
              <span data-feather="loai_mon"></span>
              Loại món
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?quanly=donmon">
              <span data-feather="don_mon"></span>
              Đơn món
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="?quanly=danhgia">
              <span data-feather="danh_gia"></span>
              Đánh giá
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main class="ms-sm-auto col-10 px-md-4">
    <?php

	if(isset($_GET['quanly'])){
		$tam = $_GET['quanly'];
	}else{
		$tam = '';
	}

	if($tam=='donhang'){
		include('./donhang.php');
	}elseif ($tam=='loaimon') {
		include('./loaimon.php');
  }elseif ($tam=='donmon') {
		include('./donmon.php');
  }elseif ($tam=='danhgia') {
		include('./danhgia.php');
	}else
		include('./menu.php');
 ?>
    </main>
  </div>
</div>

    
