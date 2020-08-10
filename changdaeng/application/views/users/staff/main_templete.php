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
                    <a class="navbar-brand" href="<?=base_url('staff')?>">
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
                                aria-haspopup="true" aria-expanded="false"><img src="<?=base_url('upload/staffMassager/profile/'.$login[0]->img)?>"
                                    alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?=base_url('upload/staffMassager/profile/'.$login[0]->img)?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $login[0]->firstName." ".$login[0]->lastName; ?></h4>
                                                <p class="text-muted"><?php echo $login[0]->email; ?></p>
                                                <a href="<?=base_url('staff/profile')?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=base_url('staff/profile')?>"><i class="ti-user   mr-3"></i> โปรไฟล์</a></li>
                                    <li><a href="<?=base_url('staff/changeEamilAndPass')?>"><i class="ti-settings   mr-3"></i> เปลี่ยนรหัสผ่าน</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=base_url('login_staff/logout')?>"><i class="fa fa-power-off  mr-3"></i> ออกจากระบบ</a></li>
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
                        <li class="bg_none <?php if($menu=='leave') echo "active"?>"> 
                            <a class="waves-effect waves-dark " href="<?=base_url('staff/leave')?>" aria-expanded="false">
                                <i class="fas fa-window-restore pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">ข้อมูลการการลา</span>
                            </a>
                        </li>
                        <li class="bg_none <?php if($menu=='history') echo "active"?>"> 
                            <a class="waves-effect waves-dark " href="<?=base_url('staff/history_massager')?>" aria-expanded="false">
                                <i class="fas fa-history pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">ประวัติการนวด</span>
                            </a>
                        </li>
                        <li class="bg_none <?php if($menu=='income_staff') echo "active"?>"> 
                            <a class="waves-effect waves-dark " href="<?=base_url('staff/income_staff')?>" aria-expanded="false">
                                <i class="fab fa-bitcoin pr-2 pb-1" style="font-size: 20px;"></i>
                                <span class="hide-menu">รายได้จากการนวด</span>
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
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
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
            });

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

            $('#btn_his').click(function () {
                var month = $('#month_income').children("option:selected").val();
                var year = $('#year').children("option:selected").val();

                if(month<10){
                    var date = ((year-543) + '-' + 0+month);
                }else{
                    var date = ((year-543) + '-' + month);
                }
                $.ajax({
                    url:"<?=base_url('staff/his_Where')?>",
                    method:"POST",
                    data:{
                        date:date
                    },
                    success:function(data){

                        $('#his_where').html(data);
                    }
                });
            });
            $('#btn_his_all').click(function () {
                var month = $('#month_income').children("option:selected").val();
                var year = $('#year').children("option:selected").val();
                if(month<10){
                    var date = ((year-543) + '-' + 0+month);
                }else{
                    var date = ((year-543) + '-' + month);
                }
                $.ajax({
                    url:"<?=base_url('staff/his_All')?>",
                    method:"POST",
                    data:{
                        date:date
                    },
                    success:function(data){
                        
                        $('#his_where').html(data);
                    }
                });
            });
            // $('#btn_incom_staff').click(function checkAction(type){



        });
        function checkAction(action){
                var month = $('#month_income_staff').children("option:selected").val();
                var year = $('#year_income_staff').children("option:selected").val();
                var type = $('#type_income_staff').children("option:selected").val();
                if(month<10){
                    var date = ((year-543) + '-' + 0+month);
                }else{
                    var date = ((year-543) + '-' + month);
                }
                if(action===1){
                    $.ajax({
                        url:"<?=base_url('staff/income_staff_orderby')?>",
                        method:"POST",
                        data:{date:date,type},
                        success:function(data){ 
                            $('#income_staff').html(data);
                        }
                    });
                }else{
                    $.ajax({
                        url:"<?=base_url('staff/income_staff_orderby')?>",
                        method:"POST",
                        data:{date:date,type,action:"all"},
                        success:function(data){ 
                            $('#income_staff').html(data);
                        }
                    });
                }

            };
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