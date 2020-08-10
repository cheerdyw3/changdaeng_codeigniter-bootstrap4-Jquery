
     <div class="mt-5 mb-5">
          <div class="text-center">
          <img src="<?=base_url('upload/h.png')?>">
               <h3 class="my-3 mb-5">ร่วมงานกับเรา</h3>
          </div>
          <div class="container">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item col-6">
                         <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home3" aria-selected="true">ไกด์</a>
                    </li>
                    <li class="nav-item col-6">
                         <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile3" aria-selected="false">พนักงานนวด</a>
                    </li>
               </ul>
          </div>
          <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container emp-profile">
                    <form class="" method="post" enctype="multipart/form-data" id="frmAddadviser">
                         <div class="row">
                              <div class="col-md-4">
                         
                                   <div class="profile-img">
                                        <img src="<?=base_url('upload/profiledefault.png')?>" alt="" id="imagePreview3"/>
                                        <div class="file btn btn-lg btn-primary">
                                             เพิ่มรูปภาพ
                                             <input type="file" class="form-control" name="imageUpload3" id="imageUpload3" accept="image/x-png,image/gif,image/jpeg"/>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="profile-head">
                                        <h4>สมัครไกด์</h4>
                                        <h6> ช้างแดงโพธิเวช นวดแผนโบราณ เชียงใหม่ </h6>
                                        <p class="proile-rating">90 ถนน ศรีดอนไชย เทศบาลนครเชียงใหม่ 50100</p>
                                        <hr>
                                        <div class="row">
                                             <div class="col-6 mb-3">
                                                  
                                                  <label for="firstName">ชื่อ</label>
                                                  <input type="text" class="form-control" placeholder="ชื่อ" name="firstName" id="firstName">
                                             
                                             </div>
                                             <div class="col-6 mb-3">
                                                  <label for="lastName">นามสกุล</label>
                                                  <input type="text" class="form-control" placeholder="นามสกุล" name="lastName" id="lastName">
                                             </div>
                                             <div class="col-md-12 mb-3">
                                                  <label for="sex">เพศ</label>
                                                  <select class="form-control" id="sex" name="sex">
                                                       <option value="0">หญิง</option>
                                                       <option value="1">ชาย</option>
                                                  </select>
                                                  </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="email2">อีเมล์</label>
                                                  <input type="email" class="form-control" placeholder="อีเมล์" name="email2" id="email2">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                  <label for="password">รหัสผ่าน</label>
                                                  <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" id="password">
                                             </div>
                                             <div class="col-12 mb-3">
                                                  <label for="address">ที่อยู่</label>
                                                  <input type="text" class="form-control" placeholder="ที่อยู่"  name="address" id="address" >
                                             </div>
                                             <div class="col-12 mb-3">
                                                  <label for="tel">โทรศัพท์</label>
                                                  <input type="text" class="form-control" placeholder="โทรศัพท์" name="tel" id="tel">
                                             </div>
                                             <div class="col-12 mb-3">
                                                  <label for="com">ค่าคอมมิชชั่นต่อหัวที่ต้องการ</label>
                                                  <input type="text" class="form-control" placeholder="ค่าคอมมิชชั่น" name="com" id="com">
                                             </div>
                                             <div class="col-12 mb-3">
                                                  <label for="IDCard3">สำเนาบัตรประชาชน</label>
                                                  <input type="file" class="form-control-file dropify" id="IDCard3" name="IDCard3" accept="image/x-png,image/gif,image/jpeg">
                                             </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                             <button type="submit" class="btn btn-warning w-100">สมัครไกด์</button>
                                        </div>
                                   </div>
                              </div>
                         </form>
                         </div>
                    </div>
               </div>
               
               <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container emp-profile">
                    <form class="upload_img" method="post" enctype="multipart/form-data" id="frmAddStaffMassager">
                         <div class="row">

                              <div class="col-md-4">
                                   <div class="profile-img">
                                        <img src="<?=base_url('upload/profiledefault.png')?>" alt="" id="imagePreview2" />
                                        <div class="file btn btn-lg btn-primary">
                                             เพิ่มรูปภาพ
                                             <input type="file" name="imageUpload2" id="imageUpload2" accept="image/x-png,image/gif,image/jpeg"/>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="profile-head">
                                        <h4>
                                             สมัครพนักงานนวด
                                        </h4>
                                        <h6>
                                             ช้างแดงโพธิเวช นวดแผนโบราณ เชียงใหม่
                                        </h6>
                                        <p class="proile-rating">90 ถนน ศรีดอนไชย เทศบาลนครเชียงใหม่ 50100</p>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                             <li class="nav-item">
                                                  <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true">ข้อมูล</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false">สำเนาเอกสาร</a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-4">
                                   <div class="profile-work" style="padding: 0px;margin: 0px;">
                                        <p style="padding-left:50px; margin-top:-20px;">**กรุณากรอกข้อมูลให้ครบ</p>
                                   </div>
                              </div>
                              <div class="col-md-8">
                                   <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab1">
                                             <div class="row">
                                                  <div class="col-6 mb-3">
                                                       <label for="firstName">ชื่อ</label>
                                                       <input type="text" class="form-control" placeholder="ชื่อ" name="firstName2">
                                                  </div>
                                                  <div class="col-6 mb-3">
                                                       <label for="lastName">นามสกุล</label>
                                                       <input type="text" class="form-control" placeholder="นามสกุล" name="lastName2">
                                                  </div>
                                                  <div class="col-md-12 mb-3">
                                                       <label for="sex">เพศ</label>
                                                       <select class="form-control" id="sex" name="sex2">
                                                            <option value="0">หญิง</option>
                                                            <option value="1">ชาย</option>
                                                       </select>
                                                  </div>
                                                  <div class="col-md-6 mb-3">
                                                       <label for="email3">อีเมล์</label>
                                                       <input type="email" class="form-control" id="email3" placeholder="อีเมล์" name="email3">
                                                  </div>
                                                  <div class="col-md-6 mb-3">
                                                       <label for="password">รหัสผ่าน</label>
                                                       <input type="password" class="form-control" id="inputPassword4" placeholder="รหัสผ่าน" name="password2">
                                                  </div>
                                                  <div class="col-12 mb-3">
                                                       <label for="address">ที่อยู่</label>
                                                       <input type="text" class="form-control" id="address" placeholder="ที่อยู่" name="address2">
                                                  </div>
                                                  <div class="col-12 mb-3">
                                                       <label for="tell">โทรศัพท์</label>
                                                       <input type="text" class="form-control" placeholder="โทรศัพท์" name="tell2">
                                                  </div>
                                                  <div class="col-12"><hr></div>
                                                  <div class="col-12">
                                                       <h5>ความสามารถ : </h5>
                                                       <?php foreach ($query as $key => $value) { ?>
                                                            <div class="custom-control custom-checkbox my-3">
                                                                 <input type="checkbox" class="custom-control-input" id="<?php echo $value->course_id; ?>" value="<?php echo $value->course_id; ?>" name="ability2[]">
                                                                 <label class="custom-control-label" for="<?php echo $value->course_id; ?>"><?php echo $value->course_name; ?></label>
                                                            </div>
                                                       <?php } ?>
                                                  </div>
                                             </div>
                                             

                                        </div>
                                        <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab1">
                                             
                                                  <div class="form-group">
                                                       <label for="IDCard">สำเนาบัตรประชาชน</label>
                                                       <input type="file" class="form-control-file dropify" id="IDCard" name="IDCard2" accept="image/x-png,image/gif,image/jpeg">
                                                  </div>
                                                  <hr>
                                                  <div class="form-group">
                                                       <label for="document">ใบประกอบวิชาชีพ</label>
                                                       <input type="file" class="form-control-file dropify" id="document" name="document2" accept="image/x-png,image/gif,image/jpeg">
                                                  </div>
                                                <hr>
                                        </div>
                                   </div>
                                   <div class="col-12 mt-5">
                                        <button type="submit" class="btn btn-warning w-100 submit_upload" disabled>สมัคร</button>
                                   </div>
                              </div>
                                   
                         </div>
                         </form> 
                    </div>

               </div>
               
          </div>
     </div>
