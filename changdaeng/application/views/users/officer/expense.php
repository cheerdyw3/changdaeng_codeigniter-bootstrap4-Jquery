
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">รายจ่ายเบ็ดเตล็ด</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item ">ข้อมูลรายรับรายจ่าย</li>
                            <li class="breadcrumb-item active">รายจ่ายเบ็ดเตล็ด</li>
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
                            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add_room">บันทึกรายจ่าย</button>

                            <!-- Modal -->
                            <div class="modal fade" id="add_room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">บันทึกรายจ่าย</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" enctype="multipart/form-data" id="frmAddEx">

                                                <div class="form-group">
                                                    <label for="bed">ประเภทการจ่าย</label>
                                                    <select class="custom-select col-12" id="inlineFormCustomSelect" name="type">
                                                        <option selected="">เลือก...</option>
                                                        <option value="1">เบ็ดเตล็ด</option>
                                                        <option value="2">อื่นๆ</option>
                                                        <option value="3">ค่าจ้างพนักงานนวด</option>
                                                        <option value="0">รายการนวด</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">รายละเอียดการจ่าย</label>
                                                    <textarea name="description" id="description" rows="2" class="form-control" placeholder="รายละเอียด"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="money">จำนวนเงิน</label>
                                                    <input type="number" class="form-control" name="money" id="money" placeholder="Enter">
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

                                <div class="table-responsive m-t-40">
                                    <!-- <table id="myTable" class="table table-striped table-hover table-danger" data-tablesaw-mode="swipe"> -->
                                    <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="2%" class="text-center" nowrap>#</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="10%" class="text-center" nowrap>ประเภท</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="20%" class="text-left" nowrap>รายละเอียด</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-center" nowrap>จำนวนเงิน</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="15%" class="text-left" nowrap>วันที่</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $key+1; ?></td>
                                                
                                                <?php if($value->type==0){?>
                                                    <td class="text-left"><span class="badge badge-primary">รายการนวด</span></td>
                                                <?php }else if($value->type==1){?> 
                                                    <td class="text-left"><span class="badge badge-primary">รายการนวด</span></td>
                                                <?php }else if($value->type==2){?>
                                                    <td class="text-left"><span class="badge badge-primary">อื่นๆ</span></td>
                                                <?php }else{?>
                                                    <td class="text-left"><span class="badge badge-primary">ค่าจ้างพนักงานนวด</span></td>
                                                <?php }?>
                                                <td class="text-left"><?php echo $value->description; ?></td>
                                                <td class="text-center"><?php echo $value->money; ?></td>
                                                <td class="text-left"><?= dateTimeThai(date("d M Y H:i", strtotime($value->createDate)));?></td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="badge badge-warning" data-toggle="modal" data-target="#edit-officer<?=$key+1?>"> 
                                                        <i class="fas fa-pencil-alt"> แก้ไข</i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="deleteRoom(<?=$value->expense_id;?>)" class="badge badge-danger">
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
                <!-- End PAge Content -->
                <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>

<Script>
    $('#frmAddEx').validate({
                rules:{
                    description:{required: true},
                    money:{required: true}
                },
                messages:{
                    description:{required: "กรุณากรอก"},
                    money:{required: "กรุณากรอก"}
                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    var data = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/create_expense');?>", 
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
                                    location.replace("<?= base_url('officer/expense');?>");
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
</Script>
       