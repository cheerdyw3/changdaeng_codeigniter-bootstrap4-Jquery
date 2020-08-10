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
                                <td class="text-left"><span class="badge badge-primary">เบ็ดเตล็ด</span></td>
                            <?php }else if($value->type==1){?> 
                                <td class="text-left"><span class="badge badge-primary">อื่นๆ</span></td>
                            <?php }else{?>
                                <td class="text-left"><span class="badge badge-primary">รายการนวด</span></td>
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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>