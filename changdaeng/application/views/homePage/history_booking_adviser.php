
    <?php $login = $this->session->userdata('login'); ?>
    <div class="container my-5">
        <ul class="nav nav-pills mb-3 justify-content-center nav-fill bg-light text-dark" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link list_a active" id="pills-home-tab" data-toggle="pill" href="#pills-all" role="tab"
                    aria-controls="pills-all" aria-selected="true">ทั้งหมด</a>
            </li>
            <li class="nav-item">
                <a class="nav-link list_a" id="pills-profile-tab" data-toggle="pill" href="#pills-overdue" role="tab"
                    aria-controls="pills-overdue" aria-selected="false">ที่ต้องชำระเงิน<span class="badge badge-light">(<?php echo $countStatus0And4;?>)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link list_a" id="pills-contact-tab" data-toggle="pill" href="#pills-wait" role="tab"
                    aria-controls="pills-cancel" aria-selected="false">รอการตรวจสอบ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link list_a" id="pills-contact-tab" data-toggle="pill" href="#pills-succeeded" role="tab"
                    aria-controls="pills-succeeded" aria-selected="false">สำเร็จแล้ว</a>
            </li>
            <li class="nav-item">
                <a class="nav-link list_a" id="pills-contact-tab" data-toggle="pill" href="#pills-cancel" role="tab"
                    aria-controls="pills-cancel" aria-selected="false">ยกเลิกแล้ว</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <?php foreach ($getAllBooking as $key => $value) { ?>
                <div class="list_dt mt-4">
                    <div class="row">
                        <div class="col-2 img_list">
                            <img src="<?=base_url('upload/list_1.png')?>" class="img_listdt">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    <p>วันที่จอง : <?= dateTimeThai(date("d M Y H:i", strtotime($value["createDate"])));?></p>
                                </div>
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    <?php if($value["status"]==0){ ?>
                                        <p class="text-right text-primary">รอการชำระเงิน</p>
                                    <?php }else if($value["status"]==1){ ?> 
                                        <p class="text-right text-warning">รอการตรวจสอบการโอน</p>
                                    <?php }else if($value["status"]==2){ ?> 
                                        <p class="text-right text-success">สำเร็จ</p>
                                    <?php }else if($value["status"]==3){ ?> 
                                        <p class="text-right text-danger">ยกเลิกการจอง</p>
                                    <?php }else if($value["status"]==4){ ?> 
                                        <p class="text-right text-danger">ไม่ผ่านการตรวจสอบ !!</p>
                                    <?php } ?> 
                                </div>

                                <div class="col-6">
                                <?php 
                                    $arrCourse = explode(",",$value["course"]);
                                    $arrTime = explode(",",$value["time"]);
                                ?>
                                    <?php foreach (array_combine($arrCourse, $arrTime) as $Course => $Time) { ?>
                                        <h5 class="font-weight-bold"><i class="fas fa-spa text-danger"></i> <?php print_r($Course);?> x <?php print_r($Time);?> ชั่วโมง</h5>
                                    <?php } ?> 
                                    
                                    <p class="text-black-50 m-0 small">วันที่ : <?= dateThai(date("d M Y ", strtotime($value["bkDate"])));?></p>
                                    <p class="text-black-50 m-0 small">เวลา : <?= timeThai(date("H:i ", strtotime($value["bkTime"])));?></p>
                                    <p class="text-black-50 m-0 small">จำนวน <?php echo $value["amount"];?> คน</p>

                                </div>
                                <div class="col-6">
                                    <h5 class="text-right text-danger font-weight-bold"><?php echo number_format($value["bkPrice"],2);?> ฿</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?> 

            </div>
        

        <div class="tab-pane fade" id="pills-overdue" role="tabpanel" aria-labelledby="pills-overdue-tab">
        <?php foreach ($getAllBooking as $key => $value) { ?>
        <?php  if($value["status"]==0 || $value["status"]==4) {?>
                <div class="list_dt mt-4">
                    <div class="row">
                        <div class="col-2 img_list">
                            <img src="<?=base_url('upload/list_1.png')?>" class="img_listdt">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    <p>วันที่จอง : <?= dateTimeThai(date("d M Y H:i", strtotime($value["createDate"])));?></p>
                                </div>
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    <?php if($value["status"]==0){ ?>
                                        <p class="text-right text-primary">รอการชำระเงิน</p>
                                    <?php }else{ ?>  
                                        <p class="text-right text-danger">ไม่ผ่านการตรวจสอบ !!</p>
                                        <div class="col-12 text-right">เพราะ : <?php echo $value["reject"];?></div>
                                    <?php } ?>    
                                </div>
                                <div class="col-6">
                                <?php 
                                    $arrCourse = explode(",",$value["course"]);
                                    $arrTime = explode(",",$value["time"]);
                                ?>
                                    <?php foreach (array_combine($arrCourse, $arrTime) as $Course => $Time) { ?>
                                        <h5 class="font-weight-bold"><i class="fas fa-spa text-danger"></i> <?php print_r($Course);?> x <?php print_r($Time);?> ชั่วโมง</h5>
                                    <?php } ?> 
                                    
                                    <p class="text-black-50 m-0 small">วันที่ : <?= dateThai(date("d M Y ", strtotime($value["bkDate"])));?></p>
                                    <p class="text-black-50 m-0 small">เวลา : <?= timeThai(date("H:i ", strtotime($value["bkTime"])));?></p>
                                    <p class="text-black-50 m-0 small">จำนวน <?php echo $value["amount"];?> คน</p>

                                </div>
                                <div class="col-6">
                                    <h5 class="text-right text-danger font-weight-bold"><?php echo number_format($value["bkPrice"],2);?> ฿</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="border-secondary">
                            <div class="row">
                                <div class="col-6">
                                 <p class="small pt-2 m-0 text-muted">** กรณีชำระเงินแล้วไม่สามารถยกเลิกได้หรือขอเงินคืนได้</p>
                                </div>
                                <div class="col-6 text-right">
                                    <form action="<?=base_url('main/payment2/')?>" method="post">
                                        <input type="hidden" name="booking_id" value="<?php echo $value["booking_id"]?>">
                                        <?php if($value["status"]==4){ ?>
                                            <a href="<?=base_url('main/getAllPaytments/').$value["booking_id"]?>"><button type="button"class="btn btn-warning"  id="history_booking" value="<?php echo $value["booking_id"];?>">ประวัติการโอนงิน</button></a>
                                        <?php }else{ ?>  

                                        <?php } ?>  
                                        
                                        <!-- <button type="button" class="btn btn-warning" id="history_booking">ประวัติการโอนงิน</button> -->
                                        <button type="submit" class="btn btn-warning" id="btn_pay">โอนเงินตอนนี้</button>
                                        <button type="button" class="btn btn-warning bt_cf" id="cancel_booking_adviser" value="<?php echo $value["booking_id"];?>">ยกเลิกการจอง</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?> 
                <?php } ?> 
        </div>
        <div class="tab-pane fade" id="pills-wait" role="tabpanel" aria-labelledby="pills-wait">
        <?php foreach ($getAllBooking as $key => $value) { ?>
        <?php  if($value["status"]==1) {?>
                <div class="list_dt mt-4">
                    <div class="row">
                        <div class="col-2 img_list">
                            <img src="<?=base_url('upload/list_1.png')?>" class="img_listdt">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    <p>วันที่จอง : <?= dateTimeThai(date("d M Y H:i", strtotime($value["createDate"])));?></p>
                                </div>
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    
                                        <p class="text-right text-warning">รอการตรวจสอบการโอน</p>
                                    
                                </div>

                                <div class="col-6">
                                <?php 
                                    $arrCourse = explode(",",$value["course"]);
                                    $arrTime = explode(",",$value["time"]);
                                ?>
                                    <?php foreach (array_combine($arrCourse, $arrTime) as $Course => $Time) { ?>
                                        <h5 class="font-weight-bold"><i class="fas fa-spa text-danger"></i> <?php print_r($Course);?> x <?php print_r($Time);?> ชั่วโมง</h5>
                                    <?php } ?> 
                                    
                                    <p class="text-black-50 m-0 small">วันที่ : <?= dateThai(date("d M Y ", strtotime($value["bkDate"])));?></p>
                                    <p class="text-black-50 m-0 small">เวลา : <?= timeThai(date("H:i ", strtotime($value["bkTime"])));?></p>
                                    <p class="text-black-50 m-0 small">จำนวน <?php echo $value["amount"];?> คน</p>

                                </div>
                                <div class="col-6">
                                    <h5 class="text-right text-danger font-weight-bold"><?php echo number_format($value["bkPrice"],2);?> ฿</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="border-secondary">
                            <div class="row">
                                <div class="col-8">
                                    <p class="small pt-2 m-0 text-muted">** กรณีชำระเงินแล้วไม่สามารถยกเลิกได้หรือขอเงินคืนได้</p>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="<?=base_url('main/getAllPaytments/').$value["booking_id"]?>"><button type="button"class="btn btn-warning"  id="history_booking" value="<?php echo $value["booking_id"];?>">ประวัติการโอนงิน</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?> 
                <?php } ?> 
        </div>
        <div class="tab-pane fade" id="pills-succeeded" role="tabpanel" aria-labelledby="pills-succeeded-tab">
        <?php foreach ($getAllBooking as $key => $value) { ?>
        <?php  if($value["status"]==2) {?>
                <div class="list_dt mt-4">
                    <div class="row">
                        <div class="col-2 img_list">
                            <img src="<?=base_url('upload/list_1.png')?>" class="img_listdt">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    <p>วันที่จอง : <?= dateTimeThai(date("d M Y H:i", strtotime($value["createDate"])));?></p>
                                </div>
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    
                                        <p class="text-right text-success">สำเร็จ</p>
                                    
                                </div>

                                <div class="col-6">
                                <?php 
                                    $arrCourse = explode(",",$value["course"]);
                                    $arrTime = explode(",",$value["time"]);
                                ?>
                                    <?php foreach (array_combine($arrCourse, $arrTime) as $Course => $Time) { ?>
                                        <h5 class="font-weight-bold"><i class="fas fa-spa text-danger"></i> <?php print_r($Course);?> x <?php print_r($Time);?> ชั่วโมง</h5>
                                    <?php } ?> 
                                    
                                    <p class="text-black-50 m-0 small">วันที่ : <?= dateThai(date("d M Y ", strtotime($value["bkDate"])));?></p>
                                    <p class="text-black-50 m-0 small">เวลา : <?= timeThai(date("H:i ", strtotime($value["bkTime"])));?></p>
                                    <p class="text-black-50 m-0 small">จำนวน <?php echo $value["amount"];?> คน</p>

                                </div>
                                <div class="col-6">
                                    <h5 class="text-right text-danger font-weight-bold"><?php echo number_format($value["bkPrice"],2);?> ฿</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="border-secondary">
                            <div class="row">
                                <div class="col-8">
                                    <p class="small pt-2 m-0 text-muted">** กรณีชำระเงินแล้วไม่สามารถยกเลิกได้หรือขอเงินคืนได้</p>
                                </div>
                                <div class="col-4 text-right">
                                <a href="<?=base_url('main/getAllPaytments/').$value["booking_id"]?>"><button type="button"class="btn btn-warning"  id="history_booking" value="<?php echo $value["booking_id"];?>">ประวัติการโอนงิน</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?> 
                <?php } ?> 
        </div>
        <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab">
        <?php foreach ($getAllBooking as $key => $value) { ?>
        <?php  if($value["status"]==3) {?>

                <div class="list_dt mt-4">
                    <div class="row">
                        <div class="col-2 img_list">
                            <img src="<?=base_url('upload/list_1.png')?>" class="img_listdt">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    <p>วันที่จอง : <?= dateTimeThai(date("d M Y H:i", strtotime($value["createDate"])));?></p>
                                </div>
                                <div class="col-6 border-bottom border-secondary mb-3">
                                    
                                        <p class="text-right text-danger">ยกเลิกการจอง</p>
                                    
                                </div>

                                <div class="col-6">
                                <?php 
                                    $arrCourse = explode(",",$value["course"]);
                                    $arrTime = explode(",",$value["time"]);
                                ?>
                                    <?php foreach (array_combine($arrCourse, $arrTime) as $Course => $Time) { ?>
                                        <h5 class="font-weight-bold"><i class="fas fa-spa text-danger"></i> <?php print_r($Course);?> x <?php print_r($Time);?> ชั่วโมง</h5>
                                    <?php } ?> 
                                    
                                    <p class="text-black-50 m-0 small">วันที่ : <?= dateThai(date("d M Y ", strtotime($value["bkDate"])));?></p>
                                    <p class="text-black-50 m-0 small">เวลา : <?= timeThai(date("H:i ", strtotime($value["bkTime"])));?></p>
                                    <p class="text-black-50 m-0 small">จำนวน <?php echo $value["amount"];?> คน</p>

                                </div>
                                <div class="col-6">
                                    <h5 class="text-right text-danger font-weight-bold"><?php echo number_format($value["bkPrice"],2);?> ฿</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?> 
                <?php } ?> 
        </div>
    </div>

    </div>
    </div>