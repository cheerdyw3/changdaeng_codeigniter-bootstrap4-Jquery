<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">จัดการเจ้าหน้าที่</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
            <li class="breadcrumb-item active">จัดการเจ้าหน้าที่</li>
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
            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-officer">เพิ่มจ้าหน้าที่</button>
                <!-- Add Contact Popup Model  INSERT -->        
                <div id="add-officer" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">เพิ่มจ้าหน้าที่</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                            <div class="modal-body">
                                <form action=" <?php echo base_url('admin/add_officer'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-material" id="frm_add_officer">
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" name="firstName" class="form-control" placeholder="ชื่อ"> </div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" name="lastName" class="form-control" placeholder="นามสกุล"> </div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" name="tell" class="form-control" placeholder="เบอร์โทร"> </div>
                                        <div class="col-md-12 m-b-20">
                                            <textarea name="address"  rows="3" class="form-control" placeholder="ที่อยู่"></textarea>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" name="email" class="form-control" placeholder="อีเมล"> </div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" name="password" class="form-control" placeholder="password"> </div>
                                        <div class="col-md-12 m-b-20">
                                            <label class="control-label col-md-4">รูปโปรไฟล์</label>
                                            <!-- <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                                <span><i class="ion-upload m-r-5"></i>รูปภาพโปรไฟล์</span>
                                                <input type="file" name="img" class="upload"> 
                                                
                                            </div> -->
                                            <input type="file" id="input-file-now-custom-1" class="dropify" accept="image/x-png,image/gif,image/jpeg"     data-default-file="<?=base_url('upload/officer/'.'default.jpg')?>" name="img"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="submit1" class="btn btn-info waves-effect" >Save</button>
                                        <button type="reset" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button> <!--data-dismiss="modal"-->
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
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9" width="2%" class="text-center" nowrap>id</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8" width="5%" class="text-center" nowrap>รูปภาพ</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7" width="10%" class="text-center" nowrap>ชื่อ</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>นามสกุล</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="20%" class="text-center" nowrap>ที่อยู่</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="10%" class="text-center" nowrap>เบอร์โทร</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="15%" class="text-center" nowrap>อีเมล</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="10%" class="text-center" nowrap>วันที่สมัคร</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="20%" class="text-center" nowrap>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($query as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->officerId; ?></td>
                                <td>
                                    <img src="<?php echo base_url('upload/officer');?>/<?php echo $value->img;?>" width="30px">
                                </td>
                                <td><?php echo $value->firstName; ?></td>
                                <td><?php echo $value->lastName; ?></td>
                                <td><?php echo $value->address; ?></td>
                                <td><?php echo $value->tell; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?= dateTimeThai(date("d M Y H:i", strtotime($value->startDate)));?></td>
                                <td>
                                    <a href="javascript:void(0)" class="badge badge-warning" data-toggle="modal" data-target="#edit-officer<?=$key+1?>"> 
                                        <i class="fas fa-pencil-alt"> แก้ไข</i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="deleteOfficer(<?=$value->officerId;?>)" class="badge badge-danger">
                                        <i class="fas fa-minus-circle"> ลบ</i>
                                    </a>
                                    

                                </td>
                            </tr>
                                <!-- Add Contact Popup Model  EDIT -->        
                                <div id="edit-officer<?=$key+1?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">แก้ไขเจ้าหน้าที่</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                <h4 class="modal-title" id="myModalLabel"></h4> 
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?=base_url('admin/edit_officer')?>"  method="post" enctype="multipart/form-data" class="form-horizontal form-material"> 
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="firstName">ชื่อ</label>
                                                            <input type="text" name="firstName" value="<?php echo $value->firstName; ?>" class="form-control" required> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="firstName">นามสกุล</label>
                                                            <input type="text" name="lastName" value="<?php echo $value->lastName; ?>" class="form-control" required> </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="firstName">เบอร์</label>
                                                            <input type="number" name="tell"  value="<?php echo $value->tell; ?>" class="form-control" required> </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <label for="firstName">ที่อยู่</label>
                                                            <textarea name="address" rows="3" class="form-control"><?php echo $value->address; ?></textarea>
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <label class="control-label col-md-4">รูปโปรไฟล์</label>
                                                            <input type="file" disabled="disabled" class="dropify" accept="image/x-png,image/gif,image/jpeg" data-default-file="<?=base_url('upload/officer/'.$value->img)?>"/>
                                                            <input type="file" name="img" class="upload" accept="image/x-png,image/gif,image/jpeg">
                                                    
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="officerId" value="<?php echo $value->officerId; ?>">
                                                        <button type="button" class="btn btn-info waves-effect" onclick="confirmalert(event);">Save</button>
                                                        <button type="reset" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button> <!--data-dismiss="modal"-->
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
<script>
    function deleteOfficer(id){
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
                    url: "<?= base_url('admin/deleteOfficer');?>",
                    data: {"id":id},
                    dataType: 'json',
                    success: (data)=>{
                        if(data.status===true){
                            swal({
                                title: "ลบข้อมูลสำเร็จ",
                                type: "success"
                            }).then((result)=>{
                                location.replace("<?= base_url('admin/add_officer');?>");
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


    function confirmalert(e) {
        
        e.preventDefault();
        var frm = e.target.form;
        swal({
            title: "คุณต้องการแก้ไขข้อมูลหรือไม่?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ต้องการ!',
            cancelButtonText: 'ไม่, ยกเลิก'
        }).then(function(isConfirm) {
            if (isConfirm.value) {			
                frm.submit(); // <--- submit form programmatically
                success: (data)=>{
                }
            } else {
                swal("ยกเลิกการบันทึก !" , "กลับสู่หน้าแก้ไข", "error");
            }
        })
    }
</script>
