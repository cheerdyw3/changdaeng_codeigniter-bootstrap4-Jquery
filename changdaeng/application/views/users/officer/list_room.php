
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">จัดการพนักงานนวด</h3>
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
                <?php foreach ($query as $key => $value) { 
                        if($value["status"]==1){
                            redirect('officer/work_schedule/');
                        }
                        $wsId = $value["schedule_id"] ;
                        $staffId = $value["staff_massager_id"] ;
                        $firstName = $value["firstName"] ;
                        $lastName = $value["lastName"] ;
                        $img = $value["img"] ;
                        $ability = $value["ability"] ;
                        $course = $value["course"] ;
                    } 
                ?>    
                <div class="row">
                    <div class="col-12">
                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 order-1 order-md-0">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-primary "style="width: 150px">พนักงานนวด</div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-3 text-center" >
                                                    <img src="<?php echo base_url('upload/staffMassager/profile');?>/<?php echo $img;?>" alt="user" class="img-circle img-responsive">
                                                </div>
                                                <div class="col-md-8 col-lg-9">
                                                    <h3 class="box-title m-b-0"> <?php echo $firstName." ".$lastName ;?> </h3> 
                                                    <small>รหัสพนักงาน : <?php echo $staffId ;?> </small>                           
                                                    <address> <?php echo $course ;?> </address>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-danger">ห้องนวด</div>
                                                <p class="ribbon-content">Duis mollis, est non commodo luctus, nisi erat porttitor ligula</p>
                                        </div> -->
                                    </div>
                                    <div class="col-sm-12 col-md-8 order-1 order-md-0">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-default" style="width: 150px">ห้องนวด</div>
                                            <div class="table-responsive">
                                                <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                                <thead class="bg-dark">
                                                        <tr>
                                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-center" nowrap>หมายเลขห้อง</th>
                                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-center" nowrap>เตียง</th>
                                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="20%" class="text-center" nowrap>รายละเอียด</th>
                                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-center" nowrap>สถานะ</th>
                                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>จัดการ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php foreach ($room as $key => $value) { ?>
                                                        <tr>    
                                                            <td><?php echo $value->number; ?></td>
                                                            <td><?php echo $value->bed; ?></td>
                                                            <td><?php echo $value->description; ?></td>
                                                            <?php if($value->status == 0){?>
                                                                <td class="text-left"><span class="badge badge-success">ว่าง <?php echo $value->bed-$value->use_bed; ?> เตียง</span></td>
                                                                <td>    
                                                                    <a href="<?=base_url('officer/list_all/').$value->room_id."/".$wsId?>" class="badge badge-dark p-1" id="disibleList">
                                                                        <i class="mdi mdi-check-circle"></i> เลือก
                                                                    </a>
                                                                </td>
                                                            <?php }else{?>
                                                                <td class="text-left"><span class="badge badge-danger">เต็ม</span></td>
                                                                <td> </td>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>  
                                </div>  
                            </div>
                        

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

                <!-- <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 order-1 order-md-0">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-default ">พนักงานนวด</div>
                                            <p class="ribbon-content">Duis mollis, est non commodo luctus, nisi erat porttitor ligula</p>
                                        </div>
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-danger">ห้องนวด</div>
                                                <p class="ribbon-content">Duis mollis, est non commodo luctus, nisi erat porttitor ligula</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-8 order-1 order-md-0">
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-primary">รายการ</div>
                                            <p class="ribbon-content">Duis mollis, est non commodo luctus, nisi erat porttitor ligula</p>
                                        </div>
                                    </div>  
                                </div>  
                            </div> -->