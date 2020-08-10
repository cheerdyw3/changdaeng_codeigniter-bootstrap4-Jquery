
    <div class="container emp-profile">
    <!-- <?php  print_r($query); ?> -->
    <?php foreach($query as $key => $value){ ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                    <img src="<?php echo base_url('upload/adviser');?>/<?php echo $value->img;?>">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5><?php echo $value->firstName." ".$value->lastName; ?></h5>
                        
                        <h6>ไกด์</h6>
                        <p class="proile-rating">รหัสไกด์ : <span><?php echo $value->adviser_id; ?></span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">โปรไฟล์</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="profile-edit-btn" value="แก้ไขโปรไฟล์"
                        data-toggle="modal" data-target="#exampleModalCenter">แก้ไขโปรไฟล์</button>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>ชื่อ / นามสกุล</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $value->firstName." ".$value->lastName; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>เพศ</label>
                                </div>
                                <div class="col-md-6">
                                    <!-- <p><?php echo $value->sex; ?></p> -->
                                    <?php if($value->sex == 0){?>
                                        <p>หญิง</p>
                                    <?php }else{?>
                                        <p>ชาย</p>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>ที่อยู่<label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $value->address; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>ค่าคอม<label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $value->commission; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>บัตรประชาชน<label>
                                </div>
                                <div class="profile-img">
                                <img src="<?php echo base_url('upload/adviser/IDCard');?>/<?php echo $value->IDCard;?>">
                                </div>
                            </div>
                            <hr>         
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>โทรศัพท์<label>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-secondary  editCourse ml-1" data-toggle="modal" data-target="#editTel" >แก้ไข</a>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $value->tel; ?></p>
                                    </div>
                                </div>
                            <hr>         
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>อีเมล์<label>                                                   
                                        <a href="javascript:void(0)" class="badge badge-pill badge-secondary  editCourse ml-1" data-toggle="modal" data-target="#editEmail" >แก้ไข</a>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $value->email; ?></p>
                                    </div>
                                </div>
                            <hr>         
                               <div class="row">
                                    <div class="col-md-6">
                                        <label>รหัสผ่าน<label>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-secondary  editCourse ml-1" data-toggle="modal" data-target="#editPass" >แก้ไข</a>
                                    </div>
                                    <div class="col-md-6">
                                        <p>************</p>
                                    </div>
                                </div>
                            
                        </div>

                    </div>
                </div>
            </div>

            
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <form method="post" id="frmEdit" enctype="multipart/form-data">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขโปรไฟล์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                      <label for="firstName">ชื่อ</label>
                                      <input type="text" class="form-control" id="firstName"  name="firstName" value="<?php echo $value->firstName; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="lastName">นามสกุล</label>
                                      <input type="text" class="form-control" id="lastName"  name="lastName" value="<?php echo $value->lastName; ?>" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="sex">เพศ</label>
                                        <select class="form-control" id="sex" name="sex">
                                        <?php if($value->sex==0){?>
                                        <option value="0" selected>หญิง</option>
                                        <option value="1" >ชาย</option>
                                        <?php }else{?>
                                            <option value="0" >หญิง</option>
                                        <option value="1" selected>ชาย</option>
                                        <?php }?>
                                        </select>
                                    </div>
                                      <div class="col-md-6  mb-3">
                                        <label for="com">ค่าคอมมิชชั่น</label>
                                        <input type="number" class="form-control" id="com" name="com" value="<?php echo $value->commission; ?>">
                                      </div>
                                      <div class="col-md-12  mb-3">
                                        <label for="address">ที่อยู่</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $value->address; ?>">
                                      </div>
                                      <div class="col-md-6  mb-3">
                                        <label for="img">แก้ไขโปรไฟล์</label>
                                        <input type="file" class="form-control" id="img" name="img" accept="image/x-png,image/gif,image/jpeg">
                                      </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" id="adviser_id" name="adviser_id" value="<?php echo $value->adviser_id; ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                           
                        </div>
                    </div>
                    </form>
                </div>
        

        <div class="modal fade" id="editTel" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <form method="post" id="frmTel" enctype="multipart/form-data">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขเบอร์โทรศัพท์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-md-8  mb-3">
                                        <label for="tel1">เบอร์โทรศัพท์</label>
                                        <input type="number" class="form-control" id="tel1" name="tel1" value="<?php echo $value->tel; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" id="adviser_id4" name="adviser_id4" value="<?php echo $value->adviser_id; ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                           
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal fade" id="editEmail" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <form method="post" id="frmEmail" enctype="multipart/form-data">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขอีเมลล์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-md-8  mb-3">
                                        <label for="email2">อีเมล์</label>
                                        <input type="email2" class="form-control" id="email2" name="email2" value="<?php echo $value->email; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" id="adviser_id2" name="adviser_id2" value="<?php echo $value->adviser_id; ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                           
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal fade" id="editPass" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <form method="post" id="frmPass" enctype="multipart/form-data">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขรหัสผ่าน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-md-6  mb-3">
                                        <label for="pass">รหัสผ่านใหม่</label>
                                        <input type="password" class="form-control" id="pass" name="pass" required>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="con_pass">ยืนยันรหัสผ่านใหม่</label>
                                        <input type="password" class="form-control" id="con_pass" name="con_pass" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" id="adviser_id3" name="adviser_id3" value="<?php echo $value->adviser_id; ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                           
                        </div>
                    </div>
                </form>
            </div>

        <?php }?>
    </div>
    </div>
    <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>

<Script>
    $('#frmEdit').validate({
                rules:{
                },
                messages:{

                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    var data = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('main/edit_adviser');?>", 
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
                                    location.replace("<?= base_url('main/profile_adviser');?>");
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

    $('#frmPass').validate({
        rules:{
            pass:{required: true,minlength: 8},
            con_pass:{required: true,equalTo:"#pass"},
        },
        messages:{
            pass:{required: "กรุณากรอกรหัสผ่าน",minlength: "กรุณากรอกอย่างน้อย 8 ตัว"},
            con_pass:{required: "กรุณากรอกรหัสผ่านให้เหมือนกัน",equalTo: "#กรุณากรอกรหัสผ่านให้เหมือนกัน"},
        },
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
                        url: "<?= base_url('main/edit_adviser_passANDmail');?>", 
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
                                    location.replace("<?= base_url('main/profile_adviser');?>");
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

    $('#frmEmail').validate({
        rules:{
            email2:{
                required: true,
                remote:{
                type: "POST",
                url: "<?=base_url('main/chk_mail_adviser2');?>",
                data:{
                    email2: function(){
                        return $("#email2").val();
                    }
                }
            }}
        },
        messages:{
            email2:{remote: "อีเมลนี้มีการใช้งานแล้ว"}
        },
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
                        url: "<?= base_url('main/edit_adviser_passANDmail');?>", 
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
                                    location.replace("<?= base_url('main/profile_adviser');?>");
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

    $('#frmTel').validate({
        rules:{
            tel1:{
                required: true,
                remote:{
                type: "POST",
                url: "<?=base_url('main/chk_tel_adviser2');?>",
                data:{
                    tel1: function(){
                        return $("#tel1").val();
                    }
                }
            }}
        },
        messages:{
            tel1:{remote: "เบอร์นี้มีการใช้งานแล้ว"}
        },
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
                        url: "<?= base_url('main/edit_adviser_passANDmail');?>", 
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
                                    location.replace("<?= base_url('main/profile_adviser');?>");
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
</Script>

                