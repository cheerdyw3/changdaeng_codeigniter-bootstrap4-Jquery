
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">ข้อมูลการสมัครงาน(ไกด์)</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าแรก</a></li>
                            <li class="breadcrumb-item">ข้อมูลการสมัครงาน</li>
                            <li class="breadcrumb-item active">ไกด์</li>
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
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9" class="text-center" width="5%" class="text-center" nowrap>#</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8" class="text-center" width="10%" class="text-center" nowrap>รูปภาพ</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7" class="text-center" width="50%" nowrap>ข้อมูล</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="text-center" width="10%" class="text-center" nowrap>เอกสาร</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" class="text-center" width="20%" class="text-center" nowrap>จัดการ</th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $key+1;?></td>
                                    <td class="text-center">
                                        <img src="<?php echo base_url('upload/adviser');?>/<?php echo $value->img;?>" width="60px" height="60px">
                                    </td>
                                    <td>
                                        <div>ชื่อ : <?php echo $value->firstName." ".$value->lastName;?></div>
                                        <div>เบอร์โทร : <?php echo $value->tel;?></div>
                                        <div>อีเมล : <?php echo $value->email;?></div> 
                                        <?php if($value->sex==0){?>
                                            <div>เพศ : ชาย</div>
                                        <?php }else{ ?>
                                            <div>เพศ : หญิง</div>
                                        <?php } ?>
                                        <div>ที่อยู่ : <?php echo $value->address;?></div>
                                        <div>ค่าคอมมิชชั่น ต่อหัว : <?php echo $value->commission;?></div>
                                        <div>วันที่สมัคร : <?= dateTimeThai(date("d M Y H:i", strtotime($value->createDate)));?></div>

                                    </td>

                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="badge badge-info" data-toggle="modal" data-target="#find_staff<?=$key+1?>"> 
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                        </td>
                                    <td class="text-center">
                                       
                                    <a href="javascript:void(0)" class="badge badge-success" alt="alert" onclick="appove_guide(true,<?= $value->adviser_id;?>)">
                                            <i class="fas fa-minus-circle"> อนุมัติ</i>
                                        </a>
                                        <a href="javascript:void(0)" class="badge badge-danger" alt="alert" onclick="appove_guide(false,<?= $value->adviser_id; ?>)">
                                            <i class="fas fa-minus-circle"> ปฏิเสธ</i>
                                        </a>
                                    </td>
                                </tr>

                                    <!--Model get-->        
                                    <div id="find_staff<?=$key+1?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">เพิ่มพนักงานนวด</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                                                    <h4 class="modal-title" id="myModalLabel"></h4> </div>
                                                <div class="modal-body">
                                        
                                            <form class="form-horizontal upload_img" method="post" enctype="multipart/form-data" id="frmFindStaffMassager">
                                                    <div class="tab-pane p-20" id="image2<?=$key+1?>" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-2">สำเนาบัตรประชาชน</label>
                                                                    <div class="col-md-10">
                                                                        <img src="<?=base_url('upload/adviser/IDCard/'.$value->IDCard)?>" class="w-75">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-right">
                                                                        <button type="reset" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                                    
                                                </div>

                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                
                                    </div>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

