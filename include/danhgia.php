<div class="feedback">
    <div class="text-center notice-cart">Món ăn đang được chuẩn bị, chúc quý khách ngon miệng
        <i class="far fa-grin-hearts fa-lg" style="color: rgb(217,138,46);"></i>
    </div> 
    <div class="d-flex justify-content-center mt-3"> <img src="images/waitting.gif" alt="" class="img-thumbnail"></div>
    
    <div class="d-flex justify-content-center mt-3"> 
        <form  action="#" method="POST">
            <button type="submit" name="reset" class="btn btn-outline-warning"> Tiếp tục đặt món </button>
        </form>
    </div>
    <div class="d-flex justify-content-end mt-3 feedback-logo">
        <img src="images/logo_feedback.png" class="effect_icon" style="width:15%;""alt="" data-bs-toggle="modal" data-bs-target="#danh_gia">
    </div>
</div>


<div id="danh_gia" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content feedback-poup ">
            <div class="text-center" style="padding:10px;"> 
                <h5><i class="far fa-file-alt fa-lg mb-3"></i>&nbsp Ý kiến của quý khách vô cùng quan trọng. 
                 Hãy giúp chúng tôi cải thiện bằng cách đánh giá!</h5>
            </div> 
            <form  action="#" method="POST"> 
                <div class="form-check mt-3 mb-2"> <input name="feedback" type="radio" value="1" checked="checked" > <label class="ml-3">Rất tốt</label> </div> 
                <div class="form-check mb-2"> <input name="feedback" type="radio" value="2"> <label class="ml-3">Tốt</label> </div>
                <div class="form-check mb-2"> <input name="feedback" type="radio" value="3"> <label class="ml-3">Bình thường</label> </div>
                <div class="form-check mb-2"> <input name="feedback" type="radio" value="4"> <label class="ml-3">Tệ</label> </div>
                <div class="form-check mb-2"> <input name="feedback" type="radio" value="5"> <label class="ml-3">Rất tệ</label> </div>
                <!--Text Message-->
                <div class="text-center">
                    <h4>Những điều chúng tôi cần cải thiện?</h4>
                    <textarea class="form-note" type="textarea" placeholder="Lời nhắn của quý khách..." rows="3" style="width:80%;" name="detail_feedback"></textarea> 
                </div>
                <div class="row">
                    <div class="col-6 d-flex justify-content-end"><button type="submit" name="send_feedback" class="btn btn-primary"> Gửi <i class="fa fa-paper-plane"></i> </button></div>
                    <div class="col-6 d-flex justify-content-start"><a href="" class="btn btn-outline-primary" data-dismiss="modal">Huỷ</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
