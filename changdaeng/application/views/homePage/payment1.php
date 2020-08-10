
    <div class="container">
    <form method="post" id="frmAddPay" enctype="multipart/form-data">
        <div class="row my-5">
            <div class="col-3"></div>
            
            <div class="col-6">
                <h2 class="text-center">ยืนยันการชำระเงิน</h2>
                <div class="price-col">
                    <span class="amount-payable">ยอดชำระเงินทั้งหมด</span>
                    <span class="price">
                        <span>฿</span>
                        <?php foreach ($query as $key => $value) { ?>
                            <?php $id=$value->booking_id;?>
                        <span><?php echo $value->bkPrice;?></span>
                        <?php } ?>
                    </span>
                </div>
                <p class="text-muted small mt-2 mb-4">
                    <i class="fas fa-neuter"></i> ชำระเงินผ่าน ATM หรือโอนเงินผ่าน internet banking มายังบัญชีธนาคารของ ช้างแดงโพธิเวชนวดแผนโบราณ
                </p>
                <div class="price-col mt-2">
                    <h6>กสิกรไทย (Kbank)</h6>
                    <p class="text-muted m-0">ชื่อบัญชี : สุกฤษณพง กระบวนแสง</p>
                    <p class="text-muted m-0">เลขที่บัญชี : 599 2208 831</p>
                </div>
                <div class="price-col mt-2">
                    <h6>ธนชาติ (Thanachart)</h6>
                    <p class="text-muted m-0">ชื่อบัญชี : ไอยริณ รัชชพิสิษฐ์กุล</p>
                    <p class="text-muted m-0">เลขที่บัญชี : 501 6114 546</p>
                </div>
                <div class="price-col mb-4 mt-4">
                    <!-- Upload image input-->
                    <h6>อัพโหลดหลักฐานการชำระเงิน :</h6>                    
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                        <input id="upload" type="file" name="upload" onchange="readURL3(this);" accept="image/*" class="form-control border-0">
                        <label id="upload-label" for="upload" class="font-weight-light text-muted">เลือกไฟล์</label>
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                    class="fas fa-cloud-upload-alt mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted">เลือกไฟล์</small></label>
                        </div>
                    </div>

                    <!-- Uploaded image area-->
                    <p class="font-italic text-white text-center">ภาพที่อัพโหลดจะแสดงผลภายในกล่องด้านล่าง</p>
                    <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
                <hr>
                    <input type="hidden" name="booking_id" value="<?php echo $id;?>" id="booking_id">
                    <button type="submit" class="btn btn-warning w-100 mb-2">ยืนยัน</button></a>
                    <button type="button" class="btn btn-outline-warning bt_cf w-100">ยกเลิก</button></a>
                </div>
            </div>
            </form>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>

<Script>
    $('#frmAddPay').validate({
                rules:{
                },
                messages:{

                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    var data = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('main/confirm_payment');?>", 
                        data: data,
                        dataType: 'json',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    location.replace("<?= base_url('main/history_booking_byId');?>");
                                });
                                
                            }else{
                                swal({
                                    title: "กรุณากรอกข้อมูลให้ครบ !!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }	
    });
</Script>