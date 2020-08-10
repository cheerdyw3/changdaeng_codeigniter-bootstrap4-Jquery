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
    <style>
        .error{
            color : red;
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
                    <a class="navbar-brand" href="<?=base_url('admin')?>">
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
                                aria-haspopup="true" aria-expanded="false"><img src="<?=base_url('upload/main_admin.jpg')?>"
                                    alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?=base_url('upload/main_admin.jpg')?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Admin</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=base_url('login_admin/logout')?>"><i class="fa fa-power-off  mr-3"></i> ออกจากระบบ</a></li>
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
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">PERSONAL</li>
                        <li class="<?php if($menu=='manage') echo "active"?>"> 
                            <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false">
                                <i class="fas fa-user pr-2 pb-1" style="font-size: 20px;"></i><span class="hide-menu">จัดการผู้ใช้ </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=base_url('admin/owner')?>" class="<?php if($submenu=='owner') echo "active";?>">เจ้าของร้าน</a></li>
                                <li><a href="<?=base_url('admin/add_officer')?>" class="<?php if($submenu=='officer') echo "active";?>">เจ้าหน้าที่</a></li>
                                <li><a href="<?=base_url('admin/staff_massager')?>" class="<?php if($submenu=='staff_massager') echo "active";?>">พนักงานนวด</a></li>
                                <li><a href="<?=base_url('admin/adviser')?>" class="<?php if($submenu=='adviser') echo "active";?>">ไกด์</a></li>
                                <li><a href="<?=base_url('admin/member')?>" class="<?php if($submenu=='member') echo "active";?>">สมาชิก</a></li>
                            </ul>
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
    <?php $count_staff = $this->num_staff;?>
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


    <script type="text/javascript">

    // function showPreview(ele){
    //     console.log(ele.value);
    //     document.frmMain.imgAvatar.src=ele.value;
    // }



        $(document).ready(function() {
            $('#frm_of').validate({
                    errorPlacement: function(error, element) {
                    // Append error within linked label
                    $( element )
                        .closest( "form" )
                            .find( "p[for='" + element.attr( "id" ) + "']" )
                                .append( error );
                    },
                    submitHandler: function(form) {
                        swal({
                            title: "แก้ไขห้องเรียนสำเร็จ",
                            type: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            form.submit(); 
                        }, 1500);
                    }	
                });



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
            // Used events
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

            // $('#frm_add_room').validate({
            //     errorPlacement: function(error, element) {
            //         // Append error within linked label
            //         $( element )
            //             .closest( "form" )
            //             .find( "p[for='" + element.attr( "id" ) + "']" )
            //             .append( error );
            //     },submitHandler: function(form) {
            //         swal({
            //             title: "แก้ไขข้อมูลสำเร็จ",
            //             type: "success",
            //             timer: 1500,
            //             showConfirmButton: false
            //         });
            //         setTimeout(function () {
            //             form.submit(); 
            //         }, 1500);
            //     }	
            // }); 


            // $('#frm_add_room').validate({
            //     rules:{
            //         bed:{
            //             required: true,
            //             minlength: 4
            //         }
            //     },
            //     messages:{

            //     }
            // });
            $('#frm_add_room').validate({
                rules:{
                    bed:{
                        required: true,
                        minlength: 4,
                        number: true
                    }
                },
                messages:{

                },
                submitHandler: (form)=>{
                    var data = $("form").serializeArray();
                    var number = $('input[name="number"]').val();
                    var bed = $('input[name="bed"]').val();
                    var description = $('textarea[name="description"]').val();
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('admin/add_room');?>",
                        data: {
                            // 'data':data
                            'number': number,
                            'bed': bed,
                            'description': description
                        },
                        dataType: 'json',
                        success: (data)=>{
                            if(data.status===true){
                                $('#add-room').modal('hide');
                                swal({
                                    title: "บันทึกข้อมูลสำเร็จ",
                                    type: "success",
                                    timer: 1400,
                                    showConfirmButton: false
                                }).then((result)=>{
                                    window.location.reload();
                                });
                            }else{

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
                    password:{required: true,minlength: 8},
                    confirmPass:{required: true,equalTo: "#password"},
                    firstName:{required: true,minlength: 4},
                    lastName:{required: true,minlength: 4},
                    tell:{required: true ,min:10 ,number: true}
                },
                messages:{
					email:{remote: "อีเมลนี้มีผู้ใช้งานแล้ว",},
                    password:{required: "กรุณากรอกรหัสผ่าน",minlength: "กรุณากรอกอย่างน้อย 8 ตัว"},
                    confirmPass:{required: "กรุณากรอกรหัสผ่านให้เหมือนกัน",equalTo: "#กรุณากรอกรหัสผ่านให้เหมือนกัน"},
                    firstName:{required: "กรุณากรอกชื่อ"},
                    lastName:{required: "กรุณากรอกนามสกุล"},
                    tell:{required: "กรุณากรอกเบอร์โทรศัพท์" ,min:10 ,number: "กรุณาได้เฉพาะตัวเลขเท่านั้น"}
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
                        // remote:{
						// 	type: "POST",
						// 	url: "<?=base_url('admin/chk_edit_email');?>",
						// 	data:{
                        //         action:"edit",
						// 		email: function(){
						// 		    return $("#email2").val();
						// 		}
						// 	}
						// }
                    },
                    firstName:{required: true,minlength: 4},
                    lastName:{required: true,minlength: 4},
                    tell:{required: true ,min:10 ,number: true}
                },
                messages:{
					// email:{
					// 	remote: "อีเมลนี้มีผู้ใช้งานแล้ว"
					// }
                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    // console.log(form);
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
                        $('#staffId').val(data["userById"][0].staff_massager_id);
                        $('#email2').val(data["userById"][0].email);
                        $('#firstName').val(data["userById"][0].firstName);
                        $('#lastName').val(data["userById"][0].lastName);
                        $('#tell').val(data["userById"][0].tell);
                        $('#address').val(data["userById"][0].address);
                        $('#ability').val(data["userById"][0].ability);
                        $('#IDCard').val(data["userById"][0].IDCard);
                        $('#document').val(data["userById"][0].document);

                        if(data["userById"][0].sex==1){
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
                        
                        if(data["userById"][0].status==0){
                            $('.labelStatus1').removeClass('active');
                            $('.labelStatus2').removeClass('active');
                            $('.labelStatus0').addClass('active');
                            $('.status1').removeAttr("checked","");
                            $('.status2').removeAttr("checked","");
                            $('.status0').attr("checked","");
                        }else if(data["userById"][0].status==1 || data["userById"][0].status==2){
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
                        
                        var res = data["userById"][0].ability.split(",");
                        // console.log(res);
                        for(let ii=0;ii<data["course"].length;ii++){
                            $('#opEdit'+data["course"][ii].course_id).removeAttr("checked","");
                            var a = $('#opEdit'+data["course"][ii].course_id).val();
                                for(let i=0;i<res.length;i++){
                                    if(a === res[i]){
                                        $('#opEdit'+data["course"][ii].course_id).attr("checked","");
                                }
                            }
                        }

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
                    
                        $('.imgAvatar').attr("src","<?= base_url('upload/staffMassager/profile/');?>"+data["userById"][0].img);
                        $('.IDCard').attr("src","<?= base_url('upload/staffMassager/IDCard/');?>"+data["userById"][0].IDCard);
                        $('.document').attr("src","<?= base_url('upload/staffMassager/document/');?>"+data["userById"][0].document);
                    }
                });
                
            });

            // $('#img').click(function(){
            //     console.log('8888888888888888888888888888');
            //     console.log($('#img').val());
            // })
            // $('#img').on('change',function(){
            //     checkFileLength();
            // });



            // $('#bt_room').on('click',function(e){
            //     e.preventDefault();
            //     var number = $('input[name="number"]').val();
            //     var bed = $('input[name="bed"]').val();
            //     var description = $('textarea[name="description"]').val();
            //     $.ajax({
            //         type: "post",
            //         url: "<?= base_url('admin/add_room');?>",
            //         data: {
            //             'number': number,
            //             'bed': bed,
            //             'description': description
            //         },
            //         dataType: 'json',
            //         success: (data)=>{
            //             if(data.status===true){
            //                 $('#add-room').modal('hide');
            //                 swal({
            //                     title: "บันทึกข้อมูลสำเร็จ",
            //                     type: "success",
            //                     timer: 1400,
            //                     showConfirmButton: false
            //                 }).then((result)=>{
            //                     // location.reload();
            //                     window.location.reload();
            //                 });

            //             }else{

            //             }
            //         }
            //     });
            // });






        });
        function deleteStaff(id){
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
                        url: "<?= base_url('admin/deleteStaff');?>",
                        data: {"id":id},
                        dataType: 'json',
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    title: "ลบข้อมูลสำเร็จ",
                                    type: "success"
                                }).then((result)=>{
                                    location.replace("<?= base_url('admin/staff_massager');?>");
                                });
                            }else{
                                swal({
                                    title: "ไม่สามารถได้กรุณาติดต่อผู้พัฒนาระบบ",
                                    type: "warning"
                                });
                            }
                        }
                    });
                }
            });
        } 
        // function delete_StaffMassager(id){
        //     console.log("sssssssss",id);
        //     swal({
        //         title: "คุณต้องการลบหรือไม่?",
        //         type: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'ใช่, ต้องการลบ!',
        //         cancelButtonText: 'ไม่, ยกเลิก'
        //     }).then((result) => {
        //         if (result.value) {
        //             Swal({
        //                     type: 'success',
        //                     title: 'ลบสำเร็จ',
        //                     showConfirmButton: false,
        //                     timer: 1500
        //             }).then(() => {
        //                 $(function(){
        //                     $.post("<?= base_url('admin/delete_staff_massager?id=');?>"+ id);
        //                     setTimeout(function(){ 
        //                         window.location.reload();
        //                     }, 120);
        //                 });
        //             });
        //         }
        //     });
        // }     

        function readURLImg(input) {
            // console.log(input.files[0]);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.imgAvatar').attr('src', e.target.result);
                }
                    reader.readAsDataURL(input.files[0]);
            }
        }
        function readURLIDCard(input) {
            // console.log(input.files[0]);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.IDCard').attr('src', e.target.result);
                }
                    reader.readAsDataURL(input.files[0]);
            }
        }
        function readURLDoc(input) {
            // console.log(input.files[0]);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log(reader);
                reader.onload = function (e) {
                    $('.document').attr('src', e.target.result);
                }
                    reader.readAsDataURL(input.files[0]);
            }
        }


    </script>
    <!-- ============================================================== -->
</body>

</html>