<?php if(isset($_POST['cap_nhat'])){
    $id_don =  $_SESSION['id_don'];
    $trang_thai = $_POST['trang_thai'];
    $sql_cap_nhat = "UPDATE don_hang SET trang_thai='$trang_thai' WHERE id_don='$id_don'";
    mysqli_query($con,$sql_cap_nhat);
    $_SESSION['id_loai'] = 0;
	}
?>
<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Đơn món</h1>
</div>
<div class="row">   
  <div class="col-5 mt-3">
    <h5>Chi tiết đơn hàng
    <?php if(isset($_POST['chi_tiet'])){ 
    $id_don= $_POST['chi_tiet'];
    $_SESSION['id_don']= $id_don ;?>
     <?php echo $id_don; ?></h5> 
    <div class="table-responsive">
        <table class="table align-middle table-sm" >
        <thead>
        <tr align="center" class="align-middle">
            <th scope="col">STT</th>
            <th scope="col">Tên món</th>
            <th scope="col">Số lượng</th>
            <th scope="col" >Đơn giá</th>
            <th scope="col">Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt=1; $tong=0; $ghi_chu='';
        $sql_donmon=mysqli_query($con,"SELECT * FROM don_hang, gio_hang, menu WHERE don_hang.id_don =$id_don AND don_hang.id_gio = gio_hang.id_gio
            AND gio_hang.id_mon = menu.id_mon ORDER BY id_don ASC");
        while($row_don = mysqli_fetch_array($sql_donmon)){ ?>
            <tr align="center">
                <td><?php echo $stt; $stt=$stt+1; ?></td>
                <td><?php echo $row_don['ten_mon']; ?></td>
                <td><?php echo $row_don['so_luong']; ?></td>
                <td align="right" class="px-3"><?php echo $row_don['gia']; ?></td>
                <td align="right" class="px-3"><?php echo number_format($row_don['so_luong'] * $row_don['gia']) ; ?></td>
                <?php $tong =  $tong + ($row_don['so_luong'] * $row_don['gia']);
                    $ghi_chu = $row_don['ghi_chu'];
                ?>
            </tr>
        <?php }?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td  align="center">Tổng tiền</td>
            <td align="right" class="px-3"><?php echo number_format($tong); ?></td>
        </tr>
        </tbody>
        </table>
        <u>Ghi chú:</u> &nbsp <?php echo $ghi_chu; ?>
        <h6 class="mt-3 mb-2">Cập nhật trạng thái:</h6>
        <form class="d-flex justify-content-center" action="#"  method="POST"> 
            <select class="form-select d-flex w-50" name="trang_thai">
            <?php $sql_don = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM don_hang where id_don ='$id_don'"));
            if ($sql_don['trang_thai']==0){?>
            <option selected value="0">Đang chuẩn bị</option>
            <option value="1">Hoàn thành</option>    
            <?php ;} else {?>
            <option  value="0">Đang chuẩn bị</option>
            <option selected value="1">Hoàn thành</option>  
            <?php } ?>
            </select>
            <button type="submit" name="cap_nhat" class="btn btn-outline-success">Cập nhật</button>
        </form>
    </div> 
    <?php }?>
  </div> 
  <div class="col-7">
    <div class="table-responsive">
        <table class="table table-striped align-middle table-sm" >
        <thead>
        <tr class ="align-middle">
            <th scope="col">STT</th>
            <th scope="col">Mã đơn</th>
            <th scope="col">Số bàn</th>
            <th scope="col">Tên khách</th>
            <th scope="col">Thời gian</th>

            <th scope="col">Chi tiết</th>
            <th scope="col">Trạng thái </th>
        </tr>
        </thead>
        <tbody>
        <?php 
        if(isset($_POST['tim_kiem'])) {

            $tukhoa = $_POST['tu_khoa'];
            
            $sql_donmon=mysqli_query($con,"SELECT * FROM don_hang WHERE ten_khach LIKE '%$tukhoa%' ORDER BY id_don ASC");
            
            $title = $tukhoa; ?>
            <h7>Kết quả Tên khách tìm kiếm cho từ khoá "<?php echo $title; ?>"</h7>
            <?php ;} else {
        $sql_donmon=mysqli_query($con,"SELECT * FROM don_hang ORDER BY id_don ASC");}
        $stt=1;
        while($row_don = mysqli_fetch_array($sql_donmon)){ ?>
            <tr>
                <td><?php echo $stt; $stt=$stt+1; ?></td>
                <td><?php echo $row_don['id_don']; ?></td>
                <td><?php echo $row_don['so_ban']; ?></td>
                <td><?php echo $row_don['ten_khach']; ?></td>
                <td><?php echo $row_don['ngay_gio']; ?></td>
                <td>
                  <form action="#" method="POST">
                    <button type="submit" name="chi_tiet" class="btn tr" value="<?php echo $row_don['id_don']; ?>">
                        <i class="far fa-clipboard"></i>
                    </button>
                  </form>
                </td>
                <td><?php if ($row_don['trang_thai']==0) echo "Đang chuẩn bị"; else echo "Hoàn thành";?></td>

        </div></td>
            </tr>
        <?php }?>

        </tbody>
        </table>
    </div> 
  </div> 
</div> 
