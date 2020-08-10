
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">ข้อมูลคอร์สนวด</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">ข้อมูลคอร์สนวด</li>
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
                            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#addCourse">เพิ่มคอร์สนวด</button>

                            <!-- Modal -->
                            <div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">เพิ่มคอร์สนวด</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" enctype="multipart/form-data" id="frmAddCourse">
                                                <div class="form-group">
                                                    <label for="courseName">ชื่อคอร์สนวด</label>
                                                    <input type="text" class="form-control" name="courseName" id="courseName" placeholder="Enter">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">ราคา / 1 ชั่วโมง</label>
                                                    <input type="text" class="form-control" name="price"  id="price" placeholder="Enter">
                                                </div>
                                                <div class="form-group">
                                                    <label for="course_get">ค่าจ้าง / 1 ชั่วโมง</label>
                                                    <input type="text" class="form-control" name="course_get"  id="course_get" placeholder="Enter">
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail">รายละเอียดคอร์สนวด</label>
                                                    <textarea name="detail" id="detail" rows="3" class="form-control" placeholder="รายละเอียด"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="img">ภาพประกอบ</label>
                                                    <input type="file" class="form-control-file dropify" id="img" name="img" accept="image/x-png,image/gif,image/jpeg">
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
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="2%" class="text-center" nowrap>ลำดับ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="20%" class="text-center" nowrap>คอร์สนวด</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-center" nowrap>ราคา/1ชั่วโมง</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-center" nowrap>ค่าจ้าง/1ชั่วโมง</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="20%" class="text-center" nowrap>รายละเอียด</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $key+1; ?></td>
                                                <td class="text-left">
                                                    
                                                    <div><?php echo $value->course_name; ?></div>
                                                    <div><img class="w-100" src="<?php echo base_url('upload/courseMS');?>/<?php echo $value->img;?>"></div>
                                                    
                                                </td>
                                                
                                                <td class="text-center"><?php echo $value->course_price; ?></td>
                                                <td class="text-center"><?php echo $value->course_get; ?></td>
                                                <td><?php echo $value->course_detail; ?></td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="badge badge-warning editCourse" data-toggle="modal" data-target="#editCourse" id="<?= $value->course_id; ?>"> 
                                                        <i class="fas fa-pencil-alt"> แก้ไข</i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="deleteCourse(<?=$value->course_id;?>)" class="badge badge-danger">
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
                <div class="modal fade" id="editCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">เพิ่มคอร์สนวด</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data" id="frmEditCourse">
                                    <div class="form-group">
                                        <label for="courseName1">ชื่อคอร์สนวด</label>
                                        <input type="text" class="form-control" name="courseName1" id="courseName1" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label for="price1">ราคา / 1 ชั่วโมง</label>
                                        <input type="text" class="form-control" name="price1"  id="price1" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label for="course_get1">ค่าจ้าง / 1 ชั่วโมง</label>
                                        <input type="text" class="form-control" name="course_get1"  id="course_get1" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label for="detail1">รายละเอียดคอร์สนวด</label>
                                        <textarea name="detail1" id="detail1" rows="3" class="form-control" placeholder="รายละเอียด"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="img1">ภาพประกอบ</label>
                                        <img class="img1" alt="" width="100%" >
                                        <input type="file" class="mt-1" name="img1" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);"/>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="courseId" name="courseId">
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
    function readURL(input) {
        // console.log(input.files[0]);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.img1').attr('src', e.target.result);
            }
                reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('.editCourse').click(function(){
            var id = $(this).attr("id");
            $.ajax({
                type: "post",
                url: "<?= base_url('officer/getCourseById');?>",
                data: {id:id},
                dataType: 'json',
                success:function(data){
                    $('#courseId').val(data["courseById"][0].course_id);
                    $('#courseName1').val(data["courseById"][0].course_name);
                    $('#price1').val(data["courseById"][0].course_price);
                    $('#detail1').val(data["courseById"][0].course_detail);
                    $('#course_get1').val(data["courseById"][0].course_get);

                    $('.img1').attr("src","<?= base_url('upload/courseMS/');?>"+data["courseById"][0].img);

                }
            });
            
        });

        $('#frmEditCourse').validate({     
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
                            url: "<?= base_url('officer/edit_Course');?>", 
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
                                        location.replace("<?= base_url('officer/MSCourse');?>");
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

       
       