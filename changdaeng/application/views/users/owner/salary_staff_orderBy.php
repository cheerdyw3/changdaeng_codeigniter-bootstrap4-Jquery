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
                                                <td class="text-center"> 
                                                    <div><?= $value->history_money; ?></div>
                                                    <div>
                                                        <?php if($value->statusPay==0){?>
                                                            <span class="badge badge-primary">ค้างจ่าย</span>
                                                        <?php }else{?>
                                                            <span class="badge badge-success">จ่ายแล้ว</span>
                                                        <?php }?>
                                                    </div>

                                                    
                                                </td>
                                                <td class="text-center"> 
                                                <?php if($value->statusPay==0){?>
                                                    <button type="button" class="btn btn-success" onclick="getData(<?php echo $value->staff_massager_id?>,'<?php echo $statDate ?>','<?php echo$endDate ?>',<?php echo $value->history_money ?>);">จ่ายแล้ว</button>
                                                <?php }else{?>
                                                <?php }?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }else{ ?>
                            <div class="col-lg-12 text-center pt-4">
                                <h6 class="card-subtitle">ไม่พบข้อมูล</h6>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>   


<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

        function getData(staffId,startDate,endDate,wage){
        // alert(staffId+"/"+startDate+"/"+endDate)

            swal({
                title: "คุณต้องการแก้ไขข้อมูลหรือไม่?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการ!',
                cancelButtonText: 'ไม่, ยกเลิก'
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('owner/update_salary');?>", 
                        data:{"staffId":staffId,"startDate":startDate,"endDate":endDate,"wage":wage},
                        dataType: 'json',
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    location.replace("<?= base_url('owner/salary_staff');?>");
                                });
                            }else{
                                swal({
                                    type: "warning"
                                });
                            }
                        }
                    });
                }
            });
    }
</script>