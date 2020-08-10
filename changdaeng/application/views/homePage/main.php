<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/bootstrap.min.css')?>">
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
     <!-- Owl Stylesheets -->
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/owl.carousel.css')?>">
     <link rel="stylesheet" type="text/css" href="<?=base_url('assets/homePage/css/owl.theme.default.css')?>">

     <title>ช้างแดงโพธิเวช นวดแผนโบราณ เชียงใหม่</title>
     <link rel="shortcut icon" type="image/jpg" href="<?=base_url('upload/logo/logo.jpg')?>">
     <style>
        .error{
            color : red;
            text-align: right;
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
                    <li class="nav-item active">
                         <a class="nav-link" href="<?=base_url('main')?>">หน้าแรก <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?=base_url('main/course_massager')?>">รูปแบบและบริการ</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?=base_url('main/news')?>">ข่าวและกิจกรรม</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?=base_url('main/about_us')?>">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?=base_url('main/contact_us')?>">ติดต่อเรา</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?=base_url('main/join_us')?>">ร่วมงานกับเรา</a>
                    </li>
               </ul>
               <span class="navbar-text mr-3">
                    <i class="fas fa-phone-square "></i> 053-235-107
               </span>
               <!-- เข้าสู่ระบบ เริ่ม -->
               <?php if(empty($login[0])){?>
               <button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target=".bd-example-modal-lg">เข้าสู่ระบบ</button>
               <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                                           <input type="email" id="email1" name="email1"
                                                                                class="form-control" placeholder="อีเมล"
                                                                                required autofocus>
                                                                           <label for="email1">อีเมล</label>
                                                                      </div>

                                                                      <div class="form-label-group">
                                                                           <input type="password" id="password1" name="password1"
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
                                                                           <input type="email" id="email5" name="email5" class="form-control" placeholder="อีเมล" required autofocus>
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
                                                                 <h3 class="login-heading mb-5 text-center">ลงทะเบียน</h3>
                                                                 <form method="post" id="frmAddMember" enctype="multipart/form-data">
                                                                      <div class="form-label-group">
                                                                           <input type="email" id="email" name="email" class="form-control" placeholder="อีเมล" required autofocus>
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
                                                                           <input type="text" id="tel5" name="tel5"  class="form-control" placeholder="เบอร์ติดต่อ" required >
                                                                           <label for="tel5">เบอร์ติดต่อ</label>
                                                                      </div>
                                                                      <button class="btn btn-lg btn-danger btn-block btn-login text-uppercase font-weight-bold mt-4 mb-2" type="submit">ลงทะเบียน</button>
                                                                     
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
               <?php } ?>
               <!-- ลงทะเบียน จบ -->
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

     <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                    <div class="carousel-item active">
                         <img src="<?=base_url('upload/courseMS/img1.jpg')?>" class="d-block w-100" alt="...">
                         <div class="carousel-caption d-none d-md-block">
                              <h2 class="wow fadeInUp" style="animation-delay: 0.1s;">ช้างแดงโพธิเวช นวดแผนโบราณ เชียงใหม่</h2>
                              <p class="wow fadeInUp" style="animation-delay: 0.3s;">ความสมดุลที่สมบูรณ์แบบของร่างกายและจิตใจ</p>
                              <a href="<?php echo site_url('main/booking');?>"><button type="button" class="btn btn-warning bg_book">จอง</button></a>
                         </div>
                    </div>
                    <div class="carousel-item">
                         <img src="<?=base_url('upload/courseMS/img2.jpg')?>" class="d-block w-100" alt="...">
                         <div class="carousel-caption d-none d-md-block">
                              <h2 class="wow fadeInUp" style="animation-delay: 0.1s;">นักบำบัดมืออาชีพ</h2>
                              <p class="wow fadeInUp" style="animation-delay: 0.3s;">ความสมดุลที่สมบูรณ์แบบของร่างกายและจิตใจ</p>
                              <a href="<?php echo site_url('main/booking');?>"><button type="button" class="btn btn-warning bg_book">จอง</button></a>
                         </div>
                    </div>
                    <div class="carousel-item">
                         <img src="<?=base_url('upload/courseMS/img3.jpg')?>" class="d-block w-100" alt="...">
                         <div class="carousel-caption d-none d-md-block">
                              <h2 class="wow fadeInUp" style="animation-delay: 0.1s;">สภาพแวดล้อมและผลิตภัณฑ์ที่ดีที่สุด</h2>
                              <p class="wow fadeInUp" style="animation-delay: 0.3s;">ด้วยประสบการณ์ 20 ปีให้บริการลูกค้ามากกว่า 5 ล้านคน</p>
                              <a href="<?php echo site_url('main/booking');?>"><button type="button" class="btn btn-warning bg_book">จอง</button></a>
                         </div>
                    </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
               </a>
          </div>
     </div>

     <div class="text-center mt-5 mb-5">
          <img src="<?=base_url('upload/h.png')?>">
          <h3 class="my-3 mb-5">รูปแบบการรักษา</h3>
          <div class="container">
               <div class="row">
                    <div class="card-deck">
                         <div class="card wow flipInX" style="animation-delay: 0.1s;">
                              <img src="<?=base_url('upload/img5.jpg')?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                   <h5 class="font-weight-bold">นวด</h5>
                                   <p class="card-text">
                                        การนวดเกี่ยวข้องกับการทำงานและทำหน้าที่ในร่างกายด้วยแรงกดดันการสั่นไหวการเคลื่อนไหวทำด้วยตนเอง
                                   </p>
                              </div>
                         </div>
                         <div class="card wow flipInX" style="animation-delay: 0.3s;">
                              <img src="<?=base_url('upload/img6.jpg')?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                   <h5 class="font-weight-bold">ไคโรแพรคติก</h5>
                                   <p class="card-text">
                                        มันเป็นรูปแบบของการแพทย์ทางเลือกที่เกี่ยวข้องกับการวินิจฉัยและการรักษาความผิดปกติของระบบกล้ามเนื้อและกระดูกสันหลังและกระดูกสันหลัง
                                   </p>
                              </div>
                         </div>
                         <div class="card wow flipInX" style="animation-delay: 0.6s;">
                              <img src="<?=base_url('upload/img7.jpg')?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                   <h5 class="font-weight-bold">น้ำมันหอมระเหย</h5>
                                   <p class="card-text">
                                        น้ำมันหอมระเหยใช้น้ำมันพืชที่มีกลิ่นหอมและน้ำมันหอมระเหยเพื่อจุดประสงค์ในการเปลี่ยนแปลงอารมณ์ความรู้สึกทางจิตใจหรือร่างกาย
                                   </p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                    <div class="carousel-item active">
                         <img src="<?=base_url('upload/img15.jpg')?>" class="d-block w-100">
                         <div class="carousel-caption d-none d-md-block mb-5">
                              <h1 class=" wow fadeInUp" style="animation-delay: 0.1s;">จองการนัดหมายออนไลน์</h1>
                              <p class=" wow fadeInUp" style="animation-delay: 0.3s;">เพื่อความสะดวกของคุณคุณสามารถจองการนัดหมายออนไลน์ด้วยเครื่องมือการจองออนไลน์ที่ปลอดภัยของเราหรือโทรหาเราที่
                                   053-235-107
                              </p>
                              <a href="<?php echo site_url('main/booking');?>"><button type="button" class="btn btn-warning bg_book wow fadeInUp" style="animation-delay: 0.6s;">จองตอนนี้</button></a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="text-center mt-5 mb-5">
          <img src="<?=base_url('upload/h.png')?>">
          <h3 class="my-3 mb-5">ประโยชน์ด้านสุขภาพ</h3>
     </div>
     <div class="health_benefits">
          <div class="container">
               <div class="row">
                    <div class="col-4 wow flipInX" style="animation-delay: 0.1s;">
                         <div class="row">
                              <div class="col-md-4">
                                   <img src="<?=base_url('upload/ic_stones.png')?>" class="card-img" alt="...">
                              </div>
                              <div class="col-md-8">
                                   <h5 class="font-weight-bold">การนวดสวีดิช</h5>
                                   <p class="health_text_p">เป็นรูปแบบการนวดที่พบมากที่สุดและเป็นการนวดแบบเบา ๆ ส่วนใหญ่จะเป็นการผ่อนคลายกล้ามเนื้อ
                                   </p>
                              </div>
                         </div>
                    </div>

                    <div class="col-4 wow flipInX" style="animation-delay: 0.3s;">
                         <div class="row">
                              <div class="col-md-4">
                                   <img src="<?=base_url('upload/ic_stones.png')?>" class="card-img" alt="...">
                              </div>
                              <div class="col-md-8">
                                   <h5 class="font-weight-bold">นวดบำบัด</h5>
                                   <p class="health_text_p">ที่รู้จักกันทั่วไปว่าเป็นเนื้อเยื่อลึกใช้สำหรับความตึงเครียดของกล้ามเนื้อเรื้อรังและเป็นการนวดที่ทำให้ชุ่มชื่น
                                   </p>
                              </div>
                         </div>
                    </div>

                    <div class="col-4 wow flipInX" style="animation-delay: 0.6s;">
                         <div class="row">
                              <div class="col-md-4">
                                   <img src="<?=base_url('upload/ic_stones.png')?>" class="card-img" alt="...">
                              </div>
                              <div class="col-md-8">
                                   <h5 class="font-weight-bold">การนวดทางการแพทย์</h5>
                                   <p class="health_text_p">ใช้เมื่อทำงานกับผู้ที่เคยประสบอุบัติเหตุไม่ว่าจะเป็นงานและ / หรือในรถยนต์</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-4 wow flipInX" style="animation-delay: 0.2s;">
                         <div class="row">
                              <div class="col-md-4">
                                   <img src="<?=base_url('upload/ic_stones.png')?>" class="card-img" alt="...">
                              </div>
                              <div class="col-md-8">
                                   <h5 class="font-weight-bold">กีฬาการนวด</h5>
                                   <p class="health_text_p">ใช้สำหรับนักกีฬาที่จริงจังที่ฝึกฝนอย่างต่อเนื่อง
                                        มันมุ่งเน้นไปที่กล้ามเนื้อที่เกี่ยวข้องกับกิจกรรมเฉพาะ</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-4 wow flipInX" style="animation-delay: 0.4s;">
                         <div class="row">
                              <div class="col-md-4">
                                   <img src="<?=base_url('upload/ic_stones.png')?>" class="card-img" alt="...">
                              </div>
                              <div class="col-md-8">
                                   <h5 class="font-weight-bold">นวดการตั้งครรภ์</h5>
                                   <p class="health_text_p">เป็นการผสมผสานระหว่างการนวดสวีดิชและการนวดบำบัดขึ้นอยู่กับว่าลูกค้าอยู่ที่ใดด้วยการตั้งครรภ์
                                   </p>
                              </div>
                         </div>
                    </div>

                    <div class="col-4 wow flipInX" style="animation-delay: 0.7s;">
                         <div class="row">
                              <div class="col-md-4">
                                   <img src="<?=base_url('upload/ic_stones.png')?>" class="card-img" alt="...">
                              </div>
                              <div class="col-md-8">
                                   <h5 class="font-weight-bold">เก้าอี้สำนักงาน</h5>
                                   <p class="health_text_p">มีการใช้บริการนวดในสถานที่จัดงานแสดงสินค้าการประชุมสำนักงานธุรกิจและงานสังสรรค์ทางสังคม
                                   </p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          </div>
     </div>
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
     
     <script>
          $(document).ready(function () {

               $(".menu-icon").on("click", function () {
                    $("nav ul").toggleClass("showing");
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

            $('#frmAddBooking').validate({
                rules:{
                    lastName:{required: true,minlength: 4},
                    tell:{required: true ,min:10 ,number: true}
                },
                messages:{
					email:{
						remote: "อีเมลนี้มีผู้ใช้งานแล้ว"
					}
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
                                   //    if(data.status===true){
                                   //        swal({
                                   //            title: "บันทึกข้อมูลสำเร็จ",
                                   //            type: "success",
                                   //            text: "รอการอนุมติจากเจ้าหน้าที่ภายใน 24 ชั่วโมง"
                                   //        }).then((result)=>{
                                   //            window.location.reload();
                                   //        });
                                   //    }else{
                                   //        swal({
                                   //            title: "กรุณากรอกข้อมูลให้ครบ !!",
                                   //            type: "warning"
                                   //        });
                                   //    }
                              }
                         });
                    }
                }	
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
     </script>
</body>

</html>