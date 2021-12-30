<?php if(isset($_POST['xoa_danh_gia'])){
    $id_danh_gia =  $_POST['xoa_danh_gia'];
    $sql_xoa = mysqli_query($con,"DELETE FROM danh_gia WHERE id_danh_gia=' $id_danh_gia'");
	}
?>
<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Đánh giá</h1>
</div>
 
<div class="table-responsive">
    <table class="table table-striped align-middle table-sm" >
    <thead>
    <tr class ="align-middle">
        <th scope="col">STT</th>
        <th scope="col">Tên khách</th>
        <th scope="col">Mã đơn</th>
        <th scope="col">Đánh giá</th>
        <th scope="col">Chi tiết</th>
        <th scope="col">Thời gian</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php  
    if(isset($_POST['tim_kiem'])) {

        $tukhoa = $_POST['tu_khoa'];
        
        $sql_donmon=mysqli_query($con,"SELECT * FROM danh_gia WHERE ten_khach LIKE '%$tukhoa%' ORDER BY id_danh_gia ASC");
        
        $title = $tukhoa; ?>
        <h7>Kết quả Tên khách tìm kiếm cho từ khoá "<?php echo $title; ?>"</h7>
        <?php ;} else {
    $sql_donmon=mysqli_query($con,"SELECT * FROM danh_gia ORDER BY id_danh_gia ASC");}
    $stt=1;
    while($row_danh_gia = mysqli_fetch_array($sql_donmon)){ ?>
        <tr>
            <td><?php echo $stt; $stt=$stt+1; ?></td>
            <td><?php echo $row_danh_gia['ten_khach']; ?></td>
            <td><?php echo $row_danh_gia['id_don']; ?></td>
            <td><?php if ($row_danh_gia['loai_danh_gia']==1) echo "Rất tốt";
                elseif ($row_danh_gia['loai_danh_gia']==2) echo "Tốt"; 
                elseif ($row_danh_gia['loai_danh_gia']==3) echo "Bình thường"; 
                elseif ($row_danh_gia['loai_danh_gia']==4) echo "Tệ"; 
                else echo "Rất tệ"; ?>
            </td>
            <td><?php echo $row_danh_gia['chi_tiet']; ?></td>
            <td><?php echo $row_danh_gia['ngay_gio']; ?></td>
            <td>
                <form action="#" method="POST">
                <button type="submit" name="xoa_danh_gia" class="btn" value="<?php echo $row_danh_gia['id_danh_gia']; ?>">
                      <i class="fas fa-trash-alt" style="color: red;" ></i>
                </button>
                </form>
            </td>
        </tr>
    <?php }?>

    </tbody>
    </table>
</div> 
