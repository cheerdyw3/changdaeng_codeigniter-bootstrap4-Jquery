<div class="text-center mt-5 mb-5">
  <img src="<?=base_url('upload/h.png')?>">
  <h3 class="my-3 mb-5">จองคอร์สนวด</h3>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <!-- Card -->
        <form method="post" id="frmAddBooking" enctype="multipart/form-data">
        <div class="card p-3 mw-100 mh-100 bg-light" id="showList">
            <h5 class="card-title text-left">1. การจองของคุณ</h5>
            <button type="button" id="addList" class="mb-3">เพิ่ม</button>
            <hr>
            <?php foreach ($query as $key => $value) { ?>
              <?php $course_id = $value->course_id; ?>
              
              <div id="showListDetail1">
                <div class="col-12">
                  <div class="row">
                  <select class="custom-select col-10 mb-3" id="idSelect1" name="course[]" onchange="totolPrice(1);">
                    <option selected="">เลือกคอร์สนวด</option>
                    <?php foreach ($allCourse as $key => $value2) { ?>
                      <?php if($course_id!=$value2->course_id) { ?>
                        <option  value="<?php echo $value2->course_id; ?>"><?php echo $value2->course_name ." / ". $value2->course_price;?></option>
                      <?php }else{ ?>
                        <option selected="" value="<?php echo $value2->course_id; ?>"><?php echo $value2->course_name ." / ". $value2->course_price;?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                    <input type="hidden" name="timeBefor1" id="timeBefor1" value="">
                    <input type="hidden" name="priceBefor1" id="priceBefor1" value="">
                    <input type="hidden" name="price1" id="price1" value="">
                    <div class="col-2 mt-1">
                      <span class="badge badge-danger" id="" onclick="deleteList(1);">ลบ</span>
                    </div>
                  </div>
                </div>
                      <div class="col-12 text-left">
                        <div class="row">
                          <h6 class="col-sm-5 mt-1"><label>ต้องการนวด</label></h6>
                          <input class="col-sm-3 mb-2" type="number" id="time1" name="time[]" value="1" min="1" max="10"  onchange="totolPrice(1);">
                          <h6 class="col-sm-4 mt-1"><label>ชั่วโมง</label></h6>
                      </div> 
                    </div>
                    <hr>
              </div>

              
            <!-- <div>
              <img class="card-img-top img-responsive " src="<?=base_url('upload/courseMS/course_img10.jpg')?>" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title text-left" ><?php echo $value->course_name; ?></h5>
                  <p class="pad-lr-sm-15 text-left" >
                    <i class="far fa-clock mar-rgt-10 text-secondary" aria-hidden="true"></i>
                    <span class="text-left text-secondary"> 1 ชั่วโมง </span>
                    <span class="text-left text-secondary">/ <?php echo $value->course_price; ?> บาท </span>
                  </p>
                  <hr>
              </div>
            </div> -->

            <?php } ?>   
            
        </div>
        <!-- end Card -->
      </div>
      <div class="col-sm-4">
        <div class="card p-3 bg-light">
        <h5 class="card-title text-left">2. รายละเอียดของคุณ</h5>
          <div class="card-body">
            
              <div class="row">
                <div class="col-12 form-group text-left">
                    <label for="bkDate">วันที่ <i class="fa fa-calendar"></i> <span class="text-danger"> *</span></label>                                                       
                    <input type="text" id="bkDate" class="form-control" name="bkDate" autocomplete="off">  
                </div>            
              </div>
              <div class="row">
                <div class="col-12 form-group  text-left">
                    <label for="bkTime">เวลา <i class="fas fa-clock"></i><span class="text-danger"> *</span></label>                                                       
                    <input type="text" id="bkTime" class="form-control" name="bkTime" autocomplete="off">   
                </div>            
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card p-3 bg-light">
        <h5 class="card-title text-left">3. ยืนยันการชำระเงิน</h5>
          <div class="card-body">
              <div class="row">
                <div class="price-col">
                    <img src="<?=base_url('upload/pay2.png')?>" alt="..." class="rounded col-sm-3 mx-100">
                    <h6>กสิกรไทย (Kbank)</h6>
                    <p class="text-muted m-0">ชื่อบัญชี : สุกฤษณพง กระบวนแสง</p>
                    <p class="text-muted m-0">เลขที่บัญชี : 599 2208 831</p>
                </div>
                <div class="price-col mt-2">
                    <img src="<?=base_url('upload/pay1.png')?>" alt="..." class="rounded col-sm-3 mx-100">
                    <h6>ธนชาติ (Thanachart)</h6>
                    <p class="text-muted m-0">ชื่อบัญชี : ไอยริณ รัชชพิสิษฐ์กุล</p>
                    <p class="text-muted m-0">เลขที่บัญชี : 501 6114 546</p>
                </div>
              </div>
              <div class="row">
                <div class="price-col mt-4">
                    <span class="amount-payable">ยอดชำระเงินทั้งหมด</span>
                    <span class="price">
                        <span>฿</span>
                        <span id="bkPrice2"><?php echo number_format($value->course_price,2); ?></span>
                        <input type="hidden" id="bkPrice" class="form-control" name="bkPrice" autocomplete="off" value="<?php echo $value->course_price; ?>">   
                    </span>
                </div>
              </div>
                  <div class="row">
                    <div class="price-col mb-4 mt-4">
                      <h6>อัพโหลดหลักฐานการชำระเงิน :</h6>   
                      <div class="input-group mt-2 mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                        <input id="upload" name="upload" type="file" onchange="readURL2(this);" accept="image/*" class="form-control border-0">
                        <label id="upload-label" for="upload" class="font-weight-light text-muted">เลือกไฟล์</label>
                        <div class="input-group-append">
                          <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> 
                            <i class="fas fa-cloud-upload-alt mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">เลือกไฟล์</small>
                          </label>
                        </div>
                      </div>
                      <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                  </div>
                </div>
              <div class="modal-footer">
              <?php $login = $this->session->userdata('login'); ?>
              <?php if(!empty($login[0])){?>
                <!-- <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id ; ?>"> -->
                <input type="hidden" name="member_id" id="member_id" value="<?php echo $login[0]->member_id; ?>">
              <?php } ?>
                <button type="submit" class="btn btn-success">ยืนยันการจอง</button>
              </div>   
            </form>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url('assets/homePage/js/jquery-3.3.1.min.js')?>"></script>
<Script>
var boxList=1;
     var totalPrice = 0;
     $('#addList').click(function(){
          boxList++;
          $('#showList').append('<div id="showListDetail'+boxList+'"><div class="col-12"><div class="row"><select class="custom-select col-10 mb-3" id="idSelect'+boxList+'" name="course[]" onchange="totolPrice('+boxList+');"> <option selected="">เลือกคอร์สนวด</option> <?php foreach ($allCourse as $key => $value2) { ?><option  value="<?php echo $value2->course_id; ?>"><?php echo $value2->course_name ." / ". $value2->course_price;?></option><?php } ?></select> <input type="hidden" name="timeBefor1" id="timeBefor'+boxList+'" value=""> <input type="hidden" name="priceBefor1" id="priceBefor'+boxList+'" value=""> <input type="hidden" name="price1" id="price'+boxList+'" value=""> <div class="col-2 mt-1"><span class="badge badge-danger" id="" onclick="deleteList('+boxList+');">ลบ</span></div></div></div><div class="col-12 text-left"> <div class="row"><h6 class="col-sm-5 mt-1"><label>ต้องการนวด</label></h6><input class="col-sm-3 mb-2" type="number" id="time'+boxList+'" name="time[] " value="1" min="1" max="10" onchange="totolPrice('+boxList+');"> <h6 class="col-sm-4 mt-1"><label>ชั่วโมง</label></h6></div></div><hr></div>');
     });

     function formatCurrency(number) {
        number = parseFloat(number);
        return number.toFixed(2).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
        });
     }


     function deleteList(e){
          var id = $("#idSelect"+e).val();
          $.ajax({
               url: "<?= base_url('main/getCourseById2/');?>"+id,
               method:"POST",
               data:id,
               dataType: "json",
               success:function(res){
                    if(res.status != false){
                         var priceBefoe = $('#timeBefor'+e).val()*$('#price'+e).val();
                         totalPrice = totalPrice-priceBefoe;
                         $('#bkPrice').val(totalPrice.toFixed(2));
                         var rsComma = formatCurrency(totalPrice.toFixed(2));
                         $('#bkPrice2').text(rsComma);
                         $('#showListDetail'+e+'').remove();
                    }else{
                         $('#showListDetail'+e+'').remove();
                    }

               }
          });
     }

     function totolPrice (e){
          var id = $("#idSelect"+e).val();
          $.ajax({
               url: "<?= base_url('main/getCourseById2/');?>"+id,
               method:"POST",
               data:id,
               dataType: "json",
               success:function(res){
                    if(res.status != false){
                         if($('#priceBefor'+e).val()==""){
                              $('#priceBefor'+e).val(0);
                         }
                              totalPrice = totalPrice - $('#priceBefor'+e).val();
                              $('#price'+e).val(res.data[0].course_price);
                              var time = $('#time'+e).val();
                              totalPrice+=parseInt(time*res.data[0].course_price);
                              $('#priceBefor'+e).val(time*parseInt(res.data[0].course_price));
                              $('#timeBefor'+e).val(time);
                              $('#bkPrice').val(totalPrice.toFixed(2));
                              var rsComma = formatCurrency(totalPrice.toFixed(2));
                              $('#bkPrice2').text(rsComma);
                    }
               }
          });
     }
</Script>