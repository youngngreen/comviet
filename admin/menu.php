<?php
  if(isset($_POST['xoa_menu'])) {
    $id_mon = $_POST['xoa_menu'];
    $sql_xoa = mysqli_query($con,"DELETE FROM menu WHERE id_mon=' $id_mon'");
  }
  if (empty($_SESSION['id_mon'])) $_SESSION['id_mon']=0;
  if(isset($_POST['sua_menu'])) {
    $id_mon = $_POST['sua_menu'];
    $_SESSION['id_mon'] = $id_mon;
    $sql_mon = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE id_mon='$id_mon'"));	
  }

	if(isset($_POST['them_moi'])){
		$ten_mon = $_POST['ten_mon'];
		$hinh_anh = $_FILES['hinh_anh']['tmp_name'];
		$mo_ta = $_POST['mo_ta'];
    $id_loai = $_POST['id_loai'];
    if(isset($_POST['ban_chay'])) $ban_chay = 1; else $ban_chay=0;
		$so_luong_con = $_POST['so_luong_con'];
		$gia = $_POST['gia'];

    $filename   = uniqid() . "-" . time();
    $extension  = pathinfo( $_FILES["hinh_anh"]["name"], PATHINFO_EXTENSION );
    $basename   = $filename . "." . $extension;
    $destination  = "../uploads//{$basename}";
		move_uploaded_file( $hinh_anh, $destination );
		$sql_them_moi = mysqli_query($con,"INSERT INTO menu(id_loai,ten_mon,mo_ta,so_luong_con,gia,ban_chay,hinh_anh) 
      values ('$id_loai','$ten_mon','$mo_ta','$so_luong_con','$gia','$ban_chay','$basename')");

	}
  if(isset($_POST['cap_nhat'])){
    $id_mon =  $_POST['cap_nhat'];
		$ten_mon = $_POST['ten_mon'];
		$hinh_anh = $_FILES['hinh_anh']['tmp_name'];
		$mo_ta = $_POST['mo_ta'];
    $id_loai = $_POST['id_loai'];
    if(isset($_POST['ban_chay'])) $ban_chay = 1; else $ban_chay=0;
		$so_luong_con = $_POST['so_luong_con'];
		$gia = $_POST['gia'];

    if($hinh_anh==''){
        $sql_cap_nhat = "UPDATE menu SET id_loai='$id_loai',ten_mon='$ten_mon',mo_ta='$mo_ta',so_luong_con='$so_luong_con',gia='$gia',ban_chay='$ban_chay' WHERE id_mon='$id_mon'";
      }else{
        $filename   = uniqid() . "-" . time();
        $extension  = pathinfo( $_FILES["hinh_anh"]["name"], PATHINFO_EXTENSION );
        $basename   = $filename . "." . $extension;
        $destination  = "../uploads//{$basename}";

        $sql_mon = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE id_mon='$id_mon'"));	
        unlink("../uploads//".$sql_mon['hinh_anh']);

        move_uploaded_file( $hinh_anh, $destination );
        $sql_cap_nhat = "UPDATE menu SET id_loai='$id_loai',ten_mon='$ten_mon',mo_ta='$mo_ta',so_luong_con='$so_luong_con',gia='$gia',ban_chay='$ban_chay',hinh_anh='$basename' WHERE id_mon='$id_mon'";
      }
    mysqli_query($con,$sql_cap_nhat);
    $_SESSION['id_mon'] = 0;
	}
?>

<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Menu</h1>
</div>
<div class="row">
  <div class="col-3 mt-3">
    <?php if(isset($_POST['sua_menu'])){ ?>
    <h5>Cập nhật món</h5>

    <form action="#" method="POST"  enctype="multipart/form-data">
      <h6>Tên món</h6>
      <input type="text" class="form-control" name="ten_mon" value="<?php echo $sql_mon["ten_mon"];?>"><br> 
      <h6>Hình ảnh</h6>
      <div class="d-flex justify-content-center">
        <img src="../uploads/<?php echo $sql_mon['hinh_anh'] ?>" height="80" width="80"> 
      </div> <br>
      <input type="file" class="form-control" name="hinh_anh"><br>
      <h6>Mô tả</h6>
      <input type="text" class="form-control" name="mo_ta" value="<?php echo $sql_mon["mo_ta"];?>"><br> 
      <h6>Phân loại</h6>
      <select class="form-select" name="id_loai">
        <option selected>Chọn loại món ăn...</option>
        <?php $sql_loai = mysqli_query($con,"SELECT * FROM loai_hang");	
        while($row_loai = mysqli_fetch_array($sql_loai)){
          if ($sql_mon["id_loai"]==$row_loai['id_loai']){?>
            <option selected value="<?php echo $row_loai['id_loai']; ?>"><?php echo $row_loai['ten_loai']; ?></option>
          <?php } else { ?>
            <option value="<?php echo $row_loai['id_loai']; ?>"><?php echo $row_loai['ten_loai']; ?></option>
        <?php } } ?>
      </select><br> 
      <h6>
        Bán chạy &nbsp &nbsp
        <?php if ($sql_mon["ban_chay"]==1){ ?>
          <input class="form-check-input" type="checkbox" value="" name="ban_chay" checked>
        <?php } else {?>
          <input class="form-check-input" type="checkbox" value="" name="ban_chay">
        <?php } ?>
      </h6><br> 
      
      <h6>Số lượng</h6>
      <input type="number" class="form-control" name="so_luong_con" value="<?php echo $sql_mon["so_luong_con"];?>"><br> 
      <h6>Giá (VNĐ)</h6>
      <input type="text" class="form-control" name="gia" value="<?php echo $sql_mon["gia"];?>"><br> 
      <div class="d-flex justify-content-center">
        <button type="submit" name="cap_nhat" value ="<?php echo $id_mon?>" class="btn btn-outline-success">Cập nhật</button>
      </div>
    </form>


    <?php } else { ?>  
    <h5>Thêm món mới</h5>
    <form action="#" method="POST"  enctype="multipart/form-data">
      <h6>Tên món</h6>
      <input type="text" class="form-control" name="ten_mon"><br> 
      <h6>Hình ảnh</h6>
      <input type="file" class="form-control" name="hinh_anh"><br>
      <h6>Mô tả</h6>
      <input type="text" class="form-control" name="mo_ta"><br> 
      <h6>Phân loại</h6>
      <select class="form-select" name="id_loai">
        <option selected>Chọn loại món ăn...</option>
        <?php $sql_loai = mysqli_query($con,"SELECT * FROM loai_hang");	
        while($row_loai = mysqli_fetch_array($sql_loai)){ ?>
          <option value="<?php echo $row_loai['id_loai']; ?>"><?php echo $row_loai['ten_loai']; ?></option>
        <?php } ?>
      </select><br> 
      <h6>
        Bán chạy &nbsp &nbsp
        <input class="form-check-input" type="checkbox" value="" name="ban_chay">
      </h6><br> 
      
      <h6>Số lượng</h6>
      <input type="number" class="form-control" name="so_luong_con"><br> 
      <h6>Giá (VNĐ)</h6>
      <input type="text" class="form-control" name="gia"><br> 
      <div class="d-flex justify-content-center">
        <button type="submit" name="them_moi" class="btn btn-outline-success">Thêm mới</button>
      </div>
    </form>
    <?php } ?>
  </div>
  <div class="col-9">
    <div class="table-responsive">
      <table class="table table-striped align-middle table-sm" >
      <thead>
      <tr class ="align-middle">
          <th scope="col">STT</th>
          <th scope="col">Tên món</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Mô tả</th>
          <th scope="col">Phân loại</th>
          <th scope="col">Bán chạy</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Giá (VNĐ)</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if(isset($_POST['tim_kiem'])){

          $tukhoa = $_POST['tu_khoa'];
          
          $sql_menu = mysqli_query($con,"SELECT * FROM menu, loai_hang WHERE menu.id_loai=loai_hang.id_loai and ten_mon LIKE '%$tukhoa%' ORDER BY id_mon ASC");		
        
          $title = $tukhoa; ?>
          <h7>Kết quả Menu tìm kiếm cho từ khoá "<?php echo $title; ?>"</h7>
        <?php ;}else {
        $sql_menu=mysqli_query($con,"SELECT * FROM menu, loai_hang WHERE menu.id_loai=loai_hang.id_loai ORDER BY id_mon ASC");}
        $stt=1;
        while($row_mon = mysqli_fetch_array($sql_menu)){ ?>
            <tr>
                <td><?php echo $stt; $stt=$stt+1; ?></td>
                <td><?php echo $row_mon['ten_mon']; ?></td>
                <td><img src="../uploads/<?php echo $row_mon['hinh_anh']; ?>" alt="" class="img-menu "  ></td>
                <td><?php echo $row_mon['mo_ta']; ?></td>
                <td><?php echo $row_mon['ten_loai']; ?></td>
                <td><?php if ($row_mon['ban_chay']==1) echo "✔️"; else echo ""; ?></td>
                <td><?php echo $row_mon['so_luong_con']; ?></td>
                <td><?php echo number_format($row_mon['gia']); ?></td>
                <td>
                  <form action="#" method="POST">
                    <button type="submit" name="sua_menu" class="btn tr" value="<?php echo $row_mon['id_mon']; ?>">
                      <i class="fas fa-edit" ></i>
                    </button>
                    <button type="submit" name="xoa_menu" class="btn tr" value="<?php echo $row_mon['id_mon']; ?>">
                      <i class="fas fa-trash-alt" style="color: red;" ></i>
                    </button>
                  </form>
                </td>
            </tr>
        <?php } ?>

      </tbody>
      </table>
    </div> 
  </div>
</div>

   