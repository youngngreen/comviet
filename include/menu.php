<!-- tittle heading -->
<div class="menu">
    <div class="title-menu text-center mb-2 mt-2"><?php echo $title ?></div>
    <!-- //tittle heading -->
    <!-- <div class="menu">
        <!-- first section -->
    <div class="row product-list d-flex justify-content-center">
        <?php
        while($row_mon = mysqli_fetch_array($sql_mon)){ 
        ?>
        <div class="col-auto menu-col ">
            <div class="pro-img-box text-center">
                <img src="uploads/<?php echo $row_mon['hinh_anh'] ?>" alt="" class="img-thumbnail"  >
                <?php if (empty($_SESSION['hoan_tat'])&&empty($_SESSION['thanh_toan'])&&empty($_SESSION['feedback'])&&$row_mon['so_luong_con']>0){?>
                <a href="#" class="adtocart " id="them_mon" id_mon=<?php echo $row_mon['id_mon']?>>
                    <i class="fa fa-shopping-cart effect_icon"></i>
                </a> <?php ;}?>
            </div>
            <div class="text-center">
                <h4 class="pro-title"> <?php echo $row_mon['ten_mon'] ?> </h4>
                <?php if ($row_mon['so_luong_con']>0) {?>
                    <p class="price"><?php echo number_format($row_mon['gia']).'đ /'.$row_mon['mo_ta'] ?></p> 
                <?php }else {?>
                    <p class="price">Tạm hết</p> <?php }?>
            </div>
        </div>
        <?php
        } 
        ?>
    </div>
</div>
    <!-- //first section -->