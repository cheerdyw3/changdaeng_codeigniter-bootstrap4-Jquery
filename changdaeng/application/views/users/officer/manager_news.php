
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">ข้อมูลข่าวประชาสัมพันธ์</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">ข้อมูลข่าวประชาสัมพันธ์</li>
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
                            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#addNews">เพิ่มข่าวประชาสัมพันธ์</button>

                            <!-- Modal -->
                            <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">เพิ่มข่าวประชาสัมพันธ์</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" enctype="multipart/form-data" id="frmAddNew">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label for="" class="col-4 pr-0">สถานะการแสดง : </label>
                                                            <div class="switch col-4 text-left pl-0">
                                                                <label for="statusNew">
                                                                    OFF
                                                                    <input type="checkbox" checked="checked" id="statusNew"><span class="lever switch-col-deep-orange"></span>
                                                                    ON
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="newName">ชื่อคอร์สนวด</label>
                                                    <input type="text" class="form-control" name="newName" id="newName" placeholder="Enter">
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail">รายละเอียดคอร์สนวด</label>
                                                    <textarea name="detail" id="detail" rows="4" class="form-control" placeholder="รายละเอียด"></textarea>
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
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="15%" class="text-center" nowrap>สถานะ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="20%" class="text-left" nowrap>หัวเรื่อง</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="40%" class="text-left" nowrap>รายละเอียด</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $key+1; ?></td>
                                                <!-- <td class="text-center"><?php echo $value->status; ?></td> -->
                                                <?php if($value->status==1){?>
                                                    <td class="text-center">
                                                        <div class="switch">
                                                            <label>
                                                                OFF
                                                                <input type="checkbox" checked="checked" disabled><span class="lever switch-col-yellow"></span>
                                                                ON
                                                            </label>
                                                        </div>
                                                    </td> 
                                                <?php }else{?>
                                                    <td class="text-center">
                                                        <div class="switch">
                                                            <label>
                                                                OFF
                                                                <input type="checkbox" disabled><span class="lever switch-col-yellow"></span>
                                                                ON
                                                            </label>
                                                        </div>
                                                    </td>
                                                <?php }?>
                                                <td class="text-left">
                                                    
                                                    <div><?php echo $value->name; ?></div>
                                                    <div><img class="w-100" src="<?php echo base_url('upload/news');?>/<?php echo $value->img;?>"></div>
                                                    
                                                </td>
                                            
                                                <td><?php echo $value->description; ?></td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="badge badge-warning editNew" data-toggle="modal" data-target="#editNews" id="<?= $value->news_id; ?>"> 
                                                        <i class="fas fa-pencil-alt"> แก้ไข</i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="deleteNews(<?=$value->news_id;?>)" class="badge badge-danger">
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

        <!-- Modal -->
        <div class="modal fade" id="editNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มข่าวประชาสัมพันธ์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" id="frmEditNew">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="" class="col-4 pr-0">สถานะการแสดง : </label>
                                        <div class="switch col-4 text-left pl-0">
                                            <label for="status">
                                                OFF
                                                <input type="checkbox" checked="checked" id="status"><span class="lever switch-col-deep-orange"></span>
                                                ON
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="newName">ชื่อคอร์สนวด</label>
                                <input type="text" class="form-control" name="newName2" id="newName2" placeholder="Enter">
                            </div>
                            <div class="form-group">
                                <label for="detail">รายละเอียดคอร์สนวด</label>
                                <textarea name="detail2" id="detail2" rows="4" class="form-control" placeholder="รายละเอียด"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="im2">ภาพประกอบ</label>
                                <img class="img2" alt="" width="100%" >
                                <input type="file" class="mt-1" name="img2" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);"/>
                                        
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="news_id" name="news_id">
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
                $('.img2').attr('src', e.target.result);
            }
                reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('.editNew').click(function(){
            var id = $(this).attr("id");
            $.ajax({
                type: "post",
                url: "<?= base_url('officer/getNewsById2');?>",
                data: {id:id},
                dataType: 'json',
                success:function(data){
                    // console.log(data)
                    $('#news_id').val(data["newsById"][0].news_id);
                    $('#newName2').val(data["newsById"][0].name);
                    $('#detail2').val(data["newsById"][0].description);
                    
                    if(data["newsById"][0].status == 0){
                        $('#status').removeAttr("checked","");
                        
                    }else{
                        $('#status').attr("checked","");
                    }

                    $('.img2').attr("src","<?= base_url('upload/news/');?>"+data["newsById"][0].img);

                }
            });
            
        });

        $('#frmEditNew').validate({     
            submitHandler: (form,e)=>{
                var data = new FormData(form);
                var status = $('#status').prop("checked");
                    if(status===true){
                        status=1
                    }else{
                        status=0
                    }
                    data.append('status',status);
                e.preventDefault();
                
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
                            url: "<?= base_url('officer/edit_News');?>", 
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
                                        location.replace("<?= base_url('officer/manager_news');?>");
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

       
       