
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">จัดการข้อมูลไกด์</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">จัดการข้อมูลไกด์</li>
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
                            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-room">เพิ่มไกด์</button>
                                <!-- Add Contact Popup Model  INSERT -->        
                                <div id="add-room" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">เพิ่มไกด์</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                                            <div class="modal-body">    
                                                <form method="post" id="addU" action="" enctype="multipart/form-data" class="form-horizontal form-material">
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="email">อีเมล</label>
                                                            <input type="email" name="email" id="email"  class="form-control"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="password">รหัสผ่าน</label>
                                                            <input type="password" name="password" id="password" class="form-control"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="con_password">ยืนยันรหัสผ่าน</label>
                                                            <input type="password" name="con_password" class="form-control"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="con_password">เบอร์โทร</label>
                                                            <input type="number" name="tel" id="tel" class="form-control"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="con_password">ค่าคอมมิชชั่น</label>
                                                            <input type="number" name="com" id="com" class="form-control"> 
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        
                                                        <button type="reset" class="btn btn-default waves-effect" >Cancel</button>
                                                        <button type="submit" id="" class="btn btn-info waves-effect" >Save</button>
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
                                    <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="2%" class="text-left" nowrap>#</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-left" nowrap>อีเมล</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-left" nowrap>สร้างเมื่อ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-left" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $key+1; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?= dateTimeThai(date("d M Y H:i", strtotime($value->createDate)));?></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="badge badge-warning editA" data-toggle="modal" data-target="#edit" id="<?= $value->adviser_id;?>"> 
                                                        <i class="fas fa-pencil-alt"> แก้ไข</i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="deleteAdviser(<?=$value->adviser_id;?>)" class="badge badge-danger">
                                                        <i class="fas fa-minus-circle"> ลบ</i>
                                                    </a>
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
                <div id="edit" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">เพิ่มไกด์</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h4 class="modal-title" id="myModalLabel"></h4> 
                            </div>
                            <div class="modal-body">    
                                <form method="post" id="editA" action="" enctype="multipart/form-data" class="form-horizontal form-material" >
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 m-b-20">
                                                <label for="firstName1">ชื่อ</label>
                                                <input type="text" name="firstName1" id="firstName1" class="form-control"  required> 
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <label for="lastName1">นามสกุล</label>
                                                <input type="text" name="lastName1" id="lastName1" class="form-control"  required> 
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <label for="address1">ที่อยู่</label>
                                                <input type="text" name="address1" id="address1" class="form-control"  required> 
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <label for="com1">ค่าคอมมิชชั่น</label>
                                                <input type="number" name="com1" id="com1" class="form-control"  required> 
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <div class="col-md-4">
                                                    <label for="sex1">เพศ</label>
                                                    <div class="btn-group" data-toggle="buttons" role="group">
                                                        <label class="btn btn-outline btn-info labelMale">
                                                            <input type="radio" class="male" name="sex1" autocomplete="off" value="1">
                                                            <i class="ti-check text-active" aria-hidden="true" ></i> ชาย
                                                        </label>
                                                        <label class="btn btn-outline btn-info labelFeMale">
                                                            <input type="radio" class="feMale" name="sex1" autocomplete="off" value="0">
                                                            <i class="ti-check text-active" aria-hidden="true" ></i> หญิง
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <label for="status1">สถานะ</label>
                                                <div class="col-md-4">
                                                    <div class="btn-group" data-toggle="buttons" role="group">
                                                        <label class="btn btn-outline btn-info labelStatus0">
                                                            <input type="radio" class="status0" name="status1" autocomplete="off" value="0">
                                                            <i class="ti-check text-active" aria-hidden="true" ></i> รอการอนุมัติ
                                                        </label>
                                                        <label class="btn btn-outline btn-info labelStatus1">
                                                            <input type="radio" class="status1" name="status1" autocomplete="off" value="1">
                                                            <i class="ti-check text-active" aria-hidden="true" ></i> อนุมัติแล้ว
                                                        </label>
                                                        <label class="btn btn-outline btn-info labelStatus2">
                                                            <input type="radio" class="status2" name="status1" autocomplete="off" value="2">
                                                            <i class="ti-check text-active" aria-hidden="true" ></i> ถูกบล็อก
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <div class="card">
                                                    <label for="img">รูปโปรไฟล์</label>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <img class="img" alt="" width="50%" >
                                                            <input type="file" name="img" class="upload" accept="image/x-png,image/gif,image/jpeg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 m-b-20">
                                                <div class="card">
                                                    <label for="idcard">สำเนาบัตรประชาชน</label>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <img class="idcard" alt="" width="50%" >
                                                            <input type="file" name="idcard" class="upload" accept="image/x-png,image/gif,image/jpeg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="adviserId" name="adviserId">
                                        <button type="reset" class="btn btn-default waves-effect" >Cancel</button>
                                        <button type="submit" class="btn btn-info waves-effect">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

    <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>

