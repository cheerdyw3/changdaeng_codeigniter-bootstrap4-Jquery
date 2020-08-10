
    <div class="mt-5 mb-5">
        <div class="text-center">
            <img src="<?=base_url('upload/h.png')?>">
            <h3 class="my-3 mb-5">ค่าคอมมิชชั่น</h3>
        </div>
        <div class="container">
            <?php if(!empty($getData)){ ?>
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                    <thead class="">
                        <tr>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="2%" class="text-center">ลำดับ</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="40%" class="text-left" nowrap>รายการ</th>
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
                                        <span class="badge badge-primary">ยังไม่ได้รับเงิน</span>
                                    <?php }else if($value["statusPayToAdviser"]==1){ ?> 
                                        <span class="badge badge-success">ได้รับเงินแล้ว</span>
                                    <?php }?>
                                </td>
                                <td class="text-left"> <?= dateTimeThai(date("d M Y H:i", strtotime($value["startDate"])));?> </td>
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