<?php
    session_start();
	include_once('../db/connect.php');
    $id_gio = $_SESSION['id_gio'];
    $so_ban = $_SESSION['so_ban'];
    $sql_gio_hang = mysqli_query($con,"SELECT * FROM gio_hang, menu WHERE id_gio = '$id_gio' AND gio_hang.id_mon = menu.id_mon ORDER BY STT ASC");
    $tong_tien=0;

?>
<div class="cart">
    <div class="text-center mt-2 mb-2 title-cart">
        Thực đơn Bàn <?php echo $so_ban ?>
    </div>

    <?php 
    while($row_mon= mysqli_fetch_array($sql_gio_hang)){ ?>
    <div class="row d-flex justify-content-center ">
        <div class="col-3 align-items-center d-flex justify-content-end">
            <img src="uploads/<?php echo $row_mon['hinh_anh'] ?>" alt="" class="img-cart"  >
        </div>
        <div class="col-6">
            <p class="pro-title-cart d-flex justify-content-center mt-3 mb-2"><?php echo $row_mon['ten_mon'] ?></p>
            <p class="pro-title-cart d-flex justify-content-center mt-0">(<?php echo $row_mon['mo_ta'] ?>)</p>
            <p class="d-flex justify-content-center">
                <i class="far fa-minus-square effect_icon" style="color: lightgreen;" id="giam_sl" id_mon="<?php echo $row_mon['id_mon'] ?>">&nbsp</i>
                <u class="amount-cart"><?php echo $row_mon['so_luong']?></u>&nbsp
                <i class="far fa-plus-square effect_icon" style="color: lightgreen;" id="tang_sl" id_mon="<?php echo $row_mon['id_mon'] ?>">&nbsp &nbsp</i>
                <i class="fas fa-trash-alt effect_icon" style="color: red;" id="xoa_mon" id_mon="<?php echo $row_mon['id_mon'] ?>"></i>
            </p>
        </div>
        <div class="col-3 align-items-center d-flex justify-content-start">
            <p class="price-cart"><?php echo number_format($row_mon['gia'] * $row_mon['so_luong']).'đ' ?></p>
        </div>  
    </div>
	<?php 
    $tong_tien = $tong_tien + ($row_mon['gia'] * $row_mon['so_luong']);
    } ?> 
    <?php if ($tong_tien>0){ ?> 
    <div class="row sum d-flex justify-content-center">
         Thành tiền: &nbsp &nbsp<?php echo number_format($tong_tien ).'đ' ?>
    </div> 
    <form  action="#" method="POST">
        <div class="row d-flex justify-content-center">
            <input type="text" class="col-10 form-note btn-warning text-center mt-3 mb-3" name="ghi_chu" placeholder="Ghi chú ...">
        </div> 
        <div class="row d-flex justify-content-center mt-3">
            <button type="submit" name="hoan_tat" class="col-auto btn btn-outline-primary">HOÀN TẤT</button>
        </div>
    </form>
    <?php ;} else {?>
    <div class="mt-5 mb-5 text-center notice-cart">Thực đơn đang trống, mời Quý khách chọn món ở Menu
        <i class="far fa-grin-hearts fa-lg" style="color: rgb(217,138,46);"></i>
    </div> 
    <?php }?> 
</div> 
