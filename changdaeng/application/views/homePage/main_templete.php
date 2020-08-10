<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/bootstrap.min.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/datatables/media/css/dataTables.bootstrap4.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/style.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/style2.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/fontawesome/css/all.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/animate.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/bootstrap-datepicker.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/tempusdominus-bootstrap-4.min.css')?>">

     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/js/compressed/themes/default.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/js/compressed/themes/default.date.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/js/compressed/themes/default.time.css')?>">
     <!-- Owl Stylesheets -->
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/owl.carousel.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/owl.theme.default.css')?>">
     <link rel="stylesheet" href="<?=base_url('assets/plugins/dropify/dist/css/dropify.min.css')?>">
     <link href="<?=base_url('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')?>" rel="stylesheet" />
     <title>ช้างแดงโพธิเวช นวดแผนโบราณ เชียงใหม่</title>
     <link rel="shortcut icon" type="image/jpg" href="<?=base_url('upload/logo/logo.jpg')?>">
     <style>
        .error{
            color : red;
            text-align: right;
        }
        iframe{
            width: 100%;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
<?php $login = $this->session->userdata('login'); ?>
<?php $typeLogin = $this->session->userdata('type'); ?>
     <nav class="navbar navbar-expand-lg navbar navbar-dark fixed-top">
          <a class="navbar-brand" href="<?=base_url('main')?>"><img class="w-100" src="<?=base_url('upload/logo/logo.png')?>"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
               aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                         <a class="nav-link" href="<?=base_url('main')?>">หน้าแรก <span class="sr-only">(current)</span></a> 
                         
                    </li>
                    <li class="nav-item <?php if($menu=='รูปแบบและบริการ') echo "active";?>">
                         <a class="nav-link" href="<?=base_url('main/course_massager')?>">รูปแบบและบริการ</a>
                    </li>
                    <li class="nav-item <?php if($menu=='ข่าวและกิจกรรม') echo "active";?>">
                         <a class="nav-link" href="<?=base_url('main/news')?>">ข่าวและกิจกรรม</a>
                    </li>
                    <li class="nav-item <?php if($menu=='เกี่ยวกับเรา') echo "active";?>">
                         <a class="nav-link" href="<?=base_url('main/about_us')?>">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item <?php if($menu=='ติดต่อเรา') echo "active";?>">
                         <a class="nav-link" href="<?=base_url('main/contact_us')?>">ติดต่อเรา</a>
                    </li>
                    <li class="nav-item <?php if($menu=='ร่วมงานกับเรา') echo "active";?>">
                         <a class="nav-link" href="<?=base_url('main/join_us')?>">ร่วมงานกับเรา</a>
                    </li>
               </ul>
               <span class="navbar-text mr-3">
                    <i class="fas fa-phone-square "></i> 053-235-107
               </span>
               <!-- เข้าสู่ระบบ เริ่ม -->
               <?php if(empty($login[0])){?>
               <button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target=".bd-example-modal-lg">เข้าสู่ระบบ</button>
               <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                              <div class="container-fluid">
                                   <div class="row no-gutter">
                                        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                                        <div class="col-md-8 col-lg-6">
                                             <div class="login d-flex align-items-center py-5">
                                                  <div class="container">
                                                       <div class="row">
                                                            <div class="col mx-auto">
                                                                 <h3 class="login-heading mb-5 text-center">เข้าสู่ระบบ
                                                                 </h3>
                                                                 <form class="form-horizontal" id="frm_login" action="<?=base_url('main/chk_login')?>" method="POST">
                                                                      <div class="form-label-group">
                                                                           <input type="email" id="email1"
                                                                                class="form-control" placeholder="อีเมล" name="email1"
                                                                                required autofocus>
                                                                           <label for="email1">อีเมล</label>
                                                                      </div>

                                                                      <div class="form-label-group">
                                                                           <input type="password" id="password1"  name="password1"
                                                                                class="form-control"
                                                                                placeholder="รหัสผ่าน" required>
                                                                           <label for="password1">รหัสผ่าน</label>
                                                                      </div>

                                                                      <div class="custom-control custom-checkbox mb-4">
                                                                           <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck1">
                                                                           <label class="custom-control-label"
                                                                                for="customCheck1">จดจำรหัสผ่าน</label>
                                                                      </div>
                                                                      <button
                                                                           class="btn btn-lg btn-danger btn-block btn-login text-uppercase font-weight-bold mb-2"
                                                                           type="submit">เข้าสู่ระบบ</button>
                                                                      <div class="text-center">
                                                                           <a class="small" href="#" data-toggle="modal" data-target=".fgPass">ลืมรหัสผ่าน ?</a>
                                                                      </div>
                                                                 </form>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="modal fade fgPass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                              <div class="container-fluid">
                                   <div class="row no-gutter">
                                        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                                        <div class="col-md-8 col-lg-6">
                                             <div class="login d-flex align-items-center py-5">
                                                  <div class="container">
                                                       <div class="row">
                                                            <div class="col mx-auto">
                                                                 <h3 class="login-heading mb-5 text-center">ลืมรหัสผ่าน</h3>
                                                                 <h6>ป้อนอีเมลแอดเดสที่เชื่อมโยงกับบัญชีของคุณ จากนั้นเราจะส่งอีเมลไปให้คุณตั้งรหัสผ่านใหม่</h6>
                                                                 <form method="post" id="" enctype="multipart/form-data">
                                                                      <div class="form-label-group">
                                                                           <input type="email5" id="email5" name="email5" class="form-control" placeholder="อีเมล" required autofocus>
                                                                           <label for="email5">อีเมล</label>
                                                                      </div>
                                                                      <button
                                                                           class="btn btn-lg btn-danger btn-block btn-login text-uppercase font-weight-bold mb-2"
                                                                           type="submit">ตกลง
                                                                    </button>
                                                                 </form>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- เข้าสู่ระบบ จบ -->

               <!-- ลงทะเบียน เริ่ม -->
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg2">ลงทะเบียน</button>
               <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                              <div class="container-fluid">
                                   <div class="row no-gutter">
                                        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                                        <div class="col-md-8 col-lg-6">
                                             <div class="login d-flex align-items-center py-5">
                                                  <div class="container">
                                                       <div class="row">
                                                            <div class="col mx-auto">
                                                                 <h3 class="login-heading mb-5 text-center">ลงทะเบียน
                                                                 </h3>
                                                                 <form method="post" id="frmAddMember" enctype="multipart/form-data">
                                                                      <div class="form-label-group">
                                                                           <input type="email" id="email" name="email" class="form-control" placeholder="อีเมล" required autofocus autocomplete="off">
                                                                           <label for="email">อีเมล</label>
                                                                      </div>
                                                                      <hr>
                                                                      <div class="form-label-group">
                                                                           <input type="password" id="password" name="password" class="form-control" placeholder="รหัสผ่าน" required>
                                                                           <label for="password">รหัสผ่าน</label>
                                                                      </div>
                                                                      <div class="form-label-group">
                                                                           <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="ยืนยันรหัสผ่าน" required>
                                                                           <label for="confirmPassword">ยืนยันรหัสผ่าน</label>
                                                                      </div>
                                                                      <div class="form-label-group">
                                                                           <input type="text" id="tel5" name="tel5" class="form-control" placeholder="เบอร์ติดต่อ" required >
                                                                           <label for="tel5">เบอร์ติดต่อ</label>
                                                                      </div>
                                                                      <button
                                                                           class="btn btn-lg btn-danger btn-block btn-login text-uppercase font-weight-bold mt-4 mb-2" type="submit">ลงทะเบียน</button>

                                                                 </form>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- ลงทะเบียน จบ -->
               <?php } ?>
               <!-- loginแล้ว เริ่ม -->
               <?php if(!empty($login[0])){?>
                    <?php if($typeLogin["type"]=="member"){?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $login[0]->email; ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?=base_url('main/profile')?>">บัญชีของฉัน</a>
                                        <a class="dropdown-item" href="<?=base_url('main/history_booking_byId')?>">ประวัติการจอง</a>
                                        <!-- <a class="dropdown-item" href="">ประวัติการจอง</a> -->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url('main/logout')?>">ออกจากระบบ</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php }else if($typeLogin["type"]=="adviser"){?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $login[0]->email; ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?=base_url('main/profile_adviser')?>">บัญชีของฉัน</a>
                                        <a class="dropdown-item" href="<?=base_url('main/booking_all')?>">จอง</a>
                                        <a class="dropdown-item" href="<?=base_url('main/history_booking_adviser')?>">ประวัติการจอง</a>
                                        <a class="dropdown-item" href="<?=base_url('main/commission')?>">ค่าคอมมิชชั่น</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url('main/logout')?>">ออกจากระบบ</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
               <?php } ?>
               <!-- loginแล้ว จบ -->
          </div>
     </nav>
     <div class="breadcumb-area bg-img-1 black-opacity">
          <div class="container">
               <div class="row">
                    <div class="col-12">
                         <div class="breadcumb-wrap text-center">
                              <h2><?php echo $menu?></h2>
                              <ul>
                                   <li><a href="<?=base_url('main')?>">หน้าแรก</a></li>
                                   <li>/</li>
                                   <li><?php echo $menu?></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <?php $this->load->view($view);?>

    <footer>
          <div class="container">
               <div class="row">
                    <div class="col-4 text-right">
                         <h5 class="font-weight-bolder">ที่อยู่</h5>
                         <p>90 ถนน ศรีดอนไชย เทศบาลนครเชียงใหม่ 50100</p>
                    </div>
                    <div class="col-4 text-center">
                         <img src="<?=base_url('upload/logo/logo.png')?>" class="w-10">
                    </div>
                    <div class="col-4 text-left">
                         <h5 class="font-weight-bolder">ติดต่อ</h5>
                         <p>โทรศัพท์ : 053 235 107</p>
                         <p>facebook : ช้างแดงโพธิเวช นวดแผนโบราณ เชียงใหม่</p>
                    </div>
               </div>
          </div>
     </footer>

     <div class="foter2 text-center">
        <p class="m-0">© <?= date('Y')?> Dulyawat & Natpinya</p>
     </div>
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
     <script src="<?=base_url('assets/homePage/js/popper.min.js')?>"></script>
     <script src="<?=base_url('assets/homePage/js/bootstrap.min.js')?>"></script>
     <script src="<?=base_url('assets/homePage/fontawesome/js/all.js')?>"></script>
     <script src="<?=base_url('assets/homePage/js/wow.min.js')?>"></script>
     <script src="<?=base_url('assets/homePage/js/bootstrap-datepicker.min.js')?>"></script>
     <script src="<?=base_url('assets/homePage/js/moment.min.js')?>"></script>
     <script src="<?=base_url('assets/homePage/js/tempusdominus-bootstrap-4.min.js')?>"></script>
    <!-- validate  -->
    <script src="<?=base_url('assets/plugins/wizard/jquery.steps.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/wizard/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>
        <!-- Sweet-Alert  -->
     <script src="<?=base_url('assets/plugins/sweetalert/sweetalert.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/sweetalert/jquery.sweet-alert.custom.js')?>"></script>

    <script src="<?=base_url('assets/plugins/dropify/dist/js/dropify.min.js')?>"></script>

    <script src="<?=base_url('assets/homePage/js/compressed/picker.js')?>"></script>
    <script src="<?=base_url('assets/homePage/js/compressed/picker.date.js')?>"></script>
    <script src="<?=base_url('assets/homePage/js/compressed/picker.time.js')?>"></script>

    <!-- This is data table -->
    <script src="<?=base_url('assets/plugins/datatables/datatables.min.js')?>"></script>
     <script>
          $(document).ready(function () {

            $('#myTable').DataTable();
               $("#bkDate").pickadate({format: "dd-mm-yyyy",min:new Date(),max:120});
               $("#bkTime").pickatime({min:[11,0],max:[23,0],disable:[{ from: [11,0], to: [new Date().getHours(),30] }]});

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

               $(".menu-icon").on("click", function () {
                    $("nav ul").toggleClass("showing");
               });


          function checkFileLength() {
                let upload_file_elem = $('.upload_img input[type="file"]');
                let validation = 0;
                for (i = 0; i < upload_file_elem.length; i++) {
                    // console.log($(upload_file_elem[i]).val());
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
               
            $('#frmAddadviser').validate({
                rules:{
                    firstName:{required: true},
                    lastName:{required: true},
                    tel:{required: true ,min:10 ,number: true,
                         remote:{
                            type: "POST",
                            url: "<?=base_url('adviser/chk_tel_adviser');?>",
                            data:{
                              tel: function(){
                                    return $("#tel").val();
                                }
                            }
                        }},
                    email2:{required: true,
                         remote:{
                            type: "POST",
                            url: "<?=base_url('adviser/chk_email_adviser');?>",
                            data:{
                                email2: function(){
                                    return $("#email2").val();
                                }
                            }
                        }},
                    password:{required: true,minlength: 8},
                    com:{required: true,number: true}
                },
                messages:{
                    firstName:{required: "กรุณากรอกชื่อ"},
                    lastName:{required: "กรุณากรอกนามสกุล"},
                    tel:{required: "กรุณากรอกเบอร์โทรศัพท์" ,min:10 ,number: true,remote:"หมายเลขนี้ไม่สามารถใช้งานได้"},
                    email2:{required: "กรุณากรอกอัเมล",remote:"อีเมลนี้ไม่สามารถใช้งานได้"},
                    password:{required: "กรุณากรอกรหัสผ่าน",minlength: "กรุณากรอกอย่างน้อย 8 ตัว"},
                    com:{required: "กรุณากรอกค่าคอมมิชชั่น",number: "กรอกได้เฉพาะตัวเลข"},
                },
                    submitHandler: (form,e)=>{
                    e.preventDefault();
                    var data = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('adviser/addAdiser');?>", 
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
                                        // window.location.reload();
                                        location.replace("<?= base_url('main');?>");
                                        //$('.bd-example-modal-lg').modal('show');
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
                    email3:{
                        required: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('main/chk_email_staff');?>",
                            data:{
                                email3: function(){
                                    return $("#email3").val();
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
					email3:{
						remote: "อีเมลนี้มีผู้ใช้งานแล้ว"
					}
                },
                submitHandler: (form,e)=>{
                    e.preventDefault();
                    var formData = new FormData(form);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('main/add_staff_massager');?>",
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
                                    text: "รอการอนุมติจากเจ้าหน้าที่ภายใน 24 ชั่วโมง"
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

            $('#frmAddBooking').validate({
                rules:{
                    bkDate:{required: true},
                    bkTime:{required: true}
                },
                messages:{
                    bkDate:{required: "กรุณาระบุวันที่"},
                    bkTime:{required: "กรุณาระบุเวลา"}
                },
                submitHandler: (form,e)=>{
                    var id = $('#member_id').val();
                    if(id === undefined){
                         $('.bd-example-modal-lg').modal('show');
                    }else{
                         e.preventDefault();
                         var formData = new FormData(form);
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('main/addBooking');?>",
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
                                              text: "รอการอนุมติจากเจ้าหน้าที่ภายใน 24 ชั่วโมง"
                                          }).then((result)=>{
                                                location.replace("<?= base_url('main/history_booking_byId');?>");
                                          });
                                      }else{
                                            console.log(data)
                                          swal({
                                              title: data.msg,
                                              type: "warning"
                                          });
                                      }
                              }
                         });
                    }
                }	
            }); 

            $('#frmAddBooking_adviser').validate({
                rules:{
                    bkDate:{required: true},
                    bkTime:{required: true}
                },
                messages:{
                    bkDate:{required: "กรุณาระบุวันที่"},
                    bkTime:{required: "กรุณาระบุเวลา"}
                },
                submitHandler: (form,e)=>{
                    var id = $('#adviser_id').val();
                    if(id === undefined){
                         $('.bd-example-modal-lg').modal('show');
                    }else{
                         e.preventDefault();
                         var formData = new FormData(form);
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('main/addBooking_adviser');?>",
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
                                              text: "รอการอนุมติจากเจ้าหน้าที่ภายใน 24 ชั่วโมง"
                                          }).then((result)=>{
                                                location.replace("<?= base_url('main/history_booking_adviser');?>");
                                          });
                                      }else{
                                          swal({
                                              title: data.msg,
                                              type: "warning"
                                          });
                                      }
                              }
                         });
                    }
                }	
            }); 

            $('#frmAddMember').validate({
                rules:{
                    email:{
                        required: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('main/chk_mail_member');?>",
                            data:{
                                email: function(){
                                    return $("#email").val();
                                }
                            }
                        }
                    },
                    password:{required: true,minlength: 8},
                    confirmPassword:{required: true,equalTo: "#password"},
                    tel5:{
                        required: true,
                        minlength: 10 ,maxlength: 10 ,number: true,
                        remote:{
                            type: "POST",
                            url: "<?=base_url('main/chk_tel_member');?>",
                            data:{
                                tel: function(){
                                    return $("#tel5").val();
                                }
                            }
                        }
                    }
                },
                messages:{
                    email:{remote: "อีเมลนี้ไม่สามารถใช้งานได้",},
                    password:{required: "กรุณากรอกรหัสผ่าน",minlength: "กรุณากรอกอย่างน้อย 8 ตัว"},
                    confirmPassword:{required: "กรุณากรอกรหัสผ่านให้เหมือนกัน",equalTo: "กรุณากรอกรหัสผ่านให้เหมือนกัน"},
                    tel5:{remote: "เบอร์นี้มีการใช้งานแล้ว"}
                },
                submitHandler: (form,e)=>{
                    e.preventDefault();
                    var formData = new FormData(form);
                    swal({
                         title: "ยืนยันการสมัคร",
                         type: "warning",
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         confirmButtonText: 'ใช่',
                         cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                         if (result.value) {
                              $.ajax({
                                   type: "post",
                                   url: "<?= base_url('main/addMember');?>",
                                   data: formData,
                                   dataType: 'json',
                                   async: false,
                                   cache: false,
                                   contentType: false,
                                   processData: false,
                                   success: (data)=>{
                                        if(data.status===true){
                                             swal({
                                                  title: "สมัครสมาชิกสำเร็จ",
                                                  type: "success",
                                                  timer: 1500,
                                                  showConfirmButton: false
                                             }).then((result)=>{
                                                  location.replace("<?= base_url('main');?>");
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
    
                }	
            }); 

            $("#btn_pay").click(function(){
                // swal({
                // title: "คุณต้องการยเลิกการจองหรือไม่?",
                // type: "warning",
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'ใช่, ต้องการ!',
                // cancelButtonText: 'ไม่, ยกเลิก'
                // }).then((result) => {
                //     if (result.value) {
                //         $.ajax({
                //         type: "post",
                //         url: "<?= base_url('main/cancel_booking/');?>"+$('#cancel_booking').val(),
                        
                //         dataType: 'json',
                //         async: false,
                //         cache: false,
                //         contentType: false,
                //         processData: false,
                //         success: (data)=>{
                //             if(data.status===true){
                //                 swal({
                //                     type: 'success',
                //                     title: 'ยกเลิกสำเร็จ',
                //                     showConfirmButton: false,
                //                     timer: 1100
                //                 }).then((result)=>{
                //                     location.replace("<?= base_url('main/history_booking');?>");
                //                 });
                //             }
                //         }
                //     });
                //     }
                // });
            }); 

            $("#cancel_booking").click(function(){
                swal({
                title: "คุณต้องการยเลิกการจองหรือไม่?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการ!',
                cancelButtonText: 'ไม่, ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                        type: "post",
                        url: "<?= base_url('main/cancel_booking/');?>"+$('#cancel_booking').val(),
                        
                        dataType: 'json',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    type: 'success',
                                    title: 'ยกเลิกสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1100
                                }).then((result)=>{
                                    location.replace("<?= base_url('main/history_booking_byId');?>");
                                });
                            }
                        }
                    });
                    }
                });
            }); 

            $("#cancel_booking_adviser").click(function(){
                swal({
                title: "คุณต้องการยเลิกการจองหรือไม่?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ต้องการ!',
                cancelButtonText: 'ไม่, ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                        type: "post",
                        url: "<?= base_url('main/cancel_booking/');?>"+$('#cancel_booking_adviser').val(),
                        
                        dataType: 'json',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data)=>{
                            if(data.status===true){
                                swal({
                                    type: 'success',
                                    title: 'ยกเลิกสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1100
                                }).then((result)=>{
                                    location.replace("<?= base_url('main/history_booking_adviser');?>");
                                });
                            }
                        }
                    });
                    }
                });
            }); 
            
            $("#history_booking").click(function(){

                $.ajax({
                    type: "post",
                    url: "<?= base_url('main/getAllPaytments/');?>",
                    dataType: 'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false
                    // success: (data)=>{


                    //     alert(data);
                    //     if(data.status===true){
                    //         swal({
                    //             type: 'success',
                    //             title: 'ยกเลิกสำเร็จ',
                    //             showConfirmButton: false,
                    //             timer: 1100
                    //         }).then((result)=>{
                    //             location.replace("<?= base_url('main/history_booking');?>");
                    //         });
                    //     }
                    // }
                });
            }); 













          });
          
















          // Scrolling Effect

          $(window).on("scroll", function () {
               if ($(window).scrollTop()) {
                    $('nav').addClass('black');
               }

               else {
                    $('nav').removeClass('black');
               }
          })
          // wow
          new WOW().init();
          $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
            });
        });
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function () {
            $('#upload').on('change', function () {
                readURL2(input);
            });
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL3(input);
            });
        });

     // profile
     function readURL4(input) {
          if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function (e) {
               $('#imagePreview3').attr('src', e.target.result);
               $('#imagePreview3').hide();
               $('#imagePreview3').fadeIn(650);
               }
               reader.readAsDataURL(input.files[0]);
          }
     }
     $("#imageUpload3").change(function () {
          readURL4(this);
     });

     function readURL5(input) {
          if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function (e) {
               $('#imagePreview2').attr('src', e.target.result);
               $('#imagePreview2').hide();
               $('#imagePreview2').fadeIn(650);
               }
               reader.readAsDataURL(input.files[0]);
          }
     }
     $("#imageUpload2").change(function () {
          readURL5(this);
     });




     </script>
</body>

</html>