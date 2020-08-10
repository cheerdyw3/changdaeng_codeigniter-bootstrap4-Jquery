
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">จัดการพนักงานนวด</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">จัดการพนักงานนวด</li>
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
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="5%" class="text-left" nowrap>ลำดับ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-left" nowrap>รหัส</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="20%" class="text-left" nowrap>ชื่อ-นามสกุล</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="10%" class="text-left" nowrap>เบอร์โทรติดต่อ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-center" nowrap>สถานะ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="20%" class="text-center" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                            <?php if($value["status"] != 0){?>
                                            <tr>
                                                
                                                <td class="text-left"><?php echo $key+1; ?></td>
                                                <td class="text-left"><?php echo $value["staff_massager_id"]; ?></td>
                                                <td class="text-left"><?php echo $value["firstName"];?>  <?php echo $value["lastName"];?></td>
                                                <td class="text-left telUser"><?php echo $value["tell"]; ?></td>
                                                
                                                <?php if($value["statusDay"] == 0){?>
                                                    <td class="text-center"><span class="badge badge-warning"><i class="mdi mdi-checkbox-blank-circle-outline"></i> รอการลงชื่อ</span></td>
                                                <?php }else if($value["statusDay"] == 1){ ?>
                                                    <td class="text-center"><span class="badge badge-success"><i class="mdi mdi-checkbox-marked-circle-outline"></i> ลงชื่อแล้ว</span></td>
                                                <?php } ?>
                                                <td class="text-center">
                                                <?php if($value["statusDay"] == 0){?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn btn-success btn-sm" onclick="signStaff(<?= $value['staff_massager_id'];?>)">
                                                            <i class="mdi mdi-plus-circle"></i> ลงชื่อ
                                                        </button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                            <i class="fas fa-pencil-alt"> </i> ลา
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" tell="<?php echo $value["tell"]; ?>" id="<?= $value["staff_massager_id"];?>">ลาป่วย</a>
                                                            <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" tell="<?php echo $value["tell"]; ?>" id="<?= $value["staff_massager_id"];?>">ลากิจ</a>
                                                            <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" tell="<?php echo $value["tell"]; ?>" id="<?= $value["staff_massager_id"];?>">ลาหยุดพิเศษอื่นๆ</a>
                                                        </div>

                                                    </div>
                                                <?php }else if($value["statusDay"] == 1){ ?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                        <i class="fas fa-pencil-alt"> </i> ลา
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" tell="<?php echo $value["tell"]; ?>" id="<?= $value["staff_massager_id"];?>">ลาป่วย</a>
                                                            <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" tell="<?php echo $value["tell"]; ?>" id="<?= $value["staff_massager_id"];?>">ลากิจ</a>
                                                            <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" tell="<?php echo $value["tell"]; ?>" id="<?= $value["staff_massager_id"];?>">ลาหยุดพิเศษอื่นๆ</a>
                                                        </div>

                                                    </div>
                                                <?php } ?>
                                                </td>
                                                
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
                

