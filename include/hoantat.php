<?php
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
            <img src="uploads/<?php echo $row_mon['hinh_anh'] ?>" alt="" class="img-cart "  >
        </div>
        <div class="col-6">
            <p class="pro-title-cart d-flex justify-content-center mb-2" style="margin: 0;"><?php echo $row_mon['ten_mon'] ?></p>
            <p class="d-flex justify-content-center amount-cart1"><?php echo $row_mon['so_luong'] ?></p>
        </div>
        <div class="col-3 align-items-center d-flex justify-content-start">
            <p class="price-cart"><?php echo number_format($row_mon['gia'] * $row_mon['so_luong']).'đ' ?></p>
        </div>  
    </div>
	<?php 
    $tong_tien = $tong_tien + ($row_mon['gia'] * $row_mon['so_luong']);
    } ?> 
    <div class="row sum d-flex justify-content-center">
         Thành tiền: &nbsp &nbsp<?php echo number_format($tong_tien ).'đ' ?>
    </div> 
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 d-flex justify-content-center"><button  class="btn btn-outline-danger mt-3 price-cart" style="padding: 0.3rem;" 
            data-bs-toggle="modal" data-bs-target="#tructiep" role="button">THANH TOÁN</button></div>
        <div class="col-3 d-flex justify-content-center">    
            <form  action="#" method="POST">
                <button  type="submit" class="btn btn-outline-success mt-3"" name="chinh_sua"><i class="fas fa-edit"></i></button>
            </form>  
        </div>
    </div>
    <?php include('thanhtoan.php');?> 
</div>


