<div id="income_staff">
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="row ml-3 mt-4">
                    <?php if($monthTH==""){?>
                        <div> รายได้ทั้งหมด </div> 
                    <?php }else{ ?>
                        <div> เดือน <?php echo $monthTH ?> รอบวันที่ <?php echo $day ?> </div> 
                    <?php } ?>
                </div>  
                <?php if(!empty($totalCourse)){ ?>
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
                <?php }else{ ?>
                    <div class="col-lg-12 text-center pt-4">
                        <h6 class="card-subtitle">ไม่พบข้อมูลรายรับ</h6>
                    </div>
                <?php } ?>
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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>