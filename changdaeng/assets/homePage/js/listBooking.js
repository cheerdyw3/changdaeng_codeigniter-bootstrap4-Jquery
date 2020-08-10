
     var boxList=1;
     var totalPrice = 0;
     $('#addList').click(function(){
          boxList++;
          $('#showList').append('<div id="showListDetail'+boxList+'"><div class="col-12"><div class="row"><select class="custom-select col-10 mb-3" id="idSelect'+boxList+'" name="course[]" onchange="totolPrice('+boxList+');"> <option selected="">เลือกคอร์สนวด</option> <?php foreach ($allCourse as $key => $value2) { ?><option  value="<?php echo $value2->course_id; ?>"><?php echo $value2->course_name ." / ". $value2->course_price;?></option><?php } ?></select> <input type="hidden" name="timeBefor1" id="timeBefor'+boxList+'" value=""> <input type="hidden" name="priceBefor1" id="priceBefor'+boxList+'" value=""> <input type="hidden" name="price1" id="price'+boxList+'" value=""> <div class="col-2 mt-1"><span class="badge badge-danger" id="" onclick="deleteList('+boxList+');">ลบ</span></div></div></div><div class="col-12 text-left"> <div class="row"><h6 class="col-sm-5 mt-1"><label>ต้องการนวด</label></h6><input class="col-sm-2 mb-2" type="text" id="time'+boxList+'" name="time[] " value="1" onchange="totolPrice('+boxList+');"> <h6 class="col-sm-4 mt-1"><label>ชั่วโมง</label></h6></div></div><hr></div>');
     });

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
                         $('#bkPrice2').text(totalPrice.toFixed(2));
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
                              $('#bkPrice2').text(totalPrice.toFixed(2));
                    }
               }
          });
     }
