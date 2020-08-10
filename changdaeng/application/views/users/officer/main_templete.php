<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('upload/logo.png')?>">
    <title>changdaeng</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/datatables/media/css/dataTables.bootstrap4.css')?>">
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/pages/ribbon-page.css')?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?=base_url('assets/css/colors/red.css')?>" id="theme" rel="stylesheet">
    <!-- fiel --> 
    <link rel="stylesheet" href="<?=base_url('assets/plugins/dropify/dist/css/dropify.min.css')?>">
    <link href="<?=base_url('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')?>" rel="stylesheet" />
    <!--alerts CSS -->
    <link href="<?=base_url('assets/plugins/sweetalert/sweetalert.css')?>" rel="stylesheet" type="text/css">
    <!--jquery CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/jqueryui/jquery-ui.css')?>">



    <style>
        .error{
            color : red;
            font-size: 11px;
        }
        .bg_none a.active {
            background: none!important;
        }
    </style>
</head>

<body class="fix-header card-no-border fix-sidebar">
<?php $login = $this->session->userdata('login'); ?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">officer</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?=base_url('officer')?>">
                        <!-- Logo icon --><b>
                        
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?=base_url('upload/logo.png')?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <!-- <img ssrc="../../../../upload/logo.png" width="50px" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <!-- <img src="../../../../upload/logo.png" width="50px" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo text -->
                            <img src="<?=base_url('upload/logo.png')?>" width="50px" class="light-logo"
                                alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down"></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown"
                                aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            
                                            <a href="#">
                                                <div class="user-img"> <img src="<?=base_url('assets/images/users/1.jpg')?>"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all
                                                e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img src="<?=base_url('upload/officer/'.$login[0]->img)?>"
                                    alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?=base_url('upload/officer/'.$login[0]->img)?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $login[0]->firstName." ".$login[0]->lastName; ?></h4>
                                                <p class="text-muted"><?php echo $login[0]->email; ?></p>
                                                <a href="<?=base_url('officer/profile')?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=base_url('officer/profile')?>"><i class="ti-user   mr-3"></i> โปรไฟล์</a></li>
                                    <li><a href="<?=base_url('officer/changeEamilAndPass')?>"><i class="ti-settings   mr-3"></i> เปลี่ยนรหัสผ่าน</a></li>
                                    <!-- <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-email mr-3"></i> Inbox</a></li> -->
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=base_url('login_officer/logout')?>"><i class="fa fa-power-off  mr-3"></i> ออกจากระบบ</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="nav-small-cap">PERSONAL</li>
                        <hr>
                        <li class="<?php if($menu=='staff') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class="fas fa-address-book pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">จัดการพนักงานนวด</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('officer/staff')?>" class="<?php if($submenu=='manage') echo "active";?>">ข้อมูลพนักงานนวด</a></li>
                                <li><a href="<?=base_url('officer/leaveHistory')?>" class="<?php if($submenu=='leaveHistory') echo "active";?>">ประวัติการลา</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='work_schedule') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class="fas fa-table pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">ตารางงาน</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('officer/work_schedule')?>" class="<?php if($submenu=='หนึ่งรายการ') echo "active";?>">หนึ่งรายการ</a></li>
                                <li><a href="<?=base_url('officer/work_schedule_multi')?>" class="<?php if($submenu=='หลายรายการ') echo "active";?>">หลายรายการ</a></li>
                            </ul>
                        </li>
                        <hr>
                        <li class="bg_none <?php if($menu=='room') echo "active"?>"> 
                            <a class="waves-effect waves-dark " href="<?=base_url('officer/room')?>" aria-expanded="false">
                                <i class="fas fa-bed pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">ข้อมูลห้องนวด</span>
                            </a>
                        </li>
                        <li class="bg_none <?php if($menu=='MSCourse') echo "active"?>"> 
                            <a class="waves-effect waves-dark " href="<?=base_url('officer/MSCourse')?>" aria-expanded="false">
                                <i class="fab fa-elementor pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">ข้อมูลคอร์สนวด</span>
                            </a>
                        </li>
                        <hr>
                        <li class="<?php if($menu=='book') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class="fas fa-clipboard-list pr-2 pb-1 " style="font-size: 20px;"></i>
                                <span class="hide-menu">ข้อมูลการจอง</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('officer/history_booking1')?>" class="<?php if($submenu=='ตรวจสอบการโอน') echo "active";?>">ตรวจสอบการโอน</a></li>
                                <li><a href="<?=base_url('officer/history_booking0')?>" class="<?php if($submenu=='รอการโอน') echo "active";?>">รอการโอน</a></li>
                                <li><a href="<?=base_url('officer/history_booking')?>" class="<?php if($submenu=='ทั้งหมด') echo "active";?>">ทั้งหมด</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='incomeAndExpense') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class=" fas fa-donate pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">ข้อมูลรายรับรายจ่าย</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('officer/expense')?>" class="<?php if($submenu=='รายจ่ายเบ็ดเตล็ด') echo "active";?>">รายจ่ายเบ็ดเตล็ด</a></li>
                                <li><a href="<?=base_url('officer/accrued')?>" class="<?php if($submenu=='ยอดค้างจ่ายไกด์') echo "active";?>">ยอดค้างจ่ายไกด์</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='report') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class="fas fa-sticky-note pr-2 pb-1" style="font-size: 20px;"></i><span class="hide-menu">รายงาน</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('officer/showIncome')?>" class="<?php if($submenu=='income') echo "active";?>">รายรับ</a></li>
                                <li><a href="<?=base_url('officer/showExpense')?>" class="<?php if($submenu=='expense') echo "active";?>">รายจ่าย</a></li>
                                <li><a href="<?=base_url('officer/getReceipt')?>" class="<?php if($submenu=='receipt') echo "active";?>">ออกใบเสร็จ</a></li>
                            </ul>
                        </li>
                        <hr>
                        <li class="<?php if($menu=='manager') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class="fas fa-cog pr-2 pb-1" style="font-size: 20px;"></i><span class="hide-menu">แก้ไขข้อมูลหน้าบ้าน</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('officer/manager_news')?>" class="<?php if($submenu=='manager_news') echo "active";?>">ข่าวประชาสัมพันธ์</a></li>
                                <!-- <li><a href="<?=base_url('officer/')?>" class="<?php if($submenu=='null1') echo "active";?>">โลโก้</a></li> -->
                                <!-- <li><a href="<?=base_url('officer/')?>" class="<?php if($submenu=='null2') echo "active";?>">สไลด์</a></li>
                                <li><a href="<?=base_url('officer/')?>" class="<?php if($submenu=='null2') echo "active";?>">ที่อยู่</a></li> -->
                            </ul>
                        </li>
                        <hr>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php $this->load->view($view);?>
            </div>

            <footer class="footer">
                © <?= date('Y')?> Dulyawat & Natpinya
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url('assets/plugins/bootstrap/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src=" <?=base_url('assets/js/perfect-scrollbar.jquery.min.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?=base_url('assets/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url('assets/js/sidebarmenu.js')?>"></script>

    <!--Custom JavaScript -->
    <script src="<?=base_url('assets/js/custom.min.js')?>"></script>
    <!-- This is data table -->
    <script src="<?=base_url('assets/plugins/datatables/datatables.min.js')?>"></script>
    <!-- file -->
    <script src="<?=base_url('assets/plugins/dropify/dist/js/dropify.min.js')?>"></script>
    <!-- Sweet-Alert  -->
    <script src="<?=base_url('assets/plugins/sweetalert/sweetalert.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/sweetalert/jquery.sweet-alert.custom.js')?>"></script>
    <!-- validate  -->
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script> -->
    <!-- jquery ui  -->
    <script src="<?=base_url('assets/plugins/jqueryui/jquery-ui.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jqueryui/jquery-ui.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')?>" type="text/javascript"></script>

    <?php $countCourse = $this->num_course;?>
    <script type="text/javascript">
        var countCourse = <?=$countCourse?>
        
        function checkDate(){
            let find =  $('div').find("#noEndDate").length;
            let startDate = $('#startDate').datepicker('getDate');
            if(find===1){
                let endDate = $('#endDate').datepicker('getDate');
                if(startDate != null && endDate != null){
                    if(endDate.getTime()<startDate.getTime()){
                        swal("เกิดข้อผิดพลาด", "กรุณากรอกวันที่ให้มากกว่าวันที่จะลา !", "error");
                        $('#endDate').val("");
                        $('.leaveDay').text("0");
                    }else{
                        $('.leaveDay').text((endDate.getDate()-startDate.getDate())+1);
                    }
                }
            }
        }

        $(document).ready(function() {
            $('#myTable').DataTable({"order": []});
            var table = $('#หหหห').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [4, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }

            //dropify
            $('.dropify').dropify({
               tpl: {
                    message: '<div class="dropify-message " ><span class="file-icon" /> <p  class="text-center">{{ default }}</></div>'
                }
            });
            //++++++++++++++++++++++++++++++++++++ Dropify  Used events
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
            //++++++++++++++++++++++++++++++++++++
            
            function checkFileLength() {
                let upload_file_elem = $('.upload_img input[type="file"]');
                let validation = 0;
                for (i = 0; i < upload_file_elem.length; i++) {
                    console.log($(upload_file_elem[i]).val());
                    if ($(upload_file_elem[i+1]).val() != '') {
                        validation++;
                    }
                }
                if (validation === 3) {
                    $('.submit_upload').removeAttr('disabled').addClass("btn btn-success");
                }
            }
            checkFileLength();
            $('.upload_img input[type="file"]').on('change',()=>{
                checkFileLength();
            });

            $('#frmAddRoom').validate({
                rules:{
                    number:{
                        required: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('officer/chkNumberRoom');?>",
                            data:{
                                action:"add",
                                email: function(){
                                    return $("#number").val();
                                }
                            }
                        }
                    },
                    bed:{
                        required: true,
                        number: true
                    }
                },
                messages:{
                    bed:{
                        number: "กรอกได้เฉพาะตัวเลขเท่านั้น"
                    },
                    number:{
                        remote: "หมายเลขนี้ มีอยู่แล้ว"
                    }
                },
                submitHandler: (form,e)=>{
                    e.preventDefault();
                    var formData = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/createRoom');?>",
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1400,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.reload();
                                });
                            }else{
                                swal({
                                    title: "กรุณากรอกข้อมูลให้ครบ !!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }	
            }); 

            $('#frmAddCourse').validate({
                rules:{
                    courseName:{required: true},
                    price:{required: true,number: true},
                    course_get:{required: true,number: true},
                },
                messages:{
                    price:{number: "กรอกได้เฉพาะตัวเลขเท่านั้น"},
                    course_get:{number: "กรอกได้เฉพาะตัวเลขเท่านั้น"},
                },
                submitHandler: (form,e)=>{
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/createMSCourse');?>",
                        data: new FormData(form),
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.reload();
                                });
                            }else{
                                swal({
                                    title: "กรุณากรอกข้อมูลให้ครบ !!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }	
            }); 


            $('#frmAddNew').validate({
                rules:{
                    newName:{required: true},
                    detail:{required: true},
                },
                messages:{
                    newName:{required: "กรุณาใส่หัวข้อข่าว"},
                    detail:{required: "กรุณาใส่รายละเอียด"},
                },
                submitHandler: (form,e)=>{
                    var data = new FormData(form);
                    var status = $('#statusNew').prop("checked");
                    if(status===true){
                        status=1
                    }else{
                        status=0
                    }
                    data.append('status',status);
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/createNew');?>",
                        data: data,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.reload();
                                });
                            }else{
                                swal({
                                    title: "กรุณากรอกข้อมูลให้ครบ !!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }	
            }); 


            $('#frmAddStaffMassager').validate({
                rules:{
                    email:{
                        required: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('admin/chk_edit_email');?>",
                            data:{
                                action:"add",
                                email: function(){
                                    return $("#email").val();
                                }
                            }
                        }
                    },
                    password:{required: true,minlength: 4},
                    confirmPass:{required: true,equalTo: "#password"},
                    firstName:{required: true,minlength: 4},
                    lastName:{required: true,minlength: 4},
                    tell:{required: true ,min:10 ,number: true}
                },
                messages:{
					email:{
						remote: "อีเมลนี้มีผู้ใช้งานแล้ว"
					}
                },
                submitHandler: (form,e)=>{
                    e.preventDefault();
                    var formData = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('admin/add_staff_massager');?>",
                        data: formData,
                        dataType: 'json',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1400,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.reload();
                                });
                            }else{
                                swal({
                                    title: "กรุณากรอกข้อมูลให้ครบ !!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }	
            }); 

            $('#frmEditStaffMassager').validate({
                rules:{
                    email:{
                        required: true,
                        remote:{
							type: "POST",
							url: "<?=base_url('admin/chk_edit_email');?>",
							data:{
                                action:"edit",
								email: function(){
								    return $("#email2").val();
								}
							}
						}
                    },
                    firstName:{required: true,minlength: 4},
                    lastName:{required: true,minlength: 4},
                    tell:{required: true ,min:10 ,number: true}
                },
                messages:{
					email:{
						remote: "อีเมลนี้มีผู้ใช้งานแล้ว"
					}
                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    console.log(form);
                    var formData = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('admin/edit_staff_massager');?>", 
                        data: formData,
                        dataType: 'json',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.reload();
                                });
                            }else{
                                swal({
                                    title: "กรุณากรอกข้อมูลให้ครบ !!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }	
            });

            $('.edit_staff').click(function(){
                var id = $(this).attr("id");
                $.ajax({
                    type: "post",
                    url: "<?= base_url('admin/getStaffById');?>",
                    data: {id:id},
                    dataType: 'json',
                    success:function(data){
                        $('#staffId').val(data[0].staff_massager_id);
                        $('#email2').val(data[0].email);
                        $('#firstName').val(data[0].firstName);
                        $('#lastName').val(data[0].lastName);
                        $('#tell').val(data[0].tell);
                        $('#address').val(data[0].address);
                        $('#ability').val(data[0].ability);
                        $('#IDCard').val(data[0].IDCard);
                        $('#document').val(data[0].document);

                        if(data[0].sex==1){
                            $('.labelFeMale').removeClass('active');
                            $('.labelMale').addClass('active');
                            $('.feMale').removeAttr("checked","");
                            $('.male').attr("checked","");
                        }else{
                            $('.labelMale').removeClass('active');
                            $('.labelFeMale').addClass('active');
                            $('.male').removeAttr("checked","");
                            $('.feMale').attr("checked","");
                        }
                        
                        if(data[0].status==0){
                            $('.labelStatus1').removeClass('active');
                            $('.labelStatus2').removeClass('active');
                            $('.labelStatus0').addClass('active');
                            $('.status1').removeAttr("checked","");
                            $('.status2').removeAttr("checked","");
                            $('.status0').attr("checked","");
                        }else if(data[0].status==1){
                            $('.labelStatus0').removeClass('active');
                            $('.labelStatus2').removeClass('active');
                            $('.labelStatus1').addClass('active');
                            $('.status0').removeAttr("checked","");
                            $('.status2').removeAttr("checked","");
                            $('.status1').attr("checked","");
                        }else{
                            $('.labelStatus0').removeClass('active');
                            $('.labelStatus1').removeClass('active');
                            $('.labelStatus2').addClass('active');
                            $('.status0').removeAttr("checked","");
                            $('.status1').removeAttr("checked","");
                            $('.status2').attr("checked","");
                        }

                        var res = data[0].ability.split(",");
                        $('.option111').removeAttr("checked","");
                        $('.option222').removeAttr("checked","");
                        $('.option333').removeAttr("checked","");
                        $('.option444').removeAttr("checked","");
                        for(var i=0;i<res.length;i++){
                            // console.log(res[i]);
                            if(res[i]==="นวดแผนไทย"){
                                $('.option111').attr("checked","");
                            }else if(res[i]==="นวดทั้งหมด"){
                                $('.option222').attr("checked","");
                            }else if(res[i]==="นวดไหล่"){
                                $('.option333').attr("checked","");
                            }else if(res[i]==="นวดเท้า"){
                                $('.option444').attr("checked","");
                            }
                        }
                    
                        $('.imgAvatar').attr("src","<?= base_url('upload/staffMassager/profile/');?>"+data[0].img);
                        $('.IDCard').attr("src","<?= base_url('upload/staffMassager/IDCard/');?>"+data[0].IDCard);
                        $('.document').attr("src","<?= base_url('upload/staffMassager/document/');?>"+data[0].document);
                    }
                });
                
            });


            $('.leaveMenu').click(function(){
                var tell = $(this).attr("tell");
                $('#title').text($(this).text());
                $('#tel').val($(this).attr("tell"));
                $('#idStaff').val($(this).attr("id"));
            });

            $("#startDate,#endDate").datepicker({dateFormat: "dd-mm-yy",minDate:0,maxDate:'+2M'});
            $('#startDate,#endDate').on('change',()=>{checkDate();});

            $('#option1').on('change',()=>{
                $('#option2').removeAttr("checked","");
                $('#option3').removeAttr("checked","");
                $('#option1').attr("checked","");
                $("#showDiv").append('<div id="noEndDate"> <label>ถึงวันที่ <i class="fa fa-calendar"></i> <span class="text-danger">*</span>  </label>     <input type="text" id="endDate" class="form-control" name="endDate" placeholder="Enter" autocomplete="off" onchange="checkDate();">  </div>');
                $('.leaveDay').text("1");
                $( "#endDate" ).datepicker({dateFormat: "dd-mm-yy",minDate:0,maxDate:'+2M'});
            });
            $('#option2').on('change',()=>{
                $('#option1').removeAttr("checked","");
                $('#option3').removeAttr("checked","");
                $('#option2').attr("checked","");
                $('#noEndDate').remove();
                $('.leaveDay').text("0.5");
            });
            $('#option3').on('change',()=>{
                $('#option1').removeAttr("checked","");
                $('#option2').removeAttr("checked","");
                $('#option3').attr("checked","");
                $('#noEndDate').remove();
                $('.leaveDay').text("0.5");
            });

            $('#frmAddLeave').validate({
                rules:{
                    startDate:{required: true},
                    endDate:{required: true},
                    tel:{required: true ,min:10 ,number: true},
                    detail:{required: true}
                },
                messages:{

                },
                    submitHandler: (form,e)=>{
                    var title = $('#title').text();
                    e.preventDefault();
                    var data = new FormData(form);
                    data.append('title',title);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/createLeave');?>", 
                        data: data,
                        dataType: 'json',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.reload();
                                });
                            }else{
                                swal({
                                    title: "กรุณากรอกข้อมูลให้ครบ !!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }	
            });

            //clear 
            for(var i=1 ; i <= countCourse; i++){
                $('.check_disible_in'+i).remove();
            }
            $('#clearFrmList').click(function(){
                for(var i=1 ; i <= countCourse; i++){
                    $('.check_disible_in'+i).remove();
                }
            });

            $('#frmListDetail').validate({
                //minlength: 8,maxlength: 10,
                rules:{
                    "ability[]":{required: true},
                    "price[]":{required: true,number: true},
                    dis:{number: true},
                    adviser:{
                        required: true,
                        number: true ,  
                        remote: {
                            url: "<?=base_url('officer/chkAdviserList');?>",
                            dataFilter: function(data) {
                                var json = JSON.parse(data);
                                if(json.status === true) {
                                    $('#comm').val(json.data[0].commission);
                                    $('#adId').val(json.data[0].adviser_id);
                                    return '"true"';
                                }else{
                                    return '"ไม่มีไกด์คนนี้ในระบบ"';
                                }
                            }
                        }        
                    },comm:{number: true,required: true}

                },
                messages:{
                    "price[]":{required: "กรุณากรอกราคา",number: "กรอกได้เฉพาะตัวเลข"},
                    dis:{number: "กรอกได้เฉพาะตัวเลข"},
                    adviser:{required: "กรุณากรอก",number: "กรอกได้เฉพาะตัวเลข",remote:"ไม่มีไกด์คนนี้ในระบบ"},
                    comm:{number: "กรอกได้เฉพาะตัวเลข",required: "กรุณากรอก"}
                    
                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    var data = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/detailList');?>", 
                        data: data,
                        dataType: 'json',
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.replace("<?= base_url('officer/work_schedule/');?>");
                                });
                            }else{
                                swal({
                                    title: "กรุณากรอกข้อมูลให้ครบ !!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }	
            });
            // swal({title: "ยืนยันการปฏิเสธ",type: "warning",showCancelButton: true,confirmButtonText: 'ใช่, ต้องการลบ!',cancelButtonText: 'ไม่, ยกเลิก'})
            $('#frmReject').validate({
                rules:{reject:{required: true}},
                messages:{},
                submitHandler: (form,e)=>{
                    swal({
                        title: "ยืนยันการปฏิเสธ",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่, ต้องการลบ!',
                        cancelButtonText: 'ไม่, ยกเลิก'
                    }).then((result) => {
                        if (result.value) {
                            e.preventDefault();
                            var formData = new FormData(form);
                            $.ajax({
                                type: "post",
                                url: "<?= base_url('officer/reject_pay');?>",
                                data: formData,
                                dataType: 'json',
                                async: false,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: (data)=>{
                                          if(data.status===true){
                                              swal({
                                                  title: "บันทึกข้อมูลสำเร็จ",
                                                  type: "success"
                                              }).then((result)=>{
                                                    location.replace("<?= base_url('officer/history_booking1');?>");
                                              });
                                          }else{

                                          }
                                }
                            });
                        }
                    });
                }	
            }); 

            $('#btn_income_owner').click(function () {
                var month = $('#month_income_owner').children("option:selected").val();
                var year = $('#year_owner').children("option:selected").val();

                if(month<10){
                    var date = ((year-543) + '-' + 0+month);
                }else{
                    var date = ((year-543) + '-' + month);
                }
                $.ajax({
                    url:"<?=base_url('owner/income_where')?>",
                    method:"POST",
                    data:{
                        date:date
                    },
                    success:function(data){

                        $('#income_where_owner').html(data);
                    }
                });
            });

            $('#income_all_owner').click(function () {
                var month = $('#month_income_owner').children("option:selected").val();
                var year = $('#year_owner').children("option:selected").val();
                if(month<10){
                    var date = ((year-543) + '-' + 0+month);
                }else{
                    var date = ((year-543) + '-' + month);
                }
                $.ajax({
                    url:"<?=base_url('owner/income_all')?>",
                    method:"POST",
                    data:{
                        date:date
                    },
                    success:function(data){
                        
                        $('#income_where_owner').html(data);
                    }
                });
            });

            $('#btn_expense_owner').click(function () {
                var month = $('#month_income_owner').children("option:selected").val();
                var year = $('#year_owner').children("option:selected").val();

                if(month<10){
                    var date = ((year-543) + '-' + 0+month);
                }else{
                    var date = ((year-543) + '-' + month);
                }
                $.ajax({
                    url:"<?=base_url('owner/expense_where')?>",
                    method:"POST",
                    data:{
                        date:date
                    },
                    success:function(data){

                        $('#expense_where_owner').html(data);
                    }
                });
            });
            $('#expense_all_owner').click(function () {
                var month = $('#month_income_owner').children("option:selected").val();
                var year = $('#year_owner').children("option:selected").val();
                if(month<10){
                    var date = ((year-543) + '-' + 0+month);
                }else{
                    var date = ((year-543) + '-' + month);
                }
                $.ajax({
                    url:"<?=base_url('owner/expense_all')?>",
                    method:"POST",
                    data:{
                        date:date
                    },
                    success:function(data){
                        
                        $('#expense_where_owner').html(data);
                    }
                });
            });

        });
        
            function clickNow(){
                $(".vertical-spin").TouchSpin({
                    verticalbuttons: true,
                    verticalupclass: 'glyphicon glyphicon-plus',
                    verticaldownclass: 'glyphicon glyphicon-minus'
                });
            }
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                decimals: 2,step: 0.1
            });
            // var vspinTrue = $(".vertical-spin").TouchSpin({
            //     verticalbuttons: true
            // });
            // if (vspinTrue) {
            //     $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            // }


            
            function checkAd(){
                if($('#checkAdviser').prop("checked")){
                    // alert($('#adviser').name);
                    $('#adviser').removeAttr("disabled");
                    $('#comm').removeAttr("disabled");
                }else{
                    $('#adviser').val("");
                    $('#comm').val("");
                    $('#adviser').attr("disabled","");
                    $('#comm').attr("disabled","");

                }
            }

            $("#totalPrice").val("0.00");
            $("#payment").val("0.00");
            $("#totalHour").val("0");

            function checkCal(){
                if($('#checkVat').prop("checked")){

                    let totalPrice = 0;
                    let totalHour = 0;

                    $('#inputVat').removeAttr("disabled");
                    let inputVat = $("#inputVat").val();

                    for(i=1 ;i <= countCourse ; i++){
                        var vat = $('#price'+i).val();
                        var hour = $('#hour'+i).val();
                        // console.log(i+" "+vat);
                        if(vat){
                            totalPrice+=parseInt(hour*vat);
                            totalHour+=parseInt(hour);
                        }
                        $("#totalPrice").val(totalPrice.toFixed(2));
                        $("#totalHour").val(totalHour);
                    }
                    let dis = $("#dis").val();
                    if(dis!=""){
                        let result = totalPrice-dis
                        $("#totalPrice").val(result.toFixed(2));
                        $("#vat").val(((result*inputVat)/100).toFixed(2));
                        $("#payment").val((result+((result*inputVat)/100)).toFixed(2));
                    }
                }else{
                    $('#inputVat').val("7.00");
                    $('#inputVat').attr("disabled","");

                    let totalPrice = 0;
                    let totalHour = 0;
                    for(i=1 ;i <= countCourse ; i++){
                        var vat = $('#price'+i).val();
                        var hour = $('#hour'+i).val();
                        // console.log(i+" "+vat);
                        if(vat){
                            totalPrice+=parseInt(hour*vat);
                            totalHour+=parseInt(hour);
                        }
                        $("#totalPrice").val(totalPrice.toFixed(2));
                        $("#totalHour").val(totalHour);
                    }
                    let dis = $("#dis").val();
                    if(dis!=""){
                        let result = totalPrice-dis
                        $("#totalPrice").val(result.toFixed(2));
                        $("#vat").val("");
                        $("#payment").val(result.toFixed(2));
                    }
                }
            }

            function listChange(elm,price,name2){
                let num = elm.id.substring(2);
                let name = $('label[for="'+elm.id+'"]').text();
                let totalPrice = 0;
                let totalHour = 0;
                if($('#'+elm.id).prop("checked")){
                    $(".check_disible_ex"+num).append('<div class="check_disible_in'+num+'"><div class="form-group row justify-content-end"><label class="control-label col-md-5 text-right ">+ '+name+'</label><div class="col-md-2"><input type="text" class="form-control form-control-sm text-right" name="price[]" id="price'+num+'" value="'+price+'" onchange="checkCal();"></div><label class="control-label col-md-1 ">บาท</label><div class="col-md-2"><input class="vertical-spin form-control form-control-sm" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="1" name="hour[]" id="hour'+num+'" onmouseover="clickNow();" onchange="checkCal();"></div><label class="control-label col-md-2 ">ชั่วโมง</label></div>');

                }else{
                    $('.check_disible_in'+num).remove();
                }
                checkCal();
            } 

        function approve_pay(id){
            swal({
                title: "คุณต้องการอนุมัติการจองหรือไม่?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการ!',
                cancelButtonText: 'ไม่, ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    Swal({
                        type: 'success',
                        title: 'อนุมัติสำเร็จ',
                        showConfirmButton: false,
                        timer: 1100
                    }).then(() => {
                        $(function(){
                            $.post("<?= base_url('officer/approve_pay?id=');?>"+id);
                            setTimeout(function(){ 
                                location.replace("<?= base_url('officer/history_booking1');?>");
                            }, 1500);
                        });
                    });
                }
            });
        }  

        function deleteWs(id){
            console.log("sssssssss",id);
            swal({
                title: "คุณต้องการลบหรือไม่?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการลบ!',
                cancelButtonText: 'ไม่, ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    Swal({
                        type: 'success',
                        title: 'ลบสำเร็จ',
                        showConfirmButton: false,
                        timer: 1100
                    }).then(() => {
                        $(function(){
                            $.post("<?= base_url('officer/deleteWs?id=');?>"+ id);
                            setTimeout(function(){ 
                                window.location.reload();
                            }, 120);
                        });
                    });
                }
            });
        } 

        function deleteRoom(id){
            swal({
                title: "คุณต้องการลบหรือไม่?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการลบ!',
                cancelButtonText: 'ไม่, ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/deleteRoom');?>",
                        data: {"id":id},
                        dataType: 'json',
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "ลบข้อมูลสำเร็จ",
                                    type: "success"
                                }).then((result)=>{
                                    location.replace("<?= base_url('officer/room');?>");
                                });
                            }else{
                                swal({
                                    title: "ขณะนี้ห้องมีการใ้งานอยู่ ไม่สามารถลบได้ตอนนี้ครับ !",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }
            });
        }   

        function changeStatusWs(id){
            swal({
                title: "ยืนยันการลงงาน",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่',
                cancelButtonText: 'ไม่'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/changeStatusWs');?>",
                        data: {"id":id},
                        dataType: 'json',
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "ลงงานสำเร็จ",
                                    type: "success"
                                }).then((result)=>{
                                    location.replace("<?= base_url('officer/work_schedule');?>");
                                });
                            }else{
                                swal({
                                    title: "ไม่สามารถลบได้ ข้อมูลคอร์สมีการใช้งานอยู่!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }
            });
        } 

        function deleteCourse(id){
            swal({
                title: "คุณต้องการลบหรือไม่?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการลบ!',
                cancelButtonText: 'ไม่, ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/deleteCourse');?>",
                        data: {"id":id},
                        dataType: 'json',
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "ลบข้อมูลสำเร็จ",
                                    type: "success"
                                }).then((result)=>{
                                    location.replace("<?= base_url('officer/MSCourse');?>");
                                });
                            }else{
                                swal({
                                    title: "ไม่สามารถลบได้ ข้อมูลคอร์สมีการใช้งานอยู่!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }
            });
        }   

        function deleteNews(id){
            swal({
                title: "คุณต้องการลบหรือไม่?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการลบ!',
                cancelButtonText: 'ไม่, ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/deleteNews');?>",
                        data: {"id":id},
                        dataType: 'json',
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "ลบข้อมูลสำเร็จ",
                                    type: "success"
                                }).then((result)=>{
                                    location.replace("<?= base_url('officer/manager_news');?>");
                                });
                            }else{
                                swal({
                                    title: "ไม่สามารถลบได้ ข้อมูลคอร์สมีการใช้งานอยู่!",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }
            });
        }   


        function signStaff(id){
            swal({
                title: "ยืนยันการลงชื่อ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                console.log(result.value);
                if (result.value){
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('officer/signStaff?id=');?>"+ id,
                        dataType: 'json',
                        success: (data)=>{
                            console.log(data.status);
                            if(data.status===true){
                                swal({
                                    title: "ลงชื่อสำเร็จ",
                                    type: "success",
                                    timer: 1000,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.reload();
                                });
                            }else{
                                swal({
                                    title: "พนักงานคนนี้ลงชื่อในวันนี้แล้ว !",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }
            });
        }  

        function changeStatusEndDay(){
            $(function(){
                setInterval(function(){ 
                    $.post("<?= base_url('officer/changeStatusStaffEndDay');?>");
                }, 1000 * 60 * 60 * 24);
            });
        }
        changeStatusEndDay();

    </script>
    <!-- ============================================================== -->
</body>

</html>