<Script>
    function deleteAdviser(id){
        swal({
            title: "คุณต้องการลบหรือไม่?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ต้องการลบ!',
            cancelButtonText: 'ไม่, ยกเลิก'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('admin/deleteAdviser');?>",
                    data: {"id":id},
                    dataType: 'json',
                    success: (data)=>{
                        if(data.status===true){
                            swal({
                                title: "ลบข้อมูลสำเร็จ",
                                type: "success"
                            }).then((result)=>{
                                location.replace("<?= base_url('admin/adviser');?>");
                            });
                        }else{
                            swal({
                                title: "ไม่สามารถลบได้ ยังไม่ได้จ่ายค่าคอมมิชชั่น",
                                type: "warning"
                            });
                        }
                    }
                });
            }
        });
    } 



$(document).ready(function() {
    $('#addU').validate({
                rules:{
                    email:{
                        required: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('admin/chk_mail_adviser');?>",
                            data:{
                                email: function(){
                                    return $("#email").val();
                                }
                            }
                        }
                    },
                    password:{required: true,minlength: 8},
                    con_password:{required: true,equalTo:"#password"},
                    com:{required: true,number:true},
                    tel:{
                        required: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('admin/chk_tel_adviser');?>",
                            data:{
                                tel: function(){
                                    return $("#tel").val();
                                }
                            }
                        }
                    }
                },
                messages:{
					email:{remote: "อีเมลนี้มีผู้ใช้งานแล้ว",},
                    password:{required: "กรุณากรอกรหัสผ่าน",minlength: "กรุณากรอกอย่างน้อย 8 ตัว"},
                    con_password:{required: "กรุณากรอกรหัสผ่านให้เหมือนกัน",equalTo: "#กรุณากรอกรหัสผ่านให้เหมือนกัน"},
                    com:{required: "กรุณากรอกค่าคอมมิชชั่น",number:"กรุณากรอกเป็นตัวเลข"},
                    tel:{remote: "เบอร์นี้มีการใช้งานแล้ว"},
                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    var data = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('admin/add_adviser');?>", 
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
                                    location.replace("<?= base_url('admin/adviser');?>");
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

    $('.editA').click(function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/getAdviserById');?>",
            data: {id:id},
            dataType: 'json',
            success:function(data){
                console.log(data);
                $('#adviserId').val(data["userById"][0].adviser_id);
                $('#email1').val(data["userById"][0].email);
                $('#firstName1').val(data["userById"][0].firstName);
                $('#lastName1').val(data["userById"][0].lastName);
                $('#tel1').val(data["userById"][0].tel);
                $('#com1').val(data["userById"][0].commission);
                $('#address1').val(data["userById"][0].address);


                if(data["userById"][0].sex==1){
                    $('.labelFeMale').removeClass('active');
                    $('.labelMale').addClass('active');
                    $('.feMale').removeAttr("checked","");
                    $('.male').attr("checked","");
                }else{
                    $('.labelMale').removeClass('active');
                    $('.labelFeMale').addClass('active');
                    $('.male').removeAttr("checked","");
                    $('.feMale').attr("checked","");
                }
                
                if(data["userById"][0].status==0){
                    $('.labelStatus1').removeClass('active');
                    $('.labelStatus2').removeClass('active');
                    $('.labelStatus0').addClass('active');
                    $('.status1').removeAttr("checked","");
                    $('.status2').removeAttr("checked","");
                    $('.status0').attr("checked","");
                }else if(data["userById"][0].status==1){
                    $('.labelStatus0').removeClass('active');
                    $('.labelStatus2').removeClass('active');
                    $('.labelStatus1').addClass('active');
                    $('.status0').removeAttr("checked","");
                    $('.status2').removeAttr("checked","");
                    $('.status1').attr("checked","");
                }else{
                    $('.labelStatus0').removeClass('active');
                    $('.labelStatus1').removeClass('active');
                    $('.labelStatus2').addClass('active');
                    $('.status0').removeAttr("checked","");
                    $('.status1').removeAttr("checked","");
                    $('.status2').attr("checked","");
                }
            
            
                $('.img').attr("src","<?= base_url('upload/adviser/');?>"+data["userById"][0].img);
                $('.idcard').attr("src","<?= base_url('upload/adviser/IDCard/');?>"+data["userById"][0].IDCard);
            }
        });
        
    });

    $('#editA').validate({     
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
                        url: "<?= base_url('admin/edit_adviser');?>", 
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
                                    location.replace("<?= base_url('admin/adviser');?>");
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