<?php
  if(isset($_POST['xoa_loai'])) {
    $id_loai = $_POST['xoa_loai'];
    $sql_xoa = mysqli_query($con,"DELETE FROM loai_hang WHERE id_loai=' $id_loai'");
  }
  if (empty($_SESSION['id_loai'])) $_SESSION['id_loai']=0;
  if(isset($_POST['sua_loai'])) {
    $id_loai = $_POST['sua_loai'];
    $_SESSION['id_loai'] = $id_loai;
    $sql_loai = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM loai_hang WHERE id_loai='$id_loai'"));	
  }

  if(isset($_POST['them_moi'])){
    $ten_loai = $_POST['ten_loai'];
    $sql_them_moi = mysqli_query($con,"INSERT INTO loai_hang(ten_loai) values ('$ten_loai')");
	}
  if(isset($_POST['cap_nhat'])){
    $id_loai =  $_SESSION['id_loai'];
    $ten_loai = $_POST['ten_loai'];
    $sql_cap_nhat = "UPDATE loai_hang SET ten_loai='$ten_loai' WHERE id_loai='$id_loai'";
    mysqli_query($con,$sql_cap_nhat);
    $_SESSION['id_loai'] = 0;
	}
?>

<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Loại món</h1>
</div>
<div class="row">
  <div class="col-6 mt-2">
    <?php if(isset($_POST['sua_loai'])){ ?>
    <h5>Cập nhật loại món</h5> <br>
    <form action="#" method="POST"  enctype="multipart/form-data">
      <h6>Tên loại món</h6>
      <input type="text" class="form-control" name="ten_loai" value="<?php echo $sql_loai["ten_loai"];?>"><br> 
      <div class="d-flex justify-content-center">
        <button type="submit" name="cap_nhat" class="btn btn-outline-success">Cập nhật</button>
      </div>
    </form>

    <?php } else { ?>  
    <h5>Thêm loại món mới</h5> <br>
    <form action="#" method="POST"  enctype="multipart/form-data">
      <h6>Tên loại món</h6>
      <input type="text" class="form-control" name="ten_loai"><br> 
      <div class="d-flex justify-content-center">
        <button type="submit" name="them_moi" class="btn btn-outline-success">Thêm mới</button>
      </div>
    </form>
    <?php } ?>
  </div>
  <div class="col-6">
    <div class="table-responsive">
      <table class="table table-striped align-middle table-sm" >
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên loại món</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if(isset($_POST['tim_kiem'])) {

          $tukhoa = $_POST['tu_khoa'];
          
          $sql_loaimon=mysqli_query($con,"SELECT * FROM loai_hang WHERE ten_loai LIKE '%$tukhoa%' ORDER BY id_loai ASC");
        
          $title = $tukhoa; ?>
          <h7>Kết quả Loại món tìm kiếm cho từ khoá "<?php echo $title; ?>"</h7>
        <?php ;} else {
        $sql_loaimon=mysqli_query($con,"SELECT * FROM loai_hang ORDER BY id_loai ASC");}
        $stt=1;
        while($row_loai = mysqli_fetch_array($sql_loaimon)){ 
          if ($_SESSION['id_loai']==$row_loai['id_loai']){?>
            <tr>
                <td><?php echo $stt; $stt=$stt+1; ?></td>
                <td><u><?php echo $row_loai['ten_loai']; ?></u></td>
                <td>
                  <form action="#" method="POST">
                    <button type="submit" name="xoa_loai" class="btn" value="<?php echo $row_loai['id_loai']; ?>">
                      <i class="fas fa-trash-alt" style="color: red;" ></i>
                    </button>
                  </form>
                </td>
            </tr>
          <?php } else{?>
            <tr>
                <td><?php echo $stt; $stt=$stt+1; ?></td>
                <td><?php echo $row_loai['ten_loai']; ?></td>
                <td>
                  <form action="#" method="POST">
                    <button type="submit" name="sua_loai" class="btn tr" value="<?php echo $row_loai['id_loai']; ?>">
                      <i class="fas fa-edit" ></i>
                    </button>
                    <button type="submit" name="xoa_loai" class="btn tr" value="<?php echo $row_loai['id_loai']; ?>">
                      <i class="fas fa-trash-alt" style="color: red;" ></i>
                    </button>
                  </form>
                </td>
            </tr>
          <?php } 
        } ?>

      </tbody>
      </table>
    </div> 
  </div>
</div>






   