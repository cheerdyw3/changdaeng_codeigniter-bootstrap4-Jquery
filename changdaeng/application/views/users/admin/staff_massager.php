<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">จัดการข้อมูลพนักงานนวด</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
            <li class="breadcrumb-item active">จัดการข้อมูลพนักงานนวด</li>
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
            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add_staff_massager">เพิ่มพนักงานนวด</button>
                <!-- Add Model  INSERT -->        
                <div id="add_staff_massager" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">เพิ่มพนักงานนวด</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                            <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab2" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">ข้อมูล</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#image" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">สำเนาเอกสาร</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <form class="form-horizontal upload_img" method="post" enctype="multipart/form-data" id="frmAddStaffMassager">
                            <div class="tab-content">
                                <div class="tab-pane active" id="data" role="tabpanel">
                                    <div class="p-20">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">อีเมล</label>
                                                    <div class="col-md-10">
                                                        <input type="email" class="form-control" name="email" id="email" title="กรุณากรอกชื่อผู้ใช้งาน" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">รหัสผ่าน</label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" name="password" id="password" >
                                                    </div>
                                                    <label class="control-label text-right col-md-2 ">ยืนยันรหัสผ่าน</label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" name="confirmPass" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">ชื่อ</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="firstName">
                                                    </div>

                                                    <label class="control-label text-right col-md-2 ">นามสกุล</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"  name="lastName" id="lastname" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">เบอร์ติดต่อ</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="tell">
                                                    </div>
                                                    <label class="control-label text-right col-md-2 ">เพศ</label>
                                                    <div class="col-md-4">
                                                        <div class="btn-group" data-toggle="buttons" role="group">
                                                            <label class="btn btn-outline btn-info active">
                                                                <input type="radio" name="sex" autocomplete="off" value="1" checked>
                                                                <i class="ti-check text-active" aria-hidden="true"></i> ชาย
                                                            </label>
                                                            <label class="btn btn-outline btn-info">
                                                                <input type="radio" name="sex" autocomplete="off" value="0">
                                                                <i class="ti-check text-active" aria-hidden="true"></i> หญิง
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">ที่อยู่</label>
                                                    <div class="col-md-10">
                                                        <textarea type="text" class="form-control" name="address"></textarea>
                                                    </div>
     
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">รูปโปรไฟล์</label>
                                                    <div class="col-md-4">
                                                        <input type="file" id="input-file-now-custom-1" class="dropify" accept="image/x-png,image/gif,image/jpeg" name="img2"/>
                                                        
                                                    </div>
                                                    <label class="control-label text-right col-md-2">ความสามารถ</label>
                                                    <div class="col-md-4" >
                                                    <?php foreach ($course as $key => $value) { ?>
                                                            <input id="op<?php echo $value->course_id; ?>" name="ability[]" value="<?php echo $value->course_id; ?>" type="checkbox">
                                                            <label for="op<?php echo $value->course_id; ?>"><?php echo $value->course_name; ?></label>

                                                    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane p-20" id="image" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-2">สำเนาบัตรประชาชน</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="IDCard2" class="dropify" accept="image/x-png,image/gif,image/jpeg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-2">ใบประกอบวิชาชีพ</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="document2" class="dropify" accept="image/x-png,image/gif,image/jpeg"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    
                                                    <button type="reset" class="btn btn-warning">Clear</button>
                                                    <button type="submit" class="btn submit_upload" disabled>Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                                
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                <div class="table-responsive m-t-40">
                    <!-- <table id="myTable" class="table table-striped table-hover table-danger" data-tablesaw-mode="swipe"> -->
                    <table id="myTable2" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                    <thead class="bg-dark">
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9" class="text-center" width="2%" class="text-center" nowrap>id</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8" class="text-center" width="5%" class="text-center" nowrap>รูปภาพ</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7" class="text-center" width="10%" nowrap>ชื่อ</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" class="text-center" width="10%" nowrap>นามสกุล</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" class="text-center" width="10%" class="text-center" nowrap>เบอร์โทร</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="text-center" width="15%" class="text-center" nowrap>วันที่สมัคร</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="text-center" width="10%" class="text-center" nowrap>สถานะ</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" class="text-center" width="10%" class="text-center" nowrap>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($query as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->staff_massager_id; ?></td>
                                <td>
                                    <img src="<?php echo base_url('upload/staffMassager/profile');?>/<?php echo $value->img;?>" width="30px">
                                </td>
                                <td><?php echo $value->firstName; ?></td>
                                <td><?php echo $value->lastName; ?></td>
                                <td><?php echo $value->tell; ?></td>
                                <td><?= dateTimeThai(date("d M Y H:i", strtotime($value->startDate)));?></td>
                                
                                <td>
                                    <div class="badge <?php if($value->status==0){
                                                                echo"badge-info";
                                                            }else if($value->status==1 || $value->status==2){
                                                                echo"badge-success";
                                                            }else{
                                                                echo"badge-danger";
                                                            }
                                                        ?>">
                                                      <?php if($value->status==0){
                                                                echo"รอการอนุมัติ";
                                                            }else if($value->status==1 || $value->status==2){
                                                                echo"อนุมัติแล้ว";
                                                            }else{
                                                                echo"ถูกบล็อก";
                                                            }
                                                        ?>
                                    </div> 
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="badge badge-info" data-toggle="modal" data-target="#find_staff<?=$key+1?>"> 
                                        <i class="fas fa-search-plus"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="badge badge-warning edit_staff" data-toggle="modal" data-target="#modal_edit_staff" id="<?= $value->staff_massager_id;?>"> 
                                        <i class="fas fa-pencil-alt"> แก้ไข</i>
                                    </a>
                                    <a href="javascript:void(0)" class="badge badge-danger" alt="alert" onclick="deleteStaff(<?=$value->staff_massager_id;?>)">
                                        <i class="fas fa-minus-circle"> ลบ</i>
                                    </a>
                                </td>
                            </tr>
                            
                                <!--Model get-->        
                                <div id="find_staff<?=$key+1?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">เพิ่มพนักงานนวด</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                                            <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs customtab2" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data2<?=$key+1?>" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">ข้อมูล</span></a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#image2<?=$key+1?>" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">สำเนาเอกสาร</span></a> </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <form class="form-horizontal upload_img" method="post" enctype="multipart/form-data" id="frmFindStaffMassager">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="data2<?=$key+1?>" role="tabpanel">
                                                    <div class="p-20">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2 ">อีเมล</label>
                                                                    <div class="col-md-10">
                                                                        <input type="email" class="form-control" name="email" title="กรุณากรอกชื่อผู้ใช้งาน" value="<?php echo $value->email; ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2 ">ชื่อ</label>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control" name="firstName" value="<?php echo $value->firstName; ?>" disabled>
                                                                    </div>

                                                                    <label class="control-label text-right col-md-2 ">นามสกุล</label>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control"  name="lastName" value="<?php echo $value->lastName; ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">เบอร์ติดต่อ</label>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control" name="tell" value="<?php echo $value->tell; ?>"disabled>
                                                                    </div>
                                                                    <label class="control-label text-right col-md-2 ">เพศ</label>
                                                                    <div class="col-md-4">
                                                                        <div class="btn-group" data-toggle="buttons" role="group">
                                                                            <label class="btn btn-outline btn-info <?php if($value->sex==1)echo 'active';?>" disabled>
                                                                                <input type="radio" name="sex" autocomplete="off" value="1" <?php if($value->sex==1)echo 'checked';?> disabled>
                                                                                <i class="ti-check text-active" aria-hidden="true" ></i> ชาย
                                                                            </label>
                                                                            <label class="btn btn-outline btn-info <?php if($value->sex==0)echo 'active';?>" disabled>
                                                                                <input type="radio" name="sex" autocomplete="off" value="0" <?php if($value->sex==0)echo 'checked';?> disabled>
                                                                                <i class="ti-check text-active" aria-hidden="true" ></i> หญิง
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2 ">ที่อยู่</label>
                                                                    <div class="col-md-10">
                                                                        <textarea type="text" class="form-control" name="address" disabled><?php echo $value->address; ?></textarea>
                                                                    </div>
                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">รูปโปรไฟล์</label>
                                                                    <div class="col-md-4">
                                                                        <input type="file" id="input-file-now-custom-1" class="dropify" disabled="disabled" accept="image/x-png,image/gif,image/jpeg" name="img" data-default-file="<?=base_url('upload/staffMassager/profile/'.$value->img)?>"/>
                                                                        <!-- class="dropify" -->
                                                                    </div>
                                                                    <label class="control-label text-right col-md-2">ความสามารถ</label>
                                                                    <div class="col-md-4" >

                                                                            <?php
                                                                                $arrAbi = explode(",",$value->ability);
                                                                                foreach($course as $key2 => $value2){
                                                                                    // echo "<pre>";
                                                                                    // print_r($arrAbi);
                                                                                    // echo "</pre>";
                                                                                    if(in_array($value2->course_id, $arrAbi)){
                                                                                        ?>
                                                                                        <input id="option<?=$key+1?><?=$key2+1?>" name="ability[]" value="<?php echo $value2->course_name ;?>" type="checkbox" checked disabled="disabled">
                                                                                        <label for="option<?=$key+1?><?=$key2+1?>"><?php echo $value2->course_name ;?></label>  
                                                                                        <?php 
                                                                                    }else{
                                                                                        ?>        
                                                                                        <input id="option<?=$key+1?><?=$key2+1?>" name="ability[]" value="<?php echo $value2->course_name ;?>" type="checkbox" disabled="disabled">
                                                                                        <label for="option<?=$key+1?><?=$key2+1?>"><?php echo $value2->course_name ;?></label> 
                                                                                        <?php   
                                                                                    }    
                                                                                }
                                                                            ?>
                                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="tab-pane p-20" id="image2<?=$key+1?>" role="tabpanel">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-2">สำเนาบัตรประชาชน</label>
                                                                <div class="col-md-10">
                                                                    <input type="file" name="IDCard" class="dropify" disabled="disabled" accept="image/x-png,image/gif,image/jpeg" data-default-file="<?=base_url('upload/staffMassager/IDCard/'.$value->IDCard)?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="control-label text-right col-md-2">ใบประกอบวิชาชีพ</label>
                                                                <div class="col-md-10">
                                                                    <input type="file" name="document" class="dropify" disabled="disabled" accept="image/x-png,image/gif,image/jpeg" data-default-file="<?=base_url('upload/staffMassager/document/'.$value->document)?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12 text-right">
                                                                    
                                                                    <button type="reset" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                                
                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                 <!-- edit Model edit -->        
                 <div id="modal_edit_staff" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">เพิ่มพนักงานนวด</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                            <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab2" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data3" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">ข้อมูล</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#image3" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">สำเนาเอกสาร</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="frmEditStaffMassager">
                            <div class="tab-content">
                                <div class="tab-pane active" id="data3" role="tabpanel">
                                    <div class="p-20">
                                        <div class="row">
                                            <!-- <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">อีเมล</label>
                                                    <div class="col-md-10">
                                                        <input type="email" class="form-control" name="email" id="email2" title="กรุณากรอกชื่อผู้ใช้งาน" >
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">ชื่อ</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="firstName" id="firstName">
                                                    </div>

                                                    <label class="control-label text-right col-md-2 ">นามสกุล</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"  name="lastName" id="lastName">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">เบอร์ติดต่อ</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="tell" id="tell">
                                                    </div>
                                                    <label class="control-label text-right col-md-2 ">เพศ</label>
                                                    <div class="col-md-4">
                                                        <div class="btn-group" data-toggle="buttons" role="group">
                                                            <label class="btn btn-outline btn-info labelMale">
                                                                <input type="radio" class="male" name="sex" autocomplete="off" value="1">
                                                                <i class="ti-check text-active" aria-hidden="true" ></i> ชาย
                                                            </label>
                                                            <label class="btn btn-outline btn-info labelFeMale">
                                                                <input type="radio" class="feMale" name="sex" autocomplete="off" value="0">
                                                                <i class="ti-check text-active" aria-hidden="true" ></i> หญิง
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">ที่อยู่</label>
                                                    <div class="col-md-10">
                                                        <textarea type="text" class="form-control" name="address" id="address"></textarea>
                                                    </div>
     
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">รูปโปรไฟล์</label>
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <img class="imgAvatar" alt="" width="100%" height="100%" >
                                                            <input type="file" id="img" class="upload img btn btn-secondary btn-xs" accept="image/x-png,image/gif,image/jpeg" name="img" onchange="readURLImg(this);"/>
                                                        </div>
                                                    </div>  

                                                    <label class="control-label text-right col-md-2">ความสามารถ</label>
                                                    <div class="col-md-4" >
                                                    <?php foreach ($course as $key => $value) { ?>
                                                        <input id="opEdit<?php echo $value->course_id; ?>" name="ability[]" value="<?php echo $value->course_id; ?>" type="checkbox">
                                                        <label for="opEdit<?php echo $value->course_id; ?>"><?php echo $value->course_name; ?></label>
                                                    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">สถานะ</label>
                                                    <div class="col-md-4">
                                                        <div class="btn-group" data-toggle="buttons" role="group">
                                                            <label class="btn btn-outline btn-info labelStatus0">
                                                                <input type="radio" class="status0" name="status" autocomplete="off" value="0">
                                                                <i class="ti-check text-active" aria-hidden="true" ></i> รอการอนุมัติ
                                                            </label>
                                                            <label class="btn btn-outline btn-info labelStatus1">
                                                                <input type="radio" class="status1" name="status" autocomplete="off" value="1">
                                                                <i class="ti-check text-active" aria-hidden="true" ></i> อนุมัติแล้ว
                                                            </label>
                                                            <label class="btn btn-outline btn-info labelStatus2">
                                                                <input type="radio" class="status2" name="status" autocomplete="off" value="2">
                                                                <i class="ti-check text-active" aria-hidden="true" ></i> ถูกบล็อก
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-20" id="image3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-2">สำเนาบัตรประชาชน</label>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <img class="IDCard" alt="" width="50%" >
                                                        <input type="file" name="IDCard" class="btn btn-secondary btn-xs" accept="image/x-png,image/gif,image/jpeg" onchange="readURLIDCard(this);"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-2">ใบประกอบวิชาชีพ</label>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <img class="document" alt="" width="50%" >
                                                        <input type="file" name="document" class="btn btn-secondary btn-xs" accept="image/x-png,image/gif,image/jpeg" onchange="readURLDoc(this);"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <input type="hidden" id="staffId" name="staffId">
                                                    <button type="reset" class="btn btn-warning">Clear</button>
                                                    <button type="submit" class="btn btn-success" >Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                                
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


            </div>
        </div>

    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->

    <script src="<?= base_url('assets/homePage/js/jquery-3.3.1.min.js') ?>"></script>

    <script>
        
        $(document).ready(function() {
            $('#myTable2').DataTable({"order": []});
        });
    </script>