
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">โปรไฟล์</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">โปรไฟล์</li>
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

                            
                        <!-- Nav tabs -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="frmEditStaffMassager">
                        <ul class="nav nav-tabs customtab2" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data3" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">ข้อมูล</span></a> </li>
                            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#image3" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">สำเนาเอกสาร</span></a> </li> -->
                        </ul>
                        <!-- Tab panes -->
                        
                        <?php foreach ($userById as $key => $value2) { ?>
                            <div class="tab-content">
                                <div class="tab-pane active" id="data3" role="tabpanel">
                                    <div class="p-20">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2 ">ชื่อ</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $value2->firstName; ?>">
                                                    </div>

                                                    <label class="control-label text-right col-md-2 ">นามสกุล</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control"  name="lastName" id="lastName" value="<?php echo $value2->lastName; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">เบอร์ติดต่อ</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="tell" id="tell" value="<?php echo $value2->tell; ?>">
                                                    </div>
                                                    <label class="control-label text-right col-md-2 ">เพศ</label>
                                                    <div class="col-md-4">
                                                        <div class="btn-group" data-toggle="buttons" role="group">
                                                                <!-- <?php echo "<pre>";?> -->
                                                                <!-- <?php print_r($value2) ;?> -->
                                                                <!-- <?php echo "</pre>";?> -->
                                                                <label class="btn btn-outline btn-info labelMale <?php if($value2->sex==1)echo 'active';?>" >
                                                                    <input type="radio" class="male" name="sex" autocomplete="off" value="1" <?php if($value2->sex==1)echo 'checked';?>>
                                                                    <i class="ti-check text-active" aria-hidden="true" ></i> ชาย
                                                                </label>
                                                                <label class="btn btn-outline btn-info labelFeMale <?php if($value2->sex==0)echo 'active';?>">
                                                                    <input type="radio" class="feMale" name="sex" autocomplete="off" value="0" <?php if($value2->sex==0)echo 'checked';?>>
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
                                                        <textarea type="text" class="form-control" name="address" id="address"><?php echo $value2->address; ?></textarea>
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
                                                            <!-- <img class="" alt="" width="100%" height="100%" src="upload/staffMassager/profile/<?php echo $value2->img; ?>"> -->
                                                            <input type="file" id="img" class="dropify" accept="image/x-png,image/gif,image/jpeg" name="img" data-default-file="<?=base_url('upload/staffMassager/profile/'.$value2->img)?>"/>
                                                        </div>
                                                    </div>  

                                                    <label class="control-label text-right col-md-2">ความสามารถ</label>
                                                    <div class="col-md-4" >
                                                        <?php
                                                            $arrAbi = explode(",",$value2->ability);
                                                            foreach($course as $key2 => $value){
                                                                // echo "<pre>";
                                                                // print_r($arrAbi);
                                                                // echo "</pre>";
                                                                if(in_array($value->course_id, $arrAbi)){
                                                                    ?>
                                                                    <input id="option<?=$key2+1?>" name="ability[]" value="<?php echo $value->course_id ;?>" type="checkbox" checked>
                                                                    <label for="option<?=$key2+1?>"><?php echo $value->course_name ;?></label>  
                                                                    <?php 
                                                                }else{
                                                                    ?>        
                                                                    <input id="option<?=$key2+1?>" name="ability[]" value="<?php echo $value->course_id ;?>" type="checkbox" >
                                                                    <label for="option<?=$key2+1?>"><?php echo $value->course_name ;?></label> 
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
                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <input type="hidden" id="staffId" name="staffId" value="<?php echo $value2->staff_massager_id; ?>">
                                                    <input type="hidden" id="status" name="status" value="<?php echo $value2->status; ?>">
                                                    
                                                    <button type="reset" class="btn btn-warning">Clear</button>
                                                    <button type="submit" class="btn btn-success" >Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <?php } ?> 
                        </form>
                            

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
                                        <button type="reset" class="btn btn-secondary">Clear</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>      
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                

                <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jqueryui/jquery-ui.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jqueryui/jquery-ui.js')?>"></script>


    <script type="text/javascript">

        $(document).ready(function() {
        
            $('#frmEditStaffMassager').validate({     
                submitHandler: (form,e)=>{
                    e.preventDefault();
                    var data = new FormData(form);
                    swal({
                        title: "คุณต้องการแก้ไขข้อมูลหรือไม่?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่, ต้องการ!',
                        cancelButtonText: 'ไม่, ยกเลิก'
                    }).then((result) => {
                        if(result.value){
                            $.ajax({
                                type: "post",
                                url: "<?= base_url('admin/edit_staff_massager2');?>", 
                                data: data,
                                dataType: 'json',
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: (data)=>{
                                    console.log(data)
                                    if(data.status===true){
                                        swal({
                                            title: "บันทึกข้อมูลสำเร็จ",
                                            type: "success",
                                            timer: 1000,
                                            showConfirmButton: false
                                        }).then((result)=>{
                                            location.replace("<?= base_url('staff/profile');?>");
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
                }	
            });













        });
</Script>