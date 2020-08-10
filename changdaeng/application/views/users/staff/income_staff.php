<div class="row page-titles">
	<div class="col-md-5 align-self-center">
	</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">หน้าแรก</li>
			<li class="breadcrumb-item active">รายรับจากการนวด</li>
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
                                <option value="0">เต็มเดือน</option>
                                <option selected value="1">ต้นเดือน</option>
                                <option value="2">ปลายเดือน</option>
                            <?php }else{?>
                                <option value="0">เต็มเดือน</option>
                                <option value="1">ต้นเดือน</option>
                                <option selected value="2">ปลายเดือน</option>
                            <?php }?>
                        </select>
                    </span>
                    <button class="btn btn-success" id="btn_incom_staff" onclick="checkAction(1)">ตกลง</button>
                    <button class="btn btn-info ml-2" id="btn_incom_staff" onclick="checkAction(2)">ดูทั้งหมด</button>
                    <!-- <button class="btn btn-warning ml-2" data-toggle="modal" data-target="#modal_income">พิมพ์</button> -->
                </div>
            </div>
        </div>
    </div>
<div id="income_staff">
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="row ml-3 mt-4">
                    <div>
                        เดือน <?php echo $monthTH ?> รอบวันที่ <?php echo $day ?>
                    </div> 
                </div>  
                <div class="row ml-3 mt-4 col-4 mb-4">
                    <table class="table table-bordered table-sm ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-left">ชื่อ</th>
                                <th scope="col" class="text-center">ครั้ง</th>
                                <th scope="col" class="text-center">ชั่วโมง</th>
                                <th scope="col" class="text-center">จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $totalMoney=0;
                                $totalNum=0;
                                $totalHours=0;
                            ?>
                            <?php foreach($totalCourse as $key => $value){ ?>
                                
                                <?php 
                                    $totalMoney += $value["getMoneys"];
                                    $totalNum += $value["num"];
                                    $totalHours += $value["totalHours"];
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $key+1?></td>
                                    <td class="text-left"><?php echo $value["course_name"]; ?></td>
                                    <td class="text-center"><?php echo $value["num"]; ?></td>
                                    <td class="text-center"><?php echo $value["totalHours"]; ?></td>
                                    <td class="text-center"><?php echo $value["getMoneys"]; ?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                        <tbody>
                            <tr>
                                <td class="text-center" colspan="2">รวม</td>
                                <td class="text-center"><?php echo $totalNum?></td>
                                <td class="text-center"><?php echo $totalHours?></td>
                                <td class="text-center"><?php echo number_format($totalMoney,2)?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card"> 
    
                <div class="card-body">
                <div class="row ml-1  mb-4">
                    <div>
                        ประวัติการนวด
                    </div> 
                </div> 
                        <?php if(!empty($income)){ ?>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="2%" class="text-center">ลำดับ</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="10%" class="text-left" nowrap>การนวด</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="5%" class="text-center" nowrap>จำนวนชั่วโมง</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="5%" class="text-center" nowrap>ค่าจ้าง</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-left" nowrap>วันที่</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($income as $key => $value){ ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1; ?></td>
                                                <td class="text-left"> <?= $value["course_name"]; ?> </td>
                                                <td class="text-center"> <?= $value["history_hour"]; ?> </td>
                                                <td class="text-center"> <?= $value["history_money"]; ?></td>
                                                <td class="text-left"> <?= dateTimeThai(date("d M Y H:i", strtotime($value["date"])));?> </td>
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
<!-- ///////////////////////////////////////////////////////////////// -->
<!-- The Modal -->
<div class="modal" id="modal_income">
    <div class="modal-dialog">
        <form action="<?=base_url('admin/export_income')?>" method="POST" target="_blank">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">กรุณาระบุ เดือน-ปี ที่ต้องการพิมพ์</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="month2" class="form-control" id="month2">
                                <?php 
                                    $month = array('','มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
                                    for($i=1; $i<=12; $i++ ) { 
                                ?>
                                    <option value="<?php echo $i; ?>"><?php echo $month[$i]; ?></option>
                                <?php } ?>
                            </select> 
                        </div>
                        <div class="col-md-6">
                            <select name="year2" class="form-control" id="year2">
                                <?php 
                                    $year = date('Y') + 543;
                                    $min = $year - 60;
                                    $max = $year;
                                        for( $i=$max; $i>=$min; $i-- ) {
                                            echo '<option value='.$i.'>'.$i.'</option>';
                                        }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">ตกลง</button>
                    <a href="<?=base_url('admin/export_incomeAll')?>" target="_blank" class="btn btn-danger">พิมพ์ทั้งหมด</a>
                </div>
            </div>
        </form>
    </div>
</div>