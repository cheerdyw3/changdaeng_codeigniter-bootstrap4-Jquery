
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Table basic</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">pages</li>
                            <li class="breadcrumb-item active">Table basic</li>
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

                                
                                <?php foreach ($query as $key => $value) { ?>
                                    <!-- <?php echo "<pre>";?>
                                    <?php print_r($value);?>
                                    <?php echo "</pre>";?> -->
                                    <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">วันที่โอน</th>
                                        <th scope="col">สลิปการโอน</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?php echo $key+1;?></th>
                                        <td><?= dateTimeThai(date("d M Y H:i", strtotime($value->createDate)));?></td>
                                        <td><img src="<?=base_url('upload/slip/'.$value->slip)?>" width="500px" height="500px"></td>
                                    
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>

                            </div>
                            <div class="modal-footer">
                                <?php foreach ($bookingStatus as $key2 => $value2) { ?>
                                    <?php if($value2->status==1){?>
                                <form id="frmReject" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary" onclick="approve_pay(<?php echo $value->booking_id;?>);">ผ่านการตรวจสอบ</button>
                                    <button type="submit" class="btn btn-secondary">ไม่ผ่านการตรวจสอบ</button>
                                     เพราะ 
                                    <input type="hidden" name="booking_id" id="booking_id" value="<?php echo $value->booking_id;?>">
                                    <input type="text" name="reject" id="reject">
                                    
                                </form>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="modal-footer">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

       