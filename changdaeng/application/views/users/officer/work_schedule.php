
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">หนึ่งรายการ</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item">ตารางงาน</li>
                            <li class="breadcrumb-item active">หนึ่งรายการ</li>
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
                                    <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-left" nowrap>รหัส</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="15%" class="text-left" nowrap>ชื่อ-นามสกุล</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="20%" class="text-left" nowrap>ความสามารถในการนวด</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-left" nowrap>สถานะการทำงาน</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="15%" class="text-left" nowrap>เริ่มงาน</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="15%" class="text-left" nowrap>เสร็จงาน</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="20%" class="text-left" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach ($query as $key => $value) { ?>
                                            <tr>
                                                <td class="text-left"><?php echo $value["staff_massager_id"]; ?></td>
                                                <td class="text-left"><?php echo $value["firstName"];?>  <?php echo $value["lastName"];?></td>
                                                <td class="text-left"><?php echo $value["course"]; ?></td>
                                            <?php if($value["status"] == 0){?>
                                                <td class="text-left"><span class="badge badge-success">ว่าง</span></td>
                                            <?php }else{?>
                                                <td class="text-left"><span class="badge badge-danger">ไม่ว่าง</span></td>
                                            <?php } ?>
                                            <?php if($value["startDate"] == "00:00:00"){?>
                                                <td ></td>
                                                <td ></td>
                                            <?php }else{ ?>
                                                <td class="text-left"><i class="mdi mdi-timer"> </i><?php echo $value["startDate"]; ?></td>
                                                <td class="text-left"><i class="mdi mdi-timer"> </i><?php echo $value["endDate"]; ?></td>
                                            <?php } ?>  

                                                <td class="text-left">
                                                    
                                                    <?php if($value["status"] == 0){?>
                                                    <div class="btn-group">   
                                                        <a href="<?=base_url('officer/list_room/'.$value["schedule_id"])?>" class="badge badge-dark p-2">
                                                            <i class="mdi mdi-check-circle"></i> เลือก
                                                        </a>
                                                    </div>
                                                    <div class="btn-group"> 
                                                        <a class="badge badge-danger" href="javascript:void(0)" onclick="deleteWs(<?php echo $value['schedule_id'];?>)">
                                                            <i class="mdi mdi-delete-circle"></i> ลบ
                                                        </a>
                                                    </div>
                                                    <?php }else{?>
                                                    <div class="btn-group"> 
                                                        <a href="javascript:void(0)" onclick="changeStatusWs(<?=$value['schedule_id'];?>)" class="badge badge-success p-1">
                                                            <i class="mdi mdi-alarm-check"></i> ลงงาน
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    
                                                </td>
                                            </tr>

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
                <!-- Modal leave-->
                <div class="modal fade" id="leaveMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="title"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data" id="frmAddLeave">
                                    <div class="row">
                                        <div class="col-sm-12 col-12 form-group">
                                            <label>
                                                จำนวนวันที่ลา <span class="badge badge-warning badge-circle m-r-5 m-b-5 leaveDay">1</span> วัน
                                            </label>
                                        </div>
                                    </div>     
                                    <div class="row">
                                        <div class="col-sm-12 col-12 form-group">
                                            <label>ประเภท <span class="text-danger">*</span></label>
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-primary btn-sm active">
                                                    <input type="radio" name="options" value="0" id="option1" autocomplete="off" checked> ลาเต็มวัน
                                                </label>
                                                <label class="btn btn-primary btn-sm">
                                                    <input type="radio" name="options" value="1" id="option2" autocomplete="off"> ลาครึ่งเช้า
                                                </label>
                                                <label class="btn btn-primary btn-sm">
                                                    <input type="radio" name="options" value="2" id="option3" autocomplete="off"> ลาครึ่งบ่าย
                                                </label>
                                            </div>           
                                        </div>
                                    </div>
                                    <div class="row">                            
                                        <div class="col-sm-6 col-12 form-group">
                                            <label>วันที่ลา
                                                <i class="fa fa-calendar"></i> 
                                                <span class="text-danger">*</span>  
                                            </label>     
                                                <input type="text" id="startDate" class="form-control" name="startDate" placeholder="Enter" autocomplete="off">    
                                        </div>
                                        <div class="col-sm-6 col-12 form-group" id="showDiv">
                                            <div id="noEndDate">
                                                <label>ถึงวันที่
                                                    <i class="fa fa-calendar"></i> 
                                                    <span class="text-danger">*</span>  
                                                </label>     
                                                    <input type="text" id="endDate" class="form-control" name="endDate" placeholder="Enter" autocomplete="off">  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12 form-group">
                                            <label>เบอร์โทรติดต่อ <span class="text-danger">*</span></label>                                                       
                                            <input type="text" name="tel" id="tel"  class="form-control" autocomplete="off">
                                        </div>            
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-12 form-group">
                                            <label>ลาเนื่องจาก <span class="text-danger">*</span></label>
                                            <textarea name="detail" cols="40" rows="3" class="form-control"></textarea>
                                        </div>            
                                    </div>  
                                    <div class="modal-footer">
                                        <input type="hidden" name="idStaff" id="idStaff">
                                        <button type="reset" class="btn btn-secondary">Clear</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>      
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                

