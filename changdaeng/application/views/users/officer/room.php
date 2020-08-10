                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">ข้อมูลห้องนวด</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">ข้อมูลห้องนวด</li>
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
                            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add_room">เพิ่มห้องนวด</button>

                            <!-- Modal -->
                            <div class="modal fade" id="add_room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">เพิ่มห้อง</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" enctype="multipart/form-data" id="frmAddRoom">
                                                <div class="form-group">
                                                    <label for="number">หมายเลขห้อง</label>
                                                    <input type="text" class="form-control" name="number" id="number" placeholder="Enter">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bed">จำนวนเตียง</label>
                                                    <input type="text" class="form-control" name="bed"  id="bed" placeholder="Enter">
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail">รายละเอียดห้อง</label>
                                                    <textarea name="description" id="detail" rows="3" class="form-control" placeholder="รายละเอียด"></textarea>
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
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="2%" class="text-center" nowrap>id</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-center" nowrap>หมายเลขห้อง</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-center" nowrap>เตียง</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-center" nowrap>ใช้งาน/เตียง</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="20%" class="text-center" nowrap>รายละเอียด</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-center" nowrap>สถานะ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value->room_id; ?></td>
                                                <td><?php echo $value->number; ?></td>
                                                <td><?php echo $value->bed; ?></td>
                                                <td><?php echo $value->use_bed; ?></td>
                                                <td><?php echo $value->description; ?></td>
                                                <td>
                                                    <?php if($value->status == 0){?>
                                                        <span class="badge badge-success">เปิดการใช้งาน</span>
                                                    <?php }else if($value->status == 2){?>
                                                        <span class="badge badge-secondary">ปิดการใช้งาน</span>
                                                    <?php } ?> 
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class="badge badge-warning editRoom" data-toggle="modal" data-target="#edit" id="<?= $value->room_id; ?>"> 
                                                        <i class="fas fa-pencil-alt"> แก้ไข</i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="deleteRoom(<?=$value->room_id;?>)" class="badge badge-danger">
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
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">แก้ไขห้อง</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data" id="frmEditRoom">
                                    <div class="form-group">
                                        <label for="number1">หมายเลขห้อง</label>
                                        <input type="text" class="form-control" name="number1" id="number1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bedNum1">จำนวนเตียง</label>
                                        <input type="number" class="form-control" name="bedNum1"  id="bedNum1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="detail1">รายละเอียดห้อง</label>
                                        <textarea name="detail1" id="detail1" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-group" data-toggle="buttons" role="group">
                                            <label class="btn btn-outline btn-info labelStatus0">
                                                <input type="radio" class="status0" name="status" autocomplete="off" value="0">
                                                <i class="ti-check text-active" aria-hidden="true" ></i> เปิดใช้งาน
                                            </label>
                                            <label class="btn btn-outline btn-info labelStatus1">
                                                <input type="radio" class="status1" name="status" autocomplete="off" value="2">
                                                <i class="ti-check text-active" aria-hidden="true" ></i> ปิดปรับปรุง
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="roomId" name="roomId">
                                        <button type="reset" class="btn btn-secondary">Clear</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
    <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>

<Script>
$(document).ready(function() {
    $('.editRoom').click(function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url: "<?= base_url('officer/getRoomById');?>",
            data: {id:id},
            dataType: 'json',
            success:function(data){
                if(data["roomById"][0].use_bed > 0){
                    swal({
                        text: "ขณะนี้ห้องมีการใช้งานอยู่ไม่สามารถแก้ไขได้",
                        type: "warning",
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if(result.value == true || result.dismiss == "overlay"){
                            $('#edit').modal('hide');
                        }
                    });
                }else{
                    $('#roomId').val(data["roomById"][0].room_id);
                    $('#number1').val(data["roomById"][0].number);
                    $('#bedNum1').val(data["roomById"][0].bed);
                    $('#detail1').val(data["roomById"][0].description);
                    if(data["roomById"][0].status==0){
                        $('.labelStatus1').removeClass('active');
                        $('.labelStatus2').removeClass('active');
                        $('.labelStatus0').addClass('active');
                        $('.status1').removeAttr("checked","");
                        $('.status2').removeAttr("checked","");
                        $('.status0').attr("checked","");
                    }else if(data["roomById"][0].status==2){
                        $('.labelStatus0').removeClass('active');
                        $('.labelStatus2').removeClass('active');
                        $('.labelStatus1').addClass('active');
                        $('.status0').removeAttr("checked","");
                        $('.status2').removeAttr("checked","");
                        $('.status1').attr("checked","");
                    }
                }
            }
        });
        
    });

    $('#frmEditRoom').validate({     
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
                        url: "<?= base_url('officer/edit_Room');?>", 
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
                                    location.replace("<?= base_url('officer/room');?>");
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

       