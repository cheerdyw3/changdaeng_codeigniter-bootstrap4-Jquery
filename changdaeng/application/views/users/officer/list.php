
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">จัดการพนักงานนวด</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">pages</li>
                            <li class="breadcrumb-item active">Table basic</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php foreach ($query as $key => $value) { 
                    
                    
                        if($value["status"]==1){
                            redirect('officer/work_schedule/');
                        }
                        $wsId = $value["schedule_id"] ;
                        $staffId = $value["staff_massager_id"] ;
                        $firstName = $value["firstName"] ;
                        $lastName = $value["lastName"] ;
                        $img = $value["img"] ;
                        $ability = $value["ability"] ;
                        $status = $value["status"] ;
                        $courseName = $value["course1"] ;
                    }
                ?>    
               
                <!-- <script>if($status==1){window.location.replace("<?= base_url('officer/work_schedule/');?>");}</script> -->
                <?php foreach ($room as $key => $value) { 
                        $roomId = $value->room_id ;
                        $number = $value->number ;
                    } 
                ?>                    
 
                <div class="row">
                    <div class="col-12">
                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 order-1 order-md-0">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-primary "style="width: 150px">พนักงานนวด</div>
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-3 text-center" >
                                                        <img src="<?php echo base_url('upload/staffMassager/profile');?>/<?php echo $img;?>" alt="user" class="img-circle img-responsive">
                                                    </div>
                                                    <div class="col-md-8 col-lg-9">
                                                        <h3 class="box-title m-b-0"> <?php echo $firstName." ".$lastName ;?> </h3> 
                                                        <small>รหัสพนักงาน : <?php echo $staffId ;?> </small>                           
                                                        <address> <?php echo $courseName ;?> </address>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="ribbon-wrapper card" >
                                            <div class="ribbon ribbon-primary" style="width: 150px">ห้องนวด</div>
                                                <div class="row">
                                                    <div class="col-md-8 col-lg-9">
                                                        <h3 class="box-title m-b-0">หมายเลขห้อง  <?php echo $number;?> </h3> 
                                                        <small>รหัสห้อง : <?php echo $roomId ;?></small>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-8 order-1 order-md-0">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-default" style="width: 150px">รายการ</div>
                                                <hr class="m-t-0 ">
                                                <form action="" method="post" enctype="multipart/form-data" id="frmListDetail">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-3">ประเภทการนวด</label>
                                                        <div class="col-md-9" >
                                                        <?php foreach ($course as $key => $value) { ?>
                                                            <input type="checkbox" id="op<?php echo $key+1 ;?>" name="ability[]" value="<?php echo $value->course_id ;?>" tell="<?php echo $value->course_name ;?>"class="filled-in chk-col-red" onchange="listChange(this,<?php echo $value->course_price;?>);"/>
                                                            <label for="op<?php echo $key+1 ;?>"><?php echo $value->course_name ;?></label>
                                                        <?php }?>
                                                        </div>
                                                    </div>
                                                <hr class="m-t-0 ">
                                        <?php foreach ($course as $key => $value) { ?>
                                                <div class="check_disible_ex<?=$key+1?>">
                                                    <div class="check_disible_in<?=$key+1?>">
                                                        <div class="form-group row justify-content-end">
                                                            <label class="control-label col-md-3 ">+ <?php echo $value->course_name ;?></label>
                                                            <label class="control-label text-right col-md-2 ">ราคา</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control form-control-sm text-right" name="price[]" id="price<?=$key+1?>" value="<?php echo $value->course_price ;?>">
                                                            </div>
                                                            <label class="control-label col-md-2 ">บาท</label>
                                                        </div>
                                                        <div class="form-group row justify-content-end">
                                                            <label class="control-label text-right col-md-2 ">จำนวน</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control form-control-sm text-right" name="hour[]" id="hour<?=$key+1?>" value="1">
                                                                
                                                            </div>
                                                            <label class="control-label col-md-2">ชั่วโมง</label>
                                                        </div>
                                                        <hr class="m-t-0 ">
                                                    </div>
                                                </div>

                                        <?php }?>
                                                <hr class="m-t-0">
                                                <!-- <hr class="m-t-0" style="margin-top: -10px;"> -->
                                                <div class="form-group row justify-content-end">
                                                    <label class="control-label text-right col-md-2 ">รวมราคา</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control form-control-sm text-right" name="totalPrice" id="totalPrice"  readonly="readonly">
                                                    </div>
                                                    <label class="control-label col-md-2 ">บาท</label>
                                                </div>
                                                
                                                <div class="form-group row justify-content-end">
                                                    <label class="control-label text-right col-md-2 ">เวลาทั้งหมด</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control form-control-sm text-right" name="totalHour" id="totalHour"  readonly="readonly">
                                                    </div>
                                                    <label class="control-label col-md-2">ชั่วโมง</label>
                                                </div>
                                                <div class="form-group row justify-content-end">
                                                    <label class="control-label text-right col-md-2 ">ส่วนลด</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control form-control-sm text-right" name="dis" id="dis" value="0" onchange="checkCal();">
                                                    </div>
                                                    <label class="control-label col-md-2">บาท</label>
                                                </div>
                                                <div class="form-group row justify-content-end">
                                                    <div class="col-md-2 text-right">
                                                        <input type="checkbox" id="checkVat" class="filled-in chk-col-blue-grey" onchange="checkCal();">
                                                        <label for="checkVat" class="control-label  ">VAT</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="vertical-spin form-control form-control-sm" onchange="checkCal();" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="7.00" name="inputVat" id="inputVat" disabled >
                                                    </div>
                                                    <label for="inputVat" class="control-label col-md-1 ">%</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control form-control-sm text-right" name="vat" id="vat" value="" readonly="readonly" >
                                                    </div>
                                                    <label class="control-label col-md-2">บาท</label>
                                                </div>
                                                <div class="form-group row justify-content-end">
                                                    <label class="control-label text-right col-md-2 ">ยอดชำระ</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="btn btn-success form-control form-control-sm text-right active" name="payment" id="payment" value="" readonly="readonly">
                                                    </div>
                                                    <label class="control-label col-md-2">บาท</label>
                                                </div>
                                                <hr class="m-t-0 ">
                                                <div class="form-group row justify-content-end">
                                                    <div class="col-md-2 text-right">
                                                        <input type="checkbox" id="checkAdviser" class="filled-in chk-col-blue-grey" onchange="checkAd();">
                                                        <label for="checkAdviser" class="control-label  ">ไกด์</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control form-control-sm " name="adviser" id="adviser" value="" disabled>
                                                    </div>
                                                    <label class="control-label text-right col-md-2 ">ค่าคอมมิชชั่น</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control form-control-sm " name="comm" id="comm" value="" disabled>
                                                    </div>
                                                    <label class="control-label col-md-2">บาท</label>
                                                </div>
                                                <!-- <hr class="m-t-0 "> -->
                                                <div class="modal-footer">
                                                    <input type="hidden" class="form-control form-control-sm " name="roomId" id="roomId" value="<?=$roomId;?>" >
                                                    <input type="hidden" class="form-control form-control-sm " name="wsId" id="wsId" value="<?=$wsId;?>" >
                                                    <input type="hidden" class="form-control form-control-sm " name="adId" id="adId" value="" >
                                                    <input type="hidden" class="form-control form-control-sm " name="staffId" id="staffId" value="<?=$staffId;?>" >
                                                    <button type="reset" class="btn btn-secondary" id="clearFrmList" >Clear</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>  
                                </div>  
                            </div>
                        

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->




                        <!-- <input type="checkbox" id="op1" name="ability[]" value="นวดแผนไทย" class="filled-in chk-col-red" />
        <label for="op1">นวดแผนไทย</label>
        <input type="checkbox" id="op2" name="ability[]" value="นวดทั้งหมด" class="filled-in chk-col-red" />
        <label for="op2">นวดเท้า</label>
        <input type="checkbox" id="op3" name="ability[]" value="นวดไหล่" class="filled-in chk-col-red" />
        <label for="op3">นวดออย</label>
        <input type="checkbox" id="op4" name="ability[]" value="นวดเท้า" class="filled-in chk-col-red" />
        <label for="op4">นวดประคบ</label> -->



                    <!-- <div class="form-group row justify-content-end">
                <label class="control-label col-md-3 ">+ นวดแผนไทย</label>
                <label class="control-label text-right col-md-2 ">ราคา</label>
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-right" name="m_institution" value="<?php echo $value->course_price ;?>">
                </div>
                <label class="control-label col-md-2 ">บาท</label>
            </div>
            <div class="form-group row justify-content-end">
                <label class="control-label text-right col-md-2 ">จำนวน</label>
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-right" name="m_institution" >
                </div>
                <label class="control-label col-md-2">ชั่วโมง</label>
            </div>
        <hr class="m-t-0 ">
            <div class="form-group row justify-content-end">
                <label class="control-label col-md-3 ">+ นวดเท้า</label>
                <label class="control-label text-right col-md-2 ">ราคา</label>
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-right" name="m_institution" >
                </div>
                <label class="control-label col-md-2 ">บาท</label>
            </div>
            <div class="form-group row justify-content-end">
                <label class="control-label text-right col-md-2 ">จำนวน</label>
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-right" name="m_institution" >
                </div>
                <label class="control-label col-md-2">ชั่วโมง</label>
            </div>
        <hr class="m-t-0 ">
            <div class="form-group row justify-content-end">
                <label class="control-label col-md-3 ">+ นวดออย</label>
                <label class="control-label text-right col-md-2 ">ราคา</label>
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-right" name="m_institution" >
                </div>
                <label class="control-label col-md-2 ">บาท</label>
            </div>
            <div class="form-group row justify-content-end">
                <label class="control-label text-right col-md-2 ">จำนวน</label>
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-right" name="m_institution" >
                </div>
                <label class="control-label col-md-2">ชั่วโมง</label>
            </div>
        <hr class="m-t-0 ">
            <div class="form-group row justify-content-end">
                <label class="control-label col-md-3 ">+ นวดประคบ</label>
                <label class="control-label text-right col-md-2 ">ราคา</label>
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-right" name="m_institution" >
                </div>
                <label class="control-label col-md-2 ">บาท</label>
            </div>
            <div class="form-group row justify-content-end">
                <label class="control-label text-right col-md-2 ">จำนวน</label>
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-right" name="m_institution" >
                </div>
                <label class="control-label col-md-2">ชั่วโมง</label>
            </div>
        <hr class="m-t-0 "> -->