<div class="row page-titles">
	<div class="col-md-5 align-self-center">
	</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">หน้าแรก</li>
			<li class="breadcrumb-item active">ค่าจ้างพนักงานนวด</li>
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
        <h3 class="text-themecolor">รายรับจากการนวด</h3>
            <div class="card"> 
                <div class="row ml-3 mt-4 mb-4">
                    <span class="mr-2">
                        <select name="month" class="form-control" id="month_income_staff">
                            <?php 
                                $month = array('','มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
                                for($i=1; $i<=12; $i++ ) { 
                            ?>
                                <option value="<?php echo $i; ?>"><?php echo $month[$i]; ?></option>
                            <?php } ?>
                        </select> 
                    </span>
                    <span class="mr-2">
                        <select name="year" class="form-control" id='year_income_staff'>
                            <?php 
                                $year = date('Y') + 543;
                                $min = $year - 60;
                                $max = $year;
                                    for( $i=$max; $i>=$min; $i-- ) {
                                        echo '<option value='.$i.'>'.$i.'</option>';
                                    }
                            ?>
                        </select>
                    </span>
                    <span class="mr-2">
                        <select name="type" class="form-control" id='type_income_staff'>
                            <?php if(date("d")>=1 && date("d")<=15){?>
                                <option selected value="1">ต้นเดือน</option>
                                <option value="2">ปลายเดือน</option>
                            <?php }else{?>
                                <option value="1">ต้นเดือน</option>
                                <option selected value="2">ปลายเดือน</option>
                            <?php }?>
                        </select>
                    </span>
                    <button class="btn btn-success" id="btn_incom_staff" onclick="checkAction(1)">ตกลง</button>
                    <!-- <button class="btn btn-warning ml-2" data-toggle="modal" data-target="#modal_income">พิมพ์</button> -->
                </div>
            </div>
        </div>
    </div>

    <div id="salary_staff">
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="card-body">
            
                <div class="row ml-1  mb-4">
                    <div>
                        ค่าจ้างพนักงานนวด
                    </div> 
                </div> 
                        <?php if(!empty($getSalary)){ ?>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="2%" class="text-center">รหัสผนักงาน</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="10%" class="text-left">ชื่อ/นามสกุล</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="10%" class="text-center" nowrap>ค่าจ้าง</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-left" nowrap>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($getSalary as $key => $value){ ?>
                                            <tr>
                                                <td class="text-center"><?= $value->staff_massager_id ?></td>
                                                <td class="text-left"> <?= $value->firstName." ".$value->lastName; ?> </td>
                                                <td class="text-center"> <?= $value->history_money." ".$value->statusPay; ?></td>
                                                <!-- <td class="text-center"> 
                                                    <button type="button" class="btn btn-success" onclick="getData(<?php echo $value['year']?>,'<?php echo $value['month']?>','<?php echo $value['time']?>',<?php echo $value['staff_massager_id']?>);">จ่ายแล้ว</button>
                                                </td> -->
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }else{ ?>
                            <div class="col-lg-12 text-center pt-4">
                                <h6 class="card-subtitle">ไม่พบข้อมูลรายรับ</h6>
                            </div>
                        <?php } ?>
                </div>
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

    $(document).ready(function() {
       $('#myTable').DataTable();
    });

    function checkAction(action){
        var month = $('#month_income_staff').children("option:selected").val();
        var year = $('#year_income_staff').children("option:selected").val();
        var type = $('#type_income_staff').children("option:selected").val();
        if(month<10){
            var date = ((year-543) + '-' + 0+month);
        }else{
            var date = ((year-543) + '-' + month);
        }
        if(action===1){
            $.ajax({
                url:"<?=base_url('owner/get_salary_orderby')?>",
                method:"POST",
                data:{date:date,type},
                success:function(data){ 
                    // console.log(data)
                    $('#salary_staff').html(data);
                }
            });
        }

    };




</script>