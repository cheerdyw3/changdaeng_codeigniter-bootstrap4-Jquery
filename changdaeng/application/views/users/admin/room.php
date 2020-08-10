
                
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
                            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-room">Add New Contact</button>
                                <!-- Add Contact Popup Model  INSERT -->        
                                <div id="add-room" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">เพิ่มห้อง</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                <h4 class="modal-title" id="myModalLabel"></h4> </div>
                                            <div class="modal-body">    
                                                <form method="post" id="frm_add_room" action="" enctype="multipart/form-data" class="form-horizontal form-material">
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" name="number" class="form-control" placeholder="หมายเลขห้อง"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" name="bed" class="form-control" placeholder="จำนวนเตียง"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <textarea name="description"  rows="3" class="form-control" placeholder="รายละเอียด"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" id="bt_room" class="btn btn-info waves-effect" >Save</button>
                                                        <button type="reset" class="btn btn-default waves-effect" >Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>


                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive m-t-40">
                                    <!-- <table id="myTable" class="table table-striped table-hover table-danger" data-tablesaw-mode="swipe"> -->
                                    <table id="myTable" class="table table-striped full-color-table full-inverse-table hover-table tablesaw" data-tablesaw-mode="swipe">
                                    <thead class="bg-dark">
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" width="2%" class="text-center" nowrap>id</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" width="5%" class="text-center" nowrap>หมายเลขห้อง</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" width="10%" class="text-center" nowrap>เตียง</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" width="20%" class="text-center" nowrap>รายละเอียด</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5" width="10%" class="text-center" nowrap>สถานะ</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6" width="10%" class="text-center" nowrap>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value->room_id; ?></td>
                                                <td><?php echo $value->number; ?></td>
                                                <td><?php echo $value->bed; ?></td>
                                                <td><?php echo $value->description; ?></td>
                                                <td><?php echo $value->status; ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="badge badge-warning" data-toggle="modal" data-target="#edit-officer<?=$key+1?>"> 
                                                        <i class="fas fa-pencil-alt"> แก้ไข</i>
                                                    </a>
                                                    <a href="<?php echo site_url('admin/del_officer/');?>"onclick = "return confirm('ยืนยัน');" class="badge badge-danger">
                                                        <i class="fas fa-minus-circle"> ลบ</i>
                                                    </a>
                                                </td>
                                            </tr>
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

       