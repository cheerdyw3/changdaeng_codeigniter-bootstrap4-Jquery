
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">รอการโอน</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item">ข้อมูลการจอง</li>
                            <li class="breadcrumb-item active">รอการโอน</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
    
                            <div class="card-body">
                        
                                <div class="table-responsive m-t-40">
                                    <!-- <table id="myTable" class="table table-striped table-hover table-danger" data-tablesaw-mode="swipe"> -->
                                    <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="2%" class="text-center" nowrap>รหัส</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="15%" class="text-center" nowrap>จองวันที่</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="30%" class="text-center" nowrap>รายการ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="10%" class="text-center" nowrap>วันที่นวด</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>เวลา</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="5%" class="text-center" nowrap>สถานะ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($getAllBooking as $key => $value) { ?>
                                            <?php if($value["status"] == 0 || $value["status"] == 4){?>
                                            <tr>
                                                <td class="text-center"><?php echo $key+1; ?></td>
                                                <td class="text-center"><?= dateTimeThai(date("d M Y H:i", strtotime($value["createDate"])));?></td>
                                                <td class="text-left">
                                                    <div>รหัสการจอง : <?php echo $value["booking_id"]; ?></div>
                                                    <?php if($value["adviser_id"]==0){ ?>
                                                        <div>รหัสผู้จอง(สมาชิก) : <?php echo $value["member_id"]; ?></div>
                                                    <?php } ?>
                                                    <?php if($value["member_id"]==0){ ?>  
                                                        <div>รหัสผู้จอง(ไกด์) : <?php echo $value["adviser_id"]; ?></div>
                                                    <?php } ?>  
                                                        <div>ราคา <?php echo number_format($value["bkPrice"],2); ?> บาท</div>
                                                    <?php 
                                                        $arrCourse = explode(",",$value["course"]);
                                                        $arrTime = explode(",",$value["time"]);
                                                    ?>
                                                    <?php foreach (array_combine($arrCourse, $arrTime) as $Course => $Time) { ?>
                                                        <div>** <?php print_r($Course);?> x <?php print_r($Time);?> ชั่วโมง</div>
                                                    <?php } ?>
                                                        
                                                </td>     
                                                <td class="text-center"><?= dateThai(date("d M Y ", strtotime($value["bkDate"])));?></td>
                                                <td class="text-center"><?= timeThai(date("H:i ", strtotime($value["bkTime"])));?></td>

                                                <?php if($value["status"]==0){ ?>
                                                        <td class="text-left"><span class="badge badge-warning">รอการโอน</span></td>
                                                <?php }else if($value["status"]==1){ ?>
                                                        <td class="text-left"><span class="badge badge-info">ตรวจสอบการโอน</span></td>
                                                <?php }else if($value["status"]==2){ ?>
                                                        <td class="text-left"><span class="badge badge-success">สำเร็จ</span></td>
                                                <?php }else if($value["status"]==3){ ?>
                                                        <td class="text-left"><span class="badge badge-danger">ยกเลิกการจอง</span></td>
                                                <?php }else{ ?>
                                                        <td class="text-left"><span class="badge badge-danger" data-toggle="popover" title="เหตุผลที่ไม่ผ่าน" data-content="<?php echo $value["reject"]; ?>">ไม่ผ่านการตรวจสอบ</span></td>
                                                <?php } ?>
                                                <?php if($value["status"]==4){ ?>
                                                <td class="text-center">
                                                    <a href="<?=base_url('officer/get_payment/').$value["booking_id"];?>" class="badge badge-success"> 
                                                        <i class="fas fa-pencil-alt"> ตรวจสอบการโอน</i>
                                                    </a>
                                                </td>
                                                <?php }else{ ?>
                                                    <td class=""></td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

       