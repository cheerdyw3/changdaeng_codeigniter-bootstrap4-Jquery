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
            <p class="loader__label">Admin</p>
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
                    <a class="navbar-brand" href="<?=base_url('owner')?>">
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
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img src="<?=base_url('upload/main_owner.jpg')?>"
                                    alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?=base_url('upload/main_owner.jpg')?>" alt="user"></div>
                                            <div class="u-text">
                                                <!-- <h4><?php echo $login[0]->firstName." ".$login[0]->lastName; ?></h4> -->
                                                <!-- <p class="text-muted"><?php echo $login[0]->email; ?></p> -->
                                                <h4>Owner</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=base_url('login_owner/logout')?>"><i class="fa fa-power-off  mr-3"></i> ออกจากระบบ</a></li>
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

                        <li class="<?php if($menu=='join') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class="fas fa-address-book pr-2 pb-1" style="font-size: 20px;"></i><span class="hide-menu">การสมัครงาน</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('owner/approve_staff')?>" class="<?php if($submenu=='staff') echo "active";?>">พนักงานนวด</a></li>
                                <li><a href="<?=base_url('owner/approve_guide')?>" class="<?php if($submenu=='guide') echo "active";?>">ไกด์</a></li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='report') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class="fas fa-sticky-note pr-2 pb-1" style="font-size: 20px;"></i><span class="hide-menu">รายงาน</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('owner/income')?>" class="<?php if($submenu=='income') echo "active";?>">รายรับ</a></li>
                                <li><a href="<?=base_url('owner/expense')?>" class="<?php if($submenu=='expense') echo "active";?>">รายจ่าย</a></li>
                            </ul>
                        </li>
                        <li class="bg_none <?php if($menu=='incomeAndExpense') echo "active"?>"> 
                            <a class="waves-effect waves-dark " href="<?=base_url('owner/accrued')?>" aria-expanded="false">
                                <i class="mdi mdi-wallet pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">ยอดค้างจ่ายไกด์</span>
                            </a>
                        </li>
                        <li class="bg_none <?php if($menu=='salary_staff') echo "active"?>"> 
                            <a class="waves-effect waves-dark " href="<?=base_url('owner/salary_staff')?>" aria-expanded="false">
                                <i class="fab fa-bitcoin pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">เงินเดือนพนักงานนวด</span>
                            </a>
                        </li>


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

    <script type="text/javascript">


        $(document).ready(function() {
            $('#myTable').DataTable();
            // $('#myTable').DataTable({
            //     "bPaginate": true,
            //     "bLengthChange": true,
            //     "bFilter": true,
            //     "bInfo": true,
            //     "bAutoWidth": true 
            // });

        
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

            $('.leaveMenu').click(function(){
                var tell = $(this).attr("tell");
                $('#title').text($(this).text());
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

        function appove_staff(action,id){
            swal({
                title: "ยืนยัน",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ใช่',
                cancelButtonText: 'ไม่'
            }).then((result) => {
                if (result.value) {
                    if(action===true){
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('owner/approve_st?id=');?>"+id,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: (data)=>{
                                if(data.status===true){
                                    swal({
                                        title: "อนุมัติสำเร็จ",
                                        type: "success",
                                        timer: 1400,
                                        showConfirmButton: false
                                    }).then((result)=>{
                                        location.replace("<?= base_url('owner/approve_staff');?>");
                                    });
                                }
                            }
                        });
                    }else if(action===false){
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('owner/reject_st?id=');?>"+id,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: (data)=>{
                                if(data.status===true){
                                    swal({
                                        title: "ปฏิเสธเรียบร้อยแล้ว",
                                        type: "success",
                                        timer: 1400,
                                        showConfirmButton: false
                                    }).then((result)=>{
                                        location.replace("<?= base_url('owner/approve_staff');?>");
                                    });
                                }
                            }
                        });
                    }
                }
            });
        }


        function appove_guide(action,id){
            swal({
                title: "ยืนยัน",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ใช่',
                cancelButtonText: 'ไม่'
            }).then((result) => {
                if (result.value) {
                    if(action===true){
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('owner/approve_g?id=');?>"+id,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: (data)=>{
                                if(data.status===true){
                                    swal({
                                        title: "อนุมัติสำเร็จ",
                                        type: "success",
                                        timer: 1400,
                                        showConfirmButton: false
                                    }).then((result)=>{
                                        location.replace("<?= base_url('owner/approve_guide');?>");
                                    });
                                }
                            }
                        });
                    }else if(action===false){
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('owner/reject_g?id=');?>"+id,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: (data)=>{
                                if(data.status===true){
                                    swal({
                                        title: "ปฏิเสธเรียบร้อยแล้ว",
                                        type: "success",
                                        timer: 1400,
                                        showConfirmButton: false
                                    }).then((result)=>{
                                        location.replace("<?= base_url('owner/approve_guide');?>");
                                    });
                                }
                            }
                        });
                    }
                }
            });
        }
        

        function deleteRoom(id){
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
                            $.post("<?= base_url('officer/deleteRoom?id=');?>"+ id);
                            setTimeout(function(){ 
                                window.location.reload();
                            }, 120);
                        });
                    });
                }
            });
        }     
        
        

    </script>
    <!-- ============================================================== -->
</body>
</html>