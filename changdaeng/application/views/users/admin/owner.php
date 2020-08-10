
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">เจ้าของร้าน</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">เจ้าของร้าน</li>
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
                            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-room">เพิ่มเจ้าของร้าน</button>
                                <!-- Add Contact Popup Model  INSERT -->        
                                <div id="add-room" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">เพิ่มเจ้าของร้าน</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                                            <div class="modal-body">    
                                                <form method="post" id="addOwner" action="" enctype="multipart/form-data" class="form-horizontal form-material">
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
                                                    <a href="javascript:void(0)" class="badge badge-info editEmail" data-toggle="modal" data-target="#editEmail" id="<?= $value->owner_id;?>"> 
                                                        <i class="fas fa-pencil-alt"> แก้ไขอีเมล</i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="badge badge-warning editPass" data-toggle="modal" data-target="#editPass" id="<?= $value->owner_id;?>"> 
                                                        <i class="fas fa-pencil-alt"> แก้ไขรหัสผ่าน</i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="deleteOwner(<?=$value->owner_id;?>)" class="badge badge-danger">
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
                <!-- ============================================================== -->
                <div id="editEmail" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">แก้ไขอีเมล</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                            <div class="modal-body">    
                                <form method="post" id="editEmail1" action="" enctype="multipart/form-data" class="form-horizontal form-material">
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <label for="email1">อีเมล</label>
                                            <input type="email" name="email1" id="email1" value="" class="form-control"> 
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="ownerId1" name="ownerId1">
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
                <div id="editPass" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">แก้ไขรหัสผ่านใหม่</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                            <div class="modal-body">    
                                <form method="post" id="editPass1" action="" enctype="multipart/form-data" class="form-horizontal form-material">
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <label for="password2">รหัสผ่านใหม่</label>
                                            <input type="password" name="password2" id="password2" class="form-control"> 
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <label for="con_password2">ยืนยันรหัสผ่านใหม่</label>
                                            <input type="password" name="con_password2" class="form-control"> 
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" id="ownerId2" name="ownerId2">
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
                <!-- End PAge Content -->

    <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>

<Script>

    function deleteOwner(id){
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
                    url: "<?= base_url('owner/deleteOwner');?>",
                    data: {"id":id},
                    dataType: 'json',
                    success: (data)=>{
                        if(data.status===true){
                            swal({
                                title: "ลบข้อมูลสำเร็จ",
                                type: "success"
                            }).then((result)=>{
                                location.replace("<?= base_url('admin/owner');?>");
                            });
                        }else{
                            swal({
                                title: "ไม่สามารถได้กรุณาติดต่อผู้พัฒนาระบบ",
                                type: "warning"
                            });
                        }
                    }
                });
            }
        });
    }   

$(document).ready(function() {
    $('.editEmail').click(function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/getOwnerById');?>",
            data: {id:id},
            dataType: 'json',
            success:function(data){
                $('#ownerId1').val(data["userById"][0].owner_id);
                $('#email1').val(data["userById"][0].email);
            }
        });
        
    });
    $('#editEmail1').validate({     
        rules:{
            email1:{
                required: true,
                remote:{
                    type: "POST",
                    url: "<?=base_url('admin/chk_mail_owner');?>",
                    data:{
                        email: function(){
                            return $("#email1").val();
                        }
                    }
                }
            }
        },
        messages:{
            email1:{remote: "อีเมลนี้มีผู้ใช้งานแล้ว",}
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
                        url: "<?= base_url('admin/edit_owner');?>", 
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
                                    location.replace("<?= base_url('admin/owner');?>");
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
    $('.editPass').click(function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/getOwnerById');?>",
            data: {id:id},
            dataType: 'json',
            success:function(data){
                $('#ownerId2').val(data["userById"][0].owner_id);
            }
        });
        
    });
    $('#editPass1').validate({
        rules:{
            password2:{required: true,minlength: 8},
            con_password2:{required: true,equalTo:"#password2"},
        },
        messages:{
            password2:{required: "กรุณากรอกรหัสผ่าน",minlength: "กรุณากรอกอย่างน้อย 8 ตัว"},
            con_password2:{required: "กรุณากรอกรหัสผ่านให้เหมือนกัน",equalTo: "#กรุณากรอกรหัสผ่านให้เหมือนกัน"},
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
                        url: "<?= base_url('admin/edit_owner');?>", 
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
                                    location.replace("<?= base_url('admin/owner');?>");
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



    $('#addOwner').validate({
                rules:{
                    email:{
                        required: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('admin/chk_mail_owner');?>",
                            data:{
                                email: function(){
                                    return $("#email").val();
                                }
                            }
                        }
                    },
                    password:{required: true,minlength: 8},
                    con_password:{required: true,equalTo:"#password"},
                },
                messages:{
					email:{remote: "อีเมลนี้มีผู้ใช้งานแล้ว",},
                    password:{required: "กรุณากรอกรหัสผ่าน",minlength: "กรุณากรอกอย่างน้อย 8 ตัว"},
                    con_password:{required: "กรุณากรอกรหัสผ่านให้เหมือนกัน",equalTo: "#กรุณากรอกรหัสผ่านให้เหมือนกัน"},
                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    var data = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('admin/add_owner');?>", 
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
                                    location.replace("<?= base_url('admin/owner');?>");
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
});
</Script>