
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">จัดการการลา</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">จัดการการลา</li>
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
                            <button type="button" class="btn btn-warning btn-sm dropdown-toggle  m-t-10 float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-pencil-alt"> การลา</i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" >ลาป่วย</a> 
                                <!-- id="<?php echo $id ;?>" -->
                                <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" >ลากิจ</a>
                                <a class="dropdown-item leaveMenu" href="javascript:void(0)" data-toggle="modal" data-target="#leaveMenu" >ลาหยุดพิเศษอื่นๆ</a>
                            </div>

                                <div class="table-responsive m-t-40">
                                    <!-- <table id="myTable" class="table table-striped table-hover table-danger" data-tablesaw-mode="swipe"> -->
                                    <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                            <tr>
                                                
                                                
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-left" nowrap>การลา</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="10%" class="text-left" nowrap>ประเภท</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="15%" class="text-left" nowrap>วันที่ลา</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="30%" class="text-left" nowrap>เพิ่มเติม</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                            <tr>
                                            <td class="text-left" ><?php echo $value->title; ?></td>
                                                <?php if($value->status==0){ ?>
                                                        <td class="text-left"><span class="badge badge-primary">ลาเต็มวัน</span></td>
                                                <?php }else if($value->status==1){ ?>
                                                        <td class="text-left"><span class="badge badge-warning">ลาครึ่งเช้า</span></td>
                                                <?php }else{ ?>
                                                        <td class="text-left"><span class="badge badge-info">ลาครึ่งบ่าย</span></td>
                                                <?php } ?>
                                                
                                                <?php if($value->endDate==null){ ?>     
                                                    <td class="text-left" ><?php echo $value->startDate;?></td>
                                                <?php }else{ ?>
                                                        <td class="text-left" style="font-size: 15px;"><?= dateThai(date("d M Y", strtotime($value->startDate)));?> - <?= dateThai(date("d M Y", strtotime($value->endDate)));?></td>
                                                <?php } ?>

                                                <td class="text-left"><?php echo $value->leave_detail; ?></td>

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
        function checkDate(){
            let find =  $('div').find("#noEndDate").length;
            let startDate = $('#startDate').datepicker('getDate');
            if(find===1){
                let endDate = $('#endDate').datepicker('getDate');
                if(startDate != null && endDate != null){
                    if(endDate.getTime()<startDate.getTime()){
                        swal("เกิดข้อผิดพลาด", "กรุณากรอกวันที่ให้มากกว่าวันที่จะลา !", "error");
                        $('#endDate').val("");
                        $('.leaveDay').text("0");
                    }else{
                        $('.leaveDay').text((endDate.getDate()-startDate.getDate())+1);
                    }
                }
            }
        }

        $(document).ready(function() {
            $('.leaveMenu').click(function(){
            var tell = $(this).attr("tell");
            $('#title').text($(this).text());
            });

            $("#startDate,#endDate").datepicker({dateFormat: "dd-mm-yy",minDate:0,maxDate:'+2M'});
            $('#startDate,#endDate').on('change',()=>{checkDate();});

            $('#option1').on('change',()=>{
                $('#option2').removeAttr("checked","");
                $('#option3').removeAttr("checked","");
                $('#option1').attr("checked","");
                $("#showDiv").append('<div id="noEndDate"> <label>ถึงวันที่ <i class="fa fa-calendar"></i> <span class="text-danger">*</span>  </label>     <input type="text" id="endDate" class="form-control" name="endDate" placeholder="Enter" autocomplete="off" onchange="checkDate();">  </div>');
                $('.leaveDay').text("1");
                $( "#endDate" ).datepicker({dateFormat: "dd-mm-yy",minDate:0,maxDate:'+2M'});
            });
            $('#option2').on('change',()=>{
                $('#option1').removeAttr("checked","");
                $('#option3').removeAttr("checked","");
                $('#option2').attr("checked","");
                $('#noEndDate').remove();
                $('.leaveDay').text("0.5");
            });
            $('#option3').on('change',()=>{
                $('#option1').removeAttr("checked","");
                $('#option2').removeAttr("checked","");
                $('#option3').attr("checked","");
                $('#noEndDate').remove();
                $('.leaveDay').text("0.5");
            });

            $('#frmAddLeave').validate({
                rules:{
                    startDate:{required: true},
                    endDate:{required: true},
                    tel:{required: true ,min:10 ,number: true},
                    detail:{required: true}
                },
                messages:{

                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    let data = new FormData(form);
                    let id = "<?php echo $id;?>";
                    console.log(id);
                    let title = $('#title').text();
                    data.append('title',title);
                    data.append('id',id);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('staff/createLeave');?>", 
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
                                    window.location.reload();
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