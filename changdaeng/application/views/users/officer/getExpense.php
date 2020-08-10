<div class="row page-titles">
	<div class="col-md-5 align-self-center">
    <h3 class="text-themecolor">รายรับ</h3>
	</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">หน้าแจก</li>
			<li class="breadcrumb-item active">รายจ่าย</li>
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
    <!-- <h3 class="text-themecolor">ประวัติการนวด</h3> -->
		<div class="card"> 
            <div class="row ml-3 mt-4">
                <span class="mr-2">
                    <select name="month" class="form-control" id="month_income_owner">
                        <?php 
                            $month = array('','มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
                            for($i=1; $i<=12; $i++ ) { 
                        ?>
                            <option value="<?php echo $i; ?>"><?php echo $month[$i]; ?></option>
                        <?php } ?>
                    </select> 
                </span>
                <span class="mr-2">
                    <select name="year" class="form-control" id='year_owner'>
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
                <button class="btn btn-success" id="btn_expense_owner">ตกลง</button>
                <button class="btn btn-info ml-2" id="expense_all_owner">ดูทั้งหมด</button>
                <button class="btn btn-warning ml-2" data-toggle="modal" data-target="#modal_income">พิมพ์</button>
            </div>
            
			<div class="card-body">
                <div id="expense_where_owner">
                    <?php if(!empty($getData)){ ?>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                <thead class="bg-dark">
                                    <tr>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="2%" class="text-center">#</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="5%" class="text-left" nowrap>ประเภท</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="10%" class="text-left" nowrap>รายละเอียด</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="5%" class="text-center" nowrap>จำนวนเงิน</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-left" nowrap>วันที่</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($getData as $key => $value){ ?>
                                        <tr>
                                            <td class="text-center"><?= $key + 1; ?></td>
                                            <?php if($value->type==0){?>
                                                <td class="text-left"><span class="badge badge-primary">รายการนวด</span></td>
                                            <?php }else if($value->type==1){?> 
                                                <td class="text-left"><span class="badge badge-primary">รายการนวด</span></td>
                                            <?php }else if($value->type==2){?>
                                                <td class="text-left"><span class="badge badge-primary">อื่นๆ</span></td>
                                            <?php }else{?>
                                                <td class="text-left"><span class="badge badge-primary">ค่าจ้างพนักงานนวด</span></td>
                                            <?php }?>
                                            <td class="text-left"> <?= $value->description; ?> </td>
                                            <td class="text-center"> <?= $value->money; ?> </td>
                                            <td class="text-left"> <?= dateTimeThai(date("d M Y H:i", strtotime($value->createDate)));?></td>
                                            
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
        <form action="<?=base_url('officer/export_expense_orderBy')?>" method="POST" target="_blank">
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
                    <a href="<?=base_url('officer/export_expenseAll')?>" target="_blank" class="btn btn-danger">พิมพ์ทั้งหมด</a>
                </div>
            </div>
        </form>
    </div>
</div>