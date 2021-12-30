<div class="modal fade" id="tructiep" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                    
                <div class="card-header">
                    <ul class="nav nav-fill">
                        <li class="nav-item">
                            <button class="btn btn-primary"><i class="fas fa-male mr-2"></i> Trực tiếp </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#creditcard" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-credit-card mr-2"></i> Credit Card </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#paypal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fab fa-paypal mr-2"></i> Paypal </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#netbanking" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-mobile-alt mr-2"></i> Net Banking </button>
                        </li>
                    </ul>
                </div>
                <h4 class="d-flex justify-content-center mt-2">Bàn <?php echo $so_ban ?></h4>
                <form  action="#" method="POST">
                    <h6 class="mt-2">Tên khách hàng</h6>
                    <input class="form-control item" type="text" name="ten_khach" placeholder="Xin quý khách nhập tên..." required> 
                
                <h6 class="mt-3">Quý khách vui lòng đợi trong giây lát, nhân viên sẽ đến nhận thanh toán trực tiếp tại bàn</h6>
                <div class="d-flex justify-content-center"> 
                    <button class="btn btn-danger mt-2" type="submit" name="thanh_toan">
                        <i class="fab fas fa-check mr-2 "></i> Xác nhận 
                    </button> 
                </div>
                </form>        
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="creditcard" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-header">
                    <ul class="nav nav-fill">
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#tructiep" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-male mr-2"></i> Trực tiếp </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-primary"><i class="fas fa-credit-card mr-2"></i> Credit Card </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#paypal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fab fa-paypal mr-2"></i> Paypal </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#netbanking" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-mobile-alt mr-2"></i> Net Banking </button>
                        </li>
                    </ul>
                </div>
                
                <div class="form-group"> 
                    <h6 class="mt-2">Chủ thẻ</h6>
                    </label> <input type="text" name="username" placeholder="Tên chủ thẻ" required class="form-control "> 
                </div>
                <div class="form-group "> 
                        <h6 class="mt-2">Số thẻ</h6>
                    </label>
                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Số thẻ hợp lệ" class="form-control " required>
                        <div class="input-group-append"> <span class="input-group-text text-muted" style="height:100%;"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group"> <label><span class="hidden-xs">
                            <h6 class="mt-2">Ngày hết hạn</h6>
                            </span></label>
                            <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                            <h6 class="mt-2">CVV <i class="fa fa-question-circle d-inline"></i></h6>
                            </label> <input type="text" required class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center"> <button type="button" class="btn btn-danger"> Xác nhận thanh toán </button></div>
                
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="paypal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                    
                <div class="card-header">
                    <ul class="nav nav-fill">
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#tructiep" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-male mr-2"></i> Trực tiếp </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#creditcard" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-credit-card mr-2"></i> Credit Card </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-primary" ><i class="fab fa-paypal mr-2"></i> Paypal </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#netbanking" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-mobile-alt mr-2"></i> Net Banking </button>
                        </li>
                    </ul>
                </div>
                
                <h6 class="mt-3">Chọn loại tài khoản paypal của bạn</h6>
                <div class="form-group d-flex justify-content-center "> 
                    <label class="radio-inline "> 
                        <input type="radio" name="optradio" checked> Nội địa &nbsp &nbsp
                    </label> 
                    <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">&nbsp &nbsp Quốc tế </label>
                </div>
                <div class="d-flex justify-content-center"> <button type="button" class="btn btn-danger mt-2"><i class="fab fa-paypal mr-2 "></i> Đăng nhập vào Paypal</button> </div>
                <p class="text-muted"> Lưu ý: Sau khi nhấp vào nút đăng nhập, bạn sẽ được chuyển đến một cổng an toàn để thanh toán. Sau khi hoàn tất quá trình thanh toán, 
                    bạn sẽ được chuyển trở lại trang web để xem chi tiết đơn hàng của mình.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="netbanking" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
              
                <div class="card-header">
                    <ul class="nav nav-fill">
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#tructiep" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-male mr-2"></i> Trực tiếp </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light" data-bs-target="#creditcard" data-bs-toggle="modal"  data-bs-dismiss="modal"><i class="fas fa-credit-card mr-2"></i> Credit Card </button>
                        </li>
                        <li class="nav-item">
                        <button class="btn btn-light" data-bs-target="#paypal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fab fa-paypal mr-2"></i> Paypal </button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-primary"><i class="fas fa-mobile-alt mr-2"></i> Net Banking </button>
                        </li>
                    </ul>
                </div>
                
                <div class="form-group "> 
                        <h6 class="mt-3">Chọn ngân hàng của bạn</h6>
                        <select class="form-control">
                        <option value="" selected disabled>--Xin chọn ngân hàng của bạn--</option>
                        <option>Ngân hàng TMCP Á Châu (ACB)</option>
                        <option>Ngân hàng TMCP Tiên Phong (TPBank)</option>
                        <option>Ngân hàng TMCP Đông Á (Đông Á Bank)</option>
                        <option>Ngân hàng TMCP Hàng hải Việt Nam (MSB)</option>
                        <option>Ngân hàng TMCP Kỹ Thương Việt Nam (Techcombank)</option>
                        <option>Ngân hàng TMCP Việt Nam Thịnh Vượng (VPBank)</option>
                        <option>Ngân hàng TMCP Sài Gòn (SCB)</option>
                        <option>Ngân hàng TMCP Sài Gòn Thương Tín (Sacombank)</option>
                        <option>Ngân Hàng TMCP Ngoại thương Việt Nam (Vietcombank)</option>
                        <option>Ngân Hàng TMCP Công Thương Việt Nam (VietinBank)</option>
                        <option>Ngân Hàng TMCP Đầu tư và Phát triển Việt Nam (BIDV)</option>
                    </select> </div>
                
                    <div class="d-flex justify-content-center"> <button type="button" class="btn btn-danger mt-2 "><i class="fas fa-mobile-alt mr-2"></i> Tiến hành thanh toán</button> </div>
                
                <p class="text-muted"> Lưu ý: Sau khi nhấp vào nút đăng nhập, bạn sẽ được chuyển đến một cổng an toàn để thanh toán. Sau khi hoàn tất quá trình thanh toán, 
                    bạn sẽ được chuyển trở lại trang web để xem chi tiết đơn hàng của mình.</p>
            </div>
        </div>
    </div>
</div>




