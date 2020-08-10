<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">หลายรายการ</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
            <li class="breadcrumb-item">ตารางงาน</li>
            <li class="breadcrumb-item active">หลายรายการ</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Nav tabs -->
<ul class="nav nav-tabs customtab2" role="tablist">
    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">พนักงานนวด</span></a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">ห้อง</span></a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">รายการ</span></a> </li>
</ul>
<!-- Tab panes -->
<form action="" method="post" id="frmMultiWork">
    <div class="tab-content">
        <div class="tab-pane active" id="tab1" role="tabpanel">
            <div class="p-20">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="row">
                                    <div class="col-2">
                                        <label>จำนวนลูกค้า <span class="text-danger">*</span></label>
                                        <input type="number" name="checkMultilist" id="checkMultilist" onchange="getMaxStaff()" min="1" class="text-right pr-2 form-control">
                                    </div>
                                    <div class="col-2">
                                        <label>จำนวนที่เลือกไปแล้ว</label>
                                        <input type="text" name="num" id="num" readonly class="text-right pr-2 form-control">
                                    </div>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-40">
                                        <table id="myTableZ" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                                <thead class="bg-dark">
                                                    <tr>
                                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-left" nowrap>#</th>
                                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-left" nowrap>รหัส</th>
                                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="15%" class="text-left" nowrap>ชื่อ-นามสกุล</th>
                                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="20%" class="text-left" nowrap>ความสามารถในการนวด</th>
                                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-left" nowrap>สถานะการทำงาน</th>
                                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="15%" class="text-left" nowrap>เริ่มงาน</th>
                                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="15%" class="text-left" nowrap>เสร็จงาน</th>
                                                        <!-- <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="20%" class="text-left" nowrap>จัดการ</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($query as $key => $value) { ?>
                                                        <tr>
                                                            <?php if ($value["status"] == 0) { ?>
                                                            <td>
                                                                <input type="checkbox" onclick="chkCheckbox();" name="wsId[]" value="<?php echo $value["schedule_id"]; ?>" class="filled-in chk-col-green" id="md_checkbox_<?php echo $key + 1; ?>">
                                                                <label for="md_checkbox_<?php echo $key + 1; ?>"></label>
                                                                <!-- <input type="hidden" name="staff[]"  value="<?php echo $value["staff_massager_id"]; ?>"> -->
                                                            </td>
                                                            <?php } else { ?>
                                                                <td></td>
                                                            <?php } ?>
                                                            <td class="text-left"><?php echo $value["staff_massager_id"]; ?></td>
                                                            <td class="text-left"><?php echo $value["firstName"]; ?> <?php echo $value["lastName"]; ?></td>
                                                            <td class="text-left"><?php echo $value["course"]; ?></td>
                                                            <?php if ($value["status"] == 0) { ?>
                                                                <td class="text-left"><span class="badge badge-success">ว่าง</span></td>
                                                            <?php } else { ?>
                                                                <td class="text-left"><span class="badge badge-danger">ไม่ว่าง</span></td>
                                                            <?php } ?>
                                                            <?php if($value["startDate"] == "00:00:00"){?>
                                                                <td ></td>
                                                                <td ></td>
                                                            <?php }else{ ?>
                                                                <td class="text-left"><i class="mdi mdi-timer"> </i><?php echo $value["startDate"]; ?></td>
                                                                <td class="text-left"><i class="mdi mdi-timer"> </i><?php echo $value["endDate"]; ?></td>
                                                            <?php } ?>  
                                                            <!-- <td class="text-left">

                                                                <?php if ($value["status"] == 0) { ?>
                                                                    <div class="btn-group">
                                                                        <a href="<?= base_url('officer/list_room/' . $value["schedule_id"]) ?>" class="badge badge-dark">
                                                                            <i class="fas fa-pencil-alt"> เลือก</i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a href="<?= base_url('officer/list_room/' . $value["schedule_id"]) ?>" class="badge badge-danger">
                                                                            <i class="fas fa-pencil-alt"> ลบ</i>
                                                                        </a>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="btn-group">
                                                                        <a href="<?= base_url('officer/list_room/' . $value["schedule_id"]) ?>" class="badge badge-success">
                                                                            <i class="fas fa-pencil-alt"> ลงงาน</i>
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>

                                                            </td> -->
                                                        </tr>

                                                    <?php } ?>


                                                </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane p-20" id="tab2" role="tabpanel">
            <div class="col-sm-12 col-md-8 order-1 order-md-0">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-default" style="width: 150px">ห้องนวด</div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                        <thead class="bg-dark">
                                <tr>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-center" nowrap>หมายเลขห้อง</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-center" nowrap>เตียง</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="20%" class="text-center" nowrap>รายละเอียด</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-center" nowrap>สถานะ</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($room as $key => $value) { ?>
                                <tr>    
                                    <td><?php echo $value->number; ?></td>
                                    <td><?php echo $value->bed; ?></td>
                                    <td><?php echo $value->description; ?></td>
                                    <?php if($value->status == 0){?>
                                        <td class="text-left"><span class="badge badge-success">ว่าง <?php echo $value->bed-$value->use_bed; ?> เตียง</span></td>
                                        <td class="text-center">
                                            <input  value="<?php echo $value->room_id; ?>" name="room_id" type="radio" class="with-gap" id="bed<?php echo $value->bed-$value->use_bed; ?>" onchange="chkBed(this);">
                                            <label for="bed<?php echo $value->bed-$value->use_bed; ?>"></label>
                                        </td>
                                    <?php }else{?>
                                        <td class="text-left"><span class="badge badge-danger">เต็ม</span></td>
                                        <td> </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
        <div class="tab-pane p-20" id="tab3" role="tabpanel">
            <div class="col-sm-12 col-md-8 order-1 order-md-0">
            <div class="ribbon-wrapper card">
                <div class="ribbon ribbon-default" style="width: 150px">รายการ</div>
                    <hr class="m-t-0 ">
                    <form action="" method="post" enctype="multipart/form-data" id="frmListDetail">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">ประเภทการนวด</label>
                            <div class="col-md-9" >
                            <?php foreach ($course as $key => $value) { ?>
                                <input type="checkbox" id="op<?php echo $key+1 ;?>" name="ability[]" value="<?php echo $value->course_id ;?>" tell="<?php echo $value->course_name ;?>"class="filled-in chk-col-red" onchange="listChange2(this,<?php echo $value->course_price;?>);"/>
                                <label for="op<?php echo $key+1 ;?>"><?php echo $value->course_name ;?></label>
                            <?php }?>
                            </div>
                        </div>
                    <hr class="m-t-0 ">
            <?php foreach ($course as $key => $value) { ?>
                    <div class="check_disible_ex<?=$key+1?>">
                        <div class="check_disible_in<?=$key+1?>">
                            <div class="form-group row justify-content-end">
                                <label class="control-label col-md-3 ">+ <?php echo $value->course_name ;?></label>
                                <label class="control-label text-right col-md-2 ">ราคา</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-right" name="price[]" id="price<?=$key+1?>" value="<?php echo $value->course_price ;?>">
                                </div>
                                <label class="control-label col-md-2 ">บาท</label>
                            </div>
                            <div class="form-group row justify-content-end">
                                <label class="control-label text-right col-md-2 ">จำนวน</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-right" name="hour[]" id="hour<?=$key+1?>" value="1">
                                    
                                </div>
                                <label class="control-label col-md-2">ชั่วโมง</label>
                            </div>
                            <hr class="m-t-0 ">
                        </div>
                    </div>

            <?php }?>
                    <hr class="m-t-0">
                    <!-- <hr class="m-t-0" style="margin-top: -10px;"> -->
                    <div class="form-group row justify-content-end">
                        <label class="control-label text-right col-md-2 ">รวมราคา</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control form-control-sm text-right" name="totalPrice" id="totalPrice"  readonly="readonly">
                        </div>
                        <label class="control-label col-md-2 ">บาท</label>
                    </div>
                    
                    <div class="form-group row justify-content-end">
                        <label class="control-label text-right col-md-2 ">เวลาทั้งหมด</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control form-control-sm text-right" name="totalHour" id="totalHour"  readonly="readonly">
                        </div>
                        <label class="control-label col-md-2">ชั่วโมง</label>
                    </div>
                    <div class="form-group row justify-content-end">
                        <label class="control-label text-right col-md-2 ">ส่วนลด</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control form-control-sm text-right" name="dis" id="dis" value="0" onchange="checkCal2();">
                        </div>
                        <label class="control-label col-md-2">บาท</label>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-md-2 text-right">
                            <input type="checkbox" id="checkVat" class="filled-in chk-col-blue-grey" onchange="checkCal2();">
                            <label for="checkVat" class="control-label  ">VAT</label>
                        </div>
                        <div class="col-md-2">
                            <input class="vertical-spin form-control form-control-sm" onchange="checkCal2();" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="7.00" name="inputVat" id="inputVat" disabled >
                        </div>
                        <label for="inputVat" class="control-label col-md-1 ">%</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control form-control-sm text-right" name="vat" id="vat" value="" readonly="readonly" >
                        </div>
                        <label class="control-label col-md-2">บาท</label>
                    </div>
                    <div class="form-group row justify-content-end">
                        <label class="control-label text-right col-md-2 ">ยอดชำระ</label>
                        <div class="col-md-2">
                            <input type="text" class="btn btn-success form-control form-control-sm text-right active" name="payment" id="payment" value="" readonly="readonly">
                        </div>
                        <label class="control-label col-md-2">บาท</label>
                    </div>
                    <hr class="m-t-0 ">
                    <div class="form-group row justify-content-end">
                        <div class="col-md-2 text-right">
                            <input type="checkbox" id="checkAdviser" class="filled-in chk-col-blue-grey" onchange="checkAd2();">
                            <label for="checkAdviser" class="control-label  ">ไกด์</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control form-control-sm " name="adviser" id="adviser" value="" disabled>
                        </div>
                        <label class="control-label text-right col-md-2 ">ค่าคอมมิชชั่น</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control form-control-sm " name="comm" id="comm" value="" disabled>
                        </div>
                        <label class="control-label col-md-2">บาท</label>
                    </div>
                    <!-- <hr class="m-t-0 "> -->
                    <div class="modal-footer">
                        <input type="hidden" name="hdBedEmpty" id="hdBedEmpty" value="">
                        <input type="hidden" class="form-control form-control-sm " name="adId" id="adId" value="" >
                        <!-- <input type="hidden" class="form-control form-control-sm " name="roomId" id="roomId" value="<?=$roomId;?>" >
                        <input type="hidden" class="form-control form-control-sm " name="wsId" id="wsId" value="<?=$wsId;?>" >
                        <input type="hidden" class="form-control form-control-sm " name="adId" id="adId" value="" >
                        <input type="hidden" class="form-control form-control-sm " name="staffId" id="staffId" value="<?=$staffId;?>" > -->
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
                            <button type="submit" class="btn" >Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div>
    </div>
    </div>
    </form>
    <!-- ============================================================== -->
    <!-- End PAge Content -->






    <script src="<?= base_url('assets/homePage/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/wizard/jquery.steps.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/wizard/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/validate/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/validate/validation.js') ?>"></script>

    <Script type="text/javascript">
        $(document).ready(function() {
            $('#myTableZ').DataTable({
                "order": [],
                "displayLength": 100,
                "paging": false,
                "info": false
            });
        });

        function chkBed(e) {
            var id = e.id.substring(3);
            var numBed = $('#hdBedEmpty').val(id);
        }

        function getMaxStaff() {
            var num = $('#num').val();
            var count = $('#checkMultilist').val();
            if (count < num) {
                swal({
                    title: "กรุณาเลือกให้เท่ากับจำนวนลูกค้า111",
                    type: "warning"
                });
            } else {
                return count;
            }
        }

        function chkCheckbox() {
            var maxStaff = getMaxStaff();
            var numChecked = $("input:checkbox:checked").length;

            if (numChecked > maxStaff) {
                swal({
                    title: "กรุณาเลือกให้เท่ากับจำนวนลูกค้า !!",
                    type: "warning"
                });
            }


            $('#num').val(numChecked);
        }



        $('#frmMultiWork').validate({
            rules:{
                    "ability[]":{required: true},
                    "price[]":{required: true,number: true},
                    dis:{number: true},
                    adviser:{
                        required: true,
                        number: true ,  
                        remote: {
                            url: "<?=base_url('officer/chkAdviserList');?>",
                            dataFilter: function(data) {
                                var json = JSON.parse(data);
                                if(json.status === true) {
                                    $('#comm').val(json.data[0].commission);
                                    $('#adId').val(json.data[0].adviser_id);
                                    return '"true"';
                                }else{
                                    return '"ไม่มีไกด์คนนี้ในระบบ"';
                                }
                            }
                        }        
                    },comm:{number: true,required: true}

                },
                messages:{
                    "price[]":{required: "กรุณากรอกราคา",number: "กรอกได้เฉพาะตัวเลข"},
                    dis:{number: "กรอกได้เฉพาะตัวเลข"},
                    adviser:{required: "กรุณากรอก",number: "กรอกได้เฉพาะตัวเลข",remote:"ไม่มีไกด์คนนี้ในระบบ"},
                    comm:{number: "กรอกได้เฉพาะตัวเลข",required: "กรุณากรอก"}
                    
                },
            submitHandler: (form, e) => {
                e.preventDefault();
                var data = new FormData(form);
                var num = parseInt($('#num').val());
                var count = parseInt($('#checkMultilist').val());
                var numBed = parseInt($('#hdBedEmpty').val());
                console.log('num ',num);
                console.log('numBed ',numBed);
                if (num > count || num=="" || count=="") {
                    swal({
                        title: "กรุณาเลือกให้เท่ากับจำนวนลูกค้า !!",
                        type: "warning"
                    });
                } else {
                    if(num > numBed){
                        console.log("dddd");
                        swal({
                            title: "จำนวนเตียงเต็ม กรุณาเลือกใหม่",
                            type: "warning"
                        });
                    }else{
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('officer/detailList_multi'); ?>",
                            data: data,
                            dataType: 'json',
                            async: true,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: (data) => {
                                if(data.status===true){
                                    swal({
                                        title: "บันทึกข้อมูลสำเร็จ",
                                        type: "success",
                                        timer: 1000,
                                        showConfirmButton: false
                                    }).then((result)=>{
                                        window.location.replace("<?= base_url('officer/work_schedule/'); ?>");
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
                }
            }
        });

        

            
        function checkAd2(){
                if($('#checkAdviser').prop("checked")){
                    // alert($('#adviser').name);
                    $('#adviser').removeAttr("disabled");
                    $('#comm').removeAttr("disabled");
                }else{
                    $('#adviser').val("");
                    $('#comm').val("");
                    $('#adviser').attr("disabled","");
                    $('#comm').attr("disabled","");

                }
        }

            $("#totalPrice").val("0.00");
            $("#payment").val("0.00");
            $("#totalHour").val("0");

            function checkCal2(){
                var num = $('#num').val();
                if($('#checkVat').prop("checked")){

                    let totalPrice = 0*num;
                    let totalHour = 0;

                    $('#inputVat').removeAttr("disabled");
                    let inputVat = $("#inputVat").val();

                    for(i=1 ;i <= countCourse ; i++){
                        var vat = $('#price'+i).val();
                        var hour = $('#hour'+i).val();
                        // console.log(i+" "+vat);
                        if(vat){
                            totalPrice+=parseInt(hour*(vat*num));
                            totalHour+=parseInt(hour);
                        }
                        $("#totalPrice").val(totalPrice.toFixed(2));
                        $("#totalHour").val(totalHour);
                    }
                    let dis = $("#dis").val();
                    if(dis!=""){
                        let result = totalPrice-dis
                        $("#totalPrice").val(result.toFixed(2));
                        $("#vat").val(((result*inputVat)/100).toFixed(2));
                        $("#payment").val((result+((result*inputVat)/100)).toFixed(2));
                    }
                }else{
                    $('#inputVat').val("7.00");
                    $('#inputVat').attr("disabled","");

                    let totalPrice = 0*num;
                    let totalHour = 0;
                    for(i=1 ;i <= countCourse ; i++){
                        var vat = $('#price'+i).val();
                        var hour = $('#hour'+i).val();
                        // console.log(i+" "+vat);
                        if(vat){
                            totalPrice+=parseInt(hour*(vat*num));
                            totalHour+=parseInt(hour);
                        }
                        $("#totalPrice").val(totalPrice.toFixed(2));
                        $("#totalHour").val(totalHour);
                    }
                    let dis = $("#dis").val();
                    if(dis!=""){
                        let result = totalPrice-dis
                        $("#totalPrice").val(result.toFixed(2));
                        $("#vat").val("");
                        $("#payment").val(result.toFixed(2));
                    }
                }
            }

            function listChange2(elm,price,name2){
                let num = elm.id.substring(2);
                let name = $('label[for="'+elm.id+'"]').text();
                let totalPrice = 0*num;
                let totalHour = 0;
                if($('#'+elm.id).prop("checked")){
                    $(".check_disible_ex"+num).append('<div class="check_disible_in'+num+'"><div class="form-group row justify-content-end"><label class="control-label col-md-5 text-right ">+ '+name+'</label><div class="col-md-2"><input type="text" class="form-control form-control-sm text-right" name="price[]" id="price'+num+'" value="'+price+'" onchange="checkCal2();"></div><label class="control-label col-md-1 ">บาท</label><div class="col-md-2"><input class="vertical-spin form-control form-control-sm" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="1" name="hour[]" id="hour'+num+'" onmouseover="clickNow();" onchange="checkCal2();"></div><label class="control-label col-md-2 ">ชั่วโมง</label></div>');

                }else{
                    $('.check_disible_in'+num).remove();
                }
                checkCal2();
            } 
    </Script>