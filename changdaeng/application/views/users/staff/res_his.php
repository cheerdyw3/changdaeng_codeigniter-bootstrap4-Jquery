<div id="his_where">
    <?php if(!empty($query)){ ?>
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
                    <?php foreach($query as $key => $value){ ?>
                        <tr>
                            <td class="text-center"><?= $key + 1; ?></td>
                            <td class="text-left"> <?= $value->course_name; ?> </td>
                            <td class="text-center"> <?= $value->history_hour; ?> </td>
                            <td class="text-center"> <?= $value->history_money; ?></td>
                            <td class="text-left"> <?= $value->date; ?> </td>
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