
                
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
                                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="frmEditEmail">
                                <ul class="nav nav-tabs customtab2" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data3" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Email</span></a> </li>
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
                                                            <label class="control-label text-right col-md-2 ">อีเมล</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $value2->email; ?>">
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
                                                            <input type="hidden" id="officerId" name="officerId" value="<?php echo $value2->officerId; ?>">
                                                            
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="frmEditPass">
                                <ul class="nav nav-tabs customtab2" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data3" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Password</span></a> </li>
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
                                                            <label class="control-label text-right col-md-2 ">รหัสผ่านใหม่</label>
                                                            <div class="col-md-4">
                                                                <input type="password" class="form-control" name="pass" id="pass" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-2 ">ยืนยันรหัสผ่านใหม่</label>
                                                            <div class="col-md-4">
                                                                <input type="password" class="form-control" name="con_pass" id="con_pass" required>
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
                                                            <input type="hidden" id="officerId" name="officerId" value="<?php echo $value2->officerId; ?>">
                                                            
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
                

    <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jqueryui/jquery-ui.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jqueryui/jquery-ui.js')?>"></script>


    <script type="text/javascript">

        $(document).ready(function() {
        
            $('#frmEditPass').validate({
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
                                url: "<?= base_url('officer/changeEmailAndPass');?>", 
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
                                            location.replace("<?= base_url('officer/changeEamilAndPass');?>");
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

            $('#frmEditEmail').validate({
                rules:{
                    email:{
                        required: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('officer/chk_email_officer');?>",
                            data:{
                                email: function(){
                                    return $("#email").val();
                                }
                            }
                        }
                    }
                },
                messages:{
                    email:{remote: "อีเมลนี้มีผู้ใช้งานแล้ว",}
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
                                url: "<?= base_url('officer/changeEmailAndPass');?>", 
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
                                            location.replace("<?= base_url('officer/changeEamilAndPass');?>");
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