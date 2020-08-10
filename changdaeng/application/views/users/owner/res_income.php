<div id="income_where_owner">
    <?php if(!empty($income)){ ?>
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="2%" class="text-center">ลำดับ</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="10%" class="text-left" nowrap>รหัสรายการนวด</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="5%" class="text-center" nowrap>จำนวนเงิน</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-left" nowrap>วันที่</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($income as $key => $value){ ?>
                        <tr>
                            <td class="text-center"><?= $key + 1; ?></td>
                            <td class="text-left"> <?= $value->detail_list_id; ?> </td>
                            <td class="text-center"> <?= $value->money; ?> </td>
                            <td class="text-left"> <?= dateTimeThai(date("d M Y H:i", strtotime($value->date)));?></td>
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