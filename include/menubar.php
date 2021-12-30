<?php 
	//Loai hang
	$sql_loaihang = mysqli_query($con,'SELECT * FROM loai_hang ORDER BY id_loai ASC');
?>
<nav class="navbar navbar-expand-md navbar-custom navbar-dark fixed-top ">
  	<div class="container-fluid">
    	<a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="" class="logo" ></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav me-auto mb-2 mb-md-0">
				<?php while($row_danhmuc = mysqli_fetch_array($sql_loaihang)){ ?>
				<li class="nav-item">
					<a class="nav-link text-center" aria-current="page" href="?quanly=danhmuc&id_loai=<?php echo $row_danhmuc['id_loai'] ?>">
						<?php echo $row_danhmuc['ten_loai'] ?>
					</a>
				</li>
				<?php } ?>
			</ul>
			<form class="d-flex" action="index.php?quanly=timkiem" method="POST">
				<input class="form-control me-2" name="tu_khoa" type="search" placeholder="Tìm món ăn..." aria-label="Search">
				<button class="btn btn-outline-info" name="tim_kiem" type="submit">Tìm</button>
			</form>
		</div>
  	</div>
</nav>