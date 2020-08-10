
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">ยอดค้างจ่ายไกด์</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item">ข้อมูลรายรับรายจ่าย</li>
                            <li class="breadcrumb-item active">ยอดค้างจ่ายไกด์</li>
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

                                <div class="table-responsive m-t-40">
                                    <!-- <table id="myTable" class="table table-striped table-hover table-danger" data-tablesaw-mode="swipe"> -->
                                    <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                    <tr>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="2%" class="text-center">ลำดับ</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="20%" class="text-left" nowrap>ชื่อ</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="30%" class="text-left" nowrap>รายการ</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="5%" class="text-center" nowrap>ค่าคอม</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-center" nowrap>สถานะ</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="15%" class="text-left" nowrap>วันที่</th>
                                    </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($getData as $key => $value){ ?>
                                                <tr>
                                                    <td class="text-center"><?= $key + 1; ?></td>
                                                    <td class="text-left">
                                                        <div><?= $value["firstName"]." ".$value["lastName"]; ?></div>
                                                        <div class="mt-2">โทร : <?= $value["tel"]; ?></div>
                                                    </td>
                                                    <td class="text-left">
                                                        <div>รหัสรายการ : <?= $value["detail_list_id"]; ?></div>
                                                        <div>จำนวน : <?= $value["amount"]; ?> คน</div>
                                                        <?php 
                                                            $arrCourse = explode(",",$value["course"]);
                                                            $arrTime = explode(",",$value["hours"]);
                                                        ?>
                                                        <?php foreach (array_combine($arrCourse, $arrTime) as $Course => $Hours) { ?>
                                                            <div> - <?php print_r($Course);?> x <?php print_r($Hours);?> ชั่วโมง</div>
                                                        <?php } ?> 
                                                    </td>
                                                    <td class="text-center"> <?= $value["com_of_adviser"]; ?> </td>

                                                    <td class="text-center"> 
                                                        <?php if($value["statusPayToAdviser"]==0){ ?>
                                                            <span class="badge badge-primary">ยังไม่ได้จ่าย</span>
                                                        <?php }else if($value["statusPayToAdviser"]==1){ ?> 
                                                            <span class="badge badge-success">จ่ายแล้ว</span>
                                                        <?php }?>
                                                    </td>
                                                    <td class="text-left"> <?= dateTimeThai(date("d M Y H:i", strtotime($value["startDate"])));?> </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

       