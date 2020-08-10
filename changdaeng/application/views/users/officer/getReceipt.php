<div class="row page-titles">
	<div class="col-md-5 align-self-center">
    <h3 class="text-themecolor">ออกใบเสร็จ</h3>
	</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?=base_url('/')?>">ภาพรวม</a></li>
			<li class="breadcrumb-item active">ออกใบเสร็จ</li>
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
			<div class="card-body">
                <div id="income_where_owner">
                    <?php if(!empty($receipt)){ ?>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                <thead class="bg-dark">
                                    <tr>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="2%" class="text-center">#</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="80%" class="text-left" nowrap>รายการ</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-center" nowrap>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($receipt as $key => $value){ ?>
                                        <tr>
                                            <td class="text-center"><?= $key + 1; ?></td>
                                            <td class="text-left"> 
                                                <div>รหัสรายการ : <?= $value["detail_list_id"]; ?> </div>
                                                <?php 
                                                    $arrCourse = explode(",",$value["course"]);
                                                    $arrTime = explode(",",$value["hours"]);
                                                ?>
                                                <?php foreach (array_combine($arrCourse, $arrTime) as $Course => $Hours) { ?>
                                                    <div> - <?php print_r($Course);?> x <?php print_r($Hours);?> ชั่วโมง</div>
                                                <?php } ?> 
                                                <div>ส่วนลด : <?= number_format($value["discount"],2); ?> </div>
                                                <div>ราคา : <?= number_format($value["totalPrice"],2); ?> </div>
                                                <div>vat : <?= number_format($value["vat"],2); ?> </div>
                                                <div>รวมทั้งสิ้น : <?= number_format($value["payment"],2); ?> </div>
                                                <div>บันทึกเมื่อ : <?= dateTimeThai(date("d M Y H:i", strtotime($value["startDate"])));?> </div>
                                            </td>
                                            <td>
                                                <a href="<?=base_url('officer/export_receipt/').$value["detail_list_id"]?>" class="btn btn-success text-center"><i class="mdi mdi-printer"></i> พิมพ์ </a>
                                            </td>

                                            
                                            
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